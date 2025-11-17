<section class="bg-white w-full py-16 md:py-[130px] overflow-x-hidden">
            <div class="theme-container w-full mx-auto">
                <div class="grid grid-cols-6 lg:grid-cols-12 gap-y-10">
                    <div class="col-span-6">
                        <h1 class="border text-purple border-purple/10 py-0.5 px-5 rounded-[30px] w-fit bg-main-gray">
                            {{ getTranslatedValue($about_content_3,'sub_title') }}
                        </h1>
                        <h2 class="text-24 sm:text-48 font-semibold text-black pt-5">
                            {{ getTranslatedValue($about_content_3,'title') }}
                        </h2>
                    </div>
                    <div class="col-span-6 flex flex-col lg:items-end">
                        <div class="w-full max-w-[528px]">
                            <p class="font-semibold sm:text-18 text-black">
                                {{ getTranslatedValue($about_content_3,'description_one') }}
                            </p>
                            <p class="text-paragraph leading-7 pt-4 md:pt-9">
                                {{ getTranslatedValue($about_content_3,'description_two') }}
                            </p>
                            <a href="{{ getTranslatedValue($about_content_3,'button_link') }}">
                                <div class="home-two-btn-bg py-3.5 group bg-purple border-purple w-fit mt-12">
                                    <span
                                        class="text-base text-white group-hover:text-purple transition-all duration-300 font-semibold font-inter relative z-10">
                                        {{ getTranslatedValue($about_content_3,'button_text') }}
                                    </span>
                                    <span class="text-white group-hover:text-purple">{{ get_svg('arrow3') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up"
                    class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-12 gap-[30px] h3-about-card relative overflow-hidden w-full pt-10 md:pt-20">
                    <!-- card start  -->
                    <div
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 z-0 overflow-hidden w-full h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200 opacity-20">
                            <img src="{{ asset(getImage($about_content_3,'hover_image')) }}" alt="" class="w-full" />
                        </div>
                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_content_3,'counter_text_one') }}"
                                data-type-qs="K+" data-speed-qs="1000">
                                {{ getTranslatedValue($about_content_3,'counter_text_one') }} {{ __('k+') }}
                            </h1>
                            <div class="w-20 border-2 border-purple"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_content_3,'counter_details_one') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 z-0 overflow-hidden w-full h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200 opacity-20">
                            <img src="{{ asset(getImage($about_content_3,'hover_image')) }}" alt="" class="w-full" />
                        </div>
                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_content_3,'counter_text_two') }}"
                                data-type-qs="K+" data-speed-qs="1000">
                                {{ getTranslatedValue($about_content_3,'counter_text_two') }} {{ __('+') }}+
                            </h1>
                            <div class="w-20 border-2 border-purple"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_content_3,'counter_details_two') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 z-0 overflow-hidden w-full h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200 opacity-20">
                            <img src="{{ asset(getImage($about_content_3,'hover_image')) }}" alt="" class="w-full" />
                        </div>
                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_content_3,'counter_text_three') }}"
                                data-type-qs="K+" data-speed-qs="1000">
                                {{ getTranslatedValue($about_content_3,'counter_text_three') }} {{ __('k+') }}
                            </h1>
                            <div class="w-20 border-2 border-purple"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_content_3,'counter_details_three') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                    <!-- card start  -->
                    <div
                        class="col-span-3 relative flex flex-col justify-center items-center bg-main-gray border border-purple/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                        <div
                            class="absolute top-0 left-0 z-0 overflow-hidden w-full h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200 opacity-20">
                            <img src="{{ asset(getImage($about_content_3,'hover_image')) }}" alt="" class="w-full" />
                        </div>
                        <div class="relative z-10 flex justify-center items-center flex-col">
                            <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                                data-count-qs="{{ getTranslatedValue($about_content_3,'counter_text_four') }}"
                                data-type-qs="+" data-speed-qs="1000">
                                {{ getTranslatedValue($about_content_3,'counter_text_four') }} {{ __('+') }}+
                            </h1>
                            <div class="w-20 border-2 border-purple"></div>
                            <p class="text-center font-semibold text-18 text-paragraph pt-6">
                                {{ getTranslatedValue($about_content_3,'counter_details_four') }}
                            </p>
                        </div>
                    </div>
                    <!-- card end  -->
                </div>
            </div>
        </section>
