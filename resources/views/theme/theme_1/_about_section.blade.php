<section id="home-one-about">
    <div class="home-one-about-wrapper w-full xl:pb-[185px] pb-16">
        <div class="theme-container mx-auto">
            <div class="w-full grid xl:grid-cols-2 grid-cols-1 md:gap-[130px] gap-10 md:items-center relative">
                <div class="about-thumbnil-area w-full">
                    <div data-aos="fade-right"
                        class="xl:absolute relative lg:-left-16 left-0 top-0 lg:w-[682px] w-full">
                        <div id="about-shape-mouse-anim">
                            <div data-depth="0.20" class="layer">
                                <div data-aos="fade-right" class="thumbnil-wrapper md:block hidden">
                                    {{ get_svg(('about-shape')) }}
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-right" class="thumbnil-main md:absolute left-0 -bottom-16 w-full">
                            <div class="flex justify-center w-full">
                                <img src="{{ asset(getImage($about_content, 'about_main_image')) }}" alt=""
                                    class="rounded-[20px] overflow-hidden" />
                            </div>
                        </div>
                        <div class="w-full md:block hidden absolute left-0 top-0 h-[550px]">
                            <div id="home-one-about-mouse-anim" class="h-full">
                                <div class="layer absolute left-2/3 top-36" data-depth="0.30">
                                    <div data-aos="fade-left" data-aos-delay="100"
                                        class="inline-block h-fit px-[30px] py-2.5 bg-purple text-pone shadow-small shadow-purple text-white rounded-full rounded-bl-none">
                                        {{ getTranslatedValue($about_content, 'marketing_growth') }}
                                    </div>
                                </div>
                                <div data-depth="0.50" class="layer absolute left-1/2 bottom-0">
                                    <div data-aos="fade-left" data-aos-delay="200"
                                        class="w-[296px] h-fit flex justify-between p-[7px] pl-5 bg-white shadow-style-one rounded-full items-center">
                                        <span
                                            class="text-sm font-semibold text-main-black text-nowrap">{{ getTranslatedValue($about_content, 'trusted_clients') }}</span>
                                        <img src="{{ asset(getImage($about_content, 'client_image')) }}"
                                            alt="client_image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-article-area">
                    <span class="section-title-top-tag mb-5">{{ getTranslatedValue($about_content, 'sub_title') }}</span>
                    <h2 class="md:text-48 text-34 font-semibold text-main-black mb-6 md:w-[80%] w-full xl:w-full">
                        {{ getTranslatedValue($about_content, 'heading') }}
                    </h2>
                    <p class="text-paragraph mb-6">
                        {{ getTranslatedValue($about_content, 'description') }}
                    </p>
                    <ul class="flex flex-wrap md:gap-[30px] gap-5 mb-10">
                        <li
                            class="flex space-x-2.5 items-center text-purple font-medium px-5 py-3 bg-main-gray border border-[#e7e3fa] leading-none rounded-full">
                            <span>
                                {{ get_svg('feature_svg') }}
                            </span>
                            <span>{{ getTranslatedValue($about_content, 'feature_text_one') }}</span>
                        </li>
                        <li
                            class="flex space-x-2.5 items-center text-purple font-medium px-5 py-3 bg-main-gray border border-[#e7e3fa] leading-none rounded-full">
                            <span>
                                {{ get_svg('feature_svg') }}
                            </span>
                            <span>{{ getTranslatedValue($about_content, 'feature_text_two') }}</span>
                        </li>
                        <li
                            class="flex space-x-2.5 items-center text-purple font-medium px-5 py-3 bg-main-gray border border-[#e7e3fa] leading-none rounded-full">
                            <span>
                                {{ get_svg('feature_svg') }}
                            </span>
                            <span>{{ getTranslatedValue($about_content, 'feature_text_three') }}</span>
                        </li>
                        <li
                            class="flex space-x-2.5 items-center text-purple font-medium px-5 py-3 bg-main-gray border border-[#e7e3fa] leading-none rounded-full">
                            <span>
                                {{ get_svg('feature_svg') }}
                            </span>
                            <span>{{ getTranslatedValue($about_content, 'feature_text_four') }}</span>
                        </li>
                    </ul>
                    <a href="{{ getTranslatedValue($about_content, 'button_url') }}">
                        <div class="home-two-btn-bg py-3 group bg-purple border-purple inline-flex">
                            <span
                                class="text-base text-white group-hover:text-purple transition-all duration-300 font-semibold font-inter relative z-10">
                                <span>{{ getTranslatedValue($about_content, 'button_text') }}</span>
                            </span>
                            {{ get_svg('home_cta_white') }}
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>