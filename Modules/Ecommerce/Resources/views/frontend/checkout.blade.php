@extends('inner_layout')
@section('title')
    <title>{{ __('Checkout') }}</title>
@endsection

@section('frontend_content')

    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Checkout') }}" />
        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div class="theme-container mx-auto">

                @if (!auth()->guard('web')->user())
                    <div class="text-center mb-8">
                        <p class="text-red-500 text-lg font-semibold">
                            {{ __('You need to login first to proceed with checkout.') }}
                        </p>
                    </div>
                @else
                    <div class="flex flex-col xl:flex-row  gap-9">
                        <!-- Billing Details Form -->
                        <div class="xl:max-w-[812px] w-full">
                            <div class="bg-white rounded-lg border border-grey-300 p-4 sm:p-7 lg:col-span-2 h-fit">
                                <h4 class="text-24 font-semibold mb-2">{{ __('Billing Details') }}</h4>
                                <p class="text-paragraph text-16p mb-6">
                                    {{ __('Enter the address where you want your order delivered') }}
                                </p>
                                <form action="{{ route('checkout.process-to-payment') }}" method="GET">
                                    <div class="grid sm:grid-cols-2 gap-5">
                                        <div class="form-box col-span-full">
                                            <label for="fulName" class="text-base mb-2">{{ __('Full Name') }}</label>
                                            <input type="text" name="name" value="{{ Auth::user()?->name }}" id="fulName"
                                                class="form-input " placeholder="{{ __('Full Name') }}">
                                        </div>
                                        <div class="form-box ">
                                            <label for="phoneNumber" class="text-base mb-2">{{ __('Phone Number') }}</label>
                                            <input type="text" name="phone" value="{{ Auth::user()?->phone }}" id="phoneNumber"
                                                class="form-input" placeholder="{{ __('Phone Number') }}">
                                        </div>
                                        <div class="form-box ">
                                            <label for="emailAddress" class="text-base mb-2">{{ __('Email Address') }}</label>
                                            <input type="text" name="email" value="{{ Auth::user()?->email }}" id="emailAddress"
                                                class="form-input" placeholder="{{ __('Email Address') }}">
                                        </div>
                                        <div class="form-box col-span-full">
                                            <label for="state" class="text-base mb-2">{{ __('Shipping Method') }}</label>
                                            <div class="custom-select relative  form-input !pt-2.5 shipping-method">
                                                <select name="shipping_method_id" id="state" class="hidden" aria-placeholder="">
                                                    <option value="" selected disabled>{{ __('Select One') }}
                                                    </option>
                                                    @foreach ($methods as $method)
                                                        <option value="{{ $method->id }}">{{ $method->name }} -
                                                            {{ currency($method->price) }}
                                                        </option>
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
                        </div>
                        <!-- summary  -->
                        <div class="flex justify-end w-full flex-1">
                            <div class="max-w-[442px] w-full bg-main-black rounded-[10px] overflow-hidden h-fit p-10">
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
                                            <span class="text-16p text-white">{{ Str::limit($cart->product->translate?->name, 35) }}
                                                <b>X</b> {{ $cart->quantity }}</span>
                                            <span
                                                class="text-16p text-white font-medium">{{ currency($cart->product->finalPrice * $cart->quantity) }}</span>
                                        </div>
                                    @endforeach
                                    <div class="flex justify-between items-center mb-5">
                                        <span class="text-16p text-white">{{ __('Sub Total') }}</span>
                                        <span
                                            class="text-16p text-white font-medium sub_total">{{ currency($sub_total) }}</span>
                                        <input type="hidden" name="subtotal" value="{{ $sub_total }}">
                                    </div>
                                    <div class="flex justify-between items-center mb-5">
                                        <span class="text-16p text-white">{{ __('Delivery Fee') }}</span>
                                        <span class="text-16p text-white font-medium shipping_cost">(+){{ currency(0) }}</span>
                                        <input type="hidden" name="shipping_charge" value="">
                                    </div>
                                    <div class="flex justify-between items-center mb-5 pb-5 border-b border-b-buisness-red/20">
                                        <span class="text-16p text-white">{{ __('Coupon') }}</span>
                                        <span class="text-16p text-white font-medium discount">
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
                                                (-){{ currency($discount) }}
                                            @else
                                                (-)
                                                {{ currency(0) }}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center mb-5">
                                        <span class="text-18 font-semibold text-white">{{ __('Total') }}</span>
                                        <span class="text-18 font-semibold text-white total">
                                            {{ currency($sub_total) }}
                                        </span>
                                        <input type="hidden" name="total" value="">
                                    </div>
                                    @if ($carts->isNotEmpty())
                                        <button type="submit" class="w-full">
                                            <div class="home-two-btn-bg py-3 group bg-buisness-red !rounded-none border-buisness-red flex w-full">
                                                <span
                                                    class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-inter relative z-10">
                                                    {{ __('Proceed to Checkout') }}
                                                </span>
                                                <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path class="group-hover:stroke-buisness-red transition-all duration-300"
                                                        d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                @endif
            </div>
        </section>
        <!-- main container  end  -->
    </main>
@endsection
@push('script_section')
    <script>
        let currency_rate = '{{ session()->get('currency_rate', 1) }}';

        $(document).ready(function () {
            // Function to parse currency string to number
            let curencyicon = '{{ session('currency_icon', "$") }}';

            function parseCurrency(currencyStr) {
                return parseFloat(currencyStr.replace(/[^0-9.-]+/g, '')); // Removing non-numeric characters
            }

            // Function to format number into currency format (e.g., $10.00)
            function formatCurrency(amount) {
                return curencyicon + amount.toFixed(2);
            }

            // Function to update prices and hidden form fields
            function updatePrices() {
                // Get the subtotal value
                const subTotal = parseCurrency($('.sub_total').text());
                const discountPrice = parseCurrency($('.discount').text().replace('(-)', '').trim());
                let total = 0;
                // Get the shipping cost from the displayed value
                const shippingCost = parseCurrency($('.shipping_cost').text().replace('(+)', '').trim());


                // Calculate the total price
                if (discountPrice > 0) {
                    total = subTotal - discountPrice + shippingCost;
                } else {
                    total = subTotal + shippingCost;
                }
                // Update the total span with the formatted total price
                $('.total').text(formatCurrency(total));

                // If you are showing this price for Stripe payment, update it
                $('.stripe_price_here').text(formatCurrency(total));
                const baseSubtotal = total / currency_rate;
                const baseShipping = shippingCost / currency_rate;
                const baseTotal = total / currency_rate;

                // Update the hidden form inputs for subtotal, shipping cost, and total
                $('input[name="subtotal"]').val(baseSubtotal);
                $('input[name="shipping_charge"]').val(baseShipping);
                $('input[name="total"]').val(baseTotal);
            }

            // Event listener for when the shipping method is changed
            $('.custom-select .select-items > div').on('click', function () {
                // Get the selected text like: "Inside City - $10.00"
                const selectedText = $(this).text().trim();

                // Extract the price part after the hyphen
                const priceText = selectedText.split('-')[1]?.trim();

                // Parse currency value (removes $ and converts to float)
                const shippingCost = parseFloat(priceText.replace(/[^0-9.]/g, ''));

                // Update shipping cost display
                $('.shipping_cost').text('(+)$' + shippingCost.toFixed(2));

                // Optionally update the <select> value
                $('select[name="shipping_method_id"] option').each(function () {
                    if ($(this).text().trim() === selectedText) {
                        $(this).prop('selected', true);
                    }
                });

                // Recalculate prices
                updatePrices();
            });


            // Optional: If you want to initially set the values correctly when the page loads, you can call updatePrices()
            updatePrices();
        });
    </script>
@endpush