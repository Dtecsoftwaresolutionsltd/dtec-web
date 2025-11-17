@extends('inner_layout')
@section('title')
    <title>{{ __('Subscription Checkout') }}</title>
@endsection

@section('frontend_content')

    <main>
        <x-breadcrumb name="{{ __('Subscription Checkout') }}" />
        <section class="py-16 md:py-[130px]">
            <div class="theme-container mx-auto">

                @if (!auth()->guard('web')->user())
                    <div class="text-center mb-8">
                        <p class="text-red-500 text-lg font-semibold">
                            {{ __('You need to login first to proceed with checkout.') }}</p>
                    </div>
                @else
                    <div class="gap-12 grid lg:grid-cols-3">
                        <div class="bg-white rounded-lg border border-grey-300 p-4 sm:p-7 lg:col-span-2 h-fit">
                            <h4 class="text-24 font-semibold mb-2">{{ __('Billing Details') }}</h4>
                            <p class="text-paragraph text-16p mb-6">
                                {{ __('Enter the address for your subscription billing') }}
                            </p>
                            <form action="{{ route('subscription.process-to-payment') }}" method="GET">
                                <div class="grid sm:grid-cols-2 gap-5">
                                    <div class="form-box col-span-full">
                                        <label for="fulName" class="text-base mb-2">{{ __('Full Name') }}</label>
                                        <input type="text" name="name" value="{{ Auth::user()?->name }}"
                                            id="fulName" class="form-input" placeholder="{{ __('Full Name') }}">
                                    </div>
                                    <div class="form-box ">
                                        <label for="phoneNumber" class="text-base mb-2">{{ __('Phone Number') }}</label>
                                        <input type="text" name="phone" value="{{ Auth::user()?->phone }}"
                                            id="phoneNumber" class="form-input" placeholder="{{ __('Phone Number') }}">
                                    </div>
                                    <div class="form-box ">
                                        <label for="emailAddress" class="text-base mb-2">{{ __('Email Address') }}</label>
                                        <input type="text" name="email" value="{{ Auth::user()?->email }}"
                                            id="emailAddress" class="form-input" placeholder="{{ __('Email Address') }}">
                                    </div>
                                    <div class="form-box col-span-full">
                                        <label for="plan" class="text-base mb-2">{{ __('Subscription Plan') }}</label>
                                        <div class="custom-select relative  form-input !pt-2.5 shipping-method">
                                            <select name="subscription_plan_id" id="plan" class="hidden">
                                                <option value="" selected disabled>{{ __('Select One') }}</option>
                                                @foreach ($plans as $plan)
                                                    <option value="{{ $plan->id }}" {{ request('plan') == $plan->id ? 'selected' : '' }}>{{ $plan->plan_name }} - {{ currency($plan->plan_price) }}</option>
                                                @endforeach
                                            </select>
                                            <div class="absolute right-5 top-5 pointer-events-none">
                                                <span>
                                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-box col-span-full">
                                        <label for="address " class="text-base mb-2">{{ __('Full Address') }}</label>
                                        <input type="text" name="address" id="address" class="form-input"
                                            placeholder="{{ __('Address') }}">
                                    </div>
                                </div>
                        </div>
                        <div class="border border-grayscale-300 rounded-lg overflow-hidden h-fit p-10">
                            <div class="">
                                <h4 class="text-24 text-black font-semibold">{{ __('Your Subscription') }}</h4>
                            </div>
                            <div class="mt-30">
                                <div class="flex justify-between items-center mb-5">
                                    <span class="text-16p text-black">{{ __('Plan Price') }}</span>
                                    <span class="text-16p text-black font-medium total">{{ currency(0) }}</span>
                                    <input type="hidden" name="total" value="">
                                </div>
                                <button type="submit">
                                    <div class="home-two-btn-bg py-3 group bg-purple border-purple flex w-full">
                                        <span
                                            class="text-base text-white group-hover:text-purple transition-all duration-300 font-inter relative z-10">
                                            {{ __('Proceed to Checkout') }}
                                        </span>
                                        <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:stroke-blue-seo transition-all duration-300"
                                                d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
@push('script_section')
    <script>
        $(document).ready(function() {
            let currency_rate = '{{ session()->get('currency_rate', 1) }}';
            let currency_icon = '{{ session('currency_icon', "$") }}';

            function formatCurrency(amount) {
                return currency_icon + parseFloat(amount).toFixed(2);
            }

            function updateTotal() {
                const selectedText = $('.custom-select .select-selected').text().trim();
                let price = 0;
                if (selectedText.includes('-')) {
                    const priceText = selectedText.split('-')[1]?.trim();
                    price = parseFloat(priceText.replace(/[^0-9.]/g, '')) || 0;
                }
                $('.total').text(formatCurrency(price));
                const baseTotal = price / currency_rate;
                $('input[name="total"]').val(baseTotal);
            }

            $('.custom-select .select-items > div').on('click', function() {
                setTimeout(updateTotal, 50);
            });

            updateTotal();
        });
    </script>
@endpush


