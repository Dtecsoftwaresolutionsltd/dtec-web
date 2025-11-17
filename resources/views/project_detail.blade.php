@extends('inner_layout')
@section('title')
    <title>{{ __($project->translate->seo_title) }} || {{ __($project->translate->title) }}</title>
    <meta name="title" content="{{ __($project->translate->seo_title) }}">
    <meta name="description" content="{{ __($project->translate->seo_description) }}">
@endsection
@push('style_section')
    <style>
        .active-video-player {
            display: flex !important;
        }
    </style>
@endpush
@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Project Details') }}" />
        <!-- detail - video -->
        <section class="w-full pt-16 md:pt-[130px]">
            <div class="theme-container mx-auto w-full">
                <div class="grid grid-cols-6 md:grid-cols-12 items-center">
                    <div class="col-span-6">
                        <h1 class="text-24 sm:text-34 leading-[55px] tracking-tight font-semibold text-main-black">
                            {{ __('Overview') }}
                        </h1>
                        <p class="max-w-[533px] text-18 lg:text-24 lg:leading-[40px] text-paragraph mt-2.5 md:mt-3.5">
                            {{ $project?->author_comment }}
                        </p>
                        <div class="flex items-center gap-5 mt-3.5 md:mt-8 w-fit">
                            <div class="w-14 h-14 rounded-full overflow-hidden">
                                <img src="{{ $project?->author_image == '' ? asset($general_setting->default_avatar) : asset($project?->author_image) }}"
                                    alt="" class="w-full object-cover" />
                            </div>
                            <div>
                                <h1 class="text-main-black text-18 font-semibold">
                                    {{ ucfirst($project?->author_name) }}
                                </h1>
                                <p class="text-sm leading-7 font-medium text-paragraph">
                                    {{ $project?->author_designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 flex justify-center items-center mt-5 md:mt-0">
                        <img src="{{ asset($project?->thumb_image) }}" alt="" class="w-full rounded-[20px]" />
                        <button type="button" aria-label="play-video"
                            class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center absolute">
                            <span
                                class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-white relative">
                                <span>
                                    <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.9611 8.29308L2.99228 12.8467C1.65896 13.6086 0 12.6459 0 11.1102V2.00295C0 0.467309 1.65896 -0.495425 2.99228 0.266469L10.9611 4.82011C12.3048 5.5879 12.3048 7.52529 10.9611 8.29308Z"
                                            fill="#FF002A" />
                                    </svg>
                                </span>
                                <div class="absolute w-full h-full rounded-full h5-play-btn-line1"></div>
                                <div class="absolute w-[130%] h-[130%] rounded-full h5-play-btn-line2"></div>
                                <div class="absolute w-[160%] h-[160%] rounded-full h5-play-btn-line3"></div>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- detail video -->
        <!-- requirement -->
        <section class="w-full py-16 md:py-20">
            <div class="theme-container mx-auto w-full">
                <div class="html-description">
                    {!! clean($project?->description) !!}
                </div>
            </div>
        </section>
        <!-- requirement -->
        <!-- service  -->
        <section class="">
            <div class="theme-container w-full mx-auto">
                <div
                    class="w-full flex flex-col sm:flex-row justify-between items-center border-t border-purple/10 pt-10 md:pt-[60px] pb-20 gap-5">
                    @if ($previousProject)
                        <div class="flex items-center gap-[50px]">
                            <img src="{{ asset($previousProject?->thumb_image) }}" alt=""
                                class="w-[110px] aspect-square rounded-lg object-cover" />
                            <div class="">
                                <p class="text-sm font-semibold text-paragraph">
                                    {{ $previousProject?->category?->name }}
                                </p>
                                <a href="{{ route('portfolio.show', $previousProject?->slug) }}"
                                    class="text-18 lg:text-22 font-semibold text-main-black mt-2 font-inter line-clamp-2">
                                    {{ $previousProject?->title }}
                                </a>
                            </div>
                        </div>
                    @endif
                    {{ get_svg('innerpage.divider') }}
                    @if ($nextProject)
                        <div class="flex items-center gap-[50px]">
                            <img src="{{ asset($nextProject?->thumb_image) }}" alt=""
                                class="w-[110px] aspect-square rounded-lg object-cover" />
                            <div class="">
                                <p class="text-sm font-semibold text-paragraph">
                                    {{ $nextProject?->category?->name }}
                                </p>
                                <a href="{{ route('portfolio.show', $nextProject?->slug) }}"
                                    class="text-18 lg:text-22 font-semibold text-main-black mt-2 font-inter line-clamp-2">
                                    {{ $nextProject?->title }}
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>


    </main>
@endsection
<!-- video player modal start   -->
@section('popup_video')
    <div id="video-player"
        class="video-play-btn fixed top-0 left-0 w-screen h-screen bg-black/70 z-[51] hidden justify-center items-center  player-open-anim transition-all duration-300 overflow-hidden origin-top-left">
        <button class="text-24 text-white/90 transition-all duration-300 hover:text-white/100 absolute right-10 top-10">
            {{ __('X') }}
        </button>
        <iframe class="absolute aspect-video max-w-[1280px] max-h-[720px]"
            src="https://www.youtube.com/embed/{{ $project?->video_url === null ? 'ZUXNCY2R5Wo' : $project?->video_url }}?si=E8zWRcLieSpVH2z4"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
        </iframe>
    </div>
@endsection