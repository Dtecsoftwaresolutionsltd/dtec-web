<section class="w-full py-16 md:py-[130px]">
    <div class="theme-container mx-auto w-full">
        <div class="grid grid-cols-6 lg:grid-cols-12 gap-10 lg:gap-0">
            <div class="col-span-6 relative">
                <img src="{{ asset(getImage($about_companies, 'about_company_image')) }}" alt="img" class="mt-9" />
                <div
                    class="p-3 sm:p-5 rounded-[30px] right-0 sm:right-32 bg-blue-seo absolute top-0 moving-h2-hero-main-img min-w-[180px]">
                    <p class="text-sm font-medium leading-7 w-full text-center text-white">
                        {{ getTranslatedValue($about_companies, 'trafic_title') }}
                    </p>
                    <h1 class="text-[42px] leading-[56px] tracking-tight font-semibold w-full text-center text-white"
                        data-scroll-qs="scroll" data-count-qs={{ getTranslatedValue($about_companies, 'trafic_no') }}
                        data-type-qs="K+" data-speed-qs="2000"></h1>
                    <p class="text-base leading-6 text-white flex w-full justify-center items-center gap-1">
                        @include('theme.svg.trafic')
                        <span> {{ getTranslatedValue($about_companies, 'trafic_percent') }}%</span>
                    </p>
                </div>

                <form action="{{ route('blogs') }}" method="GET">
                    <div
                        class="px-[30px] w-10/12 max-w-[330px] flex items-center shadow-style-h2 rounded-[28px] overflow-hidden absolute right-5 sm:right-[65px] bottom-5 sm:bottom-12 z-10 bg-white">
                        <input id="h2_search_input" type="text" placeholder="Keyword search"
                            class="py-1.5 sm:py-3 w-full focus:outline-none focus:border-none" name="search" />
                        <button type="submit" for="h2_search_input">
                            @include('theme.svg.search')
                        </button>
                    </div>
                </form>

            </div>
            <div class="col-span-6 lg:pl-[87px]">
                <div class="py-1.5 md:py-2 px-5 rounded-[30px] border-[1.2px] border-blue-seo/30 w-fit bg-blue-seo/10">
                    <h1 class="text-base tracking-tight font-medium text-purple leading-5">
                        {{ getTranslatedValue($about_companies, 'section_title') }}
                    </h1>
                </div>
                <h1 class="text-24 md:text-48 font-semibold text-main-black mt-2.5 md:mt-5">
                    {{ getTranslatedValue($about_companies, 'title') }}
                </h1>
                <p class="mt-5 md:mt-10 text-paragraph">

                    {{ getTranslatedValue($about_companies, 'description') }}
                </p>
                <div class="w-full grid grid-cols-1 sm:grid-cols-2 mt-10 gap-8 md:gap-[70px]">
                    <div class="grid-cols-1">
                        @include('theme.svg.expert')
                        <h1 class="text-18 text-main-black font-semibold mt-4">
                            {{ getTranslatedValue($about_companies, 'title_one') }}
                        </h1>
                        <p class="text-paragraph mt-3">
                            {{ getTranslatedValue($about_companies, 'description_one') }}
                        </p>
                    </div>
                    <div class="grid-cols-1">
                        @include('theme.svg.expert')
                        <h1 class="text-18 text-main-black font-semibold mt-4">
                            {{ getTranslatedValue($about_companies, 'title_two') }}
                        </h1>
                        <p class="text-paragraph mt-3">
                            {{ getTranslatedValue($about_companies, 'description_two') }}
                        </p>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-6 md:gap-12 mt-6 md:mt-12 items-center">
                    <a href="{{ getTranslatedValue($about_companies, 'learn_more_url') }}">
                        <div class="home-two-btn-bg py-3 group bg-blue-seo border-blue-seo">
                            <span
                                class="text-base text-white group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                                {{ getTranslatedValue($about_companies, 'learn_more_button') }}
                            </span>
                            @include('theme.svg.arrow_right')
                        </div>
                    </a>
                    <a href="{{ getTranslatedValue($about_companies, 'seo_service_url') }}">
                        <div class="flex items-center gap-2 group">
                            <p
                                class="mb-[1px] font-medium text-main-black leading-5 font-inter border-b border-main-black before:block before:pb-[1px] before:border-blue-seo before:font-medium before:text-blue-seo before:leading-5 before:font-inter before:border-b before:content-['Explore_SEO_Services'] before:absolute before:-bottom-[1px] before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-[21px] relative">
                                {{ getTranslatedValue($about_companies, 'seo_service_button') }}
                            </p>
                            @include('theme.svg.arrow')
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
