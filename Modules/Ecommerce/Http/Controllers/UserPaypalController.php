<?php

namespace Modules\Ecommerce\Http\Controllers;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Currency\App\Models\Currency;
use Modules\Ecommerce\Entities\Cart;
use Modules\Ecommerce\Entities\Order;
use Modules\Ecommerce\Entities\OrderDetail;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class UserPaypalController extends Controller
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

    public function paypal(Request $request)
    {
        if(env('APP_MODE') == 'DEMO'){
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $user = Auth::guard('web')->user();
        $paypal_setting = PaymentGateway::where(['key' => 'paypal_currency_id'])->first();

        // Get cart details
        $cart = Cart::where('user_id', $user->id)->with('product')->get();

        // Validate cart is not empty
        if($cart->isEmpty()) {
            return redirect()->back()->with([
                'messege' => trans('Your cart is empty'),
                'alert-type' => 'error'
            ]);
        }

        $orderData = session()->get('orderData');

        $total = $orderData['total'];


        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);


        $payable_amount = round($total * $paypal_currency->currency_rate,2);



        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' =>  $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('user.paypal-success-payment'),
                "cancel_url" => route('user.paypalFailedPayment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $paypal_currency->currency_code,
                        "value" => $payable_amount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
        }

        return redirect()->back()->with([
            'messege' => trans('Something went wrong, please try again'),
            'alert-type' => 'error'
        ]);
    }

    public function paypal_success_payment(Request $request)
    {
        // Get order details from session
        $orderData = session()->get('orderData');

        if (!$orderData) {
            return redirect()->route('user.payment')->with([
                'messege' => trans('Order details not found'),
                'alert-type' => 'error'
            ]);
        }

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);

        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);

        if($this->payment_setting->paypal_account_mode == 'sandbox'){
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        }else{
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $user = Auth::guard('web')->user();

            try {
                $order = $this->create_order($user, $orderData, 'Paypal', Status::APPROVED, $response['id']);

                // Clear session data after successful order creation
                session()->forget('order_details');

                return redirect()->route('user.orders')->with([
                    'messege' => trans('Your payment has been made successful. Thanks for your new purchase'),
                    'alert-type' => 'success'
                ]);
            } catch (\Exception $e) {
                \Log::error('PayPal Order Creation Error: ' . $e->getMessage());
                return redirect()->route('user.pay-via-paypal')->with([
                    'messege' => trans('Error creating order. Please contact support'),
                    'alert-type' => 'error'
                ]);
            }
        }

        return redirect()->route('user.pay-via-paypal')->with([
            'messege' => trans('Payment failed or cancelled'),
            'alert-type' => 'error'
        ]);
    }

    public function paypalFailedPayment(Request $request)
    {
        $notification = trans('Something went wrong, please try again');
        $notification = array('messege'=>$notification,'alert-type'=>'error');
        return redirect()->route('user.pay-via-paypal')->with($notification);
    }

    protected function create_order($user, array $orderData, $payment_method, $payment_status, $tnx_info = null)
    {
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

        Cart::where('user_id', $user->id)->delete();
        return $order;
    }

}
