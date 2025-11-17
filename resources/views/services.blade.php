@extends('inner_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Services') }}" />

        <!-- about start  -->
        <section class="w-full py-16 md:py-[130px] items-center">
            <div class="theme-container mx-auto w-full">
                <div class="grid grid-cols-6 lg:grid-cols-12 box-border gap-[30px]">
                    <div class="col-span-5 flex justify-center flex-col">
                        <h1 class="text-24 md:text-48 font-semibold text-main-black mt-2.5 md:mt-5">
                            {{ getTranslatedValue($digital_transforming_brands, 'title') }}
                        </h1>
                        <p class="mt-5 md:mt-10 text-paragraph pb-10">
                            {{ getTranslatedValue($digital_transforming_brands, 'short_description') }}
                        </p>
                        <a href="{{ route('contact-us') }}">
                            <div class="home-two-btn-bg group bg-main-black border-main-black py-[15px]">
                                <span
                                    class="text-base group-hover:text-main-black text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ __('Contact Us') }}
                                </span>
                                {{ get_svg('white-black') }}
                            </div>
                        </a>
                    </div>
                    <div class="col-span-7 relative flex flex-col sm:flex-row justify-end w-full overflow-hidden">
                        <img src="{{ asset(getImage($digital_transforming_brands, 'main_image')) }}" alt="img"
                            class=" w-full max-w-[630px]" />

                        <div
                            class="bg-buisness-red p-6 rounded-2xl sm:absolute z-20 bottom-8 w-full sm:w-[155px] left-[185px]  mt-5 sm:mt-0 max-w-full">
                            {{ get_svg('award_icon') }}

                            {{ get_svg('about_card_shape') }}
                            <div class="flex items-center gap-2.5">
                                {{ get_svg('we_have_direction') }}
                                <span class="text-sm text-white leading-8">{{ __('We have') }}</span>
                            </div>
                            <h1 class="text-18 text-white font-semibold tracking-tight max-w-[170px]"
                                data-scroll-qs="scroll" data-count-qs="25" data-type-qs="+ Awards Winning"
                                data-speed-qs="1000">
                                {{ getTranslatedValue($digital_transforming_brands, 'award_winning_text') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end  -->
        <section id="service" class="w-full">
            <div
                class="mx-auto max-w-[1600px] w-full md:py-[130px] py-16 xl:px-[80px] md:px-10 px-0 bg-buisness-gray rounded-[10px] border border-buisness-red/10">
                <div class="w-full service-section-wrapper relative">
                    <div class="theme-container mx-auto relative z-10">
                        <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                            <h1
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                                {{ getTranslatedValue($service_explore_services, 'section_name') }}
                            </h1>
                            <h2
                                class="sm:text-48 text-24 font-semibold text-main-black text-center lg:w-[685px] w-full">
                                {{ getTranslatedValue($service_explore_services, 'title') }}
                            </h2>
                        </div>
                        <div class="w-full grid xl:grid-cols-12 md:grid-cols-6 grid-cols-3 xl:gap-[30px] gap-5">
                            @foreach ($service_explores as $key => $service)
                                <div data-aos="zoom-out" data-aos-delay="{{ $key == 0 ? 0 : $key * 200 }}"
                                    class="col-span-3 relative group border border-transparent common-transition before:inline-block before:w-full before:h-full before:border before:rounded-[10px] before:border-buisness-red before:absolute before:bottom-0 before:right-0 before:shadow-business-red-md before:origin-bottom-right before:scale-0 hover:before:scale-100 before:transition-all before:duration-300 before:z-0 after:inline-block after:w-full after:h-full after:border after:rounded-[10px] after:border-buisness-red after:absolute after:top-0 after:left-0 after:shadow-business-red-md after:origin-top-left after:scale-0 hover:after:scale-100 after:transition-all after:duration-300 after:z-0 before:ease-linear after:ease-linear">
                                    <div
                                        class="flex flex-col relative px-4 md:px-8 py-5 md:py-10 justify-between items-center rounded-[10px] bg-white m-[1px] z-10">
                                        <div
                                            class="w-[60px] h-[60px] flex justify-center items-center rounded-full common-transition text-purple">
                                            <span>
                                                <img src="{{ asset($service?->theme_5_thumbnail_image) }}" alt="">
                                            </span>
                                        </div>
                                        <div class="mt-5 mb-4">
                                            <p class="text-20 font-semibold text-center text-main-black mb-4">
                                                {{ $service?->title }}
                                            </p>
                                            <p class="text-center text-paragraph">
                                                {{ Str::limit($service?->short_description, 50) }}
                                            </p>
                                        </div>
                                        <a href="{{ route('service', $service->slug) }}">
                                            <div class="flex items-center gap-2 group text-paragraph hover:text-buisness-red">
                                                <span
                                                    class="font-medium leading-5 font-inter border-b border-transparent before:inline-block before:border-buisness-red before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                                    {{ __('Read More') }}
                                                </span>
                                                <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.5 10L5.29289 6.20711C5.62623 5.87377 5.79289
                                                                    5.70711 5.79289 5.5C5.79289 5.29289 5.62623 5.12623
                                                                    5.29289 4.79289L1.5 1" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- service  -->
        <!-- faq start  -->
        <section class="relative  py-16 md:py-[130px]">
            <div class="w-full  relative z-10">
                <div class="theme-container mx-auto">
                    <div
                        class="flex justify-center items-center  relative rounded-3xl overflow-hidden">
                        <div class="max-w-[850px] w-full flex justify-center items-center flex-col relative z-10">
                            <h1
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5s">
                                {{ getTranslatedValue($service_faqs, 'section_name') }}
                            </h1>
                            <h2 class="text-24 sm:text-48 font-semibold text-main-black mt-5">
                                {{ getTranslatedValue($service_faqs, 'title') }}
                            </h2>
                            <div class="flex flex-col gap-2.5 w-full mt-5 md:mt-10 p-0 sm:p-5">
                                <!-- faq single start  -->
                                @foreach ($faqs as $faq)
                                    <div data-aos="fade-up"
                                        class="md:py-5 py-2.5 px-2 md:px-9 w-full rounded-[10px] service-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-buisness-red/10 bg-white"
                                        name="faq-{{ $faq?->id }}">
                                        <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                            <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                                {{ $faq?->question }}
                                            </h1>
                                            <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2L9.5 8L17 2" stroke="#FF002A" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <p id="faq-body" class="mt-3.5  text-paragraph pointer-events-none h-fit">
                                            {{ $faq?->answer }}
                                        </p>
                                    </div>
                                @endforeach
                                <!-- faq single end  -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- faq end  -->

    </main>
@endsection