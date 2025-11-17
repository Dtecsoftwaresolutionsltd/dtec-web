<section class="pt-16 sm:pt-[130px] bg-it-black">
    <div class="theme-container mx-auto w-full">
        <h1 class="px-5 bg-white/10 border border-white/20 text-white font-medium rounded-[30px] w-fit mx-auto">
            {{ getTranslatedValue($case_story_content, 'section_title') }}
        </h1>
        <h2 class="max-w-[844px] font-semibold text-2xl sm:text-48 text-white text-center mx-auto mt-5">
            {{ getTranslatedValue($case_story_content, 'title') }}
        </h2>
        <div class="grid grid-cols-4 sm:grid-cols-8 lg:grid-cols-12 min-h-[303px] gap-[30px] mt-[70px]">
            <!-- single card  -->
            @foreach ($projects as $project)
                <div class="col-span-4">
                    <div class="pb-12 md:pb-[192px] pr-[30px] w-full bg-transparent relative">
                        <img src="{{ asset($project->thumb_image) }}" alt="" class="w-full max-w-[380px]" />
                        <div
                            class="group shadow-card-xm pl-5 pr-5 md:pl-10 md:pr-16 lg:pl-5 lg:pr-5 xl:pl-10 xl:pr-16 py-5 rounded-2xl absolute top-[40%] md:top-[50%] z-10 bg-white -right-0 h-[146px] hover:h-[185px] transition-all duration-300 hover:bg-it-blue hover:shadow-it-blue-bg overflow-hidden h5-story_slider_active_card">
                            @include('theme.theme_7.svg.card_shape')
                            <p class="text-paragraph group-hover:text-white transition-all duration-300">
                                {{ $project->created_at->format('F d, Y') }}
                            </p>
                            <h1
                                class="text-18 sm:text-20 font-semibold mt-3 max-w-[255px] group-hover:text-white line-clamp-2">
                                {{ $project->title }}
                            </h1>
                            <a href="{{ route('portfolio.show', $project->slug) }}">
                                <div class="flex items-center gap-2 group mt-4">
                                    <span
                                        class="font-medium text-white leading-5 font-inter border-b border-transparent before:inline-block before:border-white before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                        {{ __('Read More') }}
                                    </span>
                                    @include('theme.theme_7.svg.arrorw')
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- single card  -->

        </div>
    </div>
</section>