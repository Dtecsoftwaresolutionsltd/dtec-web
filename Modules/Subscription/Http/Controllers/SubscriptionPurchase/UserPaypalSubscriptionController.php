<?php

namespace Modules\Subscription\Http\Controllers\SubscriptionPurchase;

use App\Constants\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Currency\App\Models\Currency;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class UserPaypalSubscriptionController extends Controller
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

    public function paypal(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            return redirect()->back()->with(['messege' => $notification, 'alert-type' => 'error']);
        }

        $user = Auth::guard('web')->user();
        $orderData = session()->get('subscriptionOrderData');
        if (!$orderData) {
            return redirect()->back()->with(['messege' => trans('Order details not found'), 'alert-type' => 'error']);
        }

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);
        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);
        if ($this->payment_setting->paypal_account_mode == 'sandbox') {
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        } else {
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
        }

        $payable_amount = round($orderData['total'] * $paypal_currency->currency_rate, 2);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('subscription.paypal-success-payment'),
                "cancel_url" => route('subscription.paypal-failed-payment'),
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

        return redirect()->back()->with(['messege' => trans('Something went wrong, please try again'), 'alert-type' => 'error']);
    }

    public function paypal_success_payment(Request $request)
    {
        $orderData = session()->get('subscriptionOrderData');
        if (!$orderData) {
            return redirect()->route('pricing')->with(['messege' => trans('Order details not found'), 'alert-type' => 'error']);
        }

        $paypal_currency = Currency::findOrFail($this->payment_setting->paypal_currency_id);
        config(['paypal.mode' => $this->payment_setting->paypal_account_mode]);
        if ($this->payment_setting->paypal_account_mode == 'sandbox') {
            config(['paypal.sandbox.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.sandbox.client_secret' => $this->payment_setting->paypal_secret_key]);
        } else {
            config(['paypal.live.client_id' => $this->payment_setting->paypal_client_id]);
            config(['paypal.live.client_secret' => $this->payment_setting->paypal_secret_key]);
            config(['paypal.live.app_id' => 'APP-80W284485P519543T']);
        }

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $request->request->add(['paypal_capture_id' => $response['id']]);
            app(SubscriptionPaymentController::class)->create_subscription(
                Auth::guard('web')->user(),
                $orderData,
                'Paypal',
                Status::APPROVED,
                $response['id']
            );

            $notification = trans('Your payment has been made successful. Thanks for your new purchase');
            return redirect()->route('user.subscriptions.history')->with([
                'messege' => $notification,
                'alert-type' => 'success'
            ]);
        }

        return redirect()->route('subscription.paypal')->with([
            'messege' => trans('Payment failed or cancelled'),
            'alert-type' => 'error'
        ]);
    }

    public function paypal_failed_payment(Request $request)
    {
        $notification = trans('Something went wrong, please try again');
        return redirect()->route('pricing')->with(['messege' => $notification, 'alert-type' => 'error']);
    }
}


