@extends('inner_layout')
@section('title')
    <title>{{ __('Cart') }}</title>
    <meta name="title" content="{{ __('Cart') }}">
    <meta name="description" content="{{ __('Cart Page') }}">
@endsection

@section('frontend_content')

    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Cart') }}" />
        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div class="theme-container w-full mx-auto">
                @if ($carts && $carts->isNotEmpty())
                    <div class="flex flex-col xl:flex-row  gap-9">
                        <!-- Course  -->
                        <div class="xl:max-w-[812px] w-full">

                            <h1 class="text-24 sm:text-[36px] mb-4">Cart</h1>
                            <!-- cart  -->
                            <div class="overflow-x-auto bg-white lg:col-span-2 h-fit">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-grey-100">
                                        <tr class="border-b border-b-grayscale-300" scope="col">
                                            <th scope="col" class="pr-7 py-5 text-left text-paragraph text-18 font-normal">
                                                {{ __('Product') }}
                                            </th>
                                            <th scope="col" class="px-3 py-5 text-left text-paragraph text-18 font-normal">
                                                {{ __('Price') }}
                                            </th>
                                            <th scope="col" class="px-3 py-5 text-left text-paragraph text-18 font-normal">
                                                {{ __('Quantity') }}
                                            </th>
                                            <th scope="col" class="px-3 py-5 text-left text-paragraph text-18 font-normal">
                                                {{ __('Subtotal') }}
                                            </th>
                                            <th scope="col" class="px-3 py-5 text-left text-paragraph text-18 font-normal">
                                                {{ __('Action') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-grey-300 border-b border-b-grayscale-300"
                                        id="cart-table-body">
                                        <!-- Row 1 -->
                                        @php
                                            $subtotal = 0;
                                        @endphp
                                        @foreach ($carts as $cart)
                                            @php
                                                $itemTotal = $cart->product
                                                    ? $cart->product->finalPrice * $cart->quantity
                                                    : 0;
                                                $subtotal += $itemTotal;
                                            @endphp
                                            <tr class="">
                                                <td class="pr-5 py-3 min-w-[293px]">
                                                    <div class="flex items-center gap-4">
                                                        <div class="w-[124px] h-[134px] ">
                                                            <img src="{{ asset($cart?->product?->thumbnail_image) }}"
                                                                alt="Iphone 16 Pro Max" class="object-cover w-full h-full" />
                                                        </div>
                                                        <div class="flex-1">
                                                            <a href="{{ route('product.view', $cart?->product?->slug) }}"
                                                                class="text-headline text-16 mb-2">
                                                                {{ $cart?->product?->name }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-main-black text-18 font-medium min-w-[120px]">
                                                    <span class="unit-price" id="data-price-{{ $cart->id }}"
                                                        data-price="{{ $cart->product ? $cart->product->finalPrice : 0 }}">{{ currency($cart->product ? $cart->product->finalPrice : 0) }}</span>
                                                </td>
                                                <td class="px-3 py-3">
                                                    <div
                                                        class="inline-flex items-center justify-between bg-white border border-main-black min-w-[109px] px-3">
                                                        <button
                                                            class="px-2 h-11 text-2xl text-grey-400 hover:text-green qty-minus quland-product-minus"
                                                            data-id="{{ $cart->id }}">
                                                            −
                                                        </button>
                                                        <input type="text" readonly
                                                            class="px-4 text-headline text-18 qty-value cart-qty-box"
                                                            id="quantity-{{ $cart->id }}" value="{{ $cart->quantity }}">
                                                        <button
                                                            class="px-2 h-11 text-2xl text-grey-400 hover:text-green qty-plus quland-product-plus"
                                                            data-id="{{ $cart->id }}">
                                                            +
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3 text-main-black text-18 font-medium total-price min-w-[120px]"
                                                    id="price-{{ $cart->id }}"
                                                    data-unit-price="{{ $cart->product ? $cart->product->finalPrice : 0 }}">
                                                    <span class="subtotal">{{ currency($itemTotal) }}</span>
                                                </td>
                                                <td class="p-3">
                                                    <button data-id="{{ $cart->id }}"
                                                        data-url="{{ route('cart.delete', $cart->id) }}"
                                                        class="text-paragraph hover:text-error-base transition delete-cart-item">
                                                        {{ get_svg('innerpage.remove') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- blogs end  -->
                        <!-- side bar start -->
                        <div class="flex justify-end w-full flex-1">
                            <div class=" max-w-[442px] w-full">

                                <div class="bg-main-black p-30 rounded-[10px]  w-full">
                                    <h1 class="text-24 text-white mb-4">
                                        {{ __('Cart Totals') }}
                                    </h1>
                                    <form action="{{ route('user.apply-coupon') }}" method="POST">
                                        @csrf
                                        <input type="hidden" class="inputTotal" name="subtotal" value="{{ $subtotal }}">
                                        <div
                                            class="flex items-center gap-2 bg-transparent border border-grayscale-300 rounded-md w-full px-4 py-3">
                                            <input placeholder="Coupon Code" name="coupon" id="cpupon" type="text"
                                                class="text-white placeholder:text-paragraph w-full bg-transparent  focus:border-purple focus:outline-none " />
                                            <button type="submit" class="flex-1 text-nowrap text-white text-16">
                                                <span class="">
                                                    {{ __('Apply Now') }}
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                    <div class="flex justify-between py-5 border-b border-buisness-red/20 sub_total">
                                        <p class="text-16p text-white">{{ __('Subtotals') }}</p>
                                        <p class="font-medium text-white text-18">{{ currency($subtotal) }}</p>
                                    </div>

                                    <div class="flex justify-between py-5 border-b border-b-buisness-red/20">
                                        <p class="text-16p text-buisness-red">{{ __('Coupon offer') }} </p>
                                        <p class="font-medium text-white text-18">
                                            @php
                                                $type = session('type');
                                                $discountAmount = session('discount_amount', 0);
                                                $discount = 0;

                                                if ($subtotal) {
                                                    if ($type === 'percentage') {
                                                        $discount = ($subtotal * $discountAmount) / 100;
                                                    } else {
                                                        $discount = $discountAmount;
                                                    }
                                                }
                                                $grandTotal = $subtotal - $discount;
                                            @endphp
                                            (-){{ currency($discount) }}
                                        </p>
                                    </div>
                                    <div class="flex justify-between py-5 total_sale">
                                        <p class="text-16p text-white">{{ __('Total') }}</p>
                                        <p class="font-medium text-white text-18">{{ currency($grandTotal) }}</p>
                                    </div>
                                    @if ($carts->isNotEmpty())
                                        <a href="{{ route('checkout.index') }}">
                                            <div
                                                class="home-two-btn-bg py-3 group bg-buisness-red !rounded-none border-buisness-red flex w-full">
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
                                        </a>
                                    @endif
                                    <p class="text-16 text-white text-center"><a href="{{ route('product.shop') }}">{{ __('Or continue shopping') }}</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- side bar end  -->
                    </div>
                @else
                    @include('ecommerce::frontend.not_found')
                @endif
            </div>
        </section>
        <!-- main container  end  -->
    </main>

@endsection

@push('script_section')
    <script src="{{ asset('global/sweetalert/sweetalert2@11.js') }}"></script>

    <script>
        "use strict";
        let currencyrate = parseFloat('{{ session('currency_rate') }}', 1);

        // curency format
        function currencyFormat(amount, is_convert = true) {
            let currencyIcon = '{{ session('currency_icon', "$") }}';
            let currencyCode = '{{ session('currency_code', 'USD') }}';
            let currencyRate = parseFloat('{{ session('currency_rate', 1) }}');
            let currencyPosition = '{{ session('currency_position', 'before_price') }}';

            // Apply rate
            if (!is_convert) {
                currencyRate = 1;
            }
            amount = amount * currencyRate;

            // Format number (without symbol)
            let formatted = new Intl.NumberFormat('{{ app()->getLocale() }}', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(amount);

            // Place currency
            switch (currencyPosition) {
                case 'before_price':
                    return currencyIcon + formatted;
                case 'before_price_with_space':
                    return currencyIcon + ' ' + formatted;
                case 'after_price':
                    return formatted + currencyIcon;
                case 'after_price_with_space':
                    return formatted + ' ' + currencyIcon;
                default:
                    return currencyIcon + formatted;
            }
        }


        function updateSubtotal() {
            let subtotal = 0;
            document.querySelectorAll('.total-price').forEach(priceElement => {
                const price = parseFloat(priceElement.innerText.replace(/[^0-9.-]+/g, ''));
                if (!isNaN(price)) {
                    subtotal += price;
                }
            });
            document.querySelector('.sub_total p:last-child').innerHTML = currencyFormat(subtotal, false);
            document.querySelector('.total_sale p:last-child').innerHTML = currencyFormat(subtotal, false);
            document.querySelector('.inputTotal').value = String(subtotal)
        }

        // Cart Item Button
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".quland-product-minus, .quland-product-plus").forEach(span => {
                span.addEventListener("click", function () {
                    const itemId = this.getAttribute("data-id");
                    const quantityElement = document.getElementById(`quantity-${itemId}`);
                    const priceElement = document.getElementById(`price-${itemId}`);
                    const unitPrice = parseFloat(priceElement.getAttribute('data-unit-price'));
                    const unitTotal = unitPrice * currencyrate;
                    let currentQuantity = parseInt(quantityElement.value);

                    if (this.classList.contains("quland-product-minus")) {
                        if (currentQuantity > 1) {
                            currentQuantity--;
                        } else {
                            toastr.error('Quantity must be at least 1');
                            return;
                        }
                    } else if (this.classList.contains("quland-product-plus")) {
                        currentQuantity++;
                    }

                    quantityElement.value = currentQuantity;

                    fetch(@json(route('cart.update')), {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            id: itemId,
                            quantity: currentQuantity
                        })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const newTotal = (unitPrice * currentQuantity).toFixed(2);
                                priceElement.innerHTML = currencyFormat(newTotal);
                                updateSubtotal();
                                toastr.success(data.notification.message);
                            } else {
                                if (data.notification) {
                                    toastr.error(data.notification.message);
                                }
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                });
            });
        });

        function currency(amount) {
            return new Intl.NumberFormat('{{ app()->getLocale() }}', {
                style: 'currency',
                currency: '{{ config('settings.currency_code', 'USD') }}'
            }).format(amount);
        }

        // Add click event listener to delete buttons
        document.querySelectorAll('.delete-cart-item').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const cartId = this.dataset.id;
                deleteCartItem(cartId);
            });
        });

        function deleteCartItem(id) {
            fetch(`{{ url('cart/cart') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(json => Promise.reject(json));
                    }
                    return response.json();
                })
                .then(data => {
                    // Show the notification
                    Swal.close();

                    // Show success notification using toastr
                    if (data.success) {
                        toastr.success(data.notification.messege);
                        // Reload the page after successful deletion
                        setTimeout(() => {
                            window.location.reload();
                        }, 1000);
                    } else {
                        toastr.error(data.notification.messege);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Close loading dialog
                    Swal.close();

                    // Show error notification using toastr
                    toastr.error(error.notification ? error.notification.messege :
                        "{{ __('An error occurred while removing the item') }}");
                });
        }
    </script>
@endpush
