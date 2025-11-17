@extends('inner_layout')

@section('title')
<title>{{ __('User Orders') }}</title>
@endsection
@section('frontend_content')

<main>
    <!-- breadcrumb -->
    <x-breadcrumb name="{{ __('Orders') }}" />
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

              @if($orders->isEmpty())
                  @include('user._no_order')
              @else
                  @include('user._with_order')

                  @if ($orders->hasPages())
                    <div class="pagination flex justify-center items-center gap-30 mt-30">
                        <a href="{{ $orders->appends(['per_page' => request('per_page'), 'search' => request('search')])->previousPageUrl() }}"
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
                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                            <li>
                            <a href="{{ $orders->appends(['per_page' => request('per_page'), 'search' => request('search')])->url($i) }}"
                                class="text-paragraph hover:text-purple font-semibold {{ $i == $orders->currentPage() ? 'text-purple' : '' }}">
                                {{ $i }}
                            </a>
                            </li>
                        @endfor
                        </ul>

                        <a href="{{ $orders->appends(['per_page' => request('per_page'), 'search' => request('search')])->nextPageUrl() }}"
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
    <!-- dashboard-end -->
  </main>

@endsection

@push('script_section')
    <script>
        "use strict";
        function changePerPage(value) {
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('per_page', value);
            window.location.href = currentUrl.toString();
        }
    </script>
@endpush
