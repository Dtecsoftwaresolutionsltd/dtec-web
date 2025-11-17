<?php

namespace Modules\Subscription\Http\Controllers\SubscriptionPurchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\Currency\App\Models\Currency;
use Modules\SeoSetting\App\Models\SeoSetting;
use Modules\Subscription\Entities\SubscriptionPlan;

class SubscriptionCheckoutController extends Controller
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

    public function index(Request $request)
    {
        if (!auth()->user()) {
            $notification = trans('First You Need To login This Checkout');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->route('user.login')->with($notification);
        }

        $seo_setting = SeoSetting::first();
        $plans = SubscriptionPlan::where('status', 'active')->orderBy('serial', 'asc')->get();

        return view('subscription::frontend.subscription-purchase.checkout', compact('seo_setting', 'plans'));
    }

    public function processToPayment(Request $request)
    {
        if (env('APP_MODE') == 'DEMO') {
            $notification = trans('This Is Demo Version. You Can Not Change Anything');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        $rules = [
            'subscription_plan_id' => 'required|exists:subscription_plans,id',
        ];
        $customMessages = [
            'subscription_plan_id.required' => trans('Plan is required'),
            'subscription_plan_id.exists' => trans('Selected plan is invalid'),
        ];

        $request->validate($rules, $customMessages);

        $plan = SubscriptionPlan::findOrFail($request->subscription_plan_id);

        $planInfo = json_encode([$plan]);


        // No shipping in subscriptions. Use plan price as subtotal/total
        $orderData = [
            'subtotal' => (float) $plan->plan_price,
            'shipping_charge' => 0,
            'total' => (float) $plan->plan_price,
            'subscription_plan_id' => $plan->id,
            'plan_name' => $plan->plan_name,
            'planInfo' => json_decode($planInfo),
        ];

        session([
            'subscriptionOrderData' => $orderData,
        ]);

        $breadcrumb = 'Subscription Payment';
        $seo_setting = SeoSetting::first();
        $cta_content = getContent('template_1_cta.content', true);

        $user = Auth::guard('web')->user();

        $payment_setting = $this->payment_setting;
        $payable_amount = $orderData['total'];
        $currency_code = Session::get('currency_code');

        // mirror product flow gateways
        $paypal = PaymentGateway::where(['key' => 'paypal_currency_id'])->first();
        $stripe = PaymentGateway::where(['key' => 'stripe_currency_id'])->first();
        $paypalStatus = PaymentGateway::where('key', 'paypal_status')->value('value');
        $razorpay = PaymentGateway::where(['key' => 'razorpay_currency_id'])->first();
        $flutterwave = PaymentGateway::where(['key' => 'flutterwave_currency_id'])->first();
        $paystack = PaymentGateway::where(['key' => 'paystack_currency_id'])->first();
        $mollie = $paystack;
        $instamojo = PaymentGateway::where(['key' => 'instamojo_currency_id'])->first();
        $bank = PaymentGateway::where(['key' => 'bank_status'])->first();

        $razorpay_currency = isset($this->payment_setting->razorpay_currency_id) ? Currency::find($this->payment_setting->razorpay_currency_id) : null;
        $flutterwave_currency = isset($this->payment_setting->flutterwave_currency_id) ? Currency::find($this->payment_setting->flutterwave_currency_id) : null;
        $paystack_currency = isset($this->payment_setting->paystack_currency_id) ? Currency::find($this->payment_setting->paystack_currency_id) : null;


        return view('subscription::frontend.subscription-purchase.payment', compact(
            'breadcrumb',
            'paypalStatus',
            'user',
            'seo_setting',
            'paypal',
            'stripe',
            'razorpay',
            'flutterwave',
            'paystack',
            'mollie',
            'instamojo',
            'bank',
            'payment_setting',
            'razorpay_currency',
            'payable_amount',
            'flutterwave_currency',
            'paystack_currency',
            'cta_content',
            'plan'
        ));
    }
}


