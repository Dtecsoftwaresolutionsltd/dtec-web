@extends('inner_layout')

@section('title')
  <title>{{ __('Subscription History') }}</title>
@endsection

@section('frontend_content')

  <main>
    <x-breadcrumb name="{{ __('Subscription History') }}" />

    <section class="dashboard py-20">
      <div class="theme-container mx-auto">
        <div class="flex flex-col xl:flex-row gap-30">
          @include('user.sidebar')

          <div class="dashboard-main w-full flex-1 max-w-[982px]">
            <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

              @if($histories->isEmpty())
                @include('user._no_order')
              @else

                <div class="flex flex-wrap justify-between sm:items-center gap-30 mb-5">
                  <div class="flex items-center gap-2.5">
                    <p class="text-paragraph">{{ __('Show') }}</p>
                    <div
                      class="custom-select min-w-[90px] w-full relative h-12 border border-[#E6E0FF] p-6 rounded-[100px]">
                      <form method="GET" action="{{ route('user.subscriptions.history') }}">
                        <select name="per_page" class="w-full h-full absolute inset-0 opacity-0 cursor-pointer"
                          onchange="this.form.submit()">
                          @foreach ([10, 20, 50, 100] as $value)
                            <option value="{{ $value }}" {{ request('per_page') == $value ? 'selected' : '' }}>{{ $value }}
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

                  <form class="dashbord_table_top_right" method="GET" action="{{ route('user.subscriptions.history') }}">
                    <div
                      class="flex items-center gap-1 h-12 border border-[#E6E0FF] px-5 rounded-[100px] max-w-[294px] w-full">
                      <input type="text" placeholder="{{ __('Search by order ID') }}" name="search"
                        value="{{ request('search') }}" class="h-full flex-1  outline-none focus:outline-none">
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
                        <th class="p-4 px-30 bg-gray-50 text-start w-[120px]">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Order ID') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start ">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap ">{{ __('Plan') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start ">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap ">{{ __('Price') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Payment') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __(' Subscription Status') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start ">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap ">{{ __('Purchase Date') }}</h6>
                          </div>
                        </th>
                        <th class="p-4 px-30 bg-gray-50 text-start">
                          <div>
                            <h6 class="text-18 font-medium text-nowrap">{{ __('Action') }}</h6>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody class="divide-y divide-[#E0E1E1]">
                      @foreach ($histories as $row)
                        <tr class="bg-white transition-all">
                          <td class="px-30 py-3.5 text-start">
                            <div><a href="{{ route('user.subscriptions.show', $row->order_id) }}"
                                class="text-16 text-[#4A7DFF] hover:underline">{{ $row->order_id }}</a></div>
                          </td>
                          <td class="px-30 py-3.5 text-start">
                            <div>
                              <p class="text-16 text-nowrap font-medium">{{ $row->plan_name }}</p>
                            </div>
                          </td>
                          <td class="px-30 py-3.5 text-start">
                            <div>
                              <p class="text-16 text-nowrap font-medium">{{ currency($row->plan_price) }}</p>
                            </div>
                          </td>
                          <td class="px-30 py-3.5 text-start"><span
                              class="text-16 text-nowrap status {{ ($row->payment_status === 'success') ? 'status-success' : 'status-pending' }}">{{($row->payment_status === 'success') ? __('Paid') : __('Unpaid') }}</span>
                          </td>
                          <td class="px-30 py-3.5 text-start">
                            @if ($row->status == 'active')
                              @if ($row->expiration == 'lifetime')
                                <div>
                                  <p class="text-16 text-nowrap status status-success">{{ __('Active') }}</p>
                                </div>
                              @else
                                @if (date('Y-m-d') <= $row->expiration_date)
                                  <div>
                                    <p class="text-16 text-nowrap status status-success">{{ __('Active') }}</p>
                                  </div>
                                @else
                                  <div>
                                    <p class="text-16 text-nowrap status status-pending">{{ __('Expired') }}</p>
                                  </div>
                                @endif
                              @endif
                            @elseif ($row->status == 'pending')
                              <div>
                                <p class="text-16 text-nowrap status status-pending">{{ __('Pending') }}</p>
                              </div>
                            @elseif ($row->status == 'expired')
                              <div>
                                <p class="text-16 text-nowrap status status-pending">{{ __('Expired') }}</p>
                              </div>
                            @endif
                          </td>
                          <td class="px-30 py-3.5 text-start">
                            <div>
                              <p class="text-16 text-nowrap text-paragraph">{{ $row->created_at->format('g:i A, d M Y') }}</p>
                            </div>
                          </td>
                          <td class="px-30 py-3.5 text-start">
                            <div class="flex items-center gap-3">
                              <a class="" href="{{ route('user.subscriptions.show', $row->order_id) }}">
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


                @if ($histories->hasPages())
                  <div class="pagination flex justify-center items-center gap-30 mt-30">
                    <a href="{{ $histories->appends(['per_page' => request('per_page'), 'search' => request('search')])->previousPageUrl() }}"
                      class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                      <span class="text-[#7C7C7C] group-hover:text-black">
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M1.04557 5.72656L5.60807 10.3516C5.76432 10.5078 6.01432 10.5078 6.13932 10.3516L6.76432 9.72656C6.92057 9.57031 6.92057 9.35156 6.76432 9.19531L3.07682 5.44531L6.76432 1.72656C6.92057 1.57031 6.92057 1.32031 6.76432 1.19531L6.13932 0.570312C6.01432 0.414062 5.76432 0.414062 5.60807 0.570312L1.04557 5.19531C0.889323 5.35156 0.889323 5.57031 1.04557 5.72656Z"
                            fill="currentColor" />
                        </svg>
                      </span>
                    </a>
                    <ul class="flex items-center gap-5">
                      @for ($i = 1; $i <= $histories->lastPage(); $i++)
                        <li>
                          <a href="{{ $histories->appends(['per_page' => request('per_page'), 'search' => request('search')])->url($i) }}"
                            class="text-paragraph hover:text-purple font-semibold {{ $i == $histories->currentPage() ? 'text-purple' : '' }}">{{ $i }}</a>
                        </li>
                      @endfor
                    </ul>
                    <a href="{{ $histories->appends(['per_page' => request('per_page'), 'search' => request('search')])->nextPageUrl() }}"
                      class="flex justify-center items-center size-9 rounded-full bg-white border border-[#E6E6E6] group hover:border-black transition-all duration-300">
                      <span class="text-[#7C7C7C] group-hover:text-black">
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M6.73275 5.72656L2.17025 10.3516C2.014 10.5078 1.764 10.5078 1.639 10.3516L1.014 9.72656C0.857747 9.57031 0.857747 9.35156 1.014 9.19531L4.7015 5.44531L1.014 1.72656C0.857747 1.57031 0.857747 1.32031 1.014 1.19531L1.639 0.570312C1.764 0.414062 2.014 0.414062 2.17025 0.570312L6.73275 5.19531C6.889 5.35156 6.889 5.57031 6.73275 5.72656Z"
                            fill="currentColor" />
                        </svg>
                      </span>
                    </a>
                  </div>
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
