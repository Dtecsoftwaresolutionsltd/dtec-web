@extends('inner_layout')

@section('title')
    <title>{{ __('Order Details') }}</title>
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <section id="h1-breadcrumb">
            <div class="h1-breadcrumb w-full h-fit overflow-hidden relative bg-main-gray pb-16 md:pb-24">
                <div class="absolute left-0 w-full h-full top-0 overflow-hidden z-0 pointer-events-none">
                    <img src="{{ asset(breadcrumb_image()) }}" alt="" class="w-full h-full object-cover" />
                </div>
                <div class="theme-container mx-auto h-fit  relative z-20">
                    <div class="mt-[120px] md:mt-[272px] w-full  relative z-10">

                        <div class="flex gap-3 flex-wrap items-center ">
                            <a href="{{ route('user.dashboard') }}"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Home') }}
                            </a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a href="#"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Order Details') }}
                            </a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a href="#"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Order Id') }}: {{ $order->order_id }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-ends -->

        <!-- dashboard-starts -->
        <section class="dashboard py-20">
            <div class="theme-container mx-auto">
                <div class="flex flex-col xl:flex-row gap-30">
                    <!-- dashboard-sidebar -->
                    @include('user.sidebar')
                    <!-- dashboard-main -->
                    <div class="dashboard-main w-full flex-1">
                        <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

                            <div class="flex flex-wrap gap-30 items-center justify-between mb-14">
                                <!-- Billing-details -->
                                <div>
                                    <h4 class="text-20 font-semibold mb-8">{{ __('Billing Address') }}</h4>
                                    <div class="text-18">
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Name:') }}</span>
                                            <span class="text-paragraph ">{{ __($order->address['name']) }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Phone:') }}</span>
                                            <span class="text-paragraph">{{ __($order->address['phone']) }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Email:') }}</span>
                                            <span class="text-paragraph">{{ __($order->address['email']) }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Address:') }}</span>
                                            <span class="text-paragraph">{{ __($order->address['address']) }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- order-details -->
                                <div>
                                    <h4 class="text-20 font-semibold mb-8 mt-10">{{ __('Order Details') }}</h4>
                                    <div class="text-18">
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Transaction Id:') }}</span>
                                            <span style="font-size: clamp(14px, 2.5vw, 18px)"
                                                class="text-paragraph ">{{ $order->transaction_id }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Order Id:') }}</span>
                                            <span class="text-paragraph">{{ $order->order_id }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Order Date:') }}</span>
                                            <span class="text-paragraph">{{ $order->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="flex gap-2 mb-3">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Payment Status:') }}</span>
                                            <div class="flex  gap-2">
                                                @if ($order->payment_status == 1)
                                                    <span class="status status-success text-base">{{ __('Paid') }}</span>
                                                @else
                                                    <span class="status status-canceled text-base">{{ __('Un Paid') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Payment Method:') }}</span>
                                            <span class="text-paragraph">{{ $order->payment_method }}</span>
                                        </div>
                                        <div class="flex gap-2 mb-3">
                                            <span class="min-w-[100px] text-nowrap">{{ __('Order Status:') }}</span>
                                            @if ($order->order_status == 0)
                                                <span class="status status-pending">{{ __('Pending') }}</span>
                                            @elseif($order->order_status == 5)
                                                <span class="status status-success">{{ __('Completed') }}</span>
                                            @elseif($order->order_status == 2)
                                                <span class="status status-pending">{{ __('Rejected') }}</span>
                                            @elseif($order->order_status == 3)
                                                <span class="status status-success">{{ __('Processing') }}</span>
                                            @elseif($order->order_status == 4)
                                                <span class="status status-success">{{ __('Shipped') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div
                                class="order-table rounded-tr-lg rounded-tl-lg  overflow-hidden w-full overflow-x-auto border-b border-[#E0E1E1]">
                                <table class="min-w-full divide-y-reverse divide-[#E0E1E1] ">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="p-4 px-30 bg-gray-50 text-start w-[450px]">
                                                <div>
                                                    <h6 class="text-18 font-medium text-nowrap"> {{ __('Product Name') }}
                                                    </h6>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                                                <div>
                                                    <h6 class="text-18 font-medium text-nowrap "> {{ __('Price') }}</h6>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                                                <div>
                                                    <h6 class="text-18 font-medium text-nowrap "> {{ __('Quantity') }}</h6>
                                                </div>
                                            </th>
                                            <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                                                <div>
                                                    <h6 class="text-18 font-medium text-nowrap"> {{ __('Amount') }}</h6>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-[#E0E1E1]">
                                        @foreach ($order->order_detail as $detail)
                                            <tr class="bg-white  transition-all">
                                                <td class="px-30 py-3.5 text-start">
                                                    <div>
                                                        <p class="text-16 text-paragraph text-nowrap">
                                                            {{ __($detail->singleProduct->translate->name) }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-30 py-3.5 text-start align-top">
                                                    <div>
                                                        <p class="text-16 text-nowrap  text-paragraph">
                                                            {{ __(currency($detail->singleProduct->finalPrice)) }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-30 py-3.5 text-start align-top">
                                                    <div>
                                                        <p class="text-16 text-nowrap text-paragraph">
                                                            {{ $detail->quantity }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-30 py-3.5 text-start align-top">
                                                    <div>
                                                        <p class="text-16 text-nowrap text-paragraph">
                                                            {{ __(currency($detail->price)) }}
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex justify-end mt-5">
                                <div class="max-w-[430px] w-full">
                                    <div class="flex justify-between mb-5">
                                        <h6 class="text-16 font-medium"> {{ __('Subtotal') }}</h6>
                                        <h6 class="text-16 font-medium">{{ currency($order->subtotal) }}</h6>
                                    </div>
                                    <div class="flex justify-between mb-5">
                                        <h6 class="text-16 text-paragraph"> {{ __('Shipping Cost') }}</h6>
                                        <h6 class="text-16">{{ currency($order->shipping_charge) }}</h6>
                                    </div>
                                    <div class="flex justify-between pt-5 border-t border-t-[#E0E1E1]">
                                        <h5 class="text-20 font-semibold"> {{ __('Total') }}</h5>
                                        <h5 class="text-20 font-semibold">{{ currency($order->total) }}</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboard-end -->
    </main>
@endsection