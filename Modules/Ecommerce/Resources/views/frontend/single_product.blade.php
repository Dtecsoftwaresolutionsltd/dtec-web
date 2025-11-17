@extends('inner_layout')
@section('title')
    <title>{{ $product->translate?->seo_title }}</title>
    <meta name="title" content="{{ $product->translate?->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($product->translate?->seo_description)) !!}">
@endsection

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Product Details') }}" />
        <!-- breadcrumb-ends -->

        <!-------------------- product-details-starts -------------------->
        <section class="product-details py-20">
            <div class="theme-container mx-auto">
                <div class="product-details-section">
                    <div class="grid lg:grid-cols-2 gap-10">
                        <!-- colums-start -->
                        <div class="overflow-hidden">
                            <div class="swiper product-showcase-3-5 mb-5 custom-single-product-swiper">
                                <div class="swiper-wrapper flex">
                                    <div class="swiper-slide">
                                        <div
                                            class="aspect-[705/720] bg-buisness-gray flex justify-center items-center overflow-hidden rounded-2xl">
                                            <img src="{{ asset($product?->thumbnail_image) }}" class="aspect-[470/440]" />
                                        </div>
                                    </div>
                                    @foreach ($product?->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <div
                                                class="aspect-[705/720] w-full bg-buisness-gray flex justify-center items-center overflow-hidden rounded-2xl">
                                                <img src="{{ asset($gallery?->image) }}" class="aspect-[470/440]" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div thumbsSlider="" class="swiper product-showcase-3-4">
                                <div class="swiper-wrapper">

                                    <div class="swiper-slide">
                                        <div
                                            class="flex justify-center items-center rounded-lg bg-buisness-gray aspect-[126/118] overflow-hidden product-img">
                                            <img src="{{ asset($product?->thumbnail_image) }}"
                                                class="w-full h-full object-cover" />
                                        </div>
                                    </div>

                                    @foreach ($product?->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <div
                                                class="flex justify-center items-center rounded-lg bg-buisness-gray  aspect-[126/118] overflow-hidden product-img">
                                                <img src="{{ asset($gallery?->image) }}" class="w-full h-full object-cover" />
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- column-starts -->
                        <div>
                            <div class="max-w-[543px] w-full">
                                <p class="text-paragraph mb-2">{{ $product?->category?->name }}</p>
                                <h3 class="text-[36px] mb-5">{{ $product?->name }}</h3>
                                <!-- items -->
                                <div class="flex flex-col sm:flex-row sm:items-center gap-2.5 mb-5">
                                    @php
                                        $rating = $product?->avg_rating ?? 0;
                                        $fullStars = floor($rating);
                                        $halfStar = $rating - $fullStars >= 0.5 ? 1 : 0;
                                        $emptyStars = 5 - $fullStars - $halfStar;
                                    @endphp
                                    <div class="flex items-center gap-1 svg-color">
                                        @for ($i = 0; $i < $fullStars; $i++)
                                            {{ get_svg('innerpage.star_full') }}
                                        @endfor
                                        @if ($halfStar)
                                            {{ get_svg('innerpage.half_star') }}
                                        @endif @for ($i = 0; $i < $emptyStars; $i++)
                                            {{ get_svg('innerpage.empty_star') }}
                                        @endfor
                                    </div>
                                    <p class="text-14 text-main-black">({{ $product?->review_count }} Review)</p>
                                </div>
                                <!-- items -->
                                <div class="mb-6 pb-6 border-b border-buisness-red/10">
                                    <div class="flex items-center gap-4 mb-4">
                                        @php
                                            $offerprice=$product->offer_price;
                                            $price=$product->price;
                                            $discount=($offerprice*$price)/100;
                                            $discount=$price - $discount;
                                        @endphp
                                        <h4 class="text-[36px]">
                                            @if($product->offer_price)
                                            <span class="text-24 text-paragraph line-through">{{ currency($product->price) }}</span>
                                            @endif
                                            <span class="text-buisness-red">{{ currency($product->offer_price ? $discount : $product->price) }}</span>
                                        </h4>

                                    </div>
                                    <p class="text-base text-paragraph">
                                        {{ $product?->translate?->short_description }}
                                    </p>
                                </div>

                                <!-- button-items -->
                                <div class="mb-6 max-w-[474px] w-full">
                                    <h6 class="text-18 font-semibold mb-3">{{ __('Quantity') }}</h6>
                                    <div class="flex flex-wrap items-center gap-3 ">
                                        <div
                                            class="inline-flex items-center justify-between bg-white  border border-main-black min-w-full sm:min-w-[174px] px-6 rounded-[4px]">
                                            <button
                                                class="px-2 quantity__minus h-11 text-2xl text-grey-200 hover:text-green qty-minus">
                                                −
                                            </button>
                                            <input type="text" readonly value="1" name="quantity"
                                                class="quantity__input size-10 px-2 text-headline text-18 text-center qty-value" />
                                            <button
                                                class="px-2 quantity__plus h-11 text-2xl text-grey-400 hover:text-green qty-plus">
                                                +
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" data-product-id="{{ $product?->id }}"
                                            data-text="{{ __('Add to Cart') }}"
                                            class="home-two-btn-white-rev cart-add-btn min-w-[220px] bg-transparent text-main-black rounded-[4px] border py-2 border-main-black hover:text-black before:hidden after:hidden">
                                            {{ __('Add to Cart') }} </a>
                                        <button
                                            class="size-12 rounded-[4px] border border-main-black flex justify-center items-center"
                                            data-url="{{ route('user.wishlist.store') }}"
                                            onclick="addToWishlist({{ $product->id }}, this)">
                                            <span class="">
                                                <svg class="{{ auth()?->check() && $product?->wishlists()?->where('user_id', auth()?->id())?->exists() ? 'active' : '' }}"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.6851 4.99932L12 5.70185L11.315 4.99934C9.18404 2.81404 5.72912 2.81404 3.5982 4.99933C1.5245 7.12594 1.46078 10.5531 3.45393 12.7593L9.18026 19.0975C10.7015 20.7813 13.2984 20.7813 14.8197 19.0975L20.5461 12.7592C22.5392 10.5531 22.4755 7.12592 20.4018 4.99932C18.2709 2.81403 14.816 2.81403 12.6851 4.99932Z"
                                                        fill="currentColor" />
                                                </svg>

                                            </span>
                                        </button>
                                        <a href="javscript:void(0)" data-url="{{ route('cart.cart') }}" data-product-id="{{ $product?->id }}" class="btn-dark cart-add-btn w-full view_cart_btn !rounded-[4px]">{{ __('Buy Now') }}</a>
                                    </div>
                                </div>
                                <!-- shipping-details -->
                                <div>
                                    <div>
                                        <p class="text-base text-paragraph flex gap-2 mb-2">
                                            <span>{{ __('MKS  :') }}</span>
                                            <span
                                                class="text-black">{{ $product?->sku == null ? 'J-8521' : $product?->sku }}</span>
                                        </p>
                                        <p class="text-base text-paragraph flex gap-2 mb-2">
                                            <span>{{ __('Category :') }}</span>
                                            <span class="text-black">{{ $product?->category?->name }}</span>
                                        </p>
                                        <p class="text-base text-paragraph flex gap-2 mb-2">
                                            <span>{{ __('Tags :') }}</span>
                                            <span class="text-black">
                                                @php
                                                    $tags = collect(json_decode($product?->tags))
                                                        ->pluck('value')
                                                        ->implode(', ');
                                                @endphp
                                                {{ $tags }}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-description -->
                <div class="product-description pt-12">
                    <!-- navs & Tabs -->
                    <div class="tab-items flex items-center gap-16 border-b border-b-buisness-red/10 py-3.5">
                        <button class="tab-btn text-20 text-paragraph font-medium active" data-tab="tabId1">
                            <span>{{ __('Description') }}</span>
                        </button>
                        <button class="tab-btn text-20 text-paragraph font-medium" data-tab="tabId2">
                            <span>{{ __('Reviews') }} ({{ $product?->review_count }})</span>
                        </button>
                    </div>

                    <div class="content-items pt-30">
                        <div class="content active" id="tabId1">
                            {!! clean($product?->translate?->description) !!}
                        </div>
                        <div class="content" id="tabId2">
                            <div class="grid gap-8">
                                <!-- Review 1 -->
                                @foreach ($product->reviews as $review)
                                    <div class="border-b border-buisness-red/10 pb-8">
                                        <div class="flex flex-col sm:flex-row items-start gap-3.5">
                                            <div class="size-[64px] rounded-full overflow-hidden">
                                                @if ($review?->user && $review?->user?->image)
                                                    <img src="{{ asset($review?->user?->image) }}" alt="Cameron Williamson"
                                                        class="h-full w-full  object-cover" />
                                                @else
                                                    <img src="{{ asset($general_setting?->default_avatar) }}"
                                                        alt="Cameron Williamson" class="h-full w-full object-cover" />
                                                @endif
                                            </div>

                                            <div class="flex-1">
                                                <span class="text-20 font-semibold text-black mb-4">
                                                    @if ($review?->user && $review?->user?->name)
                                                        {{ $review?->user?->name }}
                                                    @else
                                                        {{ __('Anonymous') }}
                                                    @endif
                                                </span>
                                                <div class="text-16p text-paragraph mb-2">
                                                    {{ $review?->reviews }}
                                                </div>
                                                <div class="flex justify-between gap-2 flex-wrap">
                                                    <div class="flex items-center gap-3">
                                                        <span class="flex gap-2">
                                                            @for ($i = 1; $i <= $review?->rating; $i++)
                                                                {{ get_svg('innerpage.star') }}
                                                            @endfor
                                                        </span>
                                                    </div>
                                                    <span class="text-16p text-paragraph">
                                                        {{ $review?->created_at?->format('M d, Y') }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if (auth()->user())
                                <div class="review-form mt-[60px]">
                                    <div class="">
                                        <h4 class="text-24 border-b borsder-buisness-red/10 pb-5 mb-5">
                                            {{ __('Write Your Review') }}
                                        </h4>
                                        <div class="review-items text-sub-paragraph flex items-center gap-3 mb-6">
                                            <div class="flex gap-1" id="star-rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <svg data-rating="{{ $i }}" onclick="listingReview({{ $i }})"
                                                        class="w-5 h-5 fill-gray cursor-pointer transition-all duration-150"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        {{ get_svg('innerpage.rattingstar') }}
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span id="rating-value" class="text-sm text-gray-600">({{ __('0.0') }})</span>
                                        </div>
                                        <form action="{{ route('user-order.reviewSubmit') }}" id="submit-review" method="POST">
                                            @csrf
                                            <input type="hidden" name="rating" id="product_rating" value="0">
                                            <input type="hidden" name="product_id" id="product" value="{{ $product->id }}">
                                            <div class="grid sm:grid-cols-2 gap-y-4 gap-x-6">
                                                <div class="form-wrapper col-span-full">
                                                    <label for="massageBox"
                                                        class="text-16 text-headline mb-2 inline-block">{{ __('Description') }}</label>
                                                    <textarea name="reviews" id="reviews" rows="7"
                                                        class="form-input !h-auto px-4 py-3.5"
                                                        placeholder="Write Your Review"></textarea>
                                                </div>
                                            </div>
                                            <div class="mt-6">
                                                <button type="submit">
                                                    <div class="home-two-btn-bg py-3 group bg-main-black border-main-black">
                                                        <span
                                                            class="text-base text-white group-hover:text-main-black transition-all duration-300 font-semibold font-inter relative z-10">
                                                            {{ __('Submit Review') }}
                                                        </span>
                                                        {{ get_svg('arrow1') }}
                                                    </div>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-------------------- product-details-end -------------------->


        <!-------------------- related-product-starts -------------------->
        @if ($relatedProducts->isNotEmpty())
            <section class="related-product pb-16 md:pb-[130px]">
                <div class="theme-container mx-auto">
                    <div class="product-section">
                        <div class="section-head flex items-center justify-between gap-5 mb-30">
                            <h3 class="text-24 font-semibold">{{ __('Related Product') }}</h3>
                            <div class="related-btn flex items-center gap-3.5">
                                <button
                                    class="pd-btn-next size-9 rounded-full border border-gray-300 flex justify-center items-center group hover:border-black">
                                    <span class="text-gray-300 group-hover:text-black">
                                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M1.04557 5.72559L5.60807 10.3506C5.76432 10.5068 6.01432 10.5068 6.13932 10.3506L6.76432 9.72559C6.92057 9.56934 6.92057 9.35059 6.76432 9.19434L3.07682 5.44434L6.76432 1.72559C6.92057 1.56934 6.92057 1.31934 6.76432 1.19434L6.13932 0.569336C6.01432 0.413086 5.76432 0.413086 5.60807 0.569336L1.04557 5.19434C0.889323 5.35059 0.889323 5.56934 1.04557 5.72559Z"
                                                fill="currentColor" />
                                        </svg>

                                    </span>
                                </button>
                                <button
                                    class="pd-btn-prev size-9 rounded-full border border-gray-300 flex justify-center items-center group hover:border-black">
                                    <span class="text-gray-300 group-hover:text-black">
                                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.73275 5.72559L2.17025 10.3506C2.014 10.5068 1.764 10.5068 1.639 10.3506L1.014 9.72559C0.857747 9.56934 0.857747 9.35059 1.014 9.19434L4.7015 5.44434L1.014 1.72559C0.857747 1.56934 0.857747 1.31934 1.014 1.19434L1.639 0.569336C1.764 0.413086 2.014 0.413086 2.17025 0.569336L6.73275 5.19434C6.889 5.35059 6.889 5.56934 6.73275 5.72559Z"
                                                fill="currentColor" />
                                        </svg>

                                    </span>
                                </button>
                            </div>
                        </div>
                        <!-- product-swiper -->
                        <div class="swiper product-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($relatedProducts as $relatedProduct)
                                    <div class="swiper-slide">
                                        <div class="product-wrapper group overflow-hidden">
                                            <div
                                                class="bg-buisness-gray rounded-[10px] relative flex justify-center items-center aspect-[300/366] w-full overflow-hidden">
                                                <!-- product-top -->
                                                @if($relatedProduct->offer_price)
                                                    <div class="flex items-center gap-[6px] absolute left-3.5 top-3.5">
                                                        <!-- discount -->
                                                        <span class="px-3 py-1 rounded-full bg-buisness-red text-white text-sm">
                                                           {{ $relatedProduct->offer_price }}% {{ __(' Off') }}
                                                        </span>

                                                    </div>
                                                @endif

                                                <!-- Top Right Icons -->
                                                <div
                                                    class="absolute top-3.5 -right-10 group-hover:right-3.5 flex flex-col gap-2 transition-all duration-300">

                                                    <a href="{{ route('product.view', $relatedProduct?->slug) }}"
                                                        class="bg-white rounded-full size-10 flex items-center justify-center transition-all text-headline hover:text-error-dark group"
                                                        data-url="{{ route('user.wishlist.store') }}">
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
                                                        onclick="addToWishlist({{ $relatedProduct->id }}, this)">
                                                        <span class="text-main-black hover:text-red-500">
                                                            <svg width="24" class="{{ Auth::check() && Auth::user()->wishlists()->where('product_id', $relatedProduct->id)->exists() ? 'active' : '' }}" height="24" viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M17 6.50029C18.1045 6.50029 19 7.39572 19 8.50029M12 5.70283L12.6851 5.0003C14.816 2.81501 18.2709 2.815 20.4018 5.00029C22.4755 7.12689 22.5392 10.5541 20.5461 12.7602L14.8197 19.0985C13.2984 20.7823 10.7015 20.7823 9.18026 19.0985L3.45393 12.7602C1.46078 10.5541 1.5245 7.12691 3.5982 5.00031C5.72912 2.81502 9.18404 2.81502 11.315 5.00031L12 5.70283Z"
                                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </span>
                                                    </a>


                                                </div>


                                                <!-- Product Image -->
                                                <img src="{{ asset($relatedProduct?->thumbnail_image) }}" alt="Modern Gold Door Handle"
                                                    class="aspect-[184/237] w-[184px]  object-cover  mx-auto my-auto">

                                                <button
                                                    class=" size-[50px] group-hover:w-[161px] transition-all duration-200 bg-main-black flex items-center justify-center cart-add-btn gap-2 text-white absolute bottom-0 right-0 group-hover:rounded-tl-[10px]"
                                                    data-product-id="{{ $relatedProduct->id }}" data-text="{{ __('Add to Cart') }}">
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
                                                    $rating = $relatedProduct?->avg_rating ?? 0;
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
                                                        ({{ $relatedProduct->review_count }} {{ __('Ratings') }})
                                                    </span>
                                                </div>
                                                <a href="{{ route('product.view', $relatedProduct?->slug) }}"
                                                    class="text-24 font-inter pb-2 hover:underline underline-offset-2 line-clamp-1">
                                                    {{ $relatedProduct?->name }}
                                                </a>
                                                <h6 class="text-main-black text-18 font-semibold">
                                                    <span>
                                                        {!! $relatedProduct->price_display !!}
                                                    </span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!-------------------- related-product-end -------------------->

    </main>

@endsection


@push('script_section')
    <script>
        "use strict";

        $(document).ready(function () {
            $(".quantity__plus").click(function () {
                var quantity = parseInt($(this).prev('.quantity__input').val());
                $(this).prev('.quantity__input').val(quantity + 1);
            });
            $(".quantity__minus").click(function () {
                var quantity = parseInt($(this).next('.quantity__input').val());
                if (quantity > 1) {
                    $(this).next('.quantity__input').val(quantity - 1);
                }
            });

            $('.view_cart_btn').click(function (e) {
                let dataurl=$(this).data('url');
                setTimeout(() => {
                    window.location.href = dataurl;
                }, 1000);
                // window.location.href = dataurl;
            })
        });

        function listingReview(rating) {
            $("[data-rating]").each(function () {
                var listing_rat = $(this).data('rating');
                if (listing_rat <= rating) {
                    $(this).removeClass('fill-gray').addClass('fill-yellow');
                } else {
                    $(this).removeClass('fill-yellow').addClass('fill-gray');
                }
            });

            $("#product_rating").val(rating);
            $("#rating-value").html(`(${rating}.0)`);
        }
        document.getElementById('submit-review').addEventListener('click', function (e) {
            e.preventDefault();
            const reviewForm = document.getElementById('submit-review');
            const reviews = document.getElementById('reviews').value;
            const rating = document.getElementById('product_rating').value;

            if (!reviews.trim()) {
                toastr.error('{{ __('Please write your review before submitting.') }}');
                return;
            }

            if (rating === '0') {
                toastr.error('{{ __('Please select a rating before submitting.') }}');
                return;
            }

            // Create FormData object
            const formData = new FormData(reviewForm);

            // Send form data using fetch
            fetch(reviewForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest' // Add this to indicate AJAX request
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        toastr.success('{{ __('Your review has been submitted successfully.') }}');
                        reviewForm.reset();
                        listingReview(0); // Reset stars
                    } else {
                        toastr.error(data.message || '{{ __('An error occurred. Please try again.') }}');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('{{ __('An error occurred. Please try again later.') }}');
                });
        });
    </script>
@endpush
