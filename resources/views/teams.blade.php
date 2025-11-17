@extends('inner_layout')
@section('title')
    <title>{{ __('Team Members') }}</title>
    <meta name="title" content="{{ __('Team Members') }}">
    <meta name="description" content="{{ __('Team Member Page') }}">
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Team Members') }}" />
        <!-- About start  -->
        <section class="pt-16 md:pt-[130px]">
            <div class="theme-container mx-auto px-[78px] grid grid-cols-5 xl:grid-cols-10 gap-y-16 md:gap-x-[140px]">
                <div class="col-span-5 flex flex-col justify-center">
                    <h1
                        class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                        {{ getTranslatedValue($team_hero, 'sub_title') }}
                    </h1>
                    <h2 class="text-main-black font-semibold text-24 sm:text-48 ">
                        {{ getTranslatedValue($team_hero, 'title') }}
                    </h2>
                    <p class="text-paragraph mt-10">
                        {{ getTranslatedValue($team_hero, 'long_description') }}
                    </p>
                    <hr class="my-[70px]" />
                    <div class="flex justify-between gap-4 mb-10">
                        <div class="">
                            <h1 class="text-black text-34 sm:text-48 font-semibold" data-scroll-qs="scroll"
                                data-count-qs="{{ $teams?->count() }}" data-type-qs="+" data-speed-qs="1000"></h1>
                            <p class="text-paragraph">{{ __('Team Member') }}</p>
                        </div>
                        <div class="">
                            <h1 class="text-black text-34 sm:text-48 font-semibold" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($team_hero, 'counter_number_one') }}" data-type-qs="+"
                                data-speed-qs="1000"></h1>
                            <p class="text-paragraph">{{ getTranslatedValue($team_hero, 'counter_details_one') }}</p>
                        </div>
                        <div class="">
                            <h1 class="text-black text-34 sm:text-48 font-semibold" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($team_hero, 'counter_number_two') }}" data-type-qs="k+"
                                data-speed-qs="1000"></h1>
                            <p class="text-paragraph">{{ getTranslatedValue($team_hero, 'counter_details_two') }}</p>
                        </div>
                    </div>
                    <a href="{{ getTranslatedValue($team_hero, 'button_url') }}">
                        <div class="home-two-btn-bg py-3 group bg-main-black border-main-black inline-flex">
                            <span
                                class="text-base text-white group-hover:text-main-black transition-all duration-300 font-inter relative z-10">
                                {{ getTranslatedValue($team_hero, 'button_text') }}
                            </span>
                            {{ get_svg('white-black') }}
                        </div>
                    </a>
                </div>
                <div class="col-span-5 grid grid-cols-2 md:grid-cols-3 gap-6">
                    @if (is_array($team_hero_image))
                        @php
                            $delay = 0;
                        @endphp
                        @foreach ($team_hero_image as $key => $image)
                            <div data-aos="flip-left" data-aos-delay="{{ $key == 'image_one' ? $delay : ($delay += 100) }}"
                                data-aos-duration="1000" class="col-span-1 w-full rounded-[20px] overflow-hidden">
                                <img src="{{ asset($image) }}" alt="" class="w-full" />
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- About end  -->
        <!-- team start  -->
        <section class="bg-white py-16 md:py-[130px] relative">
            <div class="theme-container w-full mx-auto">
                <div class="flex flex-col justify-center items-center w-full">
                    <h1
                        class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                        {{ __('Team Member') }}
                    </h1>
                    <h2 class="text-main-black font-semibold text-24 sm:text-48">
                        {{ __('Experience Team Member') }}
                    </h2>
                </div>
                <div class="grid gap-[30px] grid-cols-3 md:grid-cols-6 lg:grid-cols-12 mt-10 md:mt-[70px]">
                    @foreach ($teams as $key => $team)
                        <!-- single card start  -->
                        <div data-aos="fade-up" data-aos-delay="{{ $key == 0 ? 0 : $key * 100 }}" data-aos-duration="1000"
                            class="col-span-3">
                            <div class="flex justify-center items-center relative group/main overflow-hidden">
                                <img src="{{ asset($team?->image) }}" alt=""
                                    class="w-full object-cover rounded-lg overflow-hidden" />
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
                                <p> {{ $team?->name }}</p>
                            </h1>

                            <p class="text-paragraph mt-1">{{ $team?->designation }}</p>
                        </div>
                        <!-- single card end  -->
                    @endforeach
                </div>
            </div>
        </section>
        <!-- team end  -->
    </main>
@endsection
