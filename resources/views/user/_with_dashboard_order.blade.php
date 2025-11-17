<div class="p-6 rounded-[10px] bg-white aos-init aos-animate " data-aos="fade-up">
    <div class="flex justify-between sm:items-center gap-30 mb-6">
        <h4 class="text-22 font-semibold">{{ __('Recent Order List') }}</h4>
        <a href="{{ route('user.orders') }}"
            class="btn-tertiary !px-30 group font-semibold !hidden md:!inline-flex">
            <span>{{ __('View All') }}</span>
            <span class="overflow-hidden w-2.5">
                <span
                    class="flex items-center gap-2 -translate-x-3 group-hover:translate-x-0 transition-all duration-200">
                    <span class="">
                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L5 6L1 0.999999" stroke="#101828" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span>
                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L5 6L1 0.999999" stroke="#101828" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </span>
            </span>
        </a>
    </div>
    <div class="order-table border border-[#E0E1E1] rounded-lg overflow-hidden w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-[#E0E1E1]">
            <thead>
                <tr>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start w-[120px]">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Order ID') }}</h6>
                        </div>
                    </th>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap ">{{ __('Amount') }}</h6>
                        </div>
                    </th>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap ">{{ __('Date') }}</h6>
                        </div>
                    </th>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Payment') }}</h6>
                        </div>
                    </th>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Status') }}</h6>
                        </div>
                    </th>
                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                        <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Action') }}</h6>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#E0E1E1]">
                @foreach ($orders as $order)
                    <tr class="bg-white transition-all">
                        <td class="px-30 py-3.5 text-start">
                            <div>
                                <p class="text-16 text-[#4A7DFF] hover:underline">{{ $order->order_id }}</p>
                            </div>
                        </td>
                        <td class="px-30 py-3.5 text-start">
                            <div>
                                <p class="text-16 text-nowrap font-medium">{{ currency($order->total) }}</p>
                            </div>
                        </td>
                        <td class="px-30 py-3.5 text-start">
                            <div>
                                <p class="text-16 text-nowrap text-paragraph">
                                    {{ $order->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </td>
                        <td>
                            @if ($order->payment_status == 1)
                                <span class="text-16 text-nowrap status status-success">
                                    {{ __('Paid') }}
                                </span>
                            @else
                                <span class="text-16 text-nowrap status status-pending">
                                    {{ __('Unpaid') }}
                                </span>
                            @endif
                        </td>

                        <td class="px-30 py-3.5 text-start">

                            @if ($order->order_status == 0)
                                <div>
                                    <p class="text-16 text-nowrap status status-pending">{{ __('Pending') }}</p>
                                </div>
                            @endif
                            @if ($order->order_status == 5)
                                <div>
                                    <p class="text-16 text-nowrap status status-success">{{ __('Completed') }}</p>
                                </div>
                            @endif
                            @if ($order->order_status == 2)
                                <div>
                                    <p class="text-16 text-nowrap status status-pending">{{ __('Rejected') }}</p>
                                </div>
                            @endif
                            @if ($order->order_status == 3)
                                <div>
                                    <p class="text-16 text-nowrap status status-success">{{ __('Processing') }}
                                    </p>
                                </div>
                            @endif
                            @if ($order->order_status == 4)
                                <div>
                                    <p class="text-16 text-nowrap status status-success">{{ __('Shipped') }}</p>
                                </div>
                            @endif
                        </td>

                        <td class="px-30 py-3.5 text-start">
                            <div class="flex items-center gap-3">
                                <a class="" href="{{ route('user.order_show', $order->order_id) }}">
                                    <span
                                        class="size-9 rounded-full bg-[#F6F8FF] text-black hover:bg-black hover:text-white flex items-center justify-center">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M21.1303 9.8531C22.2899 11.0732 22.2899 12.9268 21.1303 14.1469C19.1745 16.2047 15.8155 19 12 19C8.18448 19 4.82549 16.2047 2.86971 14.1469C1.7101 12.9268 1.7101 11.0732 2.86971 9.8531C4.82549 7.79533 8.18448 5 12 5C15.8155 5 19.1745 7.79533 21.1303 9.8531Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>