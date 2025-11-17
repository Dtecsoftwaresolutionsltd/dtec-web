@extends('inner_layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}" />
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}" />
@endsection

@section('frontend_content')
    <main>
        <x-breadcrumb name="{{ __('Blogs') }}" />
        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div
                class="theme-container w-full mx-auto grid grid-cols-8 lg:grid-cols-12 gap-y-16 lg:gap-y-0 lg:gap-x-[70px]">
                <!-- blogs start  -->
                <div class="col-span-8">
                    @forelse ($blogs as $key => $blog)
                        <!-- single blog start -->
                        <div class="w-full {{ $key == 0 ? '' : 'mt-[50px]' }}">
                            <img src="{{ asset($blog?->image) }}" alt="" class="w-full object-cover rounded-sm" />
                            <div class="flex flex-row flex-wrap mt-5 gap-2 md:gap-[30px]">
                                <div class="flex items-center gap-2.5">
                                    <img src="{{ $blog?->author?->image == '' ? asset($general_setting?->default_avatar) : asset($blog?->author?->image) }}"
                                        alt="" class="w-[30px] aspect-square rounded-full object-cover" />
                                    <p class="text-paragraph">{{ $blog?->author?->name }}</p>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <div class="w-[5px] aspect-square rounded-full bg-purple/20"></div>
                                    <p class="text-paragraph">{{ $blog?->created_at?->format('F d, Y') }}</p>
                                </div>
                                <div class="flex items-center gap-2.5">
                                    <div class="w-[5px] aspect-square rounded-full bg-purple/20"></div>
                                    <p class="text-paragraph">{{ __('Comments') }} ({{ $blog?->total_comment }})</p>
                                </div>
                            </div>
                            <hr class="border-purple/10 mt-5" />
                            <h1
                                class="text-24 sm:text-[30px] leading-[40px] tracking-tight text-main-black font-semibold mt-[30px]">
                                {{ $blog?->title }}
                            </h1>
                            <p class="text-paragraph mt-[22px] mb-[25px]">{{ $blog?->short_description }}</p>

                            <a href="{{ route('blog', $blog?->slug) }}">
                                <div class="flex items-center gap-2 group hover:text-main-black">
                                    <p
                                        class="mb-[1px] font-medium text-paragraph leading-5 font-inter border-b border-transparent before:block before:pb-[1px] before:border-main-black before:font-medium before:text-main-black before:leading-5 before:font-inter before:border-b before:content-['Read_More'] before:absolute before:-bottom-[1px] before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-[21px] relative">
                                        {{ __('Read More') }}
                                    </p>
                                    {{ get_svg('read-more') }}
                                </div>
                            </a>
                        </div>
                        <!-- single blog end -->
                    @empty
                        @include('blog_not_found')
                    @endforelse
                    <!-- pagination start -->
                    @if ($blogs->hasPages())
                        <div class="flex items-center gap-5 mt-10">
                            {{-- Previous Page Link --}}
                            @if ($blogs->onFirstPage())
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
                                <a href="{{ $blogs->previousPageUrl() }}" aria-label="left"
                                    class="size-6 sm:size-9 flex items-center justify-center rounded-full text-paragraph hover:text-black border border-gray-100 hover:border-black cursor-pointer">
                                    <svg width="7" height="14" viewBox="0 0 7 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-colors duration-300"
                                            d="M5.80078 1L1.00078 7L5.80078 13" stroke="#6D6D6D" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                                @if ($page == $blogs->currentPage())
                                    <button
                                        class="text-14 sm:text-base text-paragraph font-semibold hover:text-buisness-red">{{ $page }}</button>
                                @else
                                    <a href="{{ $url }}"
                                        class="text-14 sm:text-base text-paragraph font-semibold hover:text-buisness-red">{{ $page }}</a>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($blogs->hasMorePages())
                                <a href="{{ $blogs->nextPageUrl() }}" aria-label="right"
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
                    <!-- pagination end -->
                </div>
                <!-- blogs end  -->
                <!-- side bar start -->
                @include('blog_sidebar')
                <!-- side bar end  -->
            </div>
        </section>
        <!-- main container  end  -->

    </main>

@endsection