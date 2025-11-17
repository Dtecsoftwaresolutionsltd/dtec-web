        <section class="pt-16 md:pt-[130px]">
            <!-- title  -->
            <div class="theme-container mx-auto flex flex-col items-center">
                <h1
                    class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium">
                    {{ getTranslatedValue($we_provide_content,'sub_title') }}
                </h1>
                <h2 class="text-24 sm:text-48 font-semibold text-main-black pt-5 max-w-[692px] text-center">
                    {{ getTranslatedValue($we_provide_content,'title') }}
                </h2>
            </div>
            <!-- services -->
            <div class="relative mt-10 md:mt-[70px] h-fit">
                <div class="w-full h-1/2 bg-white absolute top-0 z-0"></div>
                <div class="w-full h-1/2 bg-buisness-light-black absolute bottom-0 z-0"></div>
                <div class="theme-container w-full mx-auto relative z-10">
                    <div
                        class="pt-3 md:pt-10 lg:pt-0 pl-5 xl:pl-28 pr-5 xl:pr-28 bg-buisness-gray flex flex-col lg:flex-row justify-between gap-5">
                        <!-- buttons  -->
                        <!-- h5-button-active -->
                        <div class="flex lg:flex-col gap-1 sm:gap-5 lg:w-full max-w-[446px] lg:py-[70px]">
                            <button data-aos="fade-up" name="first"
                                class="group md:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item active-tab h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{get_svg('icon1') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_one_title') }}</span>
                                </span>
                            </button>
                            <button data-aos="fade-up" data-aos-delay="100" name="second"
                                class="group lg:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{ get_svg('icon2') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_two_title') }}</span>
                                </span>
                            </button>
                            <button data-aos="fade-up" data-aos-delay="200" name="three"
                                class="group lg:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{ get_svg('icon3') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_three_title') }}</span>
                                </span>
                            </button>

                            <button data-aos="fade-up" data-aos-delay="300" name="four"
                                class="group lg:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{ get_svg('icon4') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_four_title') }}
                                    </span>
                                </span>
                            </button>

                            <button data-aos="fade-up" data-aos-delay="400" name="five"
                                class="group md:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{ get_svg('icon5') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_five_title') }}
                                    </span>
                                </span>
                            </button>
                            <button data-aos="fade-up" data-aos-delay="500" name="six"
                                class="group md:w-full p-1.5 md:p-3 lg:py-5 rounded-[40px] flex items-center border border-buisness-dark-black/10 bg-white hover:bg-buisness-red transition-all duration-300 hover:shadow-business-red tab_item h5-service-btn">
                                <span
                                    class="relative z-10 flex items-center gap-3 font-inter font-semibold text-20 text-main-black group-hover:text-white lg:pl-[35px] transition-all ease-in-out duration-300 pointer-events-none">
                                    {{ get_svg('icon6') }}
                                    <span class="hidden lg:block">
                                        {{ getTranslatedValue($we_provide_content,'tab_six_title') }}
                                    </span>
                                </span>
                            </button>
                        </div>
                        <!-- elements  -->
                        <div
                            class="max-w-[520px] overflow-x-scroll flex transition-all duration-300 scroll-smooth relative no-scrollbar py-5 sm:py-10 md:py-[70px] main-tab-section w-full">
                            <div class="min-w-full max-w-full relative" id="first">
                                {{ get_svg('icon1') }}
                                <div class="relative z-10">
                                    <h1 class="text-20 sm:text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_one_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_one_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_one_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    <span>
                                        {{ get_svg('shape_svg') }}
                                    </span>
                                </div>
                            </div>
                            <div class="min-w-full max-w-full relative" id="second">
                                {{ get_svg('icon2') }}
                                <div class="relative z-10">
                                    <h1 class="text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_two_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_two_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_two_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    {{ get_svg('shape_svg') }}
                                </div>
                            </div>
                            <div class="min-w-full max-w-full relative" id="three">
                                {{ get_svg('icon3') }}
                                <div class="relative z-10">
                                    <h1 class="text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_three_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_three_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_three_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    {{ get_svg('shape_svg') }}
                                </div>
                            </div>
                            <div class="min-w-full max-w-full relative" id="four">
                                {{ get_svg('icon4') }}
                                <div class="relative z-10">
                                    <h1 class="text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_four_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_four_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_four_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    {{ get_svg('shape_svg') }}
                                </div>
                            </div>
                            <div class="min-w-full max-w-full relative" id="five">
                                {{ get_svg('icon5') }}
                                <div class="relative z-10">
                                    <h1 class="text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_five_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_five_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_five_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    {{ get_svg('shape_svg') }}
                                </div>
                            </div>
                            <div class="min-w-full max-w-full relative" id="six">
                                {{ get_svg('icon6') }}
                                <div class="relative z-10">
                                    <h1 class="text-24 text-main-black font-semibold mt-4 md:mt-[50px]">
                                        {{ getTranslatedValue($we_provide_content,'tab_six_details_title') }}
                                    </h1>
                                    <p class="text-paragraph mt-4 md:mt-6">
                                        {{ getTranslatedValue($we_provide_content,'tab_six_details') }}
                                    </p>
                                    <img src="{{ asset(getImage($we_provide_content,'tab_six_image')) }}" alt=""
                                        class="mt-4 md:mt-14 w-full object-cover rounded-2xl" />
                                </div>
                                <div class="md:block hidden absolute right-0 top-0">
                                    {{ get_svg('shape_svg') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
