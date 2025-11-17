<section class="w-full py-16 md:py-32">
    <div class="w-full theme-container mx-auto flex items-center flex-col">
        <div class="flex flex-col items-center mb-10 md:mb-[70px]">
            <div class="py-2 px-7 rounded-[30px] border-[1.2px] border-blue-seo/30 w-fit bg-blue-seo/10 ">
                <h1 class="text-base tracking-tight font-medium text-purple leading-5">
                    {{ getTranslatedValue($theme_two_tools, 'section_title') }}
                </h1>
            </div>
            <h1
                class="max-w-[813px] font-semibold text-4xl sm:text-48 tracking-tight text-app-dark text-center mt-[18px]">
                {{ getTranslatedValue($theme_two_tools, 'title') }}
            </h1>
        </div>
        <div class="grid gird-cols-4 md:grid-cols-8 xl:grid-cols-12 gap-[30px] ">
            <!-- single card start  -->
            <div data-aos="fade-up" class="col-span-4">
                <div
                    class="p-5 md:p-12 relative overflow-hidden rounded-[20px] border-[1.2px] border-purple/10 h2_features_card_bg cursor-pointer group hover:border-purple transition-all duration-300">
                    @include('theme.svg.feature_card_bg')
                    <div class="relative z-10">
                        <a href="{{ getTranslatedValue($theme_two_tools, 'title_one_url') }}"
                            class="w-fit text-24 text-app-dark font-semibold before:block before:w-full before:border-b before:border-app-dark relative overflow-hidden before:absolute border-b border-transparent before:scale-x-0 group-hover:before:scale-x-100 before:transition-all before:duration-300 before:origin-left before:bottom-0">
                            {{ getTranslatedValue($theme_two_tools, 'title_one') }}
                        </a>
                        <p class="text-paragraph mt-4">
                            {{ getTranslatedValue($theme_two_tools, 'description_one') }}
                        </p>
                        <img src="{{ asset(getImage($theme_two_tools, 'tools_image_one')) }}" alt="img"
                            class="mt-10 max-w-[310px] w-full object-cover max-h-[300px] overflow-hidden rounded-lg group-hover:scale-105 transition-all duration-300" />
                    </div>
                </div>
            </div>
            <!-- single card end  -->
            <!-- single card start  -->
            <div data-aos="fade-up" data-aos-delay="100" class="col-span-4">
                <div
                    class="p-5 md:p-12 relative overflow-hidden rounded-[20px] border-[1.2px] border-purple/10 h2_features_card_bg cursor-pointer group hover:border-purple transition-all duration-300">
                    @include('theme.svg.tools_image_bg')

                    <div class="relative z-10">
                        <a href="{{ getTranslatedValue($theme_two_tools, 'title_two_url') }}"
                            class="w-fit text-24 text-app-dark font-semibold before:block before:w-full before:border-b before:border-app-dark relative overflow-hidden before:absolute border-b border-transparent before:scale-x-0 group-hover:before:scale-x-100 before:transition-all before:duration-300 before:origin-left before:bottom-0">
                            {{ getTranslatedValue($theme_two_tools, 'title_two') }}
                        </a>
                        <p class="text-paragraph mt-4">
                            {{ getTranslatedValue($theme_two_tools, 'description_two') }}
                        </p>
                        <img src="{{ asset(getImage($theme_two_tools, 'tools_image_two')) }}" alt="img"
                            class="mt-10 max-w-[310px] w-full object-cover max-h-[300px] overflow-hidden rounded-lg group-hover:scale-105 transition-all duration-300" />
                    </div>
                </div>
            </div>
            <!-- single card end  -->
            <!-- single card start  -->
            <div data-aos="fade-up" data-aos-delay="200" class="col-span-4">
                <div
                    class="p-5 md:p-12 relative overflow-hidden rounded-[20px] border-[1.2px] border-purple/10 h2_features_card_bg cursor-pointer group hover:border-purple transition-all duration-300">
                    @include('theme.svg.feature_card_bg')
                    <div class="relative z-10">
                        <a href="{{ getTranslatedValue($theme_two_tools, 'title_three_url') }}"
                            class="w-fit text-24 text-app-dark font-semibold before:block before:w-full before:border-b before:border-app-dark relative overflow-hidden before:absolute border-b border-transparent before:scale-x-0 group-hover:before:scale-x-100 before:transition-all before:duration-300 before:origin-left before:bottom-0">
                            {{ getTranslatedValue($theme_two_tools, 'title_three') }}
                        </a>
                        <p class="text-paragraph mt-4">
                            {{ getTranslatedValue($theme_two_tools, 'description_three') }}
                        </p>
                        <img src="{{ asset(getImage($theme_two_tools, 'tools_image_three')) }}" alt="img"
                            class="mt-10 max-w-[310px] w-full object-cover max-h-[300px] overflow-hidden rounded-lg group-hover:scale-105 transition-all duration-300" />
                    </div>
                </div>
            </div>
            <!-- single card end  -->
        </div>
    </div>
</section>