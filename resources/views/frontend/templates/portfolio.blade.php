@extends('inner_layout')
@section('title')
    <title>{{ __('Portfolio') }}</title>
    <meta name="title" content="{{ __('Portfolio') }}" />
    <meta name="description" content="{{ __('Portfolio Page') }}" />
@endsection
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Portfolio') }}" />
        <!-- projects list start -->
        <section class="w-full py-16 md:py-[130px]">
            <div class="theme-container mx-auto w-full">
                <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                    <h1
                        class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium mb-5">
                        {{ isset($query) && $query ? __('Search Results') : __('Our Cases Story') }}
                    </h1>
                    <div class="">
                        <h2 class="text-main-black font-semibold text-24 sm:text-48 text-center max-w-[819px]">
                            @if(isset($query) && $query)
                                {{ __('Search results for: ') }} "{{ $query }}"
                            @else
                                {{ __('Our Journey to Success Navigating Challenges, Achieving Milestones, and Building a Legacy') }}
                            @endif
                        </h2>
                    </div>
                </div>
                @if($projects->count() > 0)
                <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-[30px]">
                    @foreach ($projects as $project)
                        <div data-aos="fade-left" class="col-span-4">
                            <div class="pb-[92px] pr-[30px] w-full bg-white relative">
                                <img src="{{ asset($project?->thumb_image) }}" alt=""
                                    class="w-full rounded-[15px] max-w-[380px]" />
                                <div
                                    class="group shadow-card pl-5 pr-5 md:pl-10 md:pr-16 lg:pl-5 lg:pr-5 xl:pl-10 xl:pr-16 py-5 rounded-2xl absolute top-[50%] md:top-[63%] z-10 bg-white -right-0 h-[146px] hover:h-[185px] transition-all duration-300 hover:bg-buisness-red hover:shadow-business-red-sm hover:-translate-y-[22px] overflow-hidden h5-story_slider_active_card">
                                    <span class="absolute right-2 top-bottom-moving">
                                        @include('theme.theme_7.svg.card_shape')
                                    </span>
                                    <h1 class="text-paragraph group-hover:text-white transition-all duration-300">
                                        {{ $project?->created_at->format('F d, Y') }}
                                    </h1>
                                    <h2 class="text-18 sm:text-20 font-semibold mt-3 max-w-[255px] group-hover:text-white">
                                        {{ $project?->title }}
                                    </h2>
                                    <a href="{{ route('portfolio.show', $project?->slug) }}">
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
                </div>
                @else
                <div class="text-center py-16">
                    <p class="text-paragraph text-18 mb-4">{{ __('No projects found') }}</p>
                    @if(isset($query) && $query)
                        <a href="{{ route('portfolio') }}" class="text-buisness-red hover:underline">{{ __('View All Projects') }}</a>
                    @endif
                </div>
                @endif
                <div class="w-full flex justify-center mt-[30px]">
                    <!-- pagination start -->
                    @if ($projects->hasPages())
                        <div class="flex items-center gap-5  ">
                            {{-- Previous Page Link --}}
                            @if ($projects->onFirstPage())
                                <button aria-label="left"
                                    class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black cursor-pointer"
                                    disabled>
                                    <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-colors duration-300"
                                            d="M5.80078 1L1.00078 7L5.80078 13" stroke="#6D6D6D" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            @else
                                <a href="{{ $projects->previousPageUrl() }}" aria-label="left"
                                    class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black cursor-pointer">
                                    <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-colors duration-300"
                                            d="M5.80078 1L1.00078 7L5.80078 13" stroke="#6D6D6D" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                                @if ($page == $projects->currentPage())
                                    <button
                                        class="text-14 sm:text-base text-main-black font-semibold hover:text-buisness-red">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}"
                                        class="text-14 sm:text-base text-paragraph font-semibold hover:text-buisness-red">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($projects->hasMorePages())
                                <a href="{{ $projects->nextPageUrl() }}" aria-label="right"
                                    class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black cursor-pointer">
                                    <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-colors duration-300"
                                            d="M1 1L5.8 7L0.999999 13" stroke="#6D6D6D" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @else
                                <button aria-label="right"
                                    class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black cursor-pointer"
                                    disabled>
                                    <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-colors duration-300"
                                            d="M1 1L5.8 7L0.999999 13" stroke="#6D6D6D" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </button>
                            @endif
                        </div>
                    @endif
                </div>
                <!-- pagination end -->
            </div>
        </section>
        <!-- projects list end -->

    </main>
@endsection
