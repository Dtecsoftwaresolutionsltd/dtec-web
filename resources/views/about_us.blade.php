@extends('inner_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('About Us') }}" />

        <!-- about start  -->
        <section class="w-full py-16 md:py-[130px]">
            <div class="theme-container mx-auto w-full">
                <div class="grid grid-cols-6 lg:grid-cols-12 gap-10 lg:gap-0 h-fit">
                    <div class="col-span-6 lg:pr-[87px] flex h-full items-center">
                        <div class="">

                            <h1
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium">
                                {{ getTranslatedValue($about_company_section, 'section_name') }}
                            </h1>

                            <h2 class="text-24 sm:text-48 font-semibold text-main-black mt-5">
                                {{ getTranslatedValue($about_company_section, 'title') }}
                            </h2>
                            <p class="text-paragraph mt-5 sm:mt-10">
                                {{ getTranslatedValue($about_company_section, 'short_description') }}
                            </p>
                            <hr class="mt-10 border-purple/10" />
                            <div class="w-full grid grid-cols-1 sm:grid-cols-2 mt-[50px] gap-8 md:gap-[70px]">
                                <div data-aos="fade-left" class="grid-cols-1">
                                    {{ get_svg('about_tick_mark') }}
                                    <h1 class="text-18 text-main-black font-semibold mt-4">
                                        {{ getTranslatedValue($about_company_section, 'title_1') }}
                                    </h1>
                                    <p class="text-paragraph mt-3">
                                        {{ getTranslatedValue($about_company_section, 'description_1') }}
                                    </p>
                                </div>
                                <div data-aos="fade-left" data-aos-delay="100" class="grid-cols-1">
                                    {{ get_svg('about_tick_mark') }}
                                    <h1 class="text-18 text-main-black font-semibold mt-4">
                                        {{ getTranslatedValue($about_company_section, 'title_2') }}
                                    </h1>
                                    <p class="text-paragraph mt-3">
                                        {{ getTranslatedValue($about_company_section, 'description_2') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-6 relative flex flex-col sm:flex-row justify-end items-center">
                        <div
                            class="hidden sm:flex items-center p-[7px] pl-5 bg-white rounded-[30px] sm:absolute left-10 top-[70px] z-10 shadow-style-one">
                            <span
                                class="font-inter text-sm font-semibold text-black">{{ getTranslatedValue($about_company_section, 'trusted_client') }}</span>
                            <div class="cursor-pointer w-100">
                                <img src="{{ asset(getImage($about_company_section, 'trusted_client_image')) }}" alt=""
                                    class="w-auto h-9 object-cover rounded-full overflow-hidden relative hover:z-10 transition-all duration-300" />
                            </div>
                        </div>
                        <div>
                            <img src="{{ asset(getImage($about_company_section, 'thumb_image')) }}" alt="img" class="" />
                        </div>

                        <div
                            class="bg-buisness-red p-[30px] rounded-2xl absolute z-20 -bottom-8 sm:bottom-8 w-[295px] sm:left-8 mt-5 sm:mt-0 max-w-full">
                            {{ get_svg('about_card_shape') }}
                            <div class="flex items-center gap-2.5">
                                <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.28753 7.01343L8.90454 1.36956M8.90454 1.36956L3.26066 1.75255M8.90454 1.36956L1.01321 10.4099"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-sm text-white leading-8"> {{ __('We have') }}</span>
                            </div>
                            <h1 class="text-[27px] leading-[35px] text-white font-semibold tracking-tight max-w-[170px]"
                                data-scroll-qs="scroll" data-count-qs="25" data-type-qs="+ Years of Experience"
                                data-speed-qs="1000">
                                {{ getTranslatedValue($about_company_section, 'years_of_experience') }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end  -->
        <!-- count section  start  -->
        <section class="w-full pb-16 md:pb-[130px]">
            <div class="theme-container mx-auto">
                <div
                    class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-12 gap-[30px] h3-about-card relative overflow-hidden w-full">
                    <!-- card start  -->
                    <div data-aos="fade-left"
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">

                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_company_section, 'project_complete_count') }}"
                                data-type-qs="{{ getTranslatedValue($about_company_section, 'project_complete_keyword') }}"
                                data-speed-qs="1000">

                            </h1>
                            <div class="w-20 border-2 border-buisness-red"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_company_section, 'project_complete_text') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div data-aos="fade-left" data-aos-delay="100"
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">

                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_company_section, 'experience_count') }}"
                                data-type-qs="{{ getTranslatedValue($about_company_section, 'experience_keyword') }}"
                                data-speed-qs="1000">
                                {{ getTranslatedValue($about_company_section, 'experience_count') }}
                            </h1>
                            <div class="w-20 border-2 border-buisness-red"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_company_section, 'experience_text') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div data-aos="fade-left" data-aos-delay="200"
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">

                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_company_section, 'client_satisfaction_count') }}"
                                data-type-qs="{{ getTranslatedValue($about_company_section, 'client_satisfaction_keyword') }}"
                                data-speed-qs="1000">
                                {{ getTranslatedValue($about_company_section, 'client_satisfaction_count') }}
                            </h1>
                            <div class="w-20 border-2 border-buisness-red"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_company_section, 'client_satisfaction_text') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div data-aos="fade-left" data-aos-delay="300"
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">

                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_company_section, 'expert_team_member_count') }}"
                                data-type-qs="{{ getTranslatedValue($about_company_section, 'expert_team_member_keyword') }}"
                                data-speed-qs="1000">
                                {{ getTranslatedValue($about_company_section, 'expert_team_member_count') }}
                            </h1>
                            <div class="w-20 border-2 border-buisness-red"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_company_section, 'expert_team_member_text') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                </div>
            </div>
        </section>
        <!-- count section end  -->
        <!-- Our Benefit start  -->
        <section id="benefit" class="bg-main-gray">
            <div class="benefit-section-wrapper w-full py-16 md:py-[130px]">
                <div class="theme-container mx-auto">
                    <div class="w-full">
                        <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                            <span
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                                {{ getTranslatedValue($about_us_our_benefit, 'section_name') }}</span>
                            <h2 class="text-24 sm:text-48 font-semibold text-main-black text-center max-w-[653px]">
                                {{ getTranslatedValue($about_us_our_benefit, 'title') }}
                            </h2>
                        </div>
                    </div>
                    <div class="w-full grid grid-cols-6 xl:grid-cols-12 gap-5 sm:gap-[70px]">
                        <div class="col-span-6 flex justify-center items-center">
                            <img src="{{ asset(getImage($about_us_our_benefit, 'play_video_image')) }}" alt=""
                                class="max-w-full" />
                            <button type="button" aria-label="play-video"
                                class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center absolute">
                                <span
                                    class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-white relative">
                                    <span>
                                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.9611 8.29308L2.99228 12.8467C1.65896 13.6086 0 12.6459 0 11.1102V2.00295C0 0.467309 1.65896 -0.495425 2.99228 0.266469L10.9611 4.82011C12.3048 5.5879 12.3048 7.52529 10.9611 8.29308Z"
                                                fill="#FF002A" />
                                        </svg>
                                    </span>
                                    <div class="absolute w-full h-full rounded-full h5-play-btn-line1"></div>
                                    <div class="absolute w-[130%] h-[130%] rounded-full h5-play-btn-line2"></div>
                                    <div class="absolute w-[160%] h-[160%] rounded-full h5-play-btn-line3"></div>
                                </span>
                            </button>
                        </div>
                        <div class="col-span-6 flex items-center">
                            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-2 gap-[30px]">
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_1') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_1') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_2') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_2') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_3') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_3') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_4') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_4') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_5') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_5') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                                <!-- single card  -->
                                <div data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000"
                                    class="max-w-full relative before:w-full before:block before:h-full before:border before:border-buisness-red before:rounded-[10px] before:absolute before:left-0 before:top-0 before:z-0 before:scale-0 hover:before:scale-100 before:transition-all before:duration-500 before:origin-top-left after:w-full after:block after:h-full after:border after:border-buisness-red after:rounded-[10px] after:absolute after:left-0 after:top-0 after:z-0 after:scale-0 hover:after:scale-100 after:transition-all after:duration-500 before:ease-linear after:ease-linear after:origin-bottom-right">
                                    <div
                                        class="rounded-[10px] m-[1px] bg-white px-[26px] py-5 border border-transparent relative z-10">
                                        <h1 class="text-18 font-inter font-semibold text-main-black mb-1">
                                            {{ getTranslatedValue($about_us_our_benefit, 'title_6') }}
                                        </h1>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($about_us_our_benefit, 'description_6') }}
                                        </p>
                                    </div>
                                </div>
                                <!-- single card  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Our Benefit end  -->
        <!-- team start  -->
        <section class="bg-white py-16 pb-16 md:py-[130px]  relative">
            <div class="theme-container w-full mx-auto">
                <div class="flex flex-col lg:flex-row justify-between w-full">
                    <div class="">
                        <h1
                            class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                            {{ __('Team Member') }}
                        </h1>
                        <h2 class="text-main-black font-semibold text-24 sm:text-48">
                            {{ __('Experience Team Member') }}
                        </h2>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-10 items-center">
                        <h1
                            class="text-48 sm:text-65 text-main-black font-semibold justify-between w-full sm:w-fit flex items-center gap-4">
                            <span data-scroll-qs="scroll" data-count-qs="{{ $teams_count }}" data-type-qs="+"
                                data-speed-qs="1000">

                            </span>
                            <span class="text-20 sm:text-22 font-normal text-paragraph">
                            </span>
                        </h1>
                        <a href="{{ route('teams') }}">
                            <div class="home-two-btn-bg group bg-main-black border-main-black py-[15px]">
                                <span
                                    class="text-base group-hover:text-main-black text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ __('View All Member') }}
                                </span>
                                {{ get_svg('white-black') }}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="grid gap-[30px] grid-cols-3 md:grid-cols-6 lg:grid-cols-12 mt-10 md:mt-[70px]">
                    <!-- single card start  -->
                    @foreach ($teams as $team)
                        <div class="col-span-3">
                            <div class="flex justify-center items-center relative group/main overflow-hidden">
                                <img src="{{ $team?->image }}" alt="" class="w-full object-cover rounded-lg overflow-hidden" />
                                <!-- social links  -->
                                <div
                                    class="flex bg-buisness-red absolute bottom-5 translate-y-16 group-hover/main:translate-y-0 transition-all duration-300 rounded-md overflow-hidden">
                                    <a href="{{ $team?->facebook }}" target="blank" aria-label="facebook"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">

                                        {{ get_svg('facebook-red') }}
                                    </a>
                                    <a href="{{ $team?->twitter }}" target="blank" aria-label="twitter"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('twitter-red') }}
                                    </a>
                                    <a href="{{ $team?->instagram }}" target="blank" aria-label="instagram"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('instagram-red') }}
                                    </a>
                                    <a href="{{ $team?->linkedin }}" target="blank" aria-label="dribble"
                                        class="group w-10 h-10 flex justify-center items-center overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-white before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                        {{ get_svg('linkedin-red') }}
                                    </a>
                                </div>
                            </div>

                            <h1 class="text-22 font-semibold text-main-black mt-6 white_card_title">
                                <p>{{ $team?->name }}</p>
                            </h1>

                            <p class="text-paragraph mt-1">{{ $team?->designation }}</p>
                        </div>
                    @endforeach
                    <!-- single card start  -->
                </div>
            </div>
        </section>
        <!-- team end  -->

        <!-- testimonial start  -->
        <section class="testimonial-section py-[70px] sm:py-[130px]">
            <div class="theme-container mx-auto w-full">
                <h1 class="px-5 py-2 bg-white/5 border border-white/10 text-white font-medium rounded-[30px] w-fit mx-auto">
                    {{ getTranslatedValue($testimonial_content, 'section_title') }}
                </h1>
                <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-white text-center mx-auto mt-5">
                    {{ getTranslatedValue($testimonial_content, 'title') }}
                </h2>
                <div class="w-full">
                    <div class="swiper h1-story-slider-v2  mt-10 sm:mt-[70px]">
                        <div class="swiper-wrapper pb-[50px]">

                            @foreach ($testimonials as $index => $testimonial)
                            <div class="swiper-slide">
                                <div class="flex flex-col items-center relative pt-[52px] pb-10 px-11 bg-white rounded-2xl">
                                    <div class="w-[240px] aspect-square rounded-full testimonial-shape-bg absolute">
                                    </div>
                                    @include('theme.theme_7.svg.testimonial_red')
                                    <h1 class="font-medium text-18 text-center text-main-black mt-5 mb-8">
                                        {{ Str::limit($testimonial?->comment, 200) }}
                                    </h1>
                                    <img src="{{ asset($testimonial->image) }}" alt=""
                                        class="w-[56px] h-[56px] rounded-full object-cover" />
                                    <h1 class="font-semibold text-18 text-main-black text-center mt-3">
                                        {{ $testimonial?->name }}
                                    </h1>
                                    <p class="text-paragraph text-center font-medium text-sm">
                                        {{ $testimonial?->designation }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="relative w-fit mx-auto flex items-center">
                    <div class="flex justify-between absolute w-full">
                        <button
                            class="group h1-story-prev-v2 w-[30px] h-[30px] rounded-full flex items-center justify-center hover:bg-buisness-red before:hidden bg-white/20 border-white/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                            <span class="text-white ">
                                <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.5 8.25L0.75 4.5M0.75 4.5L4.5 0.75M0.75 4.5L10.75 4.5" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>


                            </span>
                        </button>
                        <button
                            class="group  h1-story-next-v2 w-[30px] h-[30px] rounded-full flex items-center justify-center hover:bg-buisness-red before:hidden bg-white/20 border-white/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                            <span class="text-white ">
                                <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 8.25L10.75 4.5M10.75 4.5L7 0.75M10.75 4.5L0.75 4.5" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </span>
                        </button>
                    </div>
                    <div class="h1-story-pagination-v2 px-10"></div>
                </div>
            </div>
        </section>



        <!-- testimonial end  -->
        <!-- clients start -->
        <section class="py-16 md:py-[130px]">
            <div class="theme-container mx-auto w-full border border-buisness-dark-black/5 rounded-2xl">
                <div class="w-full p-10 md:p-[70px]">
                    <h1 class="w-full text-center font-medium text-paragraph">
                        {{ __('We’ve more then 1250+ global clients') }}
                    </h1>
                    <div class="swiper h5-client_slider mt-11 overflow-hidden">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($partners as $partner)
                                <div class="swiper-slide">
                                    <img src="{{ asset($partner?->logo) }}" alt="" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- client end  -->

    </main>
@endsection
