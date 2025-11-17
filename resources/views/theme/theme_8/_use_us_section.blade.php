<section class="py-16 md:py-[130px]">
    <div class="theme-container w-full mx-auto grid lg:grid-cols-12 xl:gap-20 lg:gap-16 gap-10 items-center">
        <div class="lg:col-span-6 col-span-full h-full flex flex-col justify-center">
            <h1 class="px-5 bg-blue-sass/10 border border-blue-sass/20 text-blue-sass font-medium rounded-[30px] w-fit">
                {{ getTranslatedValue($why_use_us_content, 'section_title') }}
            </h1>
            <h2 class="sm:text-48 text-24 font-semibold text-main-black mb-[32px] mt-[18px] w-full max-w-[487px]">
                {{ getTranslatedValue($why_use_us_content, 'title') }}
            </h2>
            <p class="text-paragraph mb-[45px] w-full max-w-[508px]">
                {{ getTranslatedValue($why_use_us_content, 'short_description') }}
            </p>

            <a href="{{ getTranslatedValue($why_use_us_content, 'get_start_button_url') }}">
                <div
                    class="home-two-btn-white-rev group bg-blue-sass before:bg-white after:bg-white hover:border-blue-sass transition-all duration-500 w-fit">
                    <span
                        class="text-base group-hover:text-blue-sass text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                        {{ getTranslatedValue($why_use_us_content, 'get_start_button_text') }}
                    </span>
                    @include('theme.theme_8.svg.arrow_new')
                </div>
            </a>
        </div>
        <div class="lg:col-span-6 col-span-full">
            <img src="{{ asset(getImage($why_use_us_content, 'why_use_us_image')) }}" alt="" class="" />
        </div>
    </div>
</section>
