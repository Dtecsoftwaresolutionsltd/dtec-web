<section id="hero" class="w-full">
    <div class="absolute left-32 top-0 z-0">
        <img src="{{ asset(getImage($hero_content, 'hero_shap_one_image')) }}" alt="">
    </div>
    <div class="hero-section-wrapper w-full relative">
        <div class="theme-container mx-auto relative z-10">
            <div class="flex justify-center mt-[130px] xl:mt-[247px]">
                <div>
                    <h1
                        class="text-24 sm:text-48 md:text-[75px] md:leading-[95px] font-semibold text-white text-center mb-7 md:mb-[60px] w-full max-w-[844px] mx-auto">
                        {{ getTranslatedValue($hero_content, 'heading') }}
                        <span class="text-purple">{{ getTranslatedValue($hero_content, 'heading_short') }}</span>
                    </h1>
                    <div class="flex justify-center mb-5 md:mb-[55px] w-full">
                        <p class="text-white sm:text-18 font-medium text-center w-full max-w-[750px]">
                            {{ getTranslatedValue($hero_content, 'description') }}
                        </p>
                    </div>
                    <div class="flex justify-center mb-[100px]">
                        <div class="flex flex-col md:flex-row gap-10 items-center">
                            <a href="{{ getTranslatedValue($hero_content, 'left_button_url') }}">
                                <div class="home-two-btn-bg py-3.5 group h4_contact_bg border-transparent w-fit mt-2.5">
                                    <span
                                        class="text-pone text-white group-hover:text-purple transition-all duration-300 font-inter relative z-10">
                                        {{ getTranslatedValue($hero_content, 'left_button_text') }}
                                    </span>
                                    @include('theme.svg.arrow_right')
                                </div>
                            </a>
                            <div class="flex space-x-8 items-center">
                                <button type="button" aria-label="play-video"
                                    class="video-play-btn flex space-x-8 items-center hero_video_play_btn">
                                    <span
                                        class="flex size-[56px] rounded-full justify-center items-center bg-white bg-opacity-5 relative">
                                        <span>
                                            @include('theme.svg.video_icon')
                                        </span>
                                        <div class="absolute w-full h-full left-0 top-0 rounded-full play-btn-line1">
                                        </div>
                                        <div class="absolute w-full h-full rounded-full play-btn-line2"></div>
                                        <div class="absolute w-full h-full rounded-full play-btn-line3"></div>
                                    </span>
                                    <span
                                        class="text-white font-semibold border-b border-white">{{ getTranslatedValue($hero_content, 'right_button_text') }}</span>
                                </button>
                            </div>

                        </div>
                    </div>
                    <div id="hero-banner" class="hero-banner flex justify-center w-full xl:min-h-[730px]">
                        <div class="img relative">
                            <img src="{{ asset(getImage($hero_content, 'hero_thumb_image')) }}" alt=""
                                class="relative z-10" />
                            <div class="absolute -top-8 md:-top-[80px] left-0 w-full">
                                <div class="flex justify-center w-full">

                                    @include('theme.theme_4.svg.hero_shape_two')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full pt-10 md:pt-32">
                <h1 class="w-full text-center font-medium text-white">
                    {{ __('We’ve more then 1250+ global clients') }}
                </h1>
                <div
                    class="swiper h3-partner_slider mt-11 overflow-hidden swiper-initialized swiper-horizontal swiper-backface-hidden">
                    <div class="swiper-wrapper"
                        aria-live="off">
                        <!-- Slides -->
                        @foreach ($partners as $partner)
                            <div class="swiper-slide swiper-slide-prev" role="group"
                                aria-label="4 / 7" data-swiper-slide-index="3">
                                <img src="{{ asset($partner->home_four_icon ?? $partner->logo) }}" alt="" />
                            </div>
                        @endforeach


                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>

        <div class="absolute right-[137px] top-[260px]">
            @include('theme.theme_4.svg.hero_shape_three')
        </div>
        <div
            class="w-full h-[250px] sm:h-[350px] md:h-[595px] overflow-hidden absolute left-0 -bottom-10 sm:-bottom-24 md:-bottom-[130px]">
            <div class="line-shape w-full h-[1000px]"></div>
        </div>
        <div class="shape-1 absolute left-40 top-96 z-10">
            @include('theme.theme_4.svg.shape_one')
        </div>
        <div class="shape-3 absolute left-96 top-[550px] z-10">
            @include('theme.theme_4.svg.shape_two')
        </div>
        <div class="shape-2 absolute right-96 top-96 z-10">
            @include('theme.theme_4.svg.shape_three')
        </div>

        <div class="shape-4 absolute right-96 top-[550px] z-10">
            @include('theme.theme_4.svg.shape_four')
        </div>
    </div>
</section>
