@extends('inner_layout')
@section('title')
    <title>{{ $blog->seo_title }}</title>
    <meta name="title" content="{{ $blog->seo_title }}">
    <meta name="description" content="{{ $blog->seo_description }}">
@endsection

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Blog Details') }}" />
        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div
                class="theme-container w-full mx-auto grid grid-cols-8 lg:grid-cols-12 gap-y-16 lg:gap-y-0 lg:gap-x-[70px]">
                <!-- blogs start  -->
                <div class="col-span-8">
                    <!-- single blog start -->
                    <div class="w-full">
                        <img src="{{ asset($blog?->image) }}" alt="" class="w-full object-cover" />
                        <h1
                            class="text-24 sm:text-[30px] leading-[40px] tracking-tight text-main-black font-semibold mt-[30px] mb-5">
                            {{ $blog?->title }}
                        </h1>
                        <div class="mb-[25px]">

                            <div class="render-nodes">
                                {!! clean($blog?->description) !!}
                            </div>

                        </div>
                        <div class="flex flex-col sm:flex-row justify-between">
                            <div class="">
                                <h1 class="text-18 text-main-black font-semibold">
                                    {{ __('Popular Tags') }}
                                </h1>
                                <div class="mt-3 flex gap-2.5 flex-wrap">
                                    @foreach (json_decode($blog?->tags) as $tag)
                                        <a href="{{ route('blogs', ['tag' => $tag->value]) }}"
                                            class="group overflow-hidden flex justify-center items-center relative text-sm border border-purple/10 rounded-md py-1.5 before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-main-black before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                            <span
                                                class="px-[18px] relative z-20 transition-colors ease-in-out duration-300 group-hover:text-white">
                                                {{ $tag?->value }}
                                            </span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-4 sm:mt-0">
                                <h1 class="text-18 text-main-black font-semibold">
                                    {{ __('Share projects') }}
                                </h1>
                                <div class="mt-3 flex gap-6 flex-wrap">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog?->slug) }}&t={{ $blog?->title }}"
                                        aria-label="facebook"
                                        class="text-paragraph hover:text-buisness-red transition-all duration-300"
                                        target="__blank">
                                        {{ get_svg('innerpage.facebook') }}
                                    </a>
                                    <a href="https://twitter.com/share?text={{ $blog?->title }}&url={{ route('blog', $blog?->slug) }}"
                                        aria-label="twitter"
                                        class="text-paragraph hover:text-buisness-red transition-all duration-300"
                                        target="__blank">
                                        {{ get_svg('innerpage.twitter') }}
                                    </a>
                                    <a href="https://www.instagram.com/?url={{ route('blog', $blog?->slug) }}"
                                        aria-label="instagram"
                                        class="text-paragraph hover:text-buisness-red transition-all duration-300"
                                        target="__blank">
                                        {{ get_svg('innerpage.instagram') }}
                                    </a>
                                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog?->slug) }}&title={{ $blog?->title }}"
                                        aria-label="dribble"
                                        class="text-paragraph hover:text-buisness-red transition-all duration-300"
                                        target="__blank">
                                        {{ get_svg('innerpage.linkedin') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Author  -->
                        <div
                            class="w-full border border-purple/10 mt-[50px] rounded-[10px] px-4 md:px-[40px] pb-10 bg-main-gray">
                            <div class="w-full flex flex-col sm:flex-row gap-4 md:gap-[30px] mt-[30px] items-center">
                                <img src="{{ $blog?->author?->image == '' ? asset($general_setting?->default_avatar) : asset($blog?->author?->image) }}"
                                    alt="" class="w-[150px] h-[150px] rounded-full object-cover" />
                                <div class="flex-1">
                                    <h1 class="text-18 text-main-black font-semibold">
                                        {{ $blog?->author?->name }}
                                    </h1>
                                    <p class="text-paragraph mt-1.5">
                                        {{ $blog?->author?->about_me }}
                                    </p>
                                    <div class="mt-4 flex gap-6 flex-wrap">
                                        <a href="{{ $blog?->author?->facebook }}" aria-label="facebook"
                                            class="text-paragraph hover:text-buisness-red transition-all duration-300">
                                            {{ get_svg('innerpage.facebook') }}
                                        </a>
                                        <a href="{{ $blog?->author?->twitter }}" aria-label="twitter"
                                            class="text-paragraph hover:text-buisness-red transition-all duration-300">
                                            {{ get_svg('innerpage.twitter') }}
                                        </a>
                                        <a href="{{ $blog?->author?->instagram }}" aria-label="instagram"
                                            class="text-paragraph hover:text-buisness-red transition-all duration-300">
                                            {{ get_svg('innerpage.instagram') }}
                                        </a>
                                        <a href="{{ $blog?->author?->linkedin }}" aria-label="linkedin"
                                            class="text-paragraph hover:text-buisness-red transition-all duration-300">
                                            {{ get_svg('innerpage.linkedin') }}
                                        </a>
                                    </div>
                                </div>
                                <div></div>
                            </div>
                        </div>
                        <!-- comments -->
                        <div class="mt-[60px]">
                            <h1 class="text-[30px] tracking-tight font-semibold text-main-black pb-10">
                                {{ __('Comments') }}
                                {{ $blog?->total_comment == 0 ? '0' : str_pad($blog?->total_comment, 2, '0', STR_PAD_LEFT) }}
                            </h1>
                            @foreach ($blog?->comments as $blog_comment)
                                <!-- comment  -->
                                <div class="flex flex-col md:flex-row items-center gap-10 md:mr-6 mb-[53px]">
                                    <div class="w-[120px] h-[120px] ">
                                        <img src="{{ asset($general_setting?->default_avatar) }}" alt=""
                                            class="w-full h-full object-cover rounded-[10px]" />
                                    </div>

                                    <div class="flex-1">
                                        <div class="flex flex-col sm:flex-row items-center justify-center">
                                            <h1 class="flex-1 text-18 font-semibold text-main-black">
                                                {{ $blog_comment?->name }}
                                            </h1>
                                            <p class="font-medium text-paragraph">
                                                {{ $blog_comment?->created_at?->format('F d, Y') }}
                                            </p>
                                        </div>
                                        <p class="text-paragraph mb-1.5">
                                            {{ $blog_comment?->comment }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- comment form  -->
                        <div class="border border-purple/10 bg-main-gray rounded-[10px] p-4 md:p-[50px]">
                            <h1 class="text-[30px] tracking-tight font-semibold text-main-black pb-6">
                                {{ __('Leave a Comment') }}
                            </h1>
                            <p class="text-paragraph mb-[30px]">
                                {{ __(' Your email address will not be published. Required fields are marked *') }}
                            </p>
                            <form action="{{ route('store-blog-comment', $blog?->id) }}" method="POST"
                                class="grid grid-cols-6 md:grid-cols-12 gap-[30px]">
                                @csrf
                                <input type="text" placeholder="Full Name" name="name" value="{{ old('name') }}"
                                    class="col-span-6 h-14 px-5 outline-main-black focus:outline-1 rounded-md" />
                                <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                    class="col-span-6 h-14 px-5 outline-main-black focus:outline-1 rounded-md" />
                                <textarea name="comment" placeholder="Comments"
                                    class="col-span-6 md:col-span-12 p-5 outline-main-black focus:outline-1 h-[100px] rounded-md">{{ old('comment') }}</textarea>

                                <div class="col-span-6 md:col-span-12">
                                    <button type="submit"
                                        class="home-two-btn-bg py-3 group bg-main-black border-main-black inline-flex">
                                        <span
                                            class="text-base text-white group-hover:text-main-black transition-all duration-300 font-inter relative z-10">
                                            {{ __('Send Comments') }}
                                        </span>

                                        {{ get_svg('white-black') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- blogs end  -->
                <!-- side bar start -->
                @include('blog_sidebar')
                <!-- side bar end  -->
            </div>
        </section>

    </main>
@endsection