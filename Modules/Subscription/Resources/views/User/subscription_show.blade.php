@extends('inner_layout')

@section('title')
    <title>{{ __('Subscription Details') }}</title>
@endsection
@php
    $planInfo = json_decode($history->plan_info, true);
    $planData = $planInfo[0] ?? null;
@endphp
@section('frontend_content')
    <main>
        <section id="h1-breadcrumb">
            <div class="h1-breadcrumb w-full h-fit overflow-hidden relative bg-main-gray pb-16 md:pb-24">
                <div class="absolute left-0 w-full h-full top-0 overflow-hidden z-0 pointer-events-none">
                    <img src="{{ asset(breadcrumb_image()) }}" alt="" class="w-full h-full object-cover" />
                </div>
                <div class="theme-container mx-auto h-fit  relative z-20">
                    <div class="mt-[120px] md:mt-[272px] w-full  relative z-10">
                        <div class="flex gap-3 items-center ">
                            <a href="{{ route('user.dashboard') }}" class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">{{ __('Home') }}</a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            <a href="{{ route('user.subscriptions.history') }}" class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">{{ __('Subscription History') }}</a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" /></svg>
                            <a href="#" class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">{{ __('Order Id') }}: {{ $history->order_id }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="dashboard py-20">
            <div class="theme-container mx-auto">
                <div class="flex flex-col xl:flex-row gap-30">
                    @include('user.sidebar')

                    <div class="dashboard-main w-full flex-1">
                        <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

                            <div class="flex flex-wrap mt-3 gap-30 items-start justify-between mb-14">
                                <!-- Plan Information Section -->
                                <div class="flex-1 min-w-[280px]">
                                    <h4 class="text-20 font-semibold mb-8">{{ __('Plan Information') }}</h4>
                                    <div class="text-18">
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[160px] text-nowrap">{{ __('Plan:') }}</span>
                                            <span class="text-paragraph"> {{ $history->plan_name }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[160px] text-nowrap">{{ __('Description:') }}</span>
                                            @if($planData['short_description'])
                                                <span class="text-paragraph"> {{ __($planData['short_description']) }}</span>
                                            @endif
                                        </div>
                                        @if($planData['features'])
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Features:') }}</span>
                                                <div class="text-paragraph">
                                                    @php
                                                        $features = explode("\r\n", $planData['features']);
                                                    @endphp
                                                    <ul style="list-style-type: disc; padding-left: 1.5em;">
                                                        @foreach($features as $feature)
                                                            @if(trim($feature))
                                                                <li>{{ __(trim($feature)) }}</li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[160px] text-nowrap">{{ __('Expiration:') }}</span>
                                            <span class="text-paragraph"> {{ ucfirst($history->expiration) }}</span>
                                        </div>
                                        <div class="flex mb-3 flex-wrap">
                                            <span class="min-w-[160px] text-nowrap">{{ __('Price:') }}</span>
                                            <span class="text-paragraph"> {{ currency($history->plan_price) }}</span>
                                        </div>
                                    </div>
                                </div>



                                <!-- Right column: subscription details + totals -->
                                <div class="flex-1 min-w-[280px]">
                                    <div>
                                        <h4 class="text-20 font-semibold mb-8">{{ __('Subscription Details') }}</h4>
                                        <div class="text-18">
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Order ID:') }}</span>
                                                <span class="text-paragraph">{{ $history->order_id }}</span>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Subscription Status:') }}</span>
                                                <div class="flex gap-2">
                                                    @if ($history->status === 'active')
                                                        @if ($history->expiration == 'lifetime')
                                                            <span class="status status-success text-base">{{ __('Active') }}</span>
                                                        @else
                                                            @if (date('Y-m-d') <= $history->expiration_date)
                                                                <span class="status status-success text-base">{{ __('Active') }}</span>
                                                            @else
                                                                <span class="status status-canceled text-base">{{ __('Expired') }}</span>
                                                            @endif
                                                        @endif
                                                    @elseif ($history->status === 'pending')
                                                        <span class="status status-canceled text-base">{{ __('Pending') }}</span>
                                                    @elseif ($history->status === 'expired')
                                                        <span class="status status-canceled text-base">{{ __('Expired') }}</span>
                                                    @else
                                                        <span class="status status-canceled text-base">{{ ucfirst($history->status) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Payment Status:') }}</span>
                                                <div class="flex gap-2">
                                                    @if ($history->payment_status === 'success')
                                                        <span class="status status-success text-base">{{ __('Paid') }}</span>
                                                    @else
                                                        <span class="status status-canceled text-base">{{ __('Unpaid') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Payment Method:') }}</span>
                                                <span class="text-paragraph">{{ $history->payment_method }}</span>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Transaction Id:') }}</span>
                                                <span class="text-paragraph">{{ $history->transaction }}</span>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Start Date:') }}</span>
                                                <span class="text-paragraph">{{ $history->created_at->format('d M Y') }}</span>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Expiration:') }}</span>
                                                <span class="text-paragraph">{{ $history->expiration_date }}</span>
                                            </div>
                                            <div class="flex mb-3 flex-wrap">
                                                <span class="min-w-[160px] text-nowrap">{{ __('Remaining day:') }}</span>
                                                @php
                                                    if ($history->expiration === 'lifetime') {
                                                        $remaining = __('Lifetime');
                                                    } elseif (strtotime($history->expiration_date) < strtotime(date('Y-m-d'))) {
                                                        $remaining = __('Expired');
                                                    } else {
                                                        $start = \Carbon\Carbon::parse($history->created_at->format('Y-m-d'));
                                                        $end = \Carbon\Carbon::parse($history->expiration_date);
                                                        $diff = $start->diffInDays($end, false);
                                                        $remaining = $diff . ' ' . __('days');
                                                    }
                                                @endphp
                                                <span class="text-paragraph">{{ $remaining }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="max-w-[430px] w-full mt-10">
                                        <div class="flex justify-between mb-5">
                                            <h6 class="text-16 font-medium"> {{ __('Plan') }}</h6>
                                            <h6 class="text-16 font-medium">{{ $history->plan_name }}</h6>
                                        </div>
                                        <div class="flex justify-between mb-5">
                                            <h6 class="text-16 text-paragraph"> {{ __('Price') }}</h6>
                                            <h6 class="text-16">{{ currency($history->plan_price) }}</h6>
                                        </div>
                                        <div class="flex justify-between pt-5 border-t border-t-[#E0E1E1]">
                                            <h5 class="text-20 font-semibold"> {{ __('Total') }}</h5>
                                            <h5 class="text-20 font-semibold">{{ currency($history->plan_price) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


