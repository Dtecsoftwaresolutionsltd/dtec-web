@extends('inner_layout')

@section('title')
    <title>{{ __('Checkout') }}</title>
@endsection
@php
    function subscription_currency_pay($amount, $is_convart = true)
    {
        $currency_icon = session('currency_icon', "$");
        $currency_position = Session::get('currency_position');
        $rate = session('currency_rate', 1);

        if ($is_convart) {
            $amount = $amount * $rate;
        }

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
        <x-breadcrumb name="{{ __('Checkout') }}" />
        <section class="py-16 md:py-[130px]">
            <div class="theme-container mx-auto">
                <div class="gap-12 grid lg:grid-cols-3">
                    <div class="lg:col-span-2 h-fit">
                        <div class="bg-grayscale-100 rounded-lg border border-grey-300 p-4 sm:p-7 ">
                            <h4 class="text-22 font-medium pb-3 border-b border-grey-300">
                                {{ __('Select Payment Method') }}
                            </h4>
                            <ul class="flex flex-wrap gap-5 mt-6">
                                @if ($payment_setting->mollie_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] text-center flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="mollie_payment_btn">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->mollie_image) }}" alt="" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if (($payment_setting->paypal_status ?? 0) == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="paypal_btn">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->paypal_image) }}" alt="" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->razorpay_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="razorpay_btn">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->razorpay_image) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                            @if($razorpay_currency)
                                            <form action="{{ route('subscription.pay-razorpay') }}" method="POST" class="hidden">
                                                @csrf
                                                @php
                                                    $payable_amount_for_razorpay = $payable_amount * $razorpay_currency->currency_rate;
                                                    $payable_amount_for_razorpay = round($payable_amount_for_razorpay, 2);
                                                @endphp
                                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $payment_setting->razorpay_key }}" data-currency="{{ $razorpay_currency->currency_code }}" data-amount="{{ $payable_amount_for_razorpay * 100 }}" data-buttontext="{{ __('Pay') }}" data-name="{{ $payment_setting->razorpay_name }}" data-description="{{ $payment_setting->razorpay_description }}" data-image="{{ asset($payment_setting->razorpay_image) }}" data-prefill.name="" data-prefill.email="" data-theme.color="{{ $payment_setting->razorpay_theme_color }}"></script>
                                            </form>
                                            @endif
                                        </button>
                                    </li>
                                @endif
                                @if (($payment_setting->bank_status ?? 0) == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="bankPaymentBtn">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->bank_image) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->paystack_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="paystackPayment">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->paystack_image) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->stripe_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="openStripeModalBtn">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->stripe_image) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->instamojo_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="instamojoPayment">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->instamojo_image) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                                @if ($payment_setting->flutterwave_status == 1)
                                    <li>
                                        <button class="w-[244px] h-[58px] flex justify-center items-center border border-grayscale-300 current:border current:border-purple rounded-lg gap-7 payment-check transition-all duration-300" id="payWithFlutterwave">
                                            <div class="w-0 h-0 overflow-hidden current:w-6 current:h-6 flex justify-center items-center current:bg-purple current:text-white transition-all duration-300">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="18" height="18" rx="2" fill="#794AFF" /><path d="M7.82919 12.8459C7.73373 12.9448 7.6035 13 7.46821 13C7.33293 13 7.20269 12.9448 7.10724 12.8459L4.22438 9.87525C3.92521 9.56701 3.92521 9.06719 4.22438 8.75953L4.58536 8.38752C4.88463 8.07929 5.3692 8.07929 5.66838 8.38752L7.46821 10.242L12.3316 5.23118C12.6309 4.92294 13.1159 4.92294 13.4146 5.23118L13.7756 5.60318C14.0748 5.91142 14.0748 6.41115 13.7756 6.7189L7.82919 12.8459Z" fill="white" /></svg>
                                            </div>
                                            <img src="{{ asset($payment_setting->flutterwave_logo) }}" alt="img" class="max-w-[174px] max-h-7 object-contain" />
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="border border-grayscale-300 rounded-lg overflow-hidden h-fit p-30">
                        <div class="">
                            <h4 class="text-24 text-black font-semibold">{{ __('Your Subscription') }}</h4>
                        </div>

                        <div class="mt-30">
                            <div {{ $plan?->plan_name == 'Standard Plan' ? 'data-aos=zoom-out data-aos-delay=150 data-aos-offset=200' : '' }}
                                class="col-span-4  border border-buisness-red/10 bg-buisness-gray rounded-xl p-5 md:p-[50px] hover:bg-main-black bg-main-black transition-all duration-300 relative group">
                                @if ($plan?->plan_name == 'Standard Plan')
                                    <div
                                        class="flex gap-2 py-2 px-4 bg-buisness-red rounded-3xl w-fit absolute top-2.5 right-2.5">
                                        @for ($i = 0; $i < 3; $i++)
                                            {{ get_svg('innerpage.star-icon') }}
                                        @endfor
                                    </div>
                                @endif
                                <h1
                                    class="text-18 font-semibold  pb-4 text-white transition-all duration-300">
                                    {{ $plan?->plan_name }} </h1>
                                <span
                                    class="text-48  font-semibold font-inter text-white transition-all duration-300">{{ __('$') }}
                                    {{ $plan?->plan_price }}</span>
                                <span
                                    class="text-base leading-[30px]  font-normal text-white transition-all duration-300">/
                                    {{ $plan?->expiration_date }}</span>
                                <p class=" pb-2 pt-4 text-white transition-all duration-300">
                                    {{ $plan?->short_description }}</p>
                                <ul class="flex flex-col gap-4 mt-2">
                                    @foreach (explode("\n", $plan?->features) as $feature)
                                        @if (!empty(trim($feature)))
                                            <li
                                                class="flex gap-3 items-center text-white  transition-all duration-300">
                                                {{ get_svg('innerpage.price_list') }}
                                                <span
                                                    class="sm:text-18 font-medium text-white transition-all duration-300">{{ $feature }}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="flex justify-between items-center mb-5 hidden">
                                <span class="text-16p text-black">{{ $plan->plan_name }}</span>
                                <span class="text-16p text-black font-medium">{{ subscription_currency_pay($payable_amount, true) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main>
@endsection
@section('popup_video')

        <div id="stripePaymentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" id="closeStripeModalBtn">&times;</button>
                <h3 class="text-xl font-semibold mb-4">{{ __('Pay with Stripe') }}</h3>
                <form id="payment-form" class="require-validation" data-stripe-publishable-key="{{ $payment_setting?->stripe_key }}" method="POST" action="{{ route('subscription.stripe') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">{{ __('Card Number') }}</label>
                        <input type="text" name="card_number" class="form-input card-number required w-full border rounded px-3 py-2" autocomplete="off" placeholder="•••• •••• •••• ••••" />
                    </div>
                    <div class="mb-3 flex gap-2">
                        <div class="w-1/2">
                            <label class="block text-sm font-medium mb-1">{{ __('Expiry Month') }}</label>
                            <input type="text" class="form-input card-expiry-month required w-full border rounded px-3 py-2" autocomplete="off" placeholder="MM" name="month" />
                        </div>
                        <div class="w-1/2">
                            <label class="block text-sm font-medium mb-1">{{ __('Expiry Year') }}</label>
                            <input type="text" class="form-input card-expiry-year required w-full border rounded px-3 py-2" autocomplete="off" placeholder="YY" name="year" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="block text-sm font-medium mb-1">{{ __('CVC') }}</label>
                        <input type="text" class="form-input card-cvc required w-full border rounded px-3 py-2" autocomplete="off" placeholder="CVC" name="cvc" />
                    </div>
                    <div class="stripe_error d-none mb-3">
                        <div class="alert text-red-600 text-sm"></div>
                    </div>
                    <button type="submit" id="stripe_form_btn" class="w-full bg-purple text-white py-2 rounded font-semibold">{{ __('Pay Now') }}</button>
                </form>
            </div>
        </div>

        <div id="bankPaymentModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button type="button" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700" id="closeBankModalBtn">&times;</button>
                <h3 class="text-xl font-semibold mb-4">{{ __('Bank Payment') }}</h3>
                <div class="mb-4">
                    <h4 class="text-lg font-medium flex justify-between items-center">
                        {{ __('Amount') }}
                        <span class="font-bold">{{ $payable_amount }}</span>
                    </h4>
                </div>
                <div class="mb-4 text-sm text-gray-700 border rounded p-3 bg-gray-50">
                    {!! clean(nl2br($bank?->account_info ?? ($payment_setting?->bank_account_info ?? ''))) !!}
                </div>
                <form action="{{ route('subscription.bank') }}" method="POST" id="bank_payment_form">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1" for="bankTnxInfo">{{ __('Transaction information') }}</label>
                        <textarea class="form-input required w-full border rounded px-3 py-2" id="bankTnxInfo" required rows="3" placeholder="{{ __('Transaction information') }}" name="tnx_info"></textarea>
                    </div>
                    <button type="submit" id="bank_payment_btn" class="w-full bg-purple text-white py-2 rounded font-semibold">{{ __('Payment Now') }}</button>
                </form>
            </div>
        </div>
@endsection
@push('script_section')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $(function() {
            $("#bankPaymentBtn").on("click", function() { $("#bankPaymentModal").removeClass("hidden"); });
            $("#closeBankModalBtn").on("click", function() { $("#bankPaymentModal").addClass("hidden"); });
            $("#bankPaymentModal").on("click", function(e) { if (e.target === this) { $(this).addClass("hidden"); } });
        });
    </script>
    <script>
        $(function() {
            // Toggle selected state so only one gateway appears selected
            $(document).on('click', '.payment-check', function() {
                $('.payment-check').removeClass('current');
                $(this).addClass('current');
            });

            $("#openStripeModalBtn").on("click", function() { $("#stripePaymentModal").removeClass("hidden"); });
            $("#closeStripeModalBtn").on("click", function() { $("#stripePaymentModal").addClass("hidden"); });
            $("#stripePaymentModal").on("click", function(e) { if (e.target === this) { $(this).addClass("hidden"); } });
        });
    </script>
    <script>
        "use strict";
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').on('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.stripe_error');
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
                    $('.stripe_error').removeClass('d-none').find('.alert').text(response.error.message);
                } else {
                    var token = response['id'];
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

            $("#razorpay_btn").on("click", function() { $(".razorpay-payment-button").get(0).click(); })
            $("#paypal_btn").on("click", function() { window.location.href = "{{ route('subscription.paypal') }}"; })
            $("#mollie_payment_btn").on("click", function() { window.location.href = "{{ route('subscription.pay-via-mollie') }}"; })
            $("#instamojoPayment").on("click", function() { window.location.href = "{{ route('subscription.pay-via-instamojo') }}"; })
            $("#bank_payment_btn").on("click", function() { $("#bank_payment_form").submit(); })
        });
    </script>
    @if ($payment_setting->paystack_status == 1)
        <script src="https://js.paystack.co/v1/inline.js"></script>
        @php
            $public_key = $payment_setting->paystack_public_key;
            $currency = optional($paystack_currency)->currency_code;
            $currency = strtoupper($currency);
            $ngn_amount = $payable_amount * (optional($paystack_currency)->currency_rate ?? 1);
            $ngn_amount = round($ngn_amount * 100);
        @endphp
        <script>
            "use strict";
            $(function() {
                $("#paystackPayment").on("click", function() {
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') { toastr.error('This Is Demo Version. You Can Not Change Anything'); return; }
                    var handler = PaystackPop.setup({
                        key: '{{ $public_key }}',
                        email: '{{ $user->email ?? '' }}',
                        amount: '{{ $ngn_amount }}',
                        currency: "{{ $currency }}",
                        callback: function(response) {
                            let reference = response.reference;
                            let _token = "{{ csrf_token() }}";
                            $.ajax({ type: "get", data: { reference, _token }, url: "{{ route('subscription.pay-via-paystack') }}",
                                success: function(response) {
                                    if (response.status == 'success') { toastr.success(response.message); window.location.href = "{{ route('user.subscriptions.history') }}"; }
                                    else { toastr.error(response.message); window.location.reload(); }
                                },
                                error: function() { toastr.error('Server Error'); window.location.reload(); }
                            });
                        },
                        onClose: function() { alert('window closed'); }
                    });
                    handler.openIframe();
                })
            });
        </script>
    @endif
    @if ($payment_setting->flutterwave_status == 1)
        <script src="https://checkout.flutterwave.com/v3.js"></script>
        @php
            $flutter_amount = round($payable_amount * (optional($flutterwave_currency)->currency_rate ?? 1), 2);
        @endphp
        <script>
            "use strict";
            $(function() {
                $("#payWithFlutterwave").on("click", function() {
                    var isDemo = "{{ env('APP_MODE') }}"
                    if (isDemo == 'DEMO') { toastr.error('This Is Demo Version. You Can Not Change Anything'); return; }

                    FlutterwaveCheckout({
                        public_key: "{{ $payment_setting->flutterwave_public_key }}",
                        tx_ref: "{{ substr(rand(0, time()), 0, 10) }}",
                        amount: {{ $flutter_amount }},
                        currency: "{{ optional($flutterwave_currency)->currency_code }}",
                        country: "{{ optional($flutterwave_currency)->country_code }}",
                        payment_options: " ",
                        customer: { email: "{{ $user->email ?? '' }}", phone_number: "{{ $user->phone ?? '' }}", name: "{{ $user->name ?? '' }}" },
                        callback: function(data) {
                            var tnx_id = data.transaction_id;
                            var _token = "{{ csrf_token() }}";
                            $.ajax({ type: 'post', data: { tnx_id, _token }, url: "{{ route('subscription.pay-via-flutterwave') }}",
                                success: function(response) {
                                    if (response.status == 'success') { toastr.success(response.message); window.location.href = "{{ route('user.subscriptions.history') }}"; }
                                    else { toastr.error(response.message); window.location.reload(); }
                                },
                                error: function() { toastr.error("{{ __('Something went wrong, please try again') }}"); window.location.reload(); }
                            });
                        },
                        customizations: { title: "{{ $payment_setting->flutterwave_title }}", logo: "{{ asset($payment_setting->flutterwave_logo) }}" },
                    });
                })
            });
        </script>
    @endif
@endpush


