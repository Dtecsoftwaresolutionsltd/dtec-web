<section class="py-16 md:py-[130px]">
    <div class="theme-container mx-auto">
        <h1
            class="px-5 bg-blue-sass/10 border border-blue-sass/20 text-blue-sass font-medium rounded-[30px] w-fit mx-auto">
            {{ getTranslatedValue($core_features_two_content, 'section_title') }}
        </h1>
        <h2
            class="sm:text-48 text-24 font-semibold text-main-black  mt-[18px] w-full max-w-[795px] text-center mx-auto">
            {{ getTranslatedValue($core_features_two_content, 'title') }}
        </h2>
        <div class="grid w-full max-w-[1070px] mx-auto grid-cols-6 lg:grid-cols-10 mt-10 sm:mt-[70px]">
            <div class="col-span-6 lg:col-span-4 lg:pr-[72px] flex flex-col justify-center gap-4">
                <div
                    class="bg-blue-sass/5 py-[13px] px-8 border-l-[3px] border-blue-sass h-[50px] hover:h-[125px] transition-all duration-300 overflow-hidden">
                    <h1 class="font-semibold text-18 text-main-black">
                        {{ getTranslatedValue($core_features_two_content, 'title_1') }}
                    </h1>
                    <p class="text-paragraph mt-0.5 line-clamp-2">
                        {{ getTranslatedValue($core_features_two_content, 'description_1') }}
                    </p>
                </div>
                <div
                    class="bg-blue-sass/5 py-[13px] px-8 border-l-[3px] border-blue-sass h-[50px] hover:h-[125px] transition-all duration-300 overflow-hidden">
                    <h1 class="font-semibold text-18 text-main-black">
                        {{ getTranslatedValue($core_features_two_content, 'title_2') }}
                    </h1>
                    <p class="text-paragraph mt-0.5 line-clamp-2">
                        {{ getTranslatedValue($core_features_two_content, 'description_2') }}
                    </p>
                </div>
                <div
                    class="bg-blue-sass/5 py-[13px] px-8 border-l-[3px] border-blue-sass h-[50px] hover:h-[125px] transition-all duration-300 overflow-hidden">
                    <h1 class="font-semibold text-18 text-main-black">
                        {{ getTranslatedValue($core_features_two_content, 'title_3') }}
                    </h1>
                    <p class="text-paragraph mt-0.5 line-clamp-2">
                        {{ getTranslatedValue($core_features_two_content, 'description_3') }}
                    </p>
                </div>
                <div
                    class="bg-blue-sass/5 py-[13px] px-8 border-l-[3px] border-blue-sass h-[50px] hover:h-[125px] transition-all duration-300 overflow-hidden">
                    <h1 class="font-semibold text-18 text-main-black">
                        {{ getTranslatedValue($core_features_two_content, 'title_4') }}
                    </h1>
                    <p class="text-paragraph mt-0.5 line-clamp-2">
                        {{ getTranslatedValue($core_features_two_content, 'description_4') }}
                    </p>
                </div>
            </div>
            <div class="col-span-6 mt-5 lg:mt-0">
                <img src="{{ asset(getImage($core_features_two_content, 'main_image')) }}" alt="" class="" />
            </div>
        </div>
    </div>
</section>