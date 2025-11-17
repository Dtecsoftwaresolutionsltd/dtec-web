<section class="">
    <div class="theme-container w-full mx-auto">
        <div class="grid grid-cols-6 lg:grid-cols-12 gap-y-10">
            <div class="col-span-6">
                <div class="max-w-[476px]">
                    <h1
                        class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium">
                        {{ getTranslatedValue($about_content_5, 'sub_title') }}
                    </h1>
                    <h2 class="text-24 sm:text-48 font-semibold text-main-black pt-5">
                        {{ getTranslatedValue($about_content_5, 'title') }}
                    </h2>
                    <p class="text-paragraph pt-5 sm:pt-10">
                        {{ getTranslatedValue($about_content_5, 'description') }}
                    </p>
                    <ul class="flex flex-col gap-3 mt-6 mb-11">
                        <li
                            class="flex items-center gap-2.5 before:h-[18px] before:w-[18px] before:rounded-full before:bg-buisness-red tick-before before:flex before:justify-center before:items-center text-main-black">
                            {{ getTranslatedValue($about_content_5, 'feature_text_one') }}
                        </li>
                        <li
                            class="flex items-center gap-2.5 before:h-[18px] before:w-[18px] before:rounded-full before:bg-buisness-red tick-before before:flex before:justify-center before:items-center text-main-black">
                            {{ getTranslatedValue($about_content_5, 'feature_text_two') }}
                        </li>
                        <li
                            class="flex items-center gap-2.5 before:h-[18px] before:w-[18px] before:rounded-full before:bg-buisness-red tick-before before:flex before:justify-center before:items-center text-main-black">
                            {{ getTranslatedValue($about_content_5, 'feature_text_three') }}
                        </li>
                    </ul>
                    <a href="{{ getTranslatedValue($about_content_5, 'button_url') }}">
                        <div
                            class="home-two-btn-bg group bg-buisness-dark-black border-buisness-dark-black py-[15px] w-fit">
                            <span
                                class="text-base group-hover:text-buisness-dark-black text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                {{ getTranslatedValue($about_content_5, 'button_text') }}
                            </span>
                            {{ get_svg('white-black') }}
                        </div>
                    </a>
                </div>
            </div>
            <div class="relative col-span-6 flex flex-col sm:flex-row justify-center items-center gap-[30px]">
                {{ get_svg('rounded_shape') }}
                <img data-aos="fade-left" src="{{ asset(getImage($about_content_5, 'about_image_one')) }}" alt=""
                    class="relative z-10 hidden sm:block lg:hidden xl:block aspect-[300/600]" />
                <img data-aos="fade-left" data-aos-delay="100"
                    src="{{ asset(getImage($about_content_5, 'about_image_two')) }}" alt="" class="relative z-10 w-full aspect-[300/500] " />
                <div class="bg-buisness-red p-[30px] rounded-2xl absolute z-20 bottom-8 w-[295px]">
                    <span class="absolute right-2 top-bottom-moving">
                        {{ get_svg('about_card_shape') }}
                    </span>
                    <div class="flex items-center gap-2.5">
                        {{ get_svg('about5') }}
                        <span class="text-sm text-white leading-8">{{ __('We have') }}</span>
                    </div>
                    <h1 class="text-[27px] leading-[35px] text-white font-semibold tracking-tight max-w-[170px]"
                        data-scroll-qs="scroll" data-count-qs="25" data-type-qs="+ Years of Experience"
                        data-speed-qs="1000">
                        {{ getTranslatedValue($about_content_5, 'experience_text') }}
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>