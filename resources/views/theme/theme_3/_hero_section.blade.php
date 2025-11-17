<section id="home-three-hero" class="bg-main-black relative mt-8 md:mt-0 pb-16 md:pb-[130px] h3-hero overflow-x-hidden">
    <!-- background -->

    <div id="hero-three-cm-anim" class="absolute left-0 top-0">
        <div data-depth="0.30" class="layer">
            <img src="{{ asset(getImage($hero_content_3, 'animation_image')) }}" alt="hero-bg" />
        </div>
    </div>
    <div class="theme-container w-full mx-auto xl:pt-24 z-10">
        <div class="w-full max-w-[792px] mx-auto flex flex-col items-center pt-20 xl:pt-[150px]">
            <div
                class="flex gap-2.5 relative z-10 px-3 sm:px-6 py-2 sm:py-3 rounded-[40px] border border-white/10 bg-white/5 items-center">
                {{ get_svg('star') }}
                <span class="font-semibold text-18 md:text-20 text-white">
                    {{ getTranslatedValue($hero_content_3, 'sub_title') }}
                </span>
            </div>
            <h1 class="text-center font-semibold text-3xl md:text-65 text-white mt-8 md:mt-10">
                {{ getTranslatedValue($hero_content_3, 'title') }}
            </h1>
            <h2 class="text-20 md:text-24 text-center text-white mt-8 md:mt-14">
                {{ getTranslatedValue($hero_content_3, 'description') }}
            </h2>
            <div class="flex flex-col md:flex-row gap-6 mt-8 md:mt-12">
                <a href=" {{ getTranslatedValue($hero_content_3, 'left_button_url') }}">
                    <div class="home-two-btn-bg group bg-[#4A7DFF] border-[#4A7DFF] py-2 sm:py-[11px]">
                        <span
                            class="text-base group-hover:text-[#4A7DFF] text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                            {{ getTranslatedValue($hero_content_3, 'left_button_text') }}
                        </span>
                        <span class="text-white group-hover:text-[#4A7DFF]">
                            {{ get_svg('arrow3') }}
                        </span>
                    </div>
                </a>
                <a href=" {{ getTranslatedValue($hero_content_3, 'right_button_url') }}">
                    <div class="home-two-btn-white-rev group">
                        <span
                            class="text-base group-hover:text-[#4A7DFF] text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                            {{ getTranslatedValue($hero_content_3, 'right_button_text') }}
                        </span>
                        <span class="text-white group-hover:text-[#4A7DFF]">
                            {{ get_svg('arrow3') }}
                        </span>

                    </div>
                </a>
            </div>
        </div>
        <div class="flex justify-center items-center" id="hero-banner">
            <img src="{{ asset(getImage($hero_content_3, 'hero_image')) }}" alt="" class="relative z-10 pt-12 img" />
            <span class="hidden lg:block absolute z-0 translate-y-12">
                {{ get_svg('home-3-hero-shape') }}
            </span>
        </div>
        <div class="w-full pt-10 xl:pt-[123px]">
            <h1 class="w-full text-center font-medium text-white">
                {{ __('We’ve more then 1250+ global clients') }}
            </h1>
            <div class="swiper h3-partner_slider mt-11 overflow-hidden">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <img src="{{ asset($partner->home_three_icon ?? $partner->logo) }}" alt="logo" />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>