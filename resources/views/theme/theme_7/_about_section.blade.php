<div class="bg-it-black">
    <!-- partner start  -->
    <section class="bg-it-black">
        <div class="max-w-[1616px] mx-auto">
            <div class="w-full pt-10 xl:pt-[123px]">
                <h1 class="w-full text-center font-medium text-white">
                    {{ getTranslatedValue($partner_content, 'title') }}
                </h1>
                <div class="swiper h7-partner_slider mt-11 overflow-hidden">
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <img src="{{ asset($partner->home_six_icon ?? $partner->logo) }}" alt="" />
                            </div>
                        @endforeach
                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <img src="{{ asset($partner->home_six_icon ?? $partner->logo) }}" alt="" />
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- partner end  -->
    <!-- about start  -->
    <section class="bg-it-black py-16 sm:py-[130px]">
        <div class="theme-container mx-auto grid lg:grid-cols-12 xl:gap-20 lg:gap-16 gap-10 items-center">
            <div class="lg:col-span-6 col-span-full">
                <div class="relative w-fit">
                    <img src="{{ asset(getImage($about_company_content, 'about_company_image')) }}" alt="" class="" />
                    <div
                        class="w-[100px] aspect-square rounded-[10px] bg-it-blue sm:flex hidden justify-center items-center absolute -top-[50px] -right-[50px]">
                        @include('theme.theme_7.svg.company_top_svg')
                    </div>
                </div>
            </div>
            <div class="lg:col-span-6 col-span-full">
                <div class="flex items-center h-full">
                    <div>
                        <h1 class="px-5 bg-white/10 border border-white/20 text-white font-medium rounded-[30px] w-fit">
                            {{ getTranslatedValue($about_company_content, 'section_title') }}
                        </h1>
                        <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-white mt-5">
                            {{ getTranslatedValue($about_company_content, 'title') }}
                        </h2>
                        <p class="text-white mt-9 mb-10">
                            {{ getTranslatedValue($about_company_content, 'short_description') }}
                        </p>

                        <a href="{{ getTranslatedValue($about_company_content, 'button_url') }}">
                            <div
                                class="home-two-btn-white-rev group border-white/10 before:bg-it-blue after:bg-it-blue hover:border-it-blue transition-all duration-500 w-fit">
                                <span
                                    class="text-base group-hover:text-white text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                                    {{ __('Learn More') }}
                                </span>
                                @include('theme.theme_7.svg.theme_7_company_button_url')
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about end  -->
</div>