@extends('inner_layout')

@section('title')
    <title>{{ __('Checkout') }}</title>
@endsection
@php
    function currency_pay($amount, $is_convart = true)
    {
        $currency_icon = session('currency_icon', "$");
        $currency_position = Session::get('currency_position');
        $rate = session('currency_rate', 1);

        if ($is_convart) {
            $amount = $amount * $rate;
        }

        // $amount = $amount * $rate;

        if ($currency_position == 'before_price') {
            $amount = $currency_icon . $amount;
        } elseif ($currency_position == 'before_price_with_space') {
            $amount = $currency_icon . ' ' . $amount;
        } elseif ($currency_position == 'after_price') {
            $amount = $amount . $currency_icon;
        } elseif ($currency_position == 'after_price_with_space') {
            $amount = $amount . ' ' . $currency_icon;
        } else {
            $amount = $currency_icon . $amount;
        }
        return $amount;
    }

@endphp

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Checkout') }}" />
        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div class="theme-container mx-auto">
                <div class="gap-12 grid xl:grid-cols-3">
                    <!-- Billing Details Form -->
                    <div class="xl:col-span-2 h-fit">
                        <!-- payment method  -->
                        <div class="bg-white rounded-lg border border-grey-300 p-4 sm:p-7 ">
                            <h4 class="text-22 font-medium pb-3 border-b border-grey-300">
                                {{ __('Select Payment Method') }}
                                @if(session()->has('messege'))
                                    {{ session('messege') }}
                                @endif
                            </h4>
                            <ul class="flex flex-wrap gap-5 mt-6">
                                @if ($payment_setting->mollie_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] bg-white text-center flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="mollie" id="mollie_payment_btn">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->mollie_image) }}" alt=""
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->paypal_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="paypal" id="paypal_btn">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->paypal_image) }}" alt=""
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->instamojo_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="instamojo" id="instamojoPayment">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->instamojo_image) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->razorpay_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="rajorpay" id="razorpay_btn">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->razorpay_image) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />

                                            <form action="{{ route('ecommerce.pay-razorpay') }}" method="POST"
                                                class="hidden">
                                                @csrf
                                                @php
                                                    $payable_amount =
                                                        $payable_amount * $razorpay_currency->currency_rate;
                                                    $payable_amount = round($payable_amount, 2);
                                                @endphp
                                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $payment_setting->razorpay_key }}"
                                                    data-currency="{{ $razorpay_currency->currency_code }}" data-amount="{{ $payable_amount * 100 }}"
                                                    data-buttontext="{{ __('Pay') }}" data-name="{{ $payment_setting->razorpay_name }}"
                                                    data-description="{{ $payment_setting->razorpay_description }}"
                                                    data-image="{{ asset($payment_setting->razorpay_image) }}" data-prefill.name="" data-prefill.email=""
                                                    data-theme.color="{{ $payment_setting->razorpay_theme_color }}"></script>
                                            </form>


                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->bank_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="banktransfer" id="bankPaymentBtn">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->bank_image) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->paystack_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="paystack" id="paystackPayment">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->paystack_image) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->stripe_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="stripe" id="openStripeModalBtn">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->stripe_image) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->flutterwave_status == 1)
                                    <li>
                                        <button
                                            class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-buisness-red rounded-lg gap-7 payment-check transition-all duration-300"
                                            name="ssl" id="payWithFlutterwave">
                                            <div
                                                class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-buisness-red current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="18" height="18" rx="2" fill="#FF002A" />
                                                    <path
                                                        d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z"
                                                        fill="white" />
                                                </svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->flutterwave_logo) }}" alt="img"
                                                class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- summary  -->
                   <div class="flex justify-end w-full">
                     <div class="max-w-[442px] xl:max-w-full w-full border bg-main-black border-grayscale-300 rounded-lg overflow-hidden h-fit p-10">
                        <!-- Header -->
                        <div class="">
                            <h4 class="text-24 text-white font-semibold">{{ __('Your Order') }}</h4>
                        </div>
                        <!-- Body -->
                        <div class="mt-30">
                            <div class="flex justify-between items-center mb-4 border-b border-b-buisness-red/20 pb-5">
                                <span class="text-18 font-medium text-white">{{ __('Products') }}</span>
                                <span class="text-18 font-medium text-white">{{ __('Subtotal') }}</span>

                            </div>
                            @foreach ($carts as $cart)
                                <div class="flex justify-between items-center mb-5">
                                    <span class="text-16p text-white">{{ $cart->product->name }} X
                                        {{ $cart->quantity }}</span>
                                    <span
                                        class="text-16p text-white font-medium">{{ currency_pay($cart->product->finalPrice * $cart->quantity, true) }}</span>
                                </div>
                            @endforeach
                            <div class="flex justify-between items-center mb-5">
                                <span class="text-16p text-white">{{ __('Sub Total') }}</span>
                                <span class="text-16p text-white font-medium">{{ currency_pay($sub_total, true) }}</span>
                            </div>

                            <div class="flex justify-between items-center mb-5 ">
                                <span class="text-16p text-white">{{ __('Delivery Fee') }}</span>
                                <span
                                    class="text-16p text-white font-medium">(+){{ currency_pay($shipping_charge, true) }}</span>
                            </div>
                            <div class="flex justify-between items-center mb-5 pb-5 border-b border-b-buisness-red/20">
                                <span class="text-16p text-white">{{ __('Coupon') }}</span>
                                <span class="text-16p text-white font-medium">
                                    @if (session('discount_amount'))
                                        @php
                                            $type = session('type');
                                            $discountAmount = session('discount_amount', 0);
                                            $discount = 0;

                                            if ($sub_total) {
                                                if ($type === 'percentage') {
                                                    $discount = ($sub_total * $discountAmount) / 100;
                                                } else {
                                                    $discount = $discountAmount;
                                                }
                                            }
                                            $grandTotal = $sub_total - $discount;
                                        @endphp
                                        (-){{ currency_pay($discount, true) }}
                                    @else
                                        (-)
                                        {{ currency_pay(0, false) }}
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between items-center mb-5">
                                <span class="text-18 font-semibold text-white">{{ __('Total') }}</span>
                                <span class="text-18 font-semibold text-white">{{ currency_pay($total, true) }}</span>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </section>
        <!-- main container  end  -->

    </main>

@endsection
@section('popup_video')
              <!-- Stripe Payment Modal -->
        <div id="stripePaymentModal"
            class="fixed inset-0 z-50 h-screen w-screen top-0 left-0  flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                    id="closeStripeModalBtn">
                    &times;
                </button>
                <h3 class="text-xl font-semibold mb-4">{{ __('Pay with Stripe') }}</h3>
                <form id="payment-form" class="require-validation"
                    data-stripe-publishable-key="{{ $payment_setting?->stripe_key }}" method="POST"
                    action="{{ route('ecommerce.stripe') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">{{ __('Card Number') }}</label>
                        <input type="text" name="card_number"
                            class="form-input card-number required w-full border rounded px-3 py-2" autocomplete="off"
                            placeholder="•••• •••• •••• ••••" />
                    </div>
                    <div class="mb-3 flex gap-2">
                        <div class="w-1/2">
                            <label class="block text-sm font-medium mb-1">{{ __('Expiry Month') }}</label>
                            <input type="text"
                                class="form-input card-expiry-month required w-full border rounded px-3 py-2"
                                autocomplete="off" placeholder="MM" name="month" />
                        </div>
                        <div class="w-1/2">
                            <label class="block text-sm font-medium mb-1">{{ __('Expiry Year') }}</label>
                            <input type="text"
                                class="form-input card-expiry-year required w-full border rounded px-3 py-2"
                                autocomplete="off" placeholder="YY" name="year" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">{{ __('CVC') }}</label>
                        <input type="text" class="form-input card-cvc required w-full border rounded px-3 py-2"
                            autocomplete="off" placeholder="CVC" name="cvc" />
                    </div>
                    <div class="stripe_error d-none mb-3">
                        <div class="alert text-red-600 text-sm"></div>
                    </div>
                    <div class="proposal-input-container stripe_error hidden">
                        <div class="p-4 bg-white rounded-md shadow-md">
                            <div class="bg-red-100 text-red-800 text-sm p-3 rounded border border-red-300">
                                {{ __('Please provide your valid card information') }}
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="stripe_form_btn"
                        class="w-full bg-buisness-red text-white py-2 rounded font-semibold">
                        {{ __('Pay Now') }}
                    </button>
                </form>
            </div>
        </div>
        <!-- End Stripe Payment Modal -->
        <!-- Bank Payment Modal (Tailwind CSS) -->
        <div id="bankPaymentModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700"
                    id="closeBankModalBtn">
                    &times;
                </button>
                <h3 class="text-xl font-semibold mb-4">{{ __('Bank Payment') }}</h3>
                <div class="mb-4">
                    <h4 class="text-lg font-medium flex justify-between items-center">
                        {{ __('Amount') }}
                        <span class="font-bold">{{ $total }}</span>
                    </h4>
                </div>
                <div class="mb-4 text-sm text-gray-700 border rounded p-3 bg-gray-50">
                    {!! clean(nl2br($bank?->value)) !!}
                </div>
                <form action="{{ route('ecommerce.bank') }}" method="POST" id="bank_payment_form">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1"
                            for="bankTnxInfo">{{ __('Transaction information') }}</label>
                        <textarea class="form-input required w-full border rounded px-3 py-2" id="bankTnxInfo" required rows="3"
                            placeholder="{{ __('Transaction information') }}" name="tnx_info"></textarea>
                    </div>
                    <button type="submit" id="bank_payment_btn"
                        class="w-full bg-purple text-white py-2 rounded font-semibold">
                        {{ __('Payment Now') }}
                    </button>
                </form>
            </div>
        </div>
@endsection

@push('script_section')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {
            $("#bankPaymentBtn").on("click", function() {
                $("#bankPaymentModal").removeClass("hidden");
            });
            $("#closeBankModalBtn").on("click", function() {
                $("#bankPaymentModal").addClass("hidden");
            });
            $("#bankPaymentModal").on("click", function(e) {
                if (e.target === this) {
                    $(this).addClass("hidden");
                }
            });
        });
    </script>
    <script>
        $(function() {
            $("#openStripeModalBtn").on("click", function() {
                $("#stripePaymentModal").removeClass("hidden");
            });
            $("#closeStripeModalBtn").on("click", function() {
                $("#stripePaymentModal").addClass("hidden");
            });
            // Optional: close modal on outside click
            $("#stripePaymentModal").on("click", function(e) {
                if (e.target === this) {
                    $(this).addClass("hidden");
                }
            });
        });
    </script>
    <script>
        "use strict";
        $(function() {

            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.stripe_error'),
                    valid = true;
                $errorMessage.addClass('hidden');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hidden');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.stripe_error')
                        .removeClass('d-none')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $("#razorpay_btn").on("click", function() {
                $(".razorpay-payment-button").get(0).click();
            })

            $("#paypal_btn").on("click", function() {
                window.location.href = "{{ route('user.pay-via-paypal') }}";
            })

            $("#mollie_payment_btn").on("click", function() {
                window.location.href = "{{ route('ecommerce.pay-via-mollie') }}";
            })

            $("#instamojoPayment").on("click", function() {
                window.location.href = "{{ route('ecommerce.pay-via-instamojo') }}";
            })

            $("#bank_payment_btn").on("click", function() {
                $("#bank_payment_form").submit();
            })


        });
    </script>

    {{-- start paystack payment --}}

    @if ($payment_setting->paystack_status == 1)
        <script src="https://js.paystack.co/v1/inline.js"></script>

        @php
            $public_key = $payment_setting->paystack_public_key;
            $currency = $paystack_currency->currency_code;
            $currency = strtoupper($currency);

            $ngn_amount = $payable_amount * $paystack_currency->currency_rate;
            $ngn_amount = $ngn_amount * 100;
            $ngn_amount = round($ngn_amount);

        @endphp

        <script>
            "use strict";
            $(function() {
                $("#paystackPayment").on("click", function() {

                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    var handler = PaystackPop.setup({
                        key: '{{ $public_key }}',
                        email: '{{ $user->email }}',
                        amount: '{{ $ngn_amount }}',
                        currency: "{{ $currency }}",
                        callback: function(response) {
                            let reference = response.reference;
                            let tnx_id = response.transaction;
                            let _token = "{{ csrf_token() }}";
                            $.ajax({
                                type: "get",
                                data: {
                                    reference,
                                    tnx_id,
                                    _token
                                },
                                url: "{{ route('ecommerce.pay-via-paystack') }}",
                                success: function(response) {
                                    if (response.status == 'success') {
                                        toastr.success(response.message);
                                        window.location.href =
                                            "{{ route('user.orders') }}";
                                    } else {
                                        toastr.error(response.message);
                                        window.location.reload();
                                    }
                                },
                                error: function(response) {
                                    toastr.error('Server Error');
                                    window.location.reload();
                                }
                            });
                        },
                        onClose: function() {
                            alert('window closed');
                        }
                    });
                    handler.openIframe();

                })
            });
        </script>
    @endif

    {{-- end paystack payment --}}

    {{-- start flutterwave payment --}}
    @if ($payment_setting->flutterwave_status == 1)
        <script src="https://checkout.flutterwave.com/v3.js"></script>

        @php

            $payable_amount = $payable_amount * $flutterwave_currency->currency_rate;
            $payable_amount = round($payable_amount, 2);
        @endphp

        <script>
            "use strict";
            $(function() {
                $("#payWithFlutterwave").on("click", function() {

                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') {
                        toastr.error('This Is Demo Version. You Can Not Change Anything');
                        return;
                    }

                    FlutterwaveCheckout({
                        public_key: "{{ $payment_setting->flutterwave_public_key }}",
                        tx_ref: "{{ substr(rand(0, time()), 0, 10) }}",
                        amount: {
                            {
                                $payable_amount
                            }
                        },
                        currency: "{{ $flutterwave_currency->currency_code }}",
                        country: "{{ $flutterwave_currency->country_code }}",
                        payment_options: " ",
                        customer: {
                            email: "{{ $user->email }}",
                            phone_number: "{{ $user->phone }}",
                            name: "{{ $user->name }}",
                        },
                        callback: function(data) {

                            var tnx_id = data.transaction_id;
                            var _token = "{{ csrf_token() }}";
                            $.ajax({
                                type: 'post',
                                data: {
                                    tnx_id,
                                    _token
                                },
                                url: "{{ route('ecommerce.pay-via-flutterwave') }}",
                                success: function(response) {

                                    if (response.status == 'success') {
                                        toastr.success(response.message);
                                        window.location.href =
                                            "{{ route('user.orders') }}";
                                    } else {
                                        toastr.error(response.message);
                                        window.location.reload();
                                    }
                                },
                                error: function(err) {
                                    toastr.error(
                                        "{{ __('Something went wrong, please try again') }}"
                                    );
                                    window.location.reload();
                                }
                            });
                        },
                        customizations: {
                            title: "{{ $payment_setting->flutterwave_title }}",
                            logo: "{{ asset($payment_setting->flutterwave_logo) }}",
                        },
                    });
                })
            });
        </script>
    @endif

    {{-- end flutterwave payment --}}



@endpush
