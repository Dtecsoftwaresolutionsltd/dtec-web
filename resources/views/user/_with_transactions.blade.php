<div class="flex flex-wrap justify-between sm:items-center gap-30 mb-5">
    <div class="flex items-center gap-2.5">
        <p class="text-paragraph">{{ __('Show') }}</p>
        <div class="custom-select min-w-[90px] w-full relative h-12 border border-[#E6E0FF] p-6 rounded-[100px]">
            <form method="GET" action="{{ route('user.transactions') }}">
                <select name="per_page" class="w-full h-full absolute inset-0 opacity-0 cursor-pointer"
                    onchange="this.form.submit()">
                    @foreach ([10, 20, 50, 100] as $value)
                        <option value="{{ $value }}" {{ request('per_page') == $value ? 'selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>
                <div class="absolute right-5 top-5 pointer-events-none">
                    <span>
                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            </form>
        </div>
        <p class="text-paragraph">{{ __('entries') }}</p>
    </div>
    <form class="dashbord_table_top_right" method="GET" action="{{ route('user.transactions') }}">
        <div class="flex items-center gap-1 h-12 border border-[#E6E0FF] px-5 rounded-[100px] max-w-[294px] w-full">
            <input type="text" placeholder="{{ __('Search') }}" name="search"
                class="h-full flex-1  outline-none focus:outline-none">
            <button type="submit" class="search_btn">
                <span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.5 21.75C5.85 21.75 1.25 17.15 1.25 11.5C1.25 5.85 5.85 1.25 11.5 1.25C17.15 1.25 21.75 5.85 21.75 11.5C21.75 17.15 17.15 21.75 11.5 21.75ZM11.5 2.75C6.67 2.75 2.75 6.68 2.75 11.5C2.75 16.32 6.67 20.25 11.5 20.25C16.33 20.25 20.25 16.32 20.25 11.5C20.25 6.68 16.33 2.75 11.5 2.75Z"
                            fill="#292D32" />
                        <path
                            d="M21.9995 22.7495C21.8095 22.7495 21.6195 22.6795 21.4695 22.5295L19.4695 20.5295C19.1795 20.2395 19.1795 19.7595 19.4695 19.4695C19.7595 19.1795 20.2395 19.1795 20.5295 19.4695L22.5295 21.4695C22.8195 21.7595 22.8195 22.2395 22.5295 22.5295C22.3795 22.6795 22.1895 22.7495 21.9995 22.7495Z"
                            fill="#292D32" />
                    </svg>
                </span>
            </button>
        </div>
    </form>
</div>
<div class="order-table border border-[#E0E1E1] rounded-lg overflow-hidden w-full overflow-x-auto">
    <table class="min-w-full divide-y divide-[#E0E1E1]">
        <thead>
            <tr>
                <th scope="col" class="p-4 px-30 bg-gray-50 text-start w-[200px]">
                    <div>
                        <h6 class="text-18 font-medium text-nowrap">{{ __('Transaction ID') }}</h6>
                    </div>
                </th>
                <th scope="col" class="p-4 px-30 bg-gray-50 text-start ">
                    <div>
                        <h6 class="text-18 font-medium text-nowrap ">{{ __('Amount') }}</h6>
                    </div>
                </th>
                <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                    <div>
                        <h6 class="text-18 font-medium text-nowrap">{{ __('Payment Gateway') }}</h6>
                    </div>
                </th>
                <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                    <div>
                        <h6 class="text-18 font-medium text-nowrap">{{ __('Status') }}</h6>
                    </div>
                </th>
                <th scope="col" class="p-4 px-30 bg-gray-50 text-start">
                    <div>
                        <h6 class="text-18 font-medium text-nowrap">{{ __('Actions') }}</h6>
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
