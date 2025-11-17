<section id="working-process">
    <div class="working-process-section-wrapper w-full md:pb-[130px] pb-16">
        <div class="theme-container mx-auto">
            <div class="w-full xl:grid grid-cols-12">
                <div class="col-span-5">
                    <div class="title-area">
                        <span class="section-title-top-tag mb-5">
                            {{ getTranslatedValue($working_process,'sub_title') }}
                        </span>
                        <h2 class="md:text-48 text-34 font-semibold text-main-black mb-[50px]">
                            {{ getTranslatedValue($working_process,'title') }}
                        </h2>
                        <div id="progress-wrapper"
                            class="grid xl:grid-cols-1 gap-5 lg:grid-cols-3 md:grid-cols-2 grid-cols-1">
                            <div data-aos="fade-up"
                                class="w-full rounded-[20px] border border-[#e7e3fa] bg-main-gray px-10 py-[30px] overflow-hidden group relative">
                                <div class="relative z-10 flex flex-col space-y-5">
                                    <div
                                        class="w-10 h-10 bg-white border-2 border-purple rounded-full flex justify-center items-center">
                                        <span
                                            class="text-purple font-semibold">{{ getTranslatedValue($working_process,'card_number_one') }}</span>
                                    </div>
                                    <div>
                                        <p class="text-20 font-semibold text-main-black mb-4">
                                            {{ getTranslatedValue($working_process,'card_title_one') }}
                                        </p>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($working_process,'card_description_one') }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="absolute w-full h-full left-0 top-0 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                                    <span class="w-full h-full">
                                        <img src="{{ asset(getImage($working_process,'hover_image')) }}" alt=""
                                            class="w-full h-full">
                                    </span>
                                </div>
                            </div>
                            <div data-aos-delay="100" data-aos="fade-up"
                                class="w-full rounded-[20px] border border-[#e7e3fa] bg-main-gray px-10 py-[30px] overflow-hidden group relative">
                                <div class="relative z-10 flex flex-col space-y-5">
                                    <div
                                        class="w-10 h-10 bg-white border-2 border-purple rounded-full flex justify-center items-center">
                                        <span
                                            class="text-purple font-semibold">{{ getTranslatedValue($working_process,'card_number_two') }}</span>
                                    </div>
                                    <div>
                                        <p class="text-20 font-semibold text-main-black mb-4">
                                            {{ getTranslatedValue($working_process,'card_title_two') }}
                                        </p>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($working_process,'card_description_two') }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="absolute w-full h-full left-0 top-0 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                                    <span class="w-full h-full">
                                        <img src="{{ asset(getImage($working_process,'hover_image')) }}" alt=""
                                            class="w-full h-full">
                                    </span>
                                </div>
                            </div>
                            <div data-aos-delay="200" data-aos="fade-up"
                                class="w-full rounded-[20px] border border-[#e7e3fa] bg-main-gray px-10 py-[30px] overflow-hidden group relative">
                                <div class="relative z-10 flex flex-col space-y-5">
                                    <div
                                        class="w-10 h-10 bg-white border-2 border-purple rounded-full flex justify-center items-center">
                                        <span
                                            class="text-purple font-semibold">{{ getTranslatedValue($working_process,'card_number_three') }}</span>
                                    </div>
                                    <div>
                                        <p class="text-20 font-semibold text-main-black mb-4">
                                            {{ getTranslatedValue($working_process,'card_title_three') }}
                                        </p>
                                        <p class="text-paragraph">
                                            {{ getTranslatedValue($working_process,'card_description_three') }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="absolute w-full h-full left-0 top-0 opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                                    <span class="w-full h-full">
                                        <img src="{{ asset(getImage($working_process,'hover_image')) }}" alt=""
                                            class="w-full h-full">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-7">
                    <div class="w-full h-full flex xl:justify-end justify-center relative">
                        <div class="h-full xl:absolute right-0">
                            <div class="sticky  top-20 ">
                                <div id="home-working-cursor-anim" class="relative">
                                    <div data-depth="0.30" class="layer h-fit z-10">
                                        <span
                                            class="px-[30px] py-2.5 bg-purple shadow-small shadow-purple text-pone text-white rounded-br-none rounded-full md:inline-block hidden">{{ getTranslatedValue($working_process,'sales_and_marketing') }}</span>
                                    </div>
                                    <div data-depth="0.40" class="layer h-fit z-10">
                                        <div class="md:inline-block hidden">
                                            <img src="{{ asset(getImage($working_process,'icon')) }}" alt=""
                                                class="drop-shadow-xl" />
                                        </div>
                                    </div>
                                    <div data-depth="0.20" class="layer h-fit">
                                        <span
                                            class="md:inline-block hidden px-[30px] py-2.5 bg-blue-sass text-pone text-white rounded-br-none rounded-full shadow-small shadow-blue-sass">{{ getTranslatedValue($working_process,'marketing_growth') }}</span>
                                    </div>
                                </div>
                                <div id="progressThumbHeight">
                                    <img src="{{ asset(getImage($working_process,'working_process_image')) }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
