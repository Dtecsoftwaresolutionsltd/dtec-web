@extends('admin.master_layout')
@section('title')
    <title>{{ __('Dashboard') }}</title>
@endsection
@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Dashboard') }}</h3>
    <p class="crancy-header__text">{{ __('Dashboard') }} >> {{ __('Dashboard') }}</p>
@endsection
@push('style_section')
    <link rel="stylesheet" href="{{ asset('backend/css/charts.min.css') }}">
@endpush
@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-lg-3 col-12 mg-top-30">
                                    <!-- Progress Card -->
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main text-theme">
                                            <span>
                                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.08" cx="27" cy="27" r="27"
                                                        fill="currentcolor" />
                                                    <g clip-path="url(#clip0_1555_27675)">
                                                        <path
                                                            d="M25.125 41H16.125C15.8266 41 15.5405 40.8815 15.3295 40.6705C15.1185 40.4595 15 40.1734 15 39.875C15 39.5766 15.1185 39.2905 15.3295 39.0795C15.5405 38.8685 15.8266 38.75 16.125 38.75H25.125C25.4234 38.75 25.7095 38.8685 25.9205 39.0795C26.1315 39.2905 26.25 39.5766 26.25 39.875C26.25 40.1734 26.1315 40.4595 25.9205 40.6705C25.7095 40.8815 25.4234 41 25.125 41Z"
                                                            fill="currentcolor" />
                                                        <path
                                                            d="M22.875 36.5H16.125C15.8266 36.5 15.5405 36.3815 15.3295 36.1705C15.1185 35.9595 15 35.6734 15 35.375C15 35.0766 15.1185 34.7905 15.3295 34.5795C15.5405 34.3685 15.8266 34.25 16.125 34.25H22.875C23.1734 34.25 23.4595 34.3685 23.6705 34.5795C23.8815 34.7905 24 35.0766 24 35.375C24 35.6734 23.8815 35.9595 23.6705 36.1705C23.4595 36.3815 23.1734 36.5 22.875 36.5Z"
                                                            fill="currentcolor" />
                                                        <path
                                                            d="M20.625 32H16.125C15.8266 32 15.5405 31.8815 15.3295 31.6705C15.1185 31.4595 15 31.1734 15 30.875C15 30.5766 15.1185 30.2905 15.3295 30.0795C15.5405 29.8685 15.8266 29.75 16.125 29.75H20.625C20.9234 29.75 21.2095 29.8685 21.4205 30.0795C21.6315 30.2905 21.75 30.5766 21.75 30.875C21.75 31.1734 21.6315 31.4595 21.4205 31.6705C21.2095 31.8815 20.9234 32 20.625 32Z"
                                                            fill="currentcolor" />
                                                        <path
                                                            d="M29.625 40.9491C29.3266 40.9624 29.0352 40.8566 28.8148 40.655C28.5945 40.4534 28.4632 40.1725 28.4499 39.8742C28.4366 39.5758 28.5424 39.2844 28.744 39.064C28.9456 38.8436 29.2265 38.7124 29.5249 38.6991C31.6539 38.5043 33.6833 37.7069 35.3755 36.4003C37.0676 35.0936 38.3524 33.3319 39.0794 31.3214C39.8064 29.3109 39.9454 27.1348 39.4803 25.0481C39.0151 22.9615 37.965 21.0505 36.4529 19.5391C34.9408 18.0277 33.0294 16.9785 30.9425 16.5143C28.8556 16.0501 26.6796 16.1901 24.6694 16.9181C22.6593 17.646 20.8981 18.9316 19.5923 20.6243C18.2864 22.3171 17.4899 24.3469 17.2961 26.476C17.2693 26.7732 17.1254 27.0475 16.8963 27.2386C16.6672 27.4298 16.3715 27.5221 16.0744 27.4952C15.7772 27.4684 15.5028 27.3246 15.3117 27.0954C15.1206 26.8663 15.0283 26.5707 15.0551 26.2735C15.3689 22.8122 17.0054 19.6053 19.6241 17.3202C22.2428 15.0352 25.6419 13.8482 29.1137 14.0062C32.5856 14.1642 35.8628 15.6551 38.2631 18.1685C40.6634 20.6819 42.0019 24.0243 42 27.4997C42.0172 30.8729 40.7641 34.1289 38.4899 36.6201C36.2156 39.1114 33.087 40.6552 29.7262 40.9446C29.6925 40.948 29.6576 40.9491 29.625 40.9491Z"
                                                            fill="currentcolor" />
                                                        <path
                                                            d="M28.5 20.75C28.2016 20.75 27.9155 20.8685 27.7045 21.0795C27.4935 21.2905 27.375 21.5766 27.375 21.875V27.5C27.3751 27.7983 27.4936 28.0844 27.7046 28.2954L31.0796 31.6704C31.2918 31.8753 31.576 31.9887 31.871 31.9861C32.1659 31.9836 32.4481 31.8653 32.6567 31.6567C32.8653 31.4481 32.9836 31.1659 32.9861 30.871C32.9887 30.576 32.8753 30.2918 32.6704 30.0796L29.625 27.0343V21.875C29.625 21.5766 29.5065 21.2905 29.2955 21.0795C29.0845 20.8685 28.7984 20.75 28.5 20.75Z"
                                                            fill="currentcolor" />
                                                    </g>

                                                </svg>

                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('Active Order') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $active_orders }}</h3>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Progress Card -->
                                </div>

                                <div class="col-lg-3 col-12 mg-top-30">
                                    <!-- Progress Card -->
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main text-theme">
                                            <span>
                                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.08" cx="27" cy="27" r="27"
                                                        fill="currentcolor" />
                                                    <g clip-path="url(#clip0_1555_27691)">
                                                        <path
                                                            d="M20.625 20.75C20.625 20.1279 21.129 19.625 21.75 19.625H25.125C25.746 19.625 26.25 20.1279 26.25 20.75C26.25 21.3721 25.746 21.875 25.125 21.875H21.75C21.129 21.875 20.625 21.3721 20.625 20.75ZM27.375 24.125H21.75C21.129 24.125 20.625 24.6279 20.625 25.25C20.625 25.8721 21.129 26.375 21.75 26.375H27.375C27.996 26.375 28.5 25.8721 28.5 25.25C28.5 24.6279 27.996 24.125 27.375 24.125ZM27.375 28.625H21.75C21.129 28.625 20.625 29.1279 20.625 29.75C20.625 30.3721 21.129 30.875 21.75 30.875H27.375C27.996 30.875 28.5 30.3721 28.5 29.75C28.5 29.1279 27.996 28.625 27.375 28.625ZM41.9314 19.2391C41.7694 18.7948 41.3464 18.5 40.875 18.5H37.4989L36.3041 15.1475C36.1399 14.7076 35.7191 14.4151 35.25 14.4151C34.7809 14.4151 34.359 14.7076 34.1959 15.1475L33.0011 18.5H29.625C29.1536 18.5 28.7318 18.7948 28.5698 19.2369C28.4066 19.6801 28.5383 20.1763 28.8983 20.4823L31.5724 22.6591L30.5137 26.0521C30.3709 26.5078 30.5306 27.0039 30.912 27.2908C31.1111 27.4404 31.3485 27.5157 31.587 27.5157C31.8053 27.5157 32.0235 27.4528 32.2125 27.3256L35.259 25.2871L38.3572 27.3043C38.7566 27.5641 39.2786 27.5439 39.6577 27.2525C40.0369 26.9611 40.1899 26.4616 40.0391 26.0082L38.9377 22.6557L41.5995 20.4879C41.9606 20.183 42.0934 19.6857 41.9314 19.2414V19.2391ZM39.75 36.5V37.0625C39.75 39.2337 37.9837 41 35.8125 41H18.9364C16.7663 41 15 39.2337 15 37.0625V19.625C15 16.5234 17.5234 14 20.625 14H29.625C30.246 14 30.75 14.5029 30.75 15.125C30.75 15.7471 30.246 16.25 29.625 16.25H20.625C18.7642 16.25 17.25 17.7642 17.25 19.625V37.0625C17.25 37.9929 18.0071 38.75 18.9375 38.75C19.8679 38.75 20.625 37.9929 20.625 37.0625V36.5C20.625 34.6392 22.1392 33.125 24 33.125H34.125V29.75C34.125 29.1279 34.629 28.625 35.25 28.625C35.871 28.625 36.375 29.1279 36.375 29.75V33.125C38.2358 33.125 39.75 34.6392 39.75 36.5ZM37.5 36.5C37.5 35.879 36.9949 35.375 36.375 35.375H24C23.3801 35.375 22.875 35.879 22.875 36.5V37.0625C22.875 37.6655 22.7378 38.2381 22.4948 38.75H35.8125C36.7429 38.75 37.5 37.9929 37.5 37.0625V36.5Z"
                                                            fill="currentcolor" />
                                                    </g>

                                                </svg>
                                            </span>

                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('Complete Order') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $complete_orders }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Progress Card -->
                                </div>

                                <div class="col-lg-3 col-12 mg-top-30">
                                    <!-- Progress Card -->
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main text-theme">
                                            <span>
                                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.08" cx="27" cy="27" r="27"
                                                        fill="currentcolor" />
                                                    <path
                                                        d="M34.375 15.125H18.625C15.5234 15.125 13 17.6484 13 20.75V34.25C13 37.3516 15.5234 39.875 18.625 39.875H34.375C37.4766 39.875 40 37.3516 40 34.25V20.75C40 17.6484 37.4766 15.125 34.375 15.125ZM37.75 34.25C37.75 36.1108 36.2358 37.625 34.375 37.625H18.625C16.7642 37.625 15.25 36.1108 15.25 34.25V20.75C15.25 18.8892 16.7642 17.375 18.625 17.375H34.375C36.2358 17.375 37.75 18.8892 37.75 20.75V34.25ZM34.375 21.875C34.375 22.496 33.871 23 33.25 23H25.375C24.754 23 24.25 22.496 24.25 21.875C24.25 21.254 24.754 20.75 25.375 20.75H33.25C33.871 20.75 34.375 21.254 34.375 21.875ZM22 21.875C22 22.8065 21.244 23.5625 20.3125 23.5625C19.381 23.5625 18.625 22.8065 18.625 21.875C18.625 20.9435 19.381 20.1875 20.3125 20.1875C21.244 20.1875 22 20.9435 22 21.875ZM34.375 27.5C34.375 28.121 33.871 28.625 33.25 28.625H25.375C24.754 28.625 24.25 28.121 24.25 27.5C24.25 26.879 24.754 26.375 25.375 26.375H33.25C33.871 26.375 34.375 26.879 34.375 27.5ZM22 27.5C22 28.4315 21.244 29.1875 20.3125 29.1875C19.381 29.1875 18.625 28.4315 18.625 27.5C18.625 26.5685 19.381 25.8125 20.3125 25.8125C21.244 25.8125 22 26.5685 22 27.5ZM34.375 33.125C34.375 33.746 33.871 34.25 33.25 34.25H25.375C24.754 34.25 24.25 33.746 24.25 33.125C24.25 32.504 24.754 32 25.375 32H33.25C33.871 32 34.375 32.504 34.375 33.125ZM22 33.125C22 34.0565 21.244 34.8125 20.3125 34.8125C19.381 34.8125 18.625 34.0565 18.625 33.125C18.625 32.1935 19.381 31.4375 20.3125 31.4375C21.244 31.4375 22 32.1935 22 33.125Z"
                                                        fill="currentcolor" />
                                                </svg>
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('Cancel Order') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $cancel_orders }}</h3>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Progress Card -->
                                </div>

                                <div class="col-lg-3 col-12 mg-top-30">
                                    <!-- Progress Card -->
                                    <div class="crancy-ecom-card crancy-ecom-card__v2">
                                        <div class="flex-main text-theme">
                                            <span>
                                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.08" cx="27" cy="27" r="27"
                                                        fill="currentcolor" />
                                                    <g clip-path="url(#clip0_1555_27715)">
                                                        <path
                                                            d="M36.625 41H34.375V35.3266C34.3741 34.4446 34.0233 33.599 33.3997 32.9753C32.776 32.3517 31.9304 32.0009 31.0484 32H21.9516C21.0696 32.0009 20.224 32.3517 19.6003 32.9753C18.9767 33.599 18.6259 34.4446 18.625 35.3266V41H16.375V35.3266C16.3768 33.8482 16.9649 32.4308 18.0103 31.3853C19.0558 30.3399 20.4732 29.7518 21.9516 29.75H31.0484C32.5268 29.7518 33.9442 30.3399 34.9897 31.3853C36.0351 32.4308 36.6232 33.8482 36.625 35.3266V41Z"
                                                            fill="currentcolor" />
                                                        <path
                                                            d="M26.5 27.5C25.165 27.5 23.8599 27.1041 22.7499 26.3624C21.6399 25.6207 20.7747 24.5665 20.2638 23.3331C19.7529 22.0997 19.6193 20.7425 19.8797 19.4331C20.1402 18.1238 20.783 16.921 21.727 15.977C22.671 15.033 23.8738 14.3902 25.1831 14.1297C26.4925 13.8693 27.8497 14.0029 29.0831 14.5138C30.3165 15.0247 31.3707 15.8899 32.1124 16.9999C32.8541 18.1099 33.25 19.415 33.25 20.75C33.2482 22.5397 32.5365 24.2555 31.271 25.521C30.0055 26.7865 28.2897 27.4982 26.5 27.5ZM26.5 16.25C25.61 16.25 24.74 16.5139 23.9999 17.0084C23.2599 17.5029 22.6831 18.2057 22.3425 19.0279C22.002 19.8502 21.9128 20.755 22.0865 21.6279C22.2601 22.5008 22.6887 23.3026 23.318 23.932C23.9474 24.5613 24.7492 24.9899 25.6221 25.1635C26.495 25.3372 27.3998 25.2481 28.2221 24.9075C29.0443 24.5669 29.7471 23.9901 30.2416 23.2501C30.7361 22.51 31 21.64 31 20.75C31 19.5565 30.5259 18.4119 29.682 17.568C28.8381 16.7241 27.6935 16.25 26.5 16.25Z"
                                                            fill="currentcolor" />
                                                    </g>

                                                </svg>
                                            </span>
                                            <div class="flex-1">
                                                <div class="crancy-ecom-card__heading">
                                                    <div class="crancy-ecom-card__icon">
                                                        <h4 class="crancy-ecom-card__title">{{ __('Total Orders') }} </h4>
                                                    </div>

                                                </div>
                                                <div class="crancy-ecom-card__content">
                                                    <div class="crancy-ecom-card__camount">
                                                        <div class="crancy-ecom-card__camount__inside">
                                                            <h3 class="crancy-ecom-card__amount">{{ $total_orders }}</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Progress Card -->
                                </div>

                            </div>

                            <div class="row crancy-gap-30">
                                <div class="col-12">
                                    <!-- Charts One -->
                                    <div class="charts-main charts-home-one mg-top-30">
                                        <!-- Top Heading -->
                                        <div class="charts-main__heading  mg-btm-20">
                                            <h4 class="charts-main__title">{{ __('Order Statistics') }}</h4>

                                        </div>
                                        <div class="charts-main__one">
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="crancy-chart__s1"
                                                    role="tabpanel" aria-labelledby="crancy-chart__s1">
                                                    <div class="crancy-chart__inside crancy-chart__three">
                                                        <!-- Chart One -->
                                                        <canvas id="myChart_recent_statics"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Charts One -->
                                </div>
                            </div>

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Latest Order') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer"
                                        id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Price') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Payment Method') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Payment Status') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @foreach ($orders as $index => $order)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <br>
                                                            {{ $order->user->name }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($order->total) }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $order->payment_method }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        @if ($order->payment_status == App\Constants\Status::ENABLE)
                                                            <span class="badge bg-success">{{ __('Approved') }}</span>
                                                        @elseif ($order->payment_status == App\Constants\Status::PENDING)
                                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        @if ($order->order_status == App\Constants\Status::APPROVED)
                                                            <span class="badge bg-success">{{ __('Completed') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::PROCESSING)
                                                            <span class="badge bg-success">{{ __('Processing') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::SHIPPED)
                                                            <span class="badge bg-success">{{ __('Shipped') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::COMPLETED)
                                                            <span class="badge bg-success">{{ __('Completed') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::REJECTED)
                                                            <span class="badge bg-warning">{{ __('Rejected') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                                        @endif

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <a href="{{ route('admin.order', $order->order_id) }}"
                                                            class="crancy-btn"><i class="fas fa-eye"></i>
                                                            {{ __('View') }}</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                <!-- End crancy Table -->
                            </div>



                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>


            </div>


        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to delete this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_section')
    <script src="{{ asset('backend/js/charts.js') }}"></script>

    <script>
        "use strict";

        let purchase_data = @json($data);
        purchase_data = JSON.parse(purchase_data);

        let date_lable = @json($lable);
        date_lable = JSON.parse(date_lable);

        // Chart Three
        const ctx_myChart_recent_statics = document.getElementById('myChart_recent_statics').getContext('2d');
        const gradientBgs = ctx_myChart_recent_statics.createLinearGradient(400, 100, 100, 400);

        gradientBgs.addColorStop(0, 'rgba(45, 77, 255, 0.1)');
        gradientBgs.addColorStop(1, 'rgba(45, 77, 255, 0.5)');

        const myChart_recent_statics = new Chart(ctx_myChart_recent_statics, {
            type: 'line',

            data: {

                labels: date_lable,
                datasets: [{
                    label: 'Sells',
                    data: purchase_data,
                    backgroundColor: gradientBgs,
                    borderColor: '#2b4dff',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    fillColor: '#fff',
                    fill: 'start',
                    pointRadius: 2,
                }]
            },

            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    x: {
                        ticks: {
                            color: '#2b4dff',
                        },
                        grid: {
                            display: false,
                            drawBorder: false,
                            color: '#E6F3FF',
                        },
                        suggestedMax: 100,
                        suggestedMin: 50,

                    },
                    y: {
                        ticks: {
                            color: '#2b4dff',
                            callback: function(value, index, values) {
                                return (value / 10) * 10 + '$';
                            }
                        },
                        grid: {
                            drawBorder: false,
                            color: '#D7DCE7',
                            borderDash: [5, 5]
                        },
                    },
                },
                plugins: {
                    tooltip: {
                        padding: 10,
                        displayColors: true,
                        yAlign: 'bottom',
                        backgroundColor: '#fff',
                        titleColor: '#000',
                        titleFont: {
                            weight: 'normal'
                        },
                        bodyColor: '#2F3032',
                        cornerRadius: 12,
                        boxPadding: 3,
                        usePointStyle: true,
                        borderWidth: 0,
                        font: {
                            size: 14
                        },
                        caretSize: 9,
                        bodySpacing: 100,
                    },
                    legend: {
                        position: 'bottom',
                        display: false,
                    },
                    title: {
                        display: false,
                        text: "{{ __('Purchase History') }}"
                    }
                }
            }
        });

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '{{ url('admin/order-delete/') }}' + "/" + id)
        }
    </script>
@endpush
