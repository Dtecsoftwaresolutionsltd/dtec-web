@extends('inner_layout')
@section('title')
    <title>{{ $pageTitle }}</title>
    <meta name="title" content="{{ $pageTitle }}">
    <meta name="description" content="{{ __('Pricing Page') }}">
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Pricing Plan') }}" />
        <!-- Pricing start  -->
        <section id="h4-pricing" class="relative w-full overflow-hidden">
            <div class="w-full h4-pricing-wrapper pt-16 md:pt-[130px] pricing_section_bg">
                <div class="theme-container mx-auto">
                    <div class="w-full">
                        <div class="title-area w-full flex justify-center">
                            <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                                <h1
                                    class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                                    <span>{{ __('Pricing Package') }}</span>
                                </h1>
                                <div class="">
                                    <h2 class="text-main-black font-semibold text-24 sm:text-48 text-center max-w-[819px]">
                                        {{ __('We Provide Amazing Pricing Package For Creative Solutions') }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-[30px]">
                            @foreach ($subscriptions as $key => $subscription)
                                <!-- single card  start -->
                                <div {{ $key == 1 ? 'data-aos=zoom-out data-aos-delay=150 data-aos-offset=200' : '' }}
                                    class="col-span-4 border border-buisness-red/10 bg-buisness-gray rounded-xl p-5 md:p-[50px] hover:bg-main-black {{ $key ==1 ? 'bg-main-black' : '' }} transition-all duration-300 relative group">
                                    @if ($subscription?->plan_name == 'Standard Plan')
                                        <div
                                            class="flex gap-2 py-2 px-4 bg-buisness-red rounded-3xl w-fit absolute top-2.5 right-2.5">
                                            @for ($i = 0; $i < 3; $i++)
                                                {{ get_svg('innerpage.star-icon') }}
                                            @endfor
                                        </div>
                                    @endif
                                    <h1
                                        class="text-18 font-semibold text-main-black pb-4 group-hover:text-white {{ $key == 1 ? 'text-white' : '' }} transition-all duration-300">
                                        {{ $subscription?->plan_name }} </h1>
                                    <span
                                        class="text-48 text-mian-black font-semibold font-inter group-hover:text-white {{ $key == 1 ? 'text-white' : '' }} transition-all duration-300">
                                        {{ currency($subscription?->plan_price) }}</span>
                                    <span
                                        class="text-base leading-[30px] text-paragraph font-normal group-hover:text-white {{ $key == 1 ? 'text-white' : '' }} transition-all duration-300">/
                                        {{ $subscription?->expiration_date }}</span>
                                    <p class="text-paragraph pb-8 pt-4 group-hover:text-white {{ $key == 1 ? 'text-white' : '' }} transition-all duration-300">
                                        {{ $subscription?->short_description }}</p>
                                    <a href="{{ route('subscription.process-to-payment', ['subscription_plan_id' => $subscription->id]) }}">
                                        <div class="home-two-btn-white group/btn">
                                            <span
                                                class="text-base group-hover/btn:text-white transition-all duration-300 font-semibold font-inter py-1 relative z-10 text-buisness-red">
                                                {{ __('Choose This Package') }}
                                            </span>
                                            {{ get_svg('innerpage.price_arrow') }}
                                        </div>
                                    </a>
                                    <ul class="flex flex-col gap-4 mt-9">
                                        @foreach (explode("\n", $subscription?->features) as $feature)
                                            @if (!empty(trim($feature)))
                                                <li
                                                    class="flex gap-3 items-center text-buisness-red group-hover:text-white transition-all duration-300 {{ $key == 1 ? 'text-white' : '' }}">
                                                    {{ get_svg('innerpage.price_list') }}
                                                    <span
                                                        class="sm:text-18 font-medium text-paragraph {{ $key == 1 ? 'text-white' : '' }} group-hover:text-white transition-all duration-300">{{ $feature }}</span>
                                                </li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                                <!-- single card end  -->
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="shape-1 absolute left-40 top-96 z-10">
                    {{ get_svg('innerpage.icon-1') }}
                </div>
                <div class="shape-2 absolute right-96 top-96 z-10">
                    {{ get_svg('innerpage.icon-3') }}

                </div>
                <div class="shape-3 absolute left-96 top-[550px] z-10">
                    {{ get_svg('innerpage.icon-2') }}
                </div>
                <div class="shape-4 absolute right-96 top-[550px] z-10">
                    {{ get_svg('innerpage.icon-4') }}
                </div>
            </div>
        </section>
        <!-- Pricing end  -->
        <!-- faq start  -->
        <section class="relative py-16 md:py-[130px]">
            <div class="w-full  relative z-10">
                <div class="theme-container mx-auto">
                    <div
                        class="flex justify-center items-center relative rounded-3xl overflow-hidden">
                        <div class="max-w-[850px] w-full flex justify-center items-center flex-col relative z-10">
                            <h1
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                                {{ __('FAQs') }}
                            </h1>
                            <h2 class="text-24 sm:text-48 font-semibold text-main-black">
                                {{ __('Asked Questions & Answer') }}
                            </h2>
                            <div class="flex flex-col gap-2.5 w-full mt-5 md:mt-[50px] p-0 sm:p-5">
                                @foreach ($faqs as $key => $faq)
                                    <!-- faq single start  -->
                                    <div class="md:py-5 py-2.5 px-2 md:px-9 w-full rounded-[10px] service-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-buisness-red/10 bg-buisness-gray"
                                        name="faq-{{ $key + 1 }}">
                                        <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                            <h1 class="font-semibold sm:text-18 text-main-black"> {{ $faq?->question }}
                                            </h1>
                                            {{ get_svg('innerpage.arrow_red_faq') }}
                                        </div>
                                        <div class="mt-3.5 text-paragraph pointer-events-none h-fit">
                                            {!! clean($faq?->answer) !!}
                                        </div>
                                    </div>
                                    <!-- faq single end  -->
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq end  -->
    </main>
@endsection