<?php

namespace Modules\Ecommerce\Http\Controllers;

use Razorpay\Api\Api;
use App\Constants\Status;
use PharIo\Manifest\Email;
use App\Helper\EmailHelper;
use App\Models\Flutterwave;
use Illuminate\Http\Request;
use App\Mail\OrderSuccessfully;
use App\Models\RazorpayPayment;
use App\Models\InstamojoPayment;
use App\Models\PaystackAndMollie;
use Mollie\Laravel\Facades\Mollie;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use Modules\Ecommerce\Entities\Cart;
use Modules\Coupon\App\Models\Coupon;
use Modules\Ecommerce\Entities\Order;
use Illuminate\Support\Facades\Session;
use Modules\Currency\App\Models\Currency;
use Modules\Ecommerce\Entities\OrderDetail;
use  Auth, Stripe, Str, Exception, Redirect;
use Modules\Coupon\App\Models\CouponHistory;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\PaymentGateway\App\Models\PaymentGateway;

class EcommercePaymentController extends Controller
{

    public $payment_setting;

    public function __construct()
    {
        $payment_data = PaymentGateway::all();


        $this->payment_setting = array();

        foreach($payment_data as $data_item){
            $payment_setting[$data_item->key] = $data_item->value;
        }

        $this->payment_setting  = (object) $payment_setting;
    }

    public function pay_via_mollie(Request $request)
    {

        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];

        $mollie =  Currency::findOrFail($this->payment_setting->mollie_currency_id);
        $price = round($total * $mollie->currency_rate,2);
        $price = number_format($price, 2, '.', '');


        $mollie_api_key = PaymentGateway::where('key', 'mollie_key')->first()->value;
        $currency = strtoupper($mollie->currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => '' . $price . '',
            ],
            'description' => env('APP_NAME'),
            'redirectUrl' => route('ecommerce.mollie-payment-success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        session()->put('payment_id', $payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function mollie_payment_success(Request $request)
    {

        $mollie = Currency::findOrFail($this->payment_setting->mollie_currency_id);

        $mollie_api_key = PaymentGateway::where('key', 'mollie_key')->first()->value;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('payment_id'));
        if ($payment->isPaid()) {

            $user = Auth::guard('web')->user();

            $orderData = session()->get('orderData');
            $order = $this->create_order($user, $orderData, 'Mollie', Status::APPROVED);

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('user.orders')->with($notification);
        } else {

            $notification = trans('Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    public function stripe(Request $request)
    {

        if (env('APP_MODE') == 'DEMO') {
            return redirect()->back()->with([
                'messege' => trans('This Is Demo Version. You Can Not Change Anything'),
                'alert-type' => 'error'
            ]);
        }

        try {
            $user = Auth::guard('web')->user();
            if (!$user) {
                throw new \Exception(trans('User not authenticated'));
            }


          $stripe =  Currency::findOrFail($this->payment_setting->stripe_currency_id);

            if (!$stripe) {
                throw new \Exception(trans('Stripe configuration not found'));
            }

            $orderData = session()->get('orderData');

            $total = $orderData['total'];

            $payable_amount = round($total * $stripe->currency_rate, 2);

            // Set Stripe API key
            Stripe\Stripe::setApiKey($this->payment_setting->stripe_secret);
            // Create Stripe charge

            $result = Stripe\Charge::create([
                "amount" => (int)($payable_amount * 100), // Convert to cents
                "currency" => $stripe->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME')
            ]);

            // Create first order
            $order = $this->create_order($user, $orderData, 'Stripe', Status::APPROVED, $result->balance_transaction);

            // Create second order with same data

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('user.orders')->with($notification);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'messege' => $e->getMessage() ?? trans('Something went wrong, please try again'),
                'alert-type' => 'error'
            ]);
        }
    }

    public function bank(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $rules = [
            'tnx_info' => 'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('Transaction is required'),
        ];

        $request->validate($rules, $customMessages);

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];


        $order = $this->create_order($user, $orderData,'Bank_Payment',Status::PENDING, $request->tnx_info);

        $notification = trans('Your payment has been made. please wait for admin payment approval');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->route('user.orders')->with($notification);
    }

    public function pay_via_razorpay(Request $request){

        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key,$this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $payId = $response->id;

                $user = Auth::guard('web')->user();

               // Create first order
                $orderData = session()->get('orderData');
                $order = $this->create_order($user, $orderData, 'Razorpay', Status::APPROVED);


                $notification = trans('Your payment has been made successful. Thanks for your new purchase');
                $notification = array('messege' => $notification, 'alert-type' => 'success');
                return redirect()->route('user.orders')->with($notification);

            } catch (Exception $e) {
                $notification = trans('Something went wrong, please try again');
                $notification = array('messege' => $notification, 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }
        }else{
            $notify_message = trans('Something went wrong, please try again');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('payment.pay', ['service_package_id' => $service_package_id, 'package_name' => $package_name])->with($notify_message);
        }
    }


    public function pay_via_flutterwave(Request $request, $id)
    {

        $curl = curl_init();
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $this->payment_setting->flutterwave_secret_key;
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Authorization: Bearer $token"
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if ($response->status == 'success') {

            $user = Auth::guard('web')->user();

            // Create first order
            $orderData = session()->get('orderData');
            $order = $this->create_order($user, $orderData, 'Flutterwave', Status::APPROVED);

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success', 'message' => $notification]);


        } else {
            $notification = trans('Something went wrong, please try again');
            return response()->json(['status' => 'faild', 'message' => $notification]);
        }
    }

    public function pay_via_payStack(Request $request)
    {

        $reference = $request->reference;
        $transaction = $request->tnx_id;
        $secret_key = $this->payment_setting->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST =>0,
            CURLOPT_SSL_VERIFYPEER =>0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $final_data = json_decode($response);

        if ($final_data->status == true) {

            $user = Auth::guard('web')->user();

             // Create first order
             $orderData = session()->get('orderData');
             $order = $this->create_order($user, $orderData, 'Paystack', Status::APPROVED);

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success', 'message' => $notification]);
        } else {
            $notification = trans('Something went wrong, please try again');
            return response()->json(['status' => 'faild', 'message' => $notification]);
        }
    }

    public function pay_via_instamojo(Request $request)
    {

        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $user = Auth::guard('web')->user();

        $orderData = session()->get('orderData');

        $total = $orderData['total'];

        try {
            $instamojo_currency = Currency::findOrFail($this->payment_setting->instamojo_currency_id);
            $price = $total * $instamojo_currency->currency_rate;
            $price = round($price, 2);

            $environment = $this->payment_setting->instamojo_account_mode;
            $api_key = $this->payment_setting->instamojo_api_key;
            $auth_token = $this->payment_setting->instamojo_auth_token;

            // Validate credentials
            if (empty($api_key) || empty($auth_token)) {
                throw new \Exception('Instamojo API credentials are missing');
            }

            $url = ($environment == 'Sandbox')
                ? 'https://test.instamojo.com/api/1.1/'
                : 'https://www.instamojo.com/api/1.1/';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url.'payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "X-Api-Key: $api_key",
                "X-Auth-Token: $auth_token",
                "Content-Type: application/x-www-form-urlencoded"
            ]);

            $payload = [
                'purpose' => env("APP_NAME"),
                'amount' => $price,
                'phone' => '918160651749',
                'buyer_name' => Auth::user()->name,
                'redirect_url' => route('ecommerce.response-instamojo'),
                'send_email' => true,
                'email' => Auth::user()->email,
                'allow_repeated_payments' => false
            ];

            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('Curl error: ' . curl_error($ch));
            }

            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($http_status !== 200) {
                \Log::error('Instamojo API Error. Status: ' . $http_status . ', Response: ' . $response);
                throw new \Exception('Invalid API response (Status: ' . $http_status . ')');
            }

            $response_data = json_decode($response);

            if (!$response_data || !isset($response_data->payment_request)) {
                \Log::error('Invalid Instamojo response: ' . $response);
                throw new \Exception('Invalid API response format');
            }

            return redirect($response_data->payment_request->longurl);

        } catch (\Exception $e) {
            \Log::error('Instamojo Payment Error: ' . $e->getMessage());
            return redirect()->back()->with([
                'message' => 'Payment initialization failed: ' . $e->getMessage(),
                'alert-type' => 'error'
            ]);
        }

    }

    public function instamojo_response(Request $request)
    {

        $input = $request->all();
        $instamojoPayment = InstamojoPayment::first();
        $environment = $instamojoPayment->account_mode;
        $api_key = $instamojoPayment->api_key;
        $auth_token = $instamojoPayment->auth_token;

        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;

        if ($environment == 'Sandbox') {
            $url = 'https://test.instamojo.com/api/1.1/';
        } else {
            $url = 'https://www.instamojo.com/api/1.1/';
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . 'payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                "X-Api-Key:$api_key",
                "X-Auth-Token:$auth_token"
            )
        );
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {

            $notification = trans('Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        } else {
            $data = json_decode($response);
        }

        if ($data->success == true) {
            if ($data->payment->status == 'Credit') {


                $user = Auth::guard('web')->user();

                $orderData = session()->get('orderData');
                $order = $this->create_order($user, $orderData, 'Instamojo', Status::APPROVED);

                $notification = trans('Your payment has been made successful. Thanks for your new purchase');
                $notification = array('messege' => $notification, 'alert-type' => 'success');
                return redirect()->route('user.orders')->with($notification);
            }
        } else {
            $notification = trans('Something went wrong, please try again');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }





    protected function create_order($user, array $orderData, $payment_method, $payment_status, $tnx_info = null)
    {
        // Update existing pending orders if payment is successful
        if ($payment_status == Status::PENDING) {
            Order::where('user_id', $user->id)
                ->where('payment_status', Status::PENDING)
                ->update(['payment_status' => Status::APPROVED]);
        }

        $order = new Order();
        $order->order_id =  time() . randomNumber(5);
        $order->user_id = $user->id;
        $order->subtotal = $orderData['subtotal'];
        $order->shipping_charge = $orderData['shipping_charge'];
        $order->total = $orderData['total'];
        $order->shipping_method_id = $orderData['shipping_method_id'];
        $order->address = $orderData['address'];
        $order->payment_method = $payment_method;
        $order->payment_status = $payment_status;
        $order->order_status = Status::PENDING;
        $order->transaction_id = $tnx_info;
        $order->save();

        EmailHelper::mail_setup();
        try{
            $setting = GlobalSetting::first();
            $currency = Currency::where('id', $setting->currency_id)->first();

            $template=EmailTemplate::where('id',5)->first();
            $subject=$template->subject;
            $message=$template->description;
            $message = str_replace('{{name}}',$user->name,$message);
            $message = str_replace('{{amount}}',currency($order->total),$message);
            $message = str_replace('{{order_id}}',$order->order_id,$message);
            Mail::to($user->email)->send(new OrderSuccessfully($message,$subject));

        }catch( \Exception $e){

            \Log::error('Mail send error: ' . $e->getMessage());

        }

        $couponPrice=0.00;
        if(Session::get('cupon_code') && Session::get('discount_amount') && Session::get('type')){
            $couponCode=Coupon::where('code',Session::get('cupon_code'))->first();

            if($couponCode){
                $cupon_type=Session::get('type');
                $discount_amount=Session::get('discount_amount');
                if($cupon_type=='percentage'){
                   $couponPrice = ($orderData['subtotal'] * $discount_amount) / 100;
                }else{
                    $couponPrice= $discount_amount;
                }

                $couponHistory = new CouponHistory();
                $couponHistory->user_id = $user->id;
                $couponHistory->coupon_code = $couponCode->code;
                $couponHistory->coupon_id = $couponCode->id;
                $couponHistory->discount_amount = $couponPrice;
                $couponHistory->created_at = now();
                $couponHistory->save();
            }
        }

        $cartItems = Cart::where('user_id', $user->id)->get();

        foreach ($cartItems as $item) {
            $price = $item->quantity * $item->product->finalPrice;
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item->product_id;
            $orderDetail->quantity = $item->quantity;
            $orderDetail->price = $price;
            $orderDetail->save();
        }
        Session::forget('cupon_code');
        Session::forget('type');
        Session::forget('discount_amount');

        Cart::where('user_id', $user->id)->delete();
        return $order;
    }
}
