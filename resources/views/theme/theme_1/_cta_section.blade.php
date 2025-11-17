<section data-aos="fade-up" id="consultation">
    <div class="consultation-section-wrapper w-full relative overflow-hidden">
        <div class="theme-container mx-auto relative z-10">
            <div
                class="overflow-hidden w-full py-[80px] xl:pl-[110px] pl-10 border border-[#e7e3fa] rounded-[20px] bg-main-gray md:flex items-center relative">
                <div class="absolute bottom-0 left-0 pointer-events-none">
                    <span>
                        {{ get_svg('bg_dot_shape') }}
                    </span>
                </div>
                <div class="md:w-[432px] w-full">
                    <span class="section-title-top-tag mb-5">{{ getTranslatedValue($cta_content, 'sub_title') }}</span>
                    <h2 class="md:text-48 text-34 font-semibold text-main-black mb-[32px]">
                        {{ getTranslatedValue($cta_content, 'title') }}
                    </h2>
                    <p class="text-paragraph text-18 mb-[45px]">
                        {{ getTranslatedValue($cta_content, 'description') }}
                    </p>

                    <a href=" {{ getTranslatedValue($cta_content, 'button_url') }}">
                        <div class="home-two-btn-bg py-3 group bg-purple border-purple inline-flex">
                            <span
                                class="text-base text-white group-hover:text-purple transition-all duration-300 font-inter relative z-10">
                                {{ getTranslatedValue($cta_content, 'button_text') }}
                            </span>
                            {{ get_svg('home_cta_white') }}
                        </div>
                    </a>
                </div>
                <div class="flex-1">
                    <div id="consaltaion-mouse-move-anim" class="flex justify-end w-full relative mt-10">
                        <div class="mr-10 moving-h2-hero-main-img">
                            <span>
                                {{ get_svg('consultation_shape') }}
                            </span>
                        </div>
                        <div data-depth="0.40" class="layer">
                            <img src="{{ asset(getImage($cta_content, 'image_1')) }}" alt="" />
                        </div>
                        <div data-depth="0.20" class="layer absolute md:right-40 right-10">
                            <img src="{{ asset(getImage($cta_content, 'image_2')) }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-between absolute top-20">
            <div id="line-lottie-style-2"></div>
            <div class="transform rotate-180" id="line-lottie2-style-2"></div>
        </div>
    </div>
</section>
