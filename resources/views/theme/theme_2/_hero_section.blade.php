<section class="w-full bg-blue-seo relative overflow-hidden pt-[144px]">
    <!-- content start -->
    <div class="w-full max-w-[1506px] relative theme-container mx-auto grid grid-cols-6 xl:grid-cols-12 z-10">

        @include('theme.svg.hero_dot_image')

        <div class="col-span-full xl:col-span-5 my-auto">
            <h1 class="text-4xl md:text-65 tracking-tight font-semibold text-white pr-2" data-depth="-0.28">
                {{ getTranslatedValue($hero_content, 'heading_short') }} <br class="hidden md:block" />

                {{ getTranslatedValue($hero_content, 'heading') }}

            </h1>
            <p class="text-18 font-medium font-inter text-white mt-5 md:mt-5">
                {{ getTranslatedValue($hero_content, 'description') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-3 sm:gap-6 mt-5 md:mt-12">
                <a href="{{ getTranslatedValue($hero_content, 'left_button_url') }}">
                    <div class="home-two-btn-white group">
                        <span
                            class="text-base group-hover:text-white transition-all duration-300 font-semibold font-inter py-1 relative z-10">
                            {{ getTranslatedValue($hero_content, 'left_button_text') }}
                        </span>
                        @include('theme.svg.arrow_home_two')
                    </div>
                </a>
                <a href="{{ getTranslatedValue($hero_content, 'right_button_url') }}">
                    <div class="home-two-btn-white-rev group">
                        <span
                            class="text-base group-hover:text-blue-seo text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                            {{ getTranslatedValue($hero_content, 'right_button_text') }}
                        </span>
                        @include('theme.svg.white_arrow')
                    </div>
                </a>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 sm:gap-[70px] mt-5 md:mt-12">
                <div class="pr-12 py-1.5 sm:border-r-2 border-white">
                    <p class="text-white text-base leading-[30px] font-semibold">
                        {{ __('Avg rating') }}
                        {{ getTranslatedValue($hero_content, 'average_ratng') }}
                    </p>
                    <div class="flex gap-2.5 mt-4">
                        @for ($i = 0; $i < 5; $i++) @include('theme.svg.rating') @endfor
                    </div>
                </div>
                <div class="">
                    <p class="text-white text-base leading-[30px] font-semibold" data-scroll-qs="scroll"
                        data-count-qs="5" data-type-qs="m+ Global Customer" data-speed-qs="1000">

                        {{ getTranslatedValue($hero_content, 'global_customer') }}
                        {{ __('m+ Global Customer') }}
                    </p>
                    <div class=" w-100 flex relative mt-4 cursor-pointer">
                        <img src="{{ asset(getImage($hero_content, 'hero_customer_image')) }}" alt=""
                            class="object-cover rounded-full overflow-hidden hover:z-10 transition-all duration-300" />
                    </div>
                </div>
            </div>
        </div>
        <!-- circle animations elements  -->
        <img src="{{ asset(getImage($hero_content, 'hero_image')) }}" alt="img"
            class="col-span-full xl:col-span-7 self-end relative right-0 2xl:-right-52 bottom-0 moving-h2-hero-main-img" />
    </div>
    <div
        class="rotating_circle z-0 absolute flex justify-center items-center -bottom-4 xl:-bottom-[150px] right-0 xl:-right-20 h-0 w-full xl:w-[880px] 2xl:max-w-[1250px]">
        <img src="{{ asset(home2_hero_animation_image_1()) }}" alt="" class="w-full" />
        <img src="{{ asset(home2_hero_animation_image_2()) }}" alt="" class="absolute w-10/12" />
        <img src="{{ asset(home2_hero_animation_image_3()) }}" alt="" class="absolute w-8/12" />
        <img src="{{ asset(home2_hero_animation_image_4()) }}" alt="" class="absolute w-6/12" />
    </div>
    <!-- content end  -->
</section>