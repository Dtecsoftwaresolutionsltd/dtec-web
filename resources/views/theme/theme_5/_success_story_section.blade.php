<section class="py-16 md:py-[130px]">
    <!-- title  -->
    <div class="theme-container mx-auto flex flex-col items-center">
        <h1
            class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium">
            {{ __('Our Success Story') }}
        </h1>
        <h2 class="text-24 sm:text-48 font-semibold text-main-black pt-5 max-w-[844px] text-center">
            {{ __('Our Journey to Success Navigating Challenges, Achieving Milestones,
            and Building a Legacy') }}
        </h2>
        <div class="w-full">
            <div class="swiper h5-story-slider pt-14">
                <div class="swiper-wrapper">
                    @foreach ($projects as $key => $project)
                        <div class="swiper-slide pr-3">
                            <div class="pb-[192px] pr-[30px] w-full bg-white relative">
                                <img src="{{ $project?->thumb_image }}" alt="" class="w-full max-w-[380px] h-full service_image" />
                                <div
                                    class="group shadow-card-xm pl-5 pr-5 md:pl-10 md:pr-16 lg:pl-5 lg:pr-5 xl:pl-10 xl:pr-16 py-[30px] rounded-2xl absolute top-[40%] md:top-[50%] z-10 bg-white -right-0 h-[166px] hover:h-[205px] transition-all duration-300 hover:bg-buisness-red overflow-hidden h5-story_slider_active_card">
                                    <span class="absolute right-2 top-bottom-moving">
                                        {{ get_svg('story-shape') }}
                                    </span>
                                    <h1
                                        class="h-10 w-10 border-2 rounded-full border-buisness-red group-hover:border-white group-hover:text-white flex justify-center items-center text-base tracking-tight text-main-black font-semibold">
                                        0{{ $key + 1 }}
                                    </h1>
                                    <h2
                                        class="text-20 font-semibold mt-3 max-w-[230px] group-hover:text-white line-clamp-2 ">
                                        {{ $project?->title }}
                                    </h2>
                                    <a href="{{ route('portfolio.show', $project?->slug) }}" class="group">
                                        <div class="flex items-center gap-2 group mt-4">
                                            <span
                                                class="font-medium text-white leading-5 font-inter border-b border-transparent before:inline-block before:border-white before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                                {{ __('Read More') }}
                                            </span>
                                            {{ get_svg('arrow-white') }}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="relative w-fit mx-auto flex items-center z-10">
            <div class="flex justify-between absolute w-full">
                <button
                    class="group h5-story-prev w-[30px] h-[30px] rounded-full flex items-center justify-center bg-buisness-dark-black/10 border-buisness-dark-black/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-buisness-dark-black before:bg-buisness-dark-black relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    {{ get_svg('black-white-left') }}
                </button>
                <button
                    class="group rotate-180 h5-story-next w-[30px] h-[30px] rounded-full flex items-center justify-center bg-buisness-dark-black/10 border-buisness-dark-black/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-buisness-dark-black before:bg-buisness-dark-black relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    {{ get_svg('black-white-right') }}
                </button>
            </div>
            <div class="h5-story-pagination px-10"></div>
        </div>
    </div>
</section>
