<section class="pt-16 sm:pt-[130px]">
    <div class="theme-container w-full mx-auto">
        <div data-aos="fade-up"
            class="grid grid-cols-3 md:grid-cols-6 lg:grid-cols-12 gap-[30px] h3-about-card relative overflow-hidden w-full">
            <!-- card start  -->
            <div
                class="col-span-3 relative flexsss flex-col justify-center items-center bg-blue-sass/5 border border-blue-sass/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                <div
                    class="absolute top-0 left-0 z-0 overflow-hidden h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200">
                    @include('theme.theme_8.svg.dot_bg')
                </div>
                <div class="relative z-10 flex justify-center items-center flex-col">
                    <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                        data-count-qs="{{ getTranslatedValue($core_features_content, 'project_complete_count') }}"
                        data-type-qs="{{ getTranslatedValue($core_features_content, 'project_complete_keyword') }}"
                        data-speed-qs="1000">

                    </h1>
                    <div class="w-20 border-2 border-blue-sass"></div>
                    <p class="text-center font-semibold text-18 text-paragraph pt-6">
                        {{ getTranslatedValue($core_features_content, 'project_complete_text') }}
                    </p>
                </div>
            </div>
            <!-- card end  -->
            <!-- card start  -->
            <div
                class="col-span-3 relative flex flex-col justify-center items-center bg-blue-sass/5 border border-blue-sass/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                <div
                    class="absolute top-0 left-0 z-0 overflow-hidden h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200">
                    @include('theme.theme_8.svg.dot_bg')
                </div>
                <div class="relative z-10 flex justify-center items-center flex-col">
                    <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                        data-count-qs="{{ getTranslatedValue($core_features_content, 'experience_count') }}"
                        data-type-qs="{{ getTranslatedValue($core_features_content, 'experience_keyword') }}"
                        data-speed-qs="1000">

                    </h1>
                    <div class="w-20 border-2 border-blue-sass"></div>
                    <p class="text-center font-semibold text-18 text-paragraph pt-6">
                        {{ getTranslatedValue($core_features_content, 'experience_text') }}
                    </p>
                </div>
            </div>
            <!-- card end  -->
            <!-- card start  -->
            <div
                class="col-span-3 relative flex flex-col justify-center items-center bg-blue-sass/5 border border-blue-sass/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                <div
                    class="absolute top-0 left-0 z-0 overflow-hidden h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200">
                    @include('theme.theme_8.svg.dot_bg')
                </div>
                <div class="relative z-10 flex justify-center items-center flex-col">
                    <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                        data-count-qs="{{ getTranslatedValue($core_features_content, 'client_satisfaction_count') }}"
                        data-type-qs="{{ getTranslatedValue($core_features_content, 'client_satisfaction_keyword') }}"
                        data-speed-qs="1000">

                    </h1>
                    <div class="w-20 border-2 border-blue-sass"></div>
                    <p class="text-center font-semibold text-18 text-paragraph pt-6">
                        {{ getTranslatedValue($core_features_content, 'client_satisfaction_text') }}
                    </p>
                </div>
            </div>
            <!-- card end  -->
            <!-- card start  -->
            <div
                class="col-span-3 relative flex flex-col justify-center items-center bg-blue-sass/5 border border-blue-sass/10 rounded-3xl pt-4 pb-4 md:pt-6 md:pb-6 overflow-hidden group">
                <div
                    class="absolute top-0 left-0 z-0 overflow-hidden h-full -translate-x-96 group-hover:translate-x-0 transition-all duration-200">
                    @include('theme.theme_8.svg.dot_bg')
                </div>
                <div class="relative z-10 flex justify-center items-center flex-col">
                    <h1 class="text-48 text-main-black font-semibold pb-[18px]" data-scroll-qs="scroll"
                        data-count-qs="{{ getTranslatedValue($core_features_content, 'expert_team_member_count') }}"
                        data-type-qs="{{ getTranslatedValue($core_features_content, 'expert_team_member_keyword') }}"
                        data-speed-qs="1000">

                    </h1>
                    <div class="w-20 border-2 border-blue-sass"></div>
                    <p class="text-center font-semibold text-18 text-paragraph pt-6">
                        {{ getTranslatedValue($core_features_content, 'expert_team_member_text') }}
                    </p>
                </div>
            </div>
            <!-- card end  -->
        </div>
    </div>
</section>
