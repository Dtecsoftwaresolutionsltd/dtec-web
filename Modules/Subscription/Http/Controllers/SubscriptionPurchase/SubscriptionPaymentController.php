<?php

namespace Modules\Subscription\Http\Controllers\SubscriptionPurchase;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use App\Helper\EmailHelper;
use App\Mail\OrderSuccessfully;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\Currency\App\Models\Currency;
use Modules\Subscription\Entities\SubscriptionPlan;
use Modules\Subscription\Entities\SubscriptionHistory;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Mollie\Laravel\Facades\Mollie;
use Razorpay\Api\Api;
use Stripe;

class SubscriptionPaymentController extends Controller
{
    public $payment_setting;

    public function __construct()
    {
        $payment_data = PaymentGateway::all();
        $this->payment_setting = array();
        foreach ($payment_data as $data_item) {
            $payment_setting[$data_item->key] = $data_item->value;
        }
        $this->payment_setting = (object) $payment_setting;
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
            $orderData = session()->get('subscriptionOrderData');
            if (!$user || !$orderData) {
                throw new \Exception(trans('Invalid session or user'));
            }

            $stripeCurrency = Currency::findOrFail($this->payment_setting->stripe_currency_id);
            $payable_amount = round($orderData['total'] * $stripeCurrency->currency_rate, 2);

            Stripe\Stripe::setApiKey($this->payment_setting->stripe_secret);
            $result = Stripe\Charge::create([
                "amount" => (int) ($payable_amount * 100),
                "currency" => $stripeCurrency->currency_code,
                "source" => $request->stripeToken,
                "description" => env('APP_NAME') . ' Subscription'
            ]);

            $this->create_subscription($user, $orderData, 'Stripe', Status::APPROVED, $result->balance_transaction);

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return redirect()->route('user.subscriptions.history')->with(['messege' => $notification, 'alert-type' => 'success']);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'messege' => $e->getMessage() ?? trans('Something went wrong, please try again'),
                'alert-type' => 'error'
            ]);
        }
    }

    public function pay_via_mollie(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $orderData = session()->get('subscriptionOrderData');
        $mollieCurrency = Currency::findOrFail($this->payment_setting->mollie_currency_id);
        $price = round($orderData['total'] * $mollieCurrency->currency_rate, 2);
        $price = number_format($price, 2, '.', '');

        $mollie_api_key = PaymentGateway::where('key', 'mollie_key')->first()->value;
        $currency = strtoupper($mollieCurrency->currency_code);
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => $currency,
                'value' => '' . $price . '',
            ],
            'description' => env('APP_NAME') . ' Subscription',
            'redirectUrl' => route('subscription.mollie-payment-success'),
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);
        session()->put('subscription_payment_id', $payment->id);
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function mollie_payment_success(Request $request)
    {
        $mollie_api_key = PaymentGateway::where('key', 'mollie_key')->first()->value;
        Mollie::api()->setApiKey($mollie_api_key);
        $payment = Mollie::api()->payments->get(session()->get('subscription_payment_id'));
        if ($payment->isPaid()) {
            $user = Auth::guard('web')->user();
            $orderData = session()->get('subscriptionOrderData');
            $this->create_subscription($user, $orderData, 'Mollie', Status::APPROVED);
            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            $notification = array('messege' => $notification, 'alert-type' => 'success');
            return redirect()->route('user.subscriptions.history')->with($notification);
        }
        $notification = trans('Something went wrong, please try again');
        return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
    }

    public function bank(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $rules = [
            'tnx_info' => 'required',
        ];
        $customMessages = [
            'tnx_info.required' => trans('Transaction is required'),
        ];
        $request->validate($rules, $customMessages);

        $user = Auth::guard('web')->user();
        $orderData = session()->get('subscriptionOrderData');
        $this->create_subscription($user, $orderData, 'Bank_Payment', Status::PENDING, $request->tnx_info);

        $notification = trans('Your payment has been made. please wait for admin payment approval');
        return redirect()->route('user.subscriptions.history')->with(['messege' => $notification, 'alert-type' => 'success']);
    }

    public function pay_via_razorpay(Request $request)
    {
        $input = $request->all();
        $api = new Api($this->payment_setting->razorpay_key, $this->payment_setting->razorpay_secret);
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
                $user = Auth::guard('web')->user();
                $orderData = session()->get('subscriptionOrderData');
                $this->create_subscription($user, $orderData, 'Razorpay', Status::APPROVED, $response->id);
                $notification = trans('Your payment has been made successful. Thanks for your new purchase');
                return redirect()->route('user.subscriptions.history')->with(['messege' => $notification, 'alert-type' => 'success']);
            } catch (\Exception $e) {
                $notification = trans('Something went wrong, please try again');
                return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
            }
        }
        $notify_message = trans('Something went wrong, please try again');
        return redirect()->back()->with(['messege' => $notify_message, 'alert-type' => 'error']);
    }

    public function pay_via_payStack(Request $request)
    {
        $reference = $request->reference;
        $secret_key = $this->payment_setting->paystack_secret_key;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $secret_key",
                "Cache-Control: no-cache",
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $final_data = json_decode($response);

        if ($final_data && $final_data->status == true) {
            $user = Auth::guard('web')->user();
            $orderData = session()->get('subscriptionOrderData');
            $this->create_subscription($user, $orderData, 'Paystack', Status::APPROVED);
            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success', 'message' => $notification]);
        }
        $notification = trans('Something went wrong, please try again');
        return response()->json(['status' => 'faild', 'message' => $notification]);
    }

    public function pay_via_flutterwave(Request $request)
    {
        $tnx_id = $request->tnx_id;
        $url = "https://api.flutterwave.com/v3/transactions/$tnx_id/verify";
        $token = $this->payment_setting->flutterwave_secret_key;
        $curl = curl_init();
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

        if ($response && $response->status == 'success') {
            $user = Auth::guard('web')->user();
            $orderData = session()->get('subscriptionOrderData');
            $this->create_subscription($user, $orderData, 'Flutterwave', Status::APPROVED);
            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return response()->json(['status' => 'success', 'message' => $notification]);
        }
        $notification = trans('Something went wrong, please try again');
        return response()->json(['status' => 'faild', 'message' => $notification]);
    }

    public function pay_via_instamojo(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        try {
            $orderData = session()->get('subscriptionOrderData');
            $instamojo_currency = Currency::findOrFail($this->payment_setting->instamojo_currency_id);
            $price = round($orderData['total'] * $instamojo_currency->currency_rate, 2);

            $environment = $this->payment_setting->instamojo_account_mode;
            $api_key = $this->payment_setting->instamojo_api_key;
            $auth_token = $this->payment_setting->instamojo_auth_token;

            if (empty($api_key) || empty($auth_token)) {
                throw new \Exception('Instamojo API credentials are missing');
            }

            $url = ($environment == 'Sandbox') ? 'https://test.instamojo.com/api/1.1/' : 'https://www.instamojo.com/api/1.1/';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url . 'payment-requests/');
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "X-Api-Key: $api_key",
                "X-Auth-Token: $auth_token",
                "Content-Type: application/x-www-form-urlencoded"
            ]);

            $payload = [
                'purpose' => env("APP_NAME") . ' Subscription',
                'amount' => $price,
                'phone' => Auth::user()->phone,
                'buyer_name' => Auth::user()->name,
                'redirect_url' => route('subscription.response-instamojo'),
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
                Log::error('Instamojo API Error. Status: ' . $http_status . ', Response: ' . $response);
                throw new \Exception('Invalid API response (Status: ' . $http_status . ')');
            }

            $response_data = json_decode($response);
            if (!$response_data || !isset($response_data->payment_request)) {
                Log::error('Invalid Instamojo response: ' . $response);
                throw new \Exception('Invalid API response format');
            }

            return redirect($response_data->payment_request->longurl);
        } catch (\Exception $e) {
            Log::error('Instamojo Payment Error: ' . $e->getMessage());
            return redirect()->back()->with([
                'message' => 'Payment initialization failed: ' . $e->getMessage(),
                'alert-type' => 'error'
            ]);
        }
    }

    public function instamojo_response(Request $request)
    {
        $environment = $this->payment_setting->instamojo_account_mode;
        $api_key = $this->payment_setting->instamojo_api_key;
        $auth_token = $this->payment_setting->instamojo_auth_token;
        $url = ($environment == 'Sandbox') ? 'https://test.instamojo.com/api/1.1/' : 'https://www.instamojo.com/api/1.1/';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . 'payments/' . $request->get('payment_id'));
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Api-Key:$api_key", "X-Auth-Token:$auth_token"));
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if ($err) {
            $notification = trans('Something went wrong, please try again');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $data = json_decode($response);
        if ($data && $data->success == true && $data->payment->status == 'Credit') {
            $user = Auth::guard('web')->user();
            $orderData = session()->get('subscriptionOrderData');
            $this->create_subscription($user, $orderData, 'Instamojo', Status::APPROVED);
            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return redirect()->route('user.subscriptions.history')->with(['messege' => $notification, 'alert-type' => 'success']);
        }

        $notification = trans('Something went wrong, please try again');
        return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
    }

    public function create_subscription($user, array $orderData, $payment_method, $payment_status, $tnx_info = null)
    {
        $plan = SubscriptionPlan::find($orderData['subscription_plan_id']);
        $history = new SubscriptionHistory();
        $history->order_id = time() . randomNumber(5);
        $history->user_id = $user->id;
        $history->subscription_plan_id = $orderData['subscription_plan_id'];
        $history->plan_name = $orderData['plan_name'];
        $history->plan_price = $orderData['total'];
        if ($plan?->expiration_date === 'monthly') {
            $history->expiration_date = now()->addMonth()->format('Y-m-d');
        } elseif ($plan?->expiration_date === 'yearly') {
            $history->expiration_date = now()->addYear()->format('Y-m-d');
        } elseif ($plan?->expiration_date === 'lifetime') {
            $history->expiration_date = 'lifetime';
        } else {
            $history->expiration_date = $plan?->expiration_date;
        }
        $history->expiration = $plan?->expiration_date;
        $history->status = $payment_status == Status::APPROVED ? 'active' : 'pending';
        $history->payment_method = $payment_method;
        $history->payment_status = $payment_status == Status::APPROVED ? 'success' : 'pending';
        if ($tnx_info) {
            $history->transaction = $tnx_info;
        } else {
            // Generate a transaction number if not provided
            $history->transaction = 'TXN-' . time() . randomNumber(10);
        }

        // Store plan information as JSON
        $history->plan_info = json_encode([$plan]);

        $history->save();

        // Send confirmation email to user
        EmailHelper::mail_setup();

        try {
            $setting = GlobalSetting::first();

            $template = EmailTemplate::find(6); // Subscription Purchase Template
            $subject = $template?->subject ?? 'Subscription Purchased';
            $message = $template?->description ?? 'Your subscription has been purchased successfully.';

            // Replace placeholders
            $replacements = [
                '{{name}}'            => $user->name,
                '{{amount}}'          => currency($history->plan_price),
                '{{order_id}}'        => $history->order_id,
                '{{plan_name}}'       => $history->plan_name,
                '{{payment_method}}'  => ucfirst($history->payment_method),
                '{{payment_status}}'  => ucfirst($history->payment_status),
                '{{status}}'          => ucfirst($history->status),
                '{{expiration_date}}' => $history->expiration_date,
                '{{transaction}}'     => $history->transaction,
                '{{company_name}}'    => $setting?->company_name ?? config('app.name'),
            ];

            foreach ($replacements as $key => $value) {
                $message = str_replace($key, $value, $message);
                $subject = str_replace($key, $value, $subject);
            }

            Mail::to($user->email)->send(new OrderSuccessfully($message, $subject));
        } catch (\Exception $e) {
            Log::error('Mail send error: ' . $e->getMessage());
        }


        Session::forget('subscriptionOrderData');
        return $history;
    }
}


