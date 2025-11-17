<section class="py-16 md:py-[130px]">
    <div class="theme-container w-full mx-auto">
        <div
            class="grid grid-cols-6 gap-7 md:grid-cols-10 h4-cta-bg rounded-xl py-10 md:py-[70px] px-5 md:px-[110px] relative">
            <div class="col-span-6 relative z-10">
                <div
                    class="px-5 py-0.5 font-medium text-white rounded-[30px] border border-white/10 mb-5 w-fit bg-main-gray/5">
                    <span>{{ getTranslatedValue($cta_content, 'sub_title') }}</span>
                </div>
                <div class="mb-4">
                    <h2 class="text-white font-semibold text-24 sm:text-48 max-w-[449px]">
                        {{ getTranslatedValue($cta_content, 'title') }}
                    </h2>
                </div>
                <p class="text-18 text-white mb-8">
                    {{ getTranslatedValue($cta_content, 'description') }}
                </p>

                <a href="{{ getTranslatedValue($cta_content, 'button_url') }}" class="">
                    <div
                        class="group w-fit bg-white px-10 h-[56px] flex justify-center items-center gap-2.5 rounded-[40px] relative price_button_bg before:inline-block before:absolute before:w-full before:h-full before:scale-x-0 hover:before:scale-x-100 overflow-hidden before:transition-transform before:ease-out before:duration-300 before:origin-right hover:before:origin-left before:z-0  border border-white">
                        <span
                            class="font-inter font-semibold text-purple relative z-10 group-hover:text-white transition-all duration-300">
                            {{ getTranslatedValue($cta_content, 'button_text') }}
                        </span>
                        <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="group-hover:stroke-white transition-all duration-300"
                                d="M1 10.5L4.79289 6.70711C5.12623 6.37377 5.29289 6.20711 5.29289 6C5.29289 5.79289 5.12623 5.62623 4.79289 5.29289L1 1.5"
                                stroke="#794AFF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </a>
            </div>

            <div id="home-four-cta-mouse-move" class="col-span-4 flex justify-center items-center relative">
                <div data-depth="0.80" class="layer relative z-10">
                    <img data-aos="zoom-in" data-aos-delay="100" src="{{ asset(getImage($cta_content, 'cta_image')) }}"
                        alt="" />
                </div>
                <div data-depth="0.20" class="layer absolute -right-10 z-0">
                    <img src="{{ asset(getImage($cta_content, 'cta_shape_two')) }}" alt="">
                    </span>
                </div>
            </div>
            <span class="absolute bottom-0 left-0 z-0">
                <img src="{{ asset(getImage($cta_content, 'cta_shape_one')) }}" alt="">
            </span>
        </div>
    </div>
</section>