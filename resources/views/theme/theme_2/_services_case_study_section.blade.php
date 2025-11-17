<section class="w-full py-16 md:py-[130px] -top-2/4 bg-black-seo relative overflow-hidden">
    <div>
        <svg width="400" height="276" viewBox="0 0 400 276" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="absolute bottom-20 moving-anim tran">
            <path
                d="M0 30.6722C0 12.7371 15.6327 -1.1908 33.4489 0.871101L373.449 40.2199C388.582 41.9713 400 54.7868 400 70.021V245.528C400 262.096 386.569 275.528 370 275.528H30C13.4315 275.528 0 262.096 0 245.528V30.6722Z"
                fill="url(#paint0_linear_460_21474)" />
            <defs>
                <linearGradient id="paint0_linear_460_21474" x1="200" y1="-3" x2="200" y2="275.528"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#794AFF" stop-opacity="0.15" />
                    <stop offset="1" stop-color="#794AFF" stop-opacity="0" />
                </linearGradient>
            </defs>
        </svg>
    </div>
    <!-- animated circle bg  -->
    <div class="absolute -top-1 -left-1 flex justify-center items-center w-2 h-2 z-0">
        <div class="animated_circle bg-white/5"></div>
        <div class="animated_circle2 bg-white/5"></div>
        <div class="animated_circle3 bg-white/5"></div>
        <div class="animated_circle4 bg-white/5"></div>
    </div>
    <!-- animated circle bg  -->

    <div class="theme-container w-full mx-auto relative z-10">
        <div class="w-full flex gap-5 flex-col items-center mb-10 md:mb-[70px]">
            <p class="px-5 py-1 text-white rounded-[30px] bg-blue-seo font-medium">
                {{ getTranslatedValue($explore_services, 'section_title') }}
            </p>
            <h1 class="text-white text-24 md:text-48 font-semibold max-w-[684px] w-full text-center">
                {{ getTranslatedValue($explore_services, 'title') }}
            </h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-[30px] ">

            @foreach ($service_explores as $service)
                <!-- single card start -->
                <div data-aos-duration="1000" data-aos="fade-left"
                    class="col-span-1 p-5 md:p-[50px] rounded-3xl flex flex-col md:flex-row gap-[50px] relative overflow-hidden group border border-white/5 transition-all duration-300 before:inline-block before:w-[1000px] before:h-[1000px] before:rounded-full before:bg-blue-seo before:absolute before:z-0 z-10 before:-bottom-[1000px] before:-right-[1000px] before:transition-all before:duration-1000 hover:before:-bottom-[300px] hover:before:-right-[100px]">
                    <!-- animation circle  -->
                    <div
                        class="hidden absolute -bottom-1 -right-1 group-hover:flex justify-center items-center w-2 h-2 z-0">
                        <div class="animated_circle_sm bg-white/10"></div>
                        <div class="animated_circle_sm2 bg-white/10"></div>
                        <div class="animated_circle_sm3 bg-white/10"></div>
                        <div class="animated_circle_sm4 bg-white/10"></div>
                    </div>
                    <div class="relative z-10">
                        @if ($service?->theme_2_thumbnail_image != '')
                            <img src="{{ asset($service?->theme_2_thumbnail_image) }}" alt=""
                                class=" top-2 right-2 w-[60px] sm:w-[100px]  object-cover ">
                        @else
                            <img src="{{ asset($service?->thumb_image) }}" alt=""
                                class=" top-2 right-2 w-[60px] sm:w-[100px] object-cover ">
                        @endif
                    </div>
                    <div class="relative z-10">
                        <h1 class="font-semibold text-22 text-white">
                            {{ $service?->title }}
                        </h1>
                        <p class="group-hover:text-white text-white/50 transition-all duration-300 mt-4">
                            {{ Str::limit($service?->short_description, 100) }}
                        </p>
                        <a href="{{ route('service', $service->slug) }}">
                            <div class="flex items-center gap-2 group mt-4">
                                <span
                                    class="font-medium text-white leading-5 font-inter border-b border-transparent before:inline-block before:border-white before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                    {{ __('Read More') }}
                                </span>
                                {{ get_svg('innerpage.arrow_white') }}
                            </div>
                        </a>
                    </div>
                </div>
                <!-- single card end -->
            @endforeach
        </div>
        <!-- case study start  -->

        <div class="pt-16 md:pt-[130px]">
            <p class="px-5 py-1 text-white rounded-[30px] bg-blue-seo font-medium w-fit mb-5">
                {{ getTranslatedValue($case_studies, 'section_title') }}
            </p>
            <div class="flex flex-col sm:flex-row w-full justify-between items-end mb-10 md:mb-[70px]">
                <h1 class="max-w-[660px] text-24 sm:text-48 text-white font-semibold mb-10 sm:mb-0">
                    {{ getTranslatedValue($case_studies, 'title') }}
                </h1>
                <div class="flex gap-2.5">
                    <button
                        class="h2-case-study-next w-8 h-8 sm:w-11 sm:h-11 rounded-full border-[1.5px] border-white/10 flex items-center justify-center overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-blue-seo before:bg-blue-seo relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                        @include('theme.svg.left_direction')
                    </button>
                    <button
                        class="h2-case-study-prev rotate-180 w-8 h-8 sm:w-11 sm:h-11 rounded-full border-[1.5px] border-white/10 flex items-center justify-center overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-blue-seo before:bg-blue-seo relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                        @include('theme.svg.right_direction')
                    </button>
                </div>
            </div>

            <div class="swiper case_study_slider  overflow-hidden">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($projects as $project)
                        <div class="swiper-slide">
                            <div
                                class="bg-white rounded-[20px] pt-7 pb-5 px-2.5 relative group overflow-hidden transition-all duration-300 before:inline-block before:w-[800px] before:h-[800px] before:rounded-full before:bg-blue-seo before:absolute before:z-0 z-10 before:-bottom-[800px] before:-right-[800px] before:transition-all before:duration-1000 hover:before:-bottom-[150px] hover:before:-right-[150px]">
                                <div class="px-2 md:px-10 relative z-10">
                                    <p
                                        class="leading-6 font-semibold text-blue-seo group-hover:text-white delay-300 transition-all duration-300 ease-in-out">
                                        {{ $project->category->name }}
                                    </p>
                                    <a href="{{ route('portfolio.show', $project->slug) }}" class="">
                                        <h1
                                            class="text-24 text-main-black font-semibold pt-1 group-hover:text-white transition-all duration-300 underlines ">
                                            {{ $project?->title }}
                                        </h1>
                                    </a>
                                </div>
                                @if ($project?->theme_2_thumb_image != '')
                                    <img src="{{ asset($project?->theme_2_thumb_image) }}" alt=""
                                        class="max-w-[390px] h-[295px] w-full rounded-2xl mt-10 relative z-10" />
                                @else
                                    <img src="{{ asset($project?->thumb_image) }}" alt=""
                                        class="max-w-[390px] h-[295px] w-full rounded-2xl mt-10 relative z-10" />
                                @endif
                                <div class="px-10 flex justify-between relative z-10 mt-4">
                                    <a href="{{ route('portfolio.show', $project->slug) }}">
                                        <div class="flex items-center gap-2 group">
                                            <span
                                                class="transition-all duration-300 font-medium group-hover:text-white text-paragraph leading-5 font-inter border-b border-transparent before:inline-block before:border-white before:content-['Read More'] before:text-white before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                                {{ __('Read More') }}
                                            </span>
                                          <span class="text-paragraph group-hover:text-white">  @include('theme.svg.arrow')</span>
                                        </div>
                                    </a>
                                    <button aria-label="share">

                                    </button>
                                </div>
                                <!-- animation circle  -->
                                <div
                                    class="hidden absolute bottom-10 -right-1 group-hover:flex justify-center items-center w-2 h-2 z-0">
                                    <div class="animated_circle_sm bg-white/10"></div>
                                    <div class="animated_circle_sm2 bg-white/10"></div>
                                    <div class="animated_circle_sm3 bg-white/10"></div>
                                    <div class="animated_circle_sm4 bg-white/10"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- case study end  -->
    </div>
</section>