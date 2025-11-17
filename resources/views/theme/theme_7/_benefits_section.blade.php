<section class="py-[70px] sm:py-[130px] bg-white">
    <div class="theme-container mx-auto grid grid-cols-6 lg:grid-cols-12 sm:gap-[63px]">
        <div class="col-span-6">
            <h1 class="px-5 bg-main-gray border border-it-blue/20 text-it-blue font-medium rounded-[30px] w-fit">
                {{ getTranslatedValue($business_benefits_content, 'section_title') }}
            </h1>
            <h2 class="font-semibold text-2xl sm:text-48 text-main-black mt-5">
                {{ getTranslatedValue($business_benefits_content, 'title') }}
            </h2>
            <ul class="mb-[30px] max-w-full">
                <li class="flex flex-col sm:flex-row gap-5 items-start mt-10">
                    <div class="w-[30px] aspect-square rounded-full bg-it-blue flex items-center justify-center">
                        @include('theme.theme_7.svg.tick_mark_icon')
                    </div>
                    <div class="flex-1">
                        <h1 class="text-main-black font-semibold text-20">
                            {{ getTranslatedValue($business_benefits_content, 'title_1') }}
                        </h1>
                        <p class="text-paragraph max-w-[466px]">
                            {{ getTranslatedValue($business_benefits_content, 'description_1') }}
                        </p>
                    </div>
                </li>
                <li class="flex flex-col sm:flex-row gap-5 items-start mt-[30px]">
                    <div class="w-[30px] aspect-square rounded-full bg-it-blue flex items-center justify-center">
                        @include('theme.theme_7.svg.tick_mark_icon')
                    </div>
                    <div class="flex-1">
                        <h1 class="text-main-black font-semibold text-20">
                            {{ getTranslatedValue($business_benefits_content, 'title_2') }}
                        </h1>
                        <p class="text-paragraph max-w-[466px]">
                            {{ getTranslatedValue($business_benefits_content, 'description_2') }}
                        </p>
                    </div>
                </li>
                <li class="flex flex-col sm:flex-row gap-5 items-start mt-[30px]">
                    <div class="w-[30px] aspect-square rounded-full bg-it-blue flex items-center justify-center">
                        @include('theme.theme_7.svg.tick_mark_icon')
                    </div>
                    <div class="flex-1">
                        <h1 class="text-main-black font-semibold text-20">
                            {{ getTranslatedValue($business_benefits_content, 'title_3') }}
                        </h1>
                        <p class="text-paragraph max-w-[466px]">
                            {{ getTranslatedValue($business_benefits_content, 'description_3') }}
                        </p>
                    </div>
                </li>
            </ul>
            <a href="{{ getTranslatedValue($business_benefits_content, 'read_more_button_url') }}">
                <div class="home-two-btn-bg py-3.5 group bg-it-black border-it-black w-fit mt-2.5">
                    <span
                        class="text-base text-white group-hover:text-it-black transition-all duration-300 font-semibold font-inter relative z-10">
                        {{ __('Learn More') }}
                    </span>
                    @include('theme.theme_7.svg.business_learn_more')
                </div>
            </a>
        </div>
        <div class="col-span-6 mt-5 md:mt-0">
            <div class="flex w-full relative justify-end">
                <img src="{{ asset(getImage($business_benefits_content, 'main_image')) }}" alt="" class="max-w-full" />
                <div
                    class="bg-it-blue p-4 sm:p-[30px] rounded-2xl absolute z-20 bottom-10 sm:bottom-16 left-4 sm:left-0 w-48 sm:w-[295px]">

                    @include('theme.theme_7.svg.card_shape')

                    <div class="flex items-center gap-2.5">
                        @include('theme.theme_7.svg.experience_direction')
                        <span class="text-sm text-white leading-8">{{ __('We have ') }}</span>
                    </div>
                    <h1 class="text-[27px] leading-[35px] text-white font-semibold tracking-tight max-w-[170px]"
                        data-scroll-qs="scroll"
                        data-count-qs="{{ getTranslatedValue($business_benefits_content, 'experience_count') }}"
                        data-type-qs="+ Years of Experience" data-speed-qs="1000">
                        {{ getTranslatedValue($business_benefits_content, 'experience_text') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>