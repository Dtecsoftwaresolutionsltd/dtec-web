@extends('inner_layout')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@section('frontend_content')

    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Shop') }}" />
        <!-- breadcrumb-ends -->

        <!-- shop-list-starts -->
        <section class="product md:py-[130px] pt-16">
            <div class="theme-container mx-auto">
                <div class="xl:hidden section-head mb-30 flex items-center justify-between">
                    <h3 class="text-30 font-medium">{{ __('Popular Products') }}</h3>
                    <button class="lg:hidden filterBtn">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 7H6M6 7C6 8.65685 7.34315 10 9 10C10.6569 10 12 8.65685 12 7C12 5.34315 10.6569 4 9 4C7.34315 4 6 5.34315 6 7ZM3 17H9M18 17H21M18 17C18 18.6569 16.6569 20 15 20C13.3431 20 12 18.6569 12 17C12 15.3431 13.3431 14 15 14C16.6569 14 18 15.3431 18 17ZM15 7H21"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </button>
                </div>
                <div class="grid lg:grid-cols-12 gap-30">
                    <div id="filter" class="lg:col-span-3">
                        @include('frontend.shop.sidebar_search')
                    </div>
                    <div class="lg:col-span-9">
                        <!-- shop-filter -->
                        <!-- section-topbar -->
                        <div class="flex flex-col sm:flex-row justify-between items-center gap-30 mb-30 product-topbar">
                            <div class="flex sm:justify-end justify-start flex-wrap items-center gap-3">
                                <button
                                    class="tab-btn size-12 bg-white border border-grayscale-300 rounded-full flex items-center justify-center text-primary-400 active before:hidden"
                                    data-tab="tabId1">
                                    <span class="tab-icon">
                                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M5 15H0V10H5V15ZM15 15H10V10H15V15ZM5 5H0V0H5V5ZM15 5H10V0H15V5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </button>
                                <button
                                    class="tab-btn size-12 bg-white border border-grayscale-300 rounded-full flex items-center justify-center before:hidden"
                                    data-tab="tabId2">
                                    <span class="tab-icon">
                                        <svg width="25" height="9" viewBox="0 0 25 9" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M25 9H0V7H25V9ZM25 2H0V0H25V2Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                </button>
                                <p class="text-18 text-black">{{ __('Showing') }}
                                    {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }}
                                    {{ __('results') }}
                                </p>
                            </div>
                            <div class="flex items-center flex-wrap gap-5">
                                <div id="filter_select"
                                    class="custom-select relative w-[200px]  border border-grayscale-300 rounded-[100px] p-3 px-6">
                                    <select name="filter" id="filter" class="hidden" aria-placeholder="">
                                        <option value="sState" class="">
                                            {{ __('Default sorting') }}
                                        </option>
                                        <option value="default" class="">
                                            {{ __('Default sorting') }}
                                        </option>
                                        <option value="new" @if (request('sort_by') == 'newest') selected @endif class="">
                                            {{ __('Newest') }}
                                        </option>
                                        <option @if (request('sort_by') == 'oldest') selected @endif value="old" class="">
                                            {{ __('Oldest') }}
                                        </option>
                                        <option value="price(a-z)" @if (request('sort_by') == 'price(a-z)') selected @endif
                                            class="">
                                            {{ __('Price(A-Z)') }}
                                        </option>
                                        <option value="price(z-a)" @if (request('sort_by') == 'price(z-a)') selected @endif
                                            class="">
                                            {{ __('Price(Z-A)') }}
                                        </option>
                                    </select>
                                    <div class="absolute right-5 top-6 pointer-events-none">
                                        <span>
                                            <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                                <div id="page_limit"
                                    class="custom-select relative w-[150px] border border-grayscale-300 rounded-[100px] p-3 px-6">
                                    <select name="page_limit" id="page_limit" class="hidden" aria-placeholder="">
                                        <option value=""> {{ __(' Show : 9') }}</option>
                                        <option value="9" @if (request('item_quantity') == 9) selected @endif class="">
                                            {{ __('9') }}
                                        </option>
                                        <option value="15" @if (request('item_quantity') == 15) selected @endif class="">
                                            {{ __('15') }}
                                        </option>
                                        <option @if (request('item_quantity') == 18) selected @endif value="18" class="">
                                            {{ __('18') }}
                                        </option>
                                        <option value="24" @if (request('item_quantity') == 24) selected @endif class="">
                                            {{ __('24') }}
                                        </option>
                                    </select>
                                    <div class="absolute right-5 top-6 pointer-events-none">
                                        <span>
                                            <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1 1L6 5L11 1" stroke="#28303F" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section-topbar -->
                        <!-- tab-content -->
                        <div class="content active" id="tabId1">
                            <!-- shop-list -->
                            @if ($products->count() > 0)
                                <div class="grid sm:grid-cols-2  xl:grid-cols-3 gap-30">
                                    <!-- column-starts -->

                                    @foreach ($products as $product)
                                        <div>
                                            <div class="product-wrapper group overflow-hidden">
                                                <div
                                                    class="bg-buisness-gray rounded-[10px] relative flex justify-center items-center aspect-[300/366] w-full overflow-hidden">
                                                    <!-- product-top -->
                                                    @if($product->offer_price)
                                                    <div class="flex items-center gap-[6px] absolute left-3.5 top-3.5">
                                                        <!-- discount -->
                                                        <span class="px-3 py-1 rounded-full bg-buisness-red text-white text-sm">
                                                             {{ round($product->offer_price) }} % {{ __(' Off') }}
                                                        </span>
                                                    </div>
                                                    @endif
                                                    <!-- Top Right Icons -->
                                                    <div
                                                        class="absolute top-3.5 -right-10 group-hover:right-3.5 flex flex-col gap-2 transition-all duration-300">

                                                        <a href="{{ route('product.view', $product?->slug) }}"
                                                            class="bg-white rounded-full size-10 flex items-center justify-center transition-all text-headline hover:text-error-dark group">
                                                            <span class="text-main-black hover:text-red-500">
                                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M0.667969 3.18947V5.71272H1.31913H1.97029V4.31815V2.91815L4.98192 5.92978L7.99355 8.94141L8.46565 8.46389L8.94316 7.99179L5.93154 4.98017L2.91991 1.96854H4.31991H5.71448V1.31737V0.66621H3.19123H0.667969V3.18947Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M14.2873 1.31737V1.96854H15.6819H17.0819L14.0702 4.98017L11.0586 7.99179L11.5361 8.46389L12.0082 8.94141L15.0198 5.92978L18.0315 2.91815V4.31815V5.71272H18.6826H19.3338V3.18947V0.66621H16.8105H14.2873V1.31737Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M4.96564 14.0793L1.97029 17.0801V15.6801V14.2855H1.31913H0.667969V16.8088V19.332H3.19123H5.71448V18.6809V18.0297H4.31991H2.91991L5.93154 15.0181L8.94316 12.0065L8.48192 11.5452C8.23231 11.2902 8.00983 11.084 7.99355 11.084C7.97727 11.084 6.61526 12.4351 4.96564 14.0793Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M11.5198 11.5452L11.0586 12.0065L14.0702 15.0181L17.0819 18.0297H15.6819H14.2873V18.6809V19.332H16.8105H19.3338V16.8088V14.2855H18.6826H18.0315V15.6801V17.0801L15.0307 14.0793C13.3865 12.4351 12.0245 11.084 12.0082 11.084C11.9919 11.084 11.7694 11.2902 11.5198 11.5452Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        <a href="javascript:void(0)"
                                                            class="bg-white rounded-full size-10 flex items-center justify-center transition-all text-headline hover:text-error-dark group"
                                                            data-url="{{ route('user.wishlist.store') }}"
                                                            onclick="addToWishlist({{ $product->id }}, this)">
                                                            <span class="text-main-black hover:text-red-500">
                                                                <svg width="24" class="{{ Auth::check() && Auth::user()->wishlists()->where('product_id', $product->id)->exists() ? 'active' : '' }}" height="24" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17 6.50029C18.1045 6.50029 19 7.39572 19 8.50029M12 5.70283L12.6851 5.0003C14.816 2.81501 18.2709 2.815 20.4018 5.00029C22.4755 7.12689 22.5392 10.5541 20.5461 12.7602L14.8197 19.0985C13.2984 20.7823 10.7015 20.7823 9.18026 19.0985L3.45393 12.7602C1.46078 10.5541 1.5245 7.12691 3.5982 5.00031C5.72912 2.81502 9.18404 2.81502 11.315 5.00031L12 5.70283Z"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>

                                                            </span>
                                                        </a>

                                                    </div>


                                                    <!-- Product Image -->
                                                    <img src="{{ $product?->thumbnail_image }}" alt="Modern Gold Door Handle"
                                                        class="aspect-[184/237] w-[184px]  object-cover  mx-auto my-auto">

                                                    <button
                                                        class=" size-[50px] group-hover:w-[161px] transition-all duration-200 bg-main-black flex items-center justify-center gap-2 text-white absolute bottom-0 right-0 group-hover:rounded-tl-[10px] cart-add-btn"
                                                        data-product-id="{{ $product->id }}" data-text="{{ __('Add to Cart') }}">
                                                        <span
                                                            class="hidden group-hover:block text-nowrap transition-all duration-300">{{ __('Add to Cart') }}</span>
                                                        <span>
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.9165 18.792C11.9165 19.5514 12.5321 20.167 13.2915 20.167C14.0509 20.167 14.6665 19.5514 14.6665 18.792C14.6665 18.0326 14.0509 17.417 13.2915 17.417C12.5321 17.417 11.9165 18.0326 11.9165 18.792Z"
                                                                    stroke="white" stroke-width="1.5" />
                                                                <path
                                                                    d="M3.6665 18.792C3.6665 19.5514 4.28211 20.167 5.0415 20.167C5.8009 20.167 6.4165 19.5514 6.4165 18.792C6.4165 18.0326 5.8009 17.417 5.0415 17.417C4.28211 17.417 3.6665 18.0326 3.6665 18.792Z"
                                                                    stroke="white" stroke-width="1.5" />
                                                                <path
                                                                    d="M16.4998 3.66634L5.49984 3.66634C3.47479 3.66634 1.83317 5.30796 1.83317 7.33301L1.83317 11.9163C1.83317 13.9414 3.47479 15.583 5.49984 15.583L12.8332 15.583C14.8582 15.583 16.4998 13.9414 16.4998 11.9163L16.4998 3.66634ZM16.4998 3.66634C16.4998 2.65382 17.3206 1.83301 18.3332 1.83301L20.1665 1.83301M16.4998 7.33301L2.2915 7.33301"
                                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </span>

                                                    </button>

                                                </div>
                                                <!-- Product Info -->
                                                <div class="mt-3">
                                                    @php
                                                        $rating = $product?->avg_rating ?? 0;
                                                        $fullStars = floor($rating);
                                                        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                                                        $emptyStars = 5 - $fullStars - $halfStar;

                                                    @endphp
                                                    <div class="flex items-center gap-1 mb-1 text-yellow-light">
                                                        <!-- Stars -->
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            {{ get_svg('innerpage.star_full') }}
                                                        @endfor
                                                        @if ($halfStar)
                                                            {{ get_svg('innerpage.half_star') }}
                                                        @endif
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            {{ get_svg('innerpage.empty_star') }}
                                                        @endfor
                                                        <span class="text-16 text-black ml-2">
                                                            ({{ $product->review_count }} {{ __('Ratings') }})
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('product.view', $product?->slug) }}"
                                                        class="text-24 font-inter pb-2 hover:underline underline-offset-2 line-clamp-1">
                                                        {{ $product?->name }}
                                                    </a>
                                                    <h6 class="text-main-black text-18 font-semibold">
                                                        <span>
                                                            {!! $product->price_display !!}
                                                        </span>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                @include('frontend.shop.not_found')
                            @endif
                        </div>
                        <div class="content" id="tabId2">
                            <!-- shop-list -->
                            @if (count($products) > 0)
                                <div class="grid  gap-30">

                                    @foreach ($products as $product)
                                        <div>
                                            <div
                                                class="product-wrapper flex flex-col sm:flex-row items-center gap-5 sm:gap-[70px]  group overflow-hidden">
                                                <div
                                                    class="bg-buisness-gray rounded-[10px] relative flex justify-center items-center aspect-[343/418] h-[418px] overflow-hidden">
                                                    <!-- product-top -->
                                                    @if($product->offer_price)
                                                    <div class="flex items-center gap-[6px] absolute left-3.5 top-3.5">
                                                        <!-- discount -->
                                                        <span class="px-3 py-1 rounded-full bg-buisness-red text-white text-sm">
                                                             {{ round($product->offer_price) }} % {{ __(' Off') }}
                                                        </span>
                                                    </div>
                                                    @endif
                                                    <!-- Top Right Icons -->
                                                    <div
                                                        class="absolute top-3.5 right-3.5 flex flex-col gap-2 transition-all duration-300">

                                                        <a href="{{ route('product.view', $product?->slug) }}"
                                                            class="bg-white rounded-full size-10 flex items-center justify-center transition-all text-headline hover:text-error-dark group"
                                                           >
                                                            <span class="text-main-black hover:text-red-500">
                                                                <svg width="20"  height="20" viewBox="0 0 20 20" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M0.667969 3.18947V5.71272H1.31913H1.97029V4.31815V2.91815L4.98192 5.92978L7.99355 8.94141L8.46565 8.46389L8.94316 7.99179L5.93154 4.98017L2.91991 1.96854H4.31991H5.71448V1.31737V0.66621H3.19123H0.667969V3.18947Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M14.2873 1.31737V1.96854H15.6819H17.0819L14.0702 4.98017L11.0586 7.99179L11.5361 8.46389L12.0082 8.94141L15.0198 5.92978L18.0315 2.91815V4.31815V5.71272H18.6826H19.3338V3.18947V0.66621H16.8105H14.2873V1.31737Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M4.96564 14.0793L1.97029 17.0801V15.6801V14.2855H1.31913H0.667969V16.8088V19.332H3.19123H5.71448V18.6809V18.0297H4.31991H2.91991L5.93154 15.0181L8.94316 12.0065L8.48192 11.5452C8.23231 11.2902 8.00983 11.084 7.99355 11.084C7.97727 11.084 6.61526 12.4351 4.96564 14.0793Z"
                                                                        fill="currentColor" />
                                                                    <path
                                                                        d="M11.5198 11.5452L11.0586 12.0065L14.0702 15.0181L17.0819 18.0297H15.6819H14.2873V18.6809V19.332H16.8105H19.3338V16.8088V14.2855H18.6826H18.0315V15.6801V17.0801L15.0307 14.0793C13.3865 12.4351 12.0245 11.084 12.0082 11.084C11.9919 11.084 11.7694 11.2902 11.5198 11.5452Z"
                                                                        fill="currentColor" />
                                                                </svg>
                                                            </span>
                                                        </a>

                                                        <a href="javascript:void(0)"
                                                            class="bg-white rounded-full size-10 flex items-center justify-center transition-all text-headline hover:text-error-dark group"
                                                            data-url="{{ route('user.wishlist.store') }}"
                                                            onclick="addToWishlist({{ $product->id }}, this)">
                                                            <span class="text-main-black hover:text-red-500">
                                                                <svg width="24" class="{{ Auth::check() && Auth::user()->wishlists()->where('product_id', $product->id)->exists() ? 'active' : '' }}" height="24" viewBox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M17 6.50029C18.1045 6.50029 19 7.39572 19 8.50029M12 5.70283L12.6851 5.0003C14.816 2.81501 18.2709 2.815 20.4018 5.00029C22.4755 7.12689 22.5392 10.5541 20.5461 12.7602L14.8197 19.0985C13.2984 20.7823 10.7015 20.7823 9.18026 19.0985L3.45393 12.7602C1.46078 10.5541 1.5245 7.12691 3.5982 5.00031C5.72912 2.81502 9.18404 2.81502 11.315 5.00031L12 5.70283Z"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>

                                                            </span>
                                                        </a>
                                                    </div>


                                                    <!-- Product Image -->
                                                    <img src="{{ $product?->thumbnail_image }}" alt="Modern Gold Door Handle"
                                                        class="aspect-[184/237] w-[184px]  object-cover  mx-auto my-auto">

                                                </div>
                                                <!-- Product Info -->
                                                <div class="mt-3 max-w-[433px] w-full flex-1">
                                                    @php
                                                        $rating = $product?->avg_rating ?? 0;
                                                        $fullStars = floor($rating);
                                                        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                                                        $emptyStars = 5 - $fullStars - $halfStar;

                                                    @endphp
                                                    <div class="flex items-center gap-1 mb-1 text-yellow-light">
                                                        <!-- Stars -->
                                                        @for ($i = 0; $i < $fullStars; $i++)
                                                            {{ get_svg('innerpage.star_full') }}
                                                        @endfor
                                                        @if ($halfStar)
                                                            {{ get_svg('innerpage.half_star') }}
                                                        @endif
                                                        @for ($i = 0; $i < $emptyStars; $i++)
                                                            {{ get_svg('innerpage.empty_star') }}
                                                        @endfor
                                                        <span class="text-16 text-black ml-2">
                                                            ({{ $product->review_count }} {{ __('Ratings') }})
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('product.view', $product?->slug) }}"
                                                        class="text-24 font-inter pb-2 hover:underline underline-offset-2 line-clamp-1">
                                                        {{ $product?->name }}
                                                    </a>
                                                    <h6 class="text-main-black text-18 font-semibold">
                                                        <span>
                                                            {!! $product->price_display !!}
                                                        </span>
                                                    </h6>

                                                    <p class="text-16 text-paragraph mt-5">
                                                        {{ $product?->translate?->short_description }}
                                                    </p>
                                                    <!-- Add to Cart Button -->
                                                    <button class="btn-dark mt-10 cart-add-btn" data-product-id="{{ $product->id }}"
                                                        data-text="{{ __('Add to Cart') }}">
                                                        <span>   {{ __('Add to Cart') }}</span>

                                                        <span>
                                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.9165 18.792C11.9165 19.5514 12.5321 20.167 13.2915 20.167C14.0509 20.167 14.6665 19.5514 14.6665 18.792C14.6665 18.0326 14.0509 17.417 13.2915 17.417C12.5321 17.417 11.9165 18.0326 11.9165 18.792Z"
                                                                    stroke="white" stroke-width="1.5" />
                                                                <path
                                                                    d="M3.6665 18.792C3.6665 19.5514 4.28211 20.167 5.0415 20.167C5.8009 20.167 6.4165 19.5514 6.4165 18.792C6.4165 18.0326 5.8009 17.417 5.0415 17.417C4.28211 17.417 3.6665 18.0326 3.6665 18.792Z"
                                                                    stroke="white" stroke-width="1.5" />
                                                                <path
                                                                    d="M16.4998 3.66634L5.49984 3.66634C3.47479 3.66634 1.83317 5.30796 1.83317 7.33301L1.83317 11.9163C1.83317 13.9414 3.47479 15.583 5.49984 15.583L12.8332 15.583C14.8582 15.583 16.4998 13.9414 16.4998 11.9163L16.4998 3.66634ZM16.4998 3.66634C16.4998 2.65382 17.3206 1.83301 18.3332 1.83301L20.1665 1.83301M16.4998 7.33301L2.2915 7.33301"
                                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                @include('frontend.shop.not_found')
                            @endif
                        </div>
                        <!-- pagination  -->
                        @include('frontend.shop.paginate')
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-list-end -->

    </main>

@endsection

@push('script_section')
    <script>
        // page limit hand
        $(document).ready(function () {
            $(document).on('click', '#page_limit.custom-select .select-items > div', function () {
                const getVal = parseInt($(this).text());
                $('#item_quantity').val(getVal);
                $('#filterForm').submit();
            });
            $(document).on('click', '#filter_select.custom-select .select-items > div', function () {
                const filterVal = $(this).text().trim().toLowerCase();
                const sortBy = $('#sort_by').val(filterVal);
                $('#filterForm').submit();
            })
        });
    </script>
@endpush
