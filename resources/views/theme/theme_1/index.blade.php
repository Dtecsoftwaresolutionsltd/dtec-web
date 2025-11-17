<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset($general_setting?->favicon) }}" type="image/x-icon" />
    <title>{{ $seo_setting?->seo_title }}</title>
    <!--Todo: library css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--Todo: overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}" />

    @laravelPWA
</head>

<body class="home-one relative">
    @include('components.preloder')
    <!--Todo: web-Menu start  -->
    <header>
        <div class="header-wrapper w-full fixed left-0 top-0 z-20 xl:block hidden h1-header-sticky h1-header-sticky-qs">
            <div class="2xl:px-[110px] px-5 mx-auto relative">
                <div
                    class="w-full h-[45px] justify-between items-center pl-[50px] bg-white border border-[#e7e8e9] hidden h1-top-bar">

                      
                    <div class="2xl:w-[1021px] w-full h-full flex items-center justify-end custom_style">
                        <div class="flex space-x-2.5 items-center mr-7">
                            <span>
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M21 10.5001C21 10.0087 20.9947 9.01723 20.9842 8.52439C20.9189 5.45886 20.8862 3.92609 19.7551 2.79066C18.6239 1.65523 17.0497 1.61568 13.9012 1.53657C11.9607 1.48781 10.0393 1.48781 8.09882 1.53656C4.95033 1.61566 3.37608 1.65521 2.24495 2.79065C1.11382 3.92608 1.08114 5.45885 1.01576 8.52438C0.994745 9.51007 0.994745 10.4899 1.01577 11.4756C1.08114 14.5412 1.11383 16.0739 2.24496 17.2094C3.37608 18.3448 4.95033 18.3843 8.09883 18.4634C8.90159 18.4836 9.70108 18.4954 10.5 18.4989"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M1 4L7.91302 7.92462C10.4387 9.35846 11.5613 9.35846 14.087 7.92462L21 4"
                                        stroke="white" stroke-width="1.5" stroke-linejoin="round" />
                                    <path
                                        d="M21 15.5L13 15.5M21 15.5C21 14.7998 19.0057 13.4915 18.5 13M21 15.5C21 16.2002 19.0057 17.5085 18.5 18"
                                        stroke="white" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="text-white">{{ __('Email') }} :
                                <u>{{ $footer?->email }}</u></span>
                        </div>

                        <div class="flex gap-[14px] items-center mr-[50px]">

                            <div id="currency_select_inner"
                                class="custom-select home-1 relative flex gap-1 items-center pr-5 text-white">
                                <form action="{{ route('currency-switcher') }}" id="currency_switcher_form_home_one"
                                    method="GET">
                                    <select name="currency_code" id="currency_switcher" class="hidden"
                                        aria-placeholder="">
                                        <option value="" class="">USD</option>
                                        @foreach ($currency_list as $currency)
                                            <option @selected(Session::get('currency_code') == $currency->currency_code) value="{{ $currency->currency_code }}"
                                                class="">
                                                {{ $currency->currency_code }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                                <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <span>
                                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            {{-- language select --}}
                            <div id="language_select"
                                class="custom-select home-page relative flex gap-1 items-center pr-5 text-white">
                                <form action="{{ route('language-switcher') }}" id="language_switcher_form_home"
                                    method="GET">
                                    <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                        <option value="" class="">
                                            English
                                        </option>
                                        @foreach ($language_list as $language)
                                            <option @selected(Session::get('front_lang') == $language->lang_code) value="{{ $language->lang_code }}">
                                                {{ $language->lang_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </form>
                                <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <span>
                                        <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="w-full h-[95px] flex justify-between items-center px-[50px] border border-[#e7e8e9] bg-white border-t-0 relative">
                    <div class="flex 2xl:space-x-[100px] xl:space-x-10 justify-between items-center w-full xl:w-auto">
                        <div>
                            <a href="{{ route('home') }}" aria-label="logo">
                                <img src="{{ asset($general_setting->logo) }}" alt=""
                                    class="light-version-logo">
                            </a>
                        </div>
                        <div>
                            <ul class="flex space-x-10 items-center">
                                {{-- menu desktop  --}}
                                @if ($menu)
                                    @foreach ($menu_items as $item)
                                        @if ($item?->parent_id == null)
                                            <li class="group relative">
                                                <a class="text-paragraph font-semibold hover:underline hover:text-purple flex items-center gap-2"
                                                    href="{{ $item?->url ? url('/') . $item?->url : 'javascript:void(0)' }}"
                                                    target="{{ $item?->target }}">
                                                    {{ $item->title }}
                                                    @if ($menu_items?->where('parent_id', $item?->id)?->count() > 0)
                                                        <svg class="transition-all duration-300 group-hover:rotate-180"
                                                            width="10" height="10" viewBox="0 0 19 10"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2 2L9.5 8L17 2" stroke="currentColor"
                                                                stroke-width="3" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                    @endif
                                                </a>

                                                @if ($menu_items?->where('parent_id', $item?->id)?->count() > 0)
                                                    <div
                                                        class="absolute px-2 -left-7 h-0 group-hover:h-[480px] overflow-hidden top-5 transition-all duration-700">
                                                        <ul
                                                            class="max-h-fit min-w-[200px] bg-white mt-8 transition-all duration-300 overflow-hidden px-5 top-20 pb-4 rounded-b-md">
                                                            @foreach ($menu_items?->where('parent_id', $item?->id) as $sub_menu)
                                                                <li class="relative py-1">
                                                                    <a class="home-two-nav-item leading-5 relative hover:text-purple w-fit text-paragraph font-medium font-inter"
                                                                        href="{{ $sub_menu?->url ? url('/') . $sub_menu?->url : 'javascript:void(0)' }}"
                                                                        target="{{ $sub_menu->target }}">
                                                                        {{ $sub_menu?->title }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                                {{-- menu end --}}

                            </ul>
                        </div>
                    </div>
                    <div class="xl:flex hidden space-x-4 items-center">
                         <form action="{{ route('project.search') }}" method="GET">

                                      <div class="flex items-center gap-2 rounded-[100px] border border-purple/10  px-4 py-2  transition-all duration-300">
                                        <button type="submit" class="cursor-pointer" for="hh-search" type="button">
                                            <svg class="cursor-pointer" width="17" height="17"
                                                viewBox="0 0 17 17" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.9729 7.46687C13.9729 10.922 11.172 13.7229 7.71687 13.7229C4.26176 13.7229 1.46084 10.922 1.46084 7.46687C1.46084 4.01176 4.26176 1.21084 7.71687 1.21084C11.172 1.21084 13.9729 4.01176 13.9729 7.46687ZM7.71687 14.9337C11.8407 14.9337 15.1837 11.5907 15.1837 7.46687C15.1837 3.34303 11.8407 0 7.71687 0C3.59303 0 0.25 3.34303 0.25 7.46687C0.25 11.5907 3.59303 14.9337 7.71687 14.9337ZM16.5333 16.2832C15.9108 16.9056 14.9016 16.9056 14.2791 16.2832L12.7673 14.7713C13.6473 14.1617 14.4118 13.3972 15.0214 12.5172L16.5333 14.029C17.1557 14.6515 17.1557 15.6607 16.5333 16.2832Z"
                                                    fill="#6D6D6D" />
                                            </svg>
                                        </button>
                                          <input id="hh-search" type="text" name="query"
                                            class="outline-none "
                                            placeholder="Search..." />

                                      </div>

                                </form>
                        <a href="{{ route('user.wishlist.index') }}">
                            <div
                                class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] relative">
                                <span>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.6851 2.99997L11 3.7025L10.315 2.99998C8.18404 0.814692 4.72912 0.81469 2.5982 2.99998C0.5245 5.12659 0.460783 8.5538 2.45393 10.7599L8.18026 17.0981C9.70154 18.782 12.2984 18.782 13.8197 17.0981L19.5461 10.7599C21.5392 8.55377 21.4755 5.12657 19.4018 2.99996C17.2709 0.814677 13.816 0.814679 11.6851 2.99997Z"
                                            stroke="#101828" stroke-width="1.73333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span
                                    class="absolute -top-1 cartCount -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs wishlist_count">
                                    {{ $wishlist_count ?? 0 }}
                                </span>
                            </div>
                        </a>
                        <a href="{{ route('cart.cart') }}" class="cart_btn">
                            <div
                                class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] relative">
                                <span>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M2.58683 10H21.4132M18.0351 6L5.96486 6C3.45403 6 1.57594 8.32624 2.08312 10.808L3.71804 18.808C4.09787 20.6666 5.71942 22 7.59978 22H16.4002C18.2806 22 19.9021 20.6666 20.282 18.808L21.9169 10.808C22.4241 8.32624 20.546 6 18.0351 6Z"
                                            stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9 2L6 6" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15 2L18 6" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 14L9 18" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15 14L15 18" stroke="#28303F" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span
                                    class="absolute -top-1 cartCount -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs">
                                    {{ $cart_count }}
                                </span>
                            </div>
                        </a>
                        <a href={{ !Auth::guard('web')->user() ? route('user.login') : route('user.dashboard') }}>
                            <div class="home-two-btn-bg py-3   group bg-blue-seo border-blue-seo">
                                <span
                                    class="text-base  text-white group-hover:text-blue-seo  transition-all duration-300 font-semibold font-inter relative z-10">
                                    @if (!Auth::guard('web')->user())
                                        {{ __('Sign In') }}
                                    @else
                                        {{ __('Dashboard') }}
                                    @endif
                                </span>
                                @if (!Auth::guard('web')->user())
                                    <span
                                        class="relative z-10 text-white group-hover:text-blue-seo transition-all duration-300">
                                        <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.84289 11.625H8.84961M5.09961 11.625H5.10633"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path
                                                d="M1.17547 14.1336C1.34413 15.3862 2.38171 16.3676 3.64435 16.4257C4.70682 16.4745 5.78609 16.5 6.97461 16.5C8.16313 16.5 9.24241 16.4745 10.3049 16.4257C11.5675 16.3676 12.6051 15.3862 12.7738 14.1336C12.8838 13.316 12.9746 12.4782 12.9746 11.625C12.9746 10.7718 12.8838 9.93399 12.7738 9.11644C12.6051 7.86377 11.5675 6.88237 10.3049 6.82432C9.24241 6.77548 8.16313 6.75 6.97461 6.75C5.78609 6.75 4.70681 6.77548 3.64435 6.82432C2.38171 6.88237 1.34413 7.86377 1.17547 9.11644C1.06539 9.93399 0.974609 10.7718 0.974609 11.625C0.974609 12.4782 1.06539 13.316 1.17547 14.1336Z"
                                                stroke="currentColor" stroke-width="1.5" />
                                            <path
                                                d="M3.59961 6.75V4.875C3.59961 3.01104 5.11065 1.5 6.97461 1.5C8.83857 1.5 10.3496 3.01104 10.3496 4.875V6.75"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--Todo: mobile-Menu start  -->
    <header class="flex xl:hidden flex-col relative">
        <div class="h-16 bg-white flex items-center justify-between fixed top-0 left-0 z-50 w-full px-2.5">
            <a href="{{ route('home') }}" aria-label="logo">
                <img src="{{ asset($general_setting->logo) }}" alt="logo" />
            </a>
            <div class="flex sm:gap-3.5  gap-1 items-center">
                <a href="{{ route('user.wishlist.index') }}">
                            <div
                                class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] relative">
                                <span>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.6851 2.99997L11 3.7025L10.315 2.99998C8.18404 0.814692 4.72912 0.81469 2.5982 2.99998C0.5245 5.12659 0.460783 8.5538 2.45393 10.7599L8.18026 17.0981C9.70154 18.782 12.2984 18.782 13.8197 17.0981L19.5461 10.7599C21.5392 8.55377 21.4755 5.12657 19.4018 2.99996C17.2709 0.814677 13.816 0.814679 11.6851 2.99997Z"
                                            stroke="#101828" stroke-width="1.73333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span
                                    class="absolute -top-1 cartCount -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs wishlist_count">
                                    {{ $wishlist_count ?? 0 }}
                                </span>
                            </div>
                        </a>
                <a href="{{ route('cart.cart') }}" class="cart_btn">
                    <div
                        class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] relative">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.58683 10H21.4132M18.0351 6L5.96486 6C3.45403 6 1.57594 8.32624 2.08312 10.808L3.71804 18.808C4.09787 20.6666 5.71942 22 7.59978 22H16.4002C18.2806 22 19.9021 20.6666 20.282 18.808L21.9169 10.808C22.4241 8.32624 20.546 6 18.0351 6Z"
                                    stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 2L6 6" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15 2L18 6" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9 14L9 18" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15 14L15 18" stroke="#28303F" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                        <span
                            class="absolute -top-1 cartCount -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs">
                            {{ $cart_count }}
                        </span>
                    </div>
                </a>
                <button aria-label="mobile-Menu" class="text-black size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] toggle_nav_menu"
                    id="mobile_nav_toggle_menu">
                    <svg class="pointer-events-none transition-all duration-300 fill-current" width="14" height="10"
                            viewBox="0 0 14 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M1 5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M1 9H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                     <svg class="pointer-events-none hidden transition-all duration-300 fill-current" width="20"
                            height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.9275 5.00006L4.92749 15M14.9275 14.9999L4.92749 5" stroke="#FF002A"
                                stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                </button>
            </div>
        </div>
        <div class="transition-all duration-300">
            <div class="w-full h-screen fixed bg-black/80 z-40 -left-full transition-all duration-300 delay-150"
                id="mobile-nav-div-overlay"></div>
            <div class="fixed h-screen overflow-y-scroll pb-[100px] bg-white w-full top-16 -left-full z-50 transition-all duration-300 delay-0"
                id="mobile-nav-div">
                <div class="flex gap-28 flex-col pl-5 pt-5">
                    <ul class="flex flex-col text-paragraph text-base leading-5 font-medium font-inter mb-10">
                        {{-- menu mobile  --}}
                        @if ($menu)
                            @foreach ($menu_items as $item)
                                @if ($item?->parent_id == null)
                                    <li class="border-b  border-b-purple/10 p-4">
                                        <a href="{{ $item->url ? url('/') . $item->url : 'javascript:void(0)' }}"
                                            class="home-two-nav-item relative before:hidden before:content-['{{ $item?->title }}'] {{ $menu_items?->where('parent_id', $item?->id)?->count() > 0 ? 'w-full m-nav-dropdown flex items-center justify-between' : '' }}"
                                            target="{{ $item?->target }}">
                                            {{ $item?->title }}
                                            @if ($menu_items?->where('parent_id', $item?->id)?->count() > 0)
                                                <svg class="pointer-events-none" width="10" height="10" viewBox="0 0 19 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                            @endif
                                        </a>
                                        @if ($menu_items?->where('parent_id', $item?->id)?->count() > 0)
                                            <ul
                                                class="mobile-sub-nav h-[auto] overflow-hidden transition-all duration-300 pl-5 pt-4">
                                                @foreach ($menu_items?->where('parent_id', $item?->id) as $sub_item)
                                                    <li class="relative pb-4">
                                                        <a class="home-two-nav-item leading-5 relative hover:text-purple w-full py-1"
                                                            href="{{ $sub_item?->url ? url('/') . $sub_item?->url : 'javascript:void(0)' }}"
                                                            target="{{ $sub_item?->target }}">
                                                            {{ $sub_item?->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        {{-- menu mobile end --}}
                    </ul>
                </div>
                <div class="flex gap-5 flex-col pl-5 mt-5">
                    <div class="flex gap-[14px] items-center home_two_curr_lang">
                        <div id="currency_select"
                            class="custom-select relative w-[124px] flex gap-1 items-center pr-5 text-[#161519] border border-black/10 px-4 py-2 rounded-md">
                            <form action="{{ route('currency-switcher') }}" id="currency_switcher_form_mobile">
                                <select name="currency_code" id="currency" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('Currency') }}
                                    </option>
                                    @foreach ($currency_list as $currency)
                                        <option @selected(Session::get('currency_code') == $currency->currency_code) value="{{ $currency->currency_code }}">
                                            {{ $currency->currency_code }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        {{-- language select --}}
                        <div id="language_select"
                            class="custom-select mobile relative w-[124px] flex gap-1 items-center pr-5 text-[#161519] border border-black/10 px-4 py-2 rounded-md">
                            <form action="{{ route('language-switcher') }}" id="language_switcher_form_mobile">
                                <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                    <option value="" class="display-none">
                                        {{ __('Language') }}
                                    </option>
                                    @foreach ($language_list as $language)
                                        <option @selected(Session::get('front_lang') == $language->lang_code) value="{{ $language->lang_code }}">
                                            {{ $language->lang_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </form>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none">
                                <span>
                                    <svg width="12" height="6" viewBox="0 0 12 6" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3 pr-5">
                        <a href="{{ Auth::guard('web')->user() ? route('user.dashboard') : route('user.login') }}">
                        <div class="home-two-btn-bg py-2.5 group bg-blue-seo/10 border-blue-seo/10 group-hover:border-blue-seo w-full">
                            <span
                                class="text-base text-black group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                                {{ Auth::guard('web')->user() ? __('Dashboard') : __('Log In') }}
                            </span>
                            <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="text-black group-hover:stroke-blue-seo transition-all duration-300"
                                    d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                    @if(!Auth::guard('web')->check())
                     <a href="{{ route('user.register') }}">
                        <div class="home-two-btn-bg py-2.5 group bg-blue-seo border-blue-seo w-full">
                            <span
                                class="text-base text-white group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                                {{('Sign Up') }}
                            </span>
                            <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="group-hover:stroke-blue-seo transition-all duration-300"
                                    d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div>
                <main>
                    <!--Todo: hero -->
                    @foreach ($section_visibility?->where('serial_number', '1') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: clients -->
                    @foreach ($section_visibility?->where('serial_number', '2') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: about -->
                    @foreach ($section_visibility?->where('serial_number', '3') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: fun fact -->
                    @foreach ($section_visibility?->where('serial_number', '4') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: service -->
                    @foreach ($section_visibility?->where('serial_number', '5') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: working Process -->
                    @foreach ($section_visibility?->where('serial_number', '6') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: testimonial -->
                    @foreach ($section_visibility?->where('serial_number', '7') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: blogs -->
                    @foreach ($section_visibility?->where('serial_number', '8') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach

                    <!--Todo: consultation -->
                    @foreach ($section_visibility?->where('serial_number', '9') as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_1.' . $visibility->component_name)
                        @endif
                    @endforeach
                </main>
                <footer>
                    <div class="footer-one-wrapper w-full md:pt-[130px] pt-[70px]">
                        <div class="theme-container mx-auto">
                            <div class="w-full">
                                <div
                                    class="top-bar w-full flex md:flex-row md:justify-between items-center flex-col space-y-10 md:space-y-0 md:mb-[60px] mb-10">
                                    <div>
                                        <img src="{{ asset($general_setting?->footer_logo) }}" alt="" />
                                    </div>
                                    <ul class="flex md:gap-14 gap-5 flex-wrap md:items-center">
                                        <li
                                            class="text-18 hover:text-purple hover:underline common-transition text-paragraph font-semibold">
                                            <a href="{{ $footer?->facebook }}">{{ __('Facebook') }}</a>
                                        </li>
                                        <li
                                            class="text-18 hover:text-purple hover:underline common-transition text-paragraph font-semibold">
                                            <a href="{{ $footer?->twitter }}">{{ __('Twitter') }}</a>
                                        </li>
                                        <li
                                            class="text-18 hover:text-purple hover:underline common-transition text-paragraph font-semibold">
                                            <a href="{{ $footer?->instagram }}">{{ __('Instagram') }}</a>
                                        </li>
                                        <li
                                            class="text-18 hover:text-purple hover:underline common-transition text-paragraph font-semibold">
                                            <a href="{{ $footer?->linkedin }}">{{ __('Linkedin') }}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div
                                    class="w-full py-[80px] pt-[60px] border-t border-[e7e3fa] grid xl:grid-cols-12 md:grid-cols-3 md:gap-10 grid-cols-2 gap-8">
                                    <div class="xl:col-span-3">
                                        <div class="w-full mb-10">
                                            <p class="text-main-black text-18 font-semibold mb-[30px]">
                                                {{ __('Address') }}
                                            </p>
                                            <p class="font-medium text-paragraph">
                                                {{ $footer?->address }}
                                            </p>
                                        </div>
                                        <div class="w-full">
                                            <p class="text-main-black text-18 font-semibold mb-[30px]">
                                                {{ __('Contact') }}
                                            </p>
                                            <p class="font-medium text-paragraph">
                                                {{ $footer?->email }} <br />
                                                {{ $footer?->phone }}
                                            </p>
                                        </div>
                                    </div>
                                    @if ($footer_menu)
                                        @foreach ($footer_menus as $item)
                                            @if ($item?->parent_id == null)
                                                <div class="xl:col-span-2">
                                                    <div class="w-full">
                                                        <p class="text-main-black text-18 font-semibold mb-[30px]">
                                                            {{ $item?->title }}
                                                        </p>
                                                        <ul class="flex flex-col space-y-2.5">
                                                            @if ($footer_menus?->where('parent_id', $item?->id)->count() > 0)
                                                                @foreach ($footer_menus->where('parent_id', $item->id) as $sub_menu)
                                                                    <li
                                                                        class="hover:text-purple hover:underline common-transition text-paragraph font-medium">
                                                                        <a
                                                                            href="{{ $sub_menu?->url ? url('/') . $sub_menu?->url : 'javascript:void(0)' }}">{{ $sub_menu?->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="xl:col-span-3 col-span-2 md:col-span-1">
                                        <div class="w-full md:mb-10">
                                            <p class="text-main-black text-18 font-semibold mb-[30px]">
                                                {{ __('Newsletter') }}
                                            </p>
                                            <p class="font-medium text-paragraph mb-[30px]">
                                                {{ __('Subscribe newsletter to get updates') }}
                                            </p>
                                            <form action="{{ route('store-newsletter') }}" method="post">
                                                @csrf
                                                <div class="mb-2.5">
                                                    <input placeholder="Email Address" id="eOne" name="email"
                                                        type="text"
                                                        class="placeholder:text-paragraph w-full h-[56px] bg-main-gray border border-[#e7e3fa] focus:border-purple focus:outline-none focus:right-0 rounded-full px-[25px]" />
                                                </div>

                                                <button type="submit">
                                                    <div
                                                        class="home-two-btn-bg py-3 group bg-purple border-purple inline-flex">
                                                        <span
                                                            class="text-base text-white group-hover:text-purple transition-all duration-300 font-inter relative z-10">{{ __('Subscribe') }}
                                                        </span>
                                                        {{ get_svg('home_cta_white') }}
                                                    </div>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:h-[65px] h-10 inner_layout_footer">
                            <div class="theme-container mx-auto h-full">
                                <div class="w-full h-full flex justify-between items-center md:text-base text-xs">
                                    <span class="text-white">{{ $footer?->copyright }}</span>
                                    <div class="relative md:block hidden">
                                        <a href="#" aria-label="go top"
                                            class="w-[45px] h-[45px] rounded-full border-[3px] border-white flex justify-center items-center bg-purple absolute -top-[55px]">
                                            <span>
                                                <svg width="45" height="45" viewBox="0 0 45 45"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="22.5" cy="22.5" r="21" fill="#794aFF"
                                                        stroke="white" stroke-width="3" />
                                                    <path d="M19 21L23 17M23 17L27 21M23 17V29" stroke="white"
                                                        stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                    <ul class="md:space-x-6 items-center md:flex hidden">
                                        <li
                                            class="hover:text-purple hover:underline common-transition text-paragraph font-medium">
                                            <a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                                        </li>
                                        <li class="text-paragraph font-medium">|</li>
                                        <li
                                            class="hover:text-purple hover:underline common-transition text-paragraph font-medium">
                                            <a
                                                href="{{ route('terms-conditions') }}">{{ __('Terms & Conditions') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lottie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script>
        AOS.init({
            disable: 'mobile', // Disables AOS on phones and tablets
            // Other AOS options...
        });
    </script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/ScrollSmoother.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        "use strict";
        $(document).ready(function() {

            const mdropMenu = document.querySelectorAll(".m-nav-dropdown");

            if (mdropMenu) {
                mdropMenu.forEach((item) => {
                    item.addEventListener("click", (e) => {
                        e.preventDefault();
                        const nextElement = item.nextElementSibling;
                        if (nextElement && nextElement.classList.contains('mobile-sub-nav')) {
                            nextElement.classList.toggle("active");
                        }
                    });
                });
            }



            //desktop currency select
            $(document).on('click', '#currency_select_inner.custom-select.home-1 .select-items > div', function(e) {

                $('#currency_switcher_form_home_one').submit();
            })
            //mobile currency select
            $(document).on('click', '#currency_select.custom-select .select-items > div', function() {
                $('#currency_switcher_form_mobile').submit();
            })

            //desktop language select
            $(document).on('click', '#language_select.custom-select.home-page .select-items > div', function() {
                $('#language_switcher_form_home').submit();
            })
            //mobile
            $(document).on('click', '#language_select.mobile .select-items > div', function() {
                $('#language_switcher_form_mobile').submit();
            })
        });
    </script>

    <script>
        const session_notify_message = @json(Session::get('message'));
        const demo_mode_message = @json(Session::get('demo_mode'));

        if (session_notify_message != null) {
            const session_notify_type = @json(Session::get('alert-type', 'info'));
            switch (session_notify_type) {
                case 'info':
                    toastr.info(session_notify_message);
                    break;
                case 'success':
                    toastr.success(session_notify_message);
                    break;
                case 'warning':
                    toastr.warning(session_notify_message);
                    break;
                case 'error':
                    toastr.error(session_notify_message);
                    break;
            }
        }

        const validation_errors = @json($errors->all());

        if (validation_errors.length > 0) {
            validation_errors.forEach(error => toastr.error(error));
        }
    </script>
</body>

</html>
