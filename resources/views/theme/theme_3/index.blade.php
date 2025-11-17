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

<body class="home-one relative scroll-smooth">
    <!-- Preloader -->
    @include('components.preloder')

    <header class="bg-main-black sticky top-0 z-50 flex-col items-center hidden xl:flex">
        <img src="{{ asset(home3_header_shape_image()) }}" alt="" class="absolute -bottom-14 z-30 anim-light-shadow" />

        <div class="theme-container mx-auto w-full">

            <div
                class="top-bar w-full max-w-[1619px] mx-auto border-b border-[#794AFF33] flex justify-between items-center py-2 2xl:px-0 px-2">
                <div class="flex items-center">
                    <div class="flex space-x-2.5 items-center mr-7 text-white">
                        <span>
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M21 10.5001C21 10.0087 20.9947 9.01723 20.9842 8.52439C20.9189 5.45886 20.8862 3.92609 19.7551 2.79066C18.6239 1.65523 17.0497 1.61568 13.9012 1.53657C11.9607 1.48781 10.0393 1.48781 8.09882 1.53656C4.95033 1.61566 3.37608 1.65521 2.24495 2.79065C1.11382 3.92608 1.08114 5.45885 1.01576 8.52438C0.994745 9.51007 0.994745 10.4899 1.01577 11.4756C1.08114 14.5412 1.11383 16.0739 2.24496 17.2094C3.37608 18.3448 4.95033 18.3843 8.09883 18.4634C8.90159 18.4836 9.70108 18.4954 10.5 18.4989"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M1 4L7.91302 7.92462C10.4387 9.35846 11.5613 9.35846 14.087 7.92462L21 4"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path
                                    d="M21 15.5L13 15.5M21 15.5C21 14.7998 19.0057 13.4915 18.5 13M21 15.5C21 16.2002 19.0057 17.5085 18.5 18"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="text-inherit font-normal">{{ __('Email :') }} <u>{{ $footer?->email }}</u></span>
                    </div>
                    <div class="flex space-x-2.5 items-center mr-7 text-white">
                        <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.77762 11.9424C2.8296 10.2893 2.37185 8.93948 2.09584 7.57121C1.68762 5.54758 2.62181 3.57081 4.16938 2.30947C4.82345 1.77638 5.57323 1.95852 5.96 2.6524L6.83318 4.21891C7.52529 5.46057 7.87134 6.08139 7.8027 6.73959C7.73407 7.39779 7.26737 7.93386 6.33397 9.00601L3.77762 11.9424ZM3.77762 11.9424C5.69651 15.2883 8.70784 18.3013 12.0576 20.2224M12.0576 20.2224C13.7107 21.1704 15.0605 21.6282 16.4288 21.9042C18.4524 22.3124 20.4292 21.3782 21.6905 19.8306C22.2236 19.1766 22.0415 18.4268 21.3476 18.04L19.7811 17.1668C18.5394 16.4747 17.9186 16.1287 17.2604 16.1973C16.6022 16.2659 16.0661 16.7326 14.994 17.666L12.0576 20.2224Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                                <path
                                    d="M22 5L12 5M22 5C22 4.43982 20.604 3.39322 20.25 3M22 5C22 5.56018 20.604 6.60678 20.25 7M12 5C12 4.43982 13.396 3.39322 13.75 3M12 5C12 5.56018 13.396 6.60678 13.75 7"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <span class="text-inherit font-normal">{{ __('Call :') }} {{ $footer?->phone }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-end">

                    <div class="flex gap-[14px] items-center">
                        <div id="currency_select"
                            class="custom-select home_3_desktop_currency relative flex gap-1 items-center pr-5 text-white">
                            <form action="{{ route('currency-switcher') }}" method="get"
                                id="home_three_desktop_currency_form">
                                <select name="currency_code" id="currency" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('USD') }}
                                    </option>
                                    @foreach ($currency_list as $currency)
                                        <option @selected(session('currency_code') == $currency->currency_code)
                                            value="{{ $currency->currency_code }}">
                                            {{ $currency->currency_code }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                            <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none">
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
                            class="custom-select home_3_desktop relative flex gap-1 items-center pr-5 text-white">
                            <form action="{{ route('language-switcher') }}" method="get"
                                id="language_form_home_three_desktop">
                                <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('English') }}
                                    </option>
                                    @foreach ($language_list as $language)
                                        <option @selected(session()->get('front_lang') == $language->lang_code)
                                            value="{{ $language->lang_code }}">
                                            {{ $language->lang_name }}</>
                                    @endforeach

                                </select>
                            </form>
                            <div class="absolute right-0 top-1/2 -translate-y-1/2 pointer-events-none">
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
                </div>
            </div>
        </div>

        <div class="h3-header-wrapper w-full left-0 top-0 relative z-50 bg-main-black">
            <div class="theme-container mx-auto relative w-full">
                <div class="w-full flex justify-between items-center py-5 relative z-10">
                    <div>
                        <a href="{{ route('home') }}" aria-label="logo-home">
                            <img src="{{ asset($general_setting->white_logo) }}" alt="" />
                        </a>
                    </div>
                    <div class="flex space-x-[100px] items-center">
                        <div>
                            <ul class="flex gap-10 text-paragraph text-base leading-5 font-medium font-inter">

                                @if ($menu)
                                    @foreach ($menu_items as $menu_item)
                                        @if ($menu_item?->parent_id == null)
                                            <li class="group relative">
                                                <a href="{{ $menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0)' }}"
                                                    class="home-two-nav-item text-white pb-[1px] leading-5 font-inter relative before:content-[''] delay-200 hover:text-purple before:text-purple before:border-purple @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0) flex gap-2 items-center @endif"
                                                    target="{{ $menu_item?->target }}">
                                                    {{ $menu_item->title }}
                                                    @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                        <svg class="transition-all duration-300 group-hover:rotate-180" width="10"
                                                            height="10" viewBox="0 0 19 10" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    @endif
                                                </a>
                                                @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                    <div
                                                        class="absolute px-2 -left-7 h-0 group-hover:h-[320px] overflow-hidden top-5 transition-all duration-700">
                                                        <ul
                                                            class="max-h-fit min-w-[200px] bg-main-black mt-8 shadow-card-sm transition-all duration-300 overflow-hidden px-5 top-20 pb-4 rounded-b-md">
                                                            @foreach ($menu_items?->where('parent_id', $menu_item?->id) as $index => $sub_menu)
                                                                <li class="relative py-2">
                                                                    <a class="home-two-nav-item leading-5 relative text-white hover:text-purple w-fit"
                                                                        href="{{ $sub_menu?->url ? url('/') . $sub_menu?->url : 'javascript:void(0)' }}"
                                                                        target="{{ $sub_menu?->target }}">{{ $sub_menu->title }}
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

                            </ul>
                        </div>
                    </div>
                    <div class="xl:flex hidden space-x-4 items-center">
                        <a href="{{ route('user.wishlist.index') }}">
                            <div
                                class="size-[46px] rounded-full flex justify-center items-center border border-[#252253] relative">
                                <span>
                                    <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.6851 3L11 3.70253L10.315 3.00001C8.18404 0.814723 4.72912 0.814721 2.5982 3.00001C0.5245 5.12662 0.460783 8.55383 2.45393 10.7599L8.18026 17.0982C9.70154 18.782 12.2984 18.782 13.8197 17.0982L19.5461 10.7599C21.5392 8.5538 21.4755 5.1266 19.4018 2.99999C17.2709 0.814707 13.816 0.81471 11.6851 3Z"
                                            stroke="#fff" stroke-width="1.73333" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span
                                    class="absolute -top-1 -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs wishlist_count">
                                    {{ $wishlist_count ?? 0 }}
                                </span>
                            </div>
                        </a>
                        <a href="{{ route('cart.cart') }}" class="cart_btn">
                            <div
                                class="size-[46px] rounded-full flex justify-center items-center border border-[#252253] relative">
                                <span>
                                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.08683 10H21.9132M18.5351 6L6.46486 6C3.95403 6 2.07594 8.32624 2.58312 10.808L4.21804 18.808C4.59787 20.6666 6.21942 22 8.09978 22H16.9002C18.7806 22 20.4021 20.6666 20.782 18.808L22.4169 10.808C22.9241 8.32624 21.046 6 18.5351 6Z"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M9.5 2L6.5 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15.5 2L18.5 6" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.5 14L9.5 18" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.5 14L15.5 18" stroke="white" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                                <span
                                    class="absolute -top-1 -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs">
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
                                            <path d="M8.84289 11.625H8.84961M5.09961 11.625H5.10633" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
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
    <!-- mobile-Menu start  -->
    <header class="flex xl:hidden flex-col relative">
        <img src="{{ asset(home3_header_shape_image()) }}" alt="" class="absolute bottom-10 z-30 anim-light-shadow" />

        <div class="h-16 bg-main-black flex items-center justify-between fixed top-0 left-0 z-50 w-full px-2.5">
            <a href="{{ route('home') }}" aria-label="logo">
                <img src="{{ asset($general_setting?->white_logo) }}" alt="logo" />
            </a>
            <div class="flex sm:gap-3.5  gap-1 items-center">
                <a href="#">
                    <div
                        class="size-[46px] rounded-full flex justify-center items-center border border-[#252253] relative">
                        <span>
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6851 3L11 3.70253L10.315 3.00001C8.18404 0.814723 4.72912 0.814721 2.5982 3.00001C0.5245 5.12662 0.460783 8.55383 2.45393 10.7599L8.18026 17.0982C9.70154 18.782 12.2984 18.782 13.8197 17.0982L19.5461 10.7599C21.5392 8.5538 21.4755 5.1266 19.4018 2.99999C17.2709 0.814707 13.816 0.81471 11.6851 3Z"
                                    stroke="#fff" stroke-width="1.73333" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                        <span
                            class="absolute -top-1 -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs">
                            0
                        </span>
                    </div>
                </a>
                <a href="{{ route('cart.cart') }}" class="cart_btn">
                    <div
                        class="size-[46px] rounded-full flex justify-center items-center border border-[#252253] relative">
                        <span>
                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.08683 10H21.9132M18.5351 6L6.46486 6C3.95403 6 2.07594 8.32624 2.58312 10.808L4.21804 18.808C4.59787 20.6666 6.21942 22 8.09978 22H16.9002C18.7806 22 20.4021 20.6666 20.782 18.808L22.4169 10.808C22.9241 8.32624 21.046 6 18.5351 6Z"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.5 2L6.5 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15.5 2L18.5 6" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M9.5 14L9.5 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M15.5 14L15.5 18" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </span>
                        <span
                            class="absolute -top-1 -right-1  size-[19px] rounded-full bg-purple text-white flex justify-center items-center text-xs">
                            {{ $cart_count }}
                        </span>
                    </div>
                </a>
                <button aria-label="mobile-Menu"
                    class="text-white size-[46px] rounded-full flex justify-center items-center border border-[#252253] toggle_nav_menu"
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
            <div class="fixed h-screen overflow-y-scroll pb-[100px] bg-main-black w-full top-16 -left-full z-50 transition-all duration-300 delay-0"
                id="mobile-nav-div">
                <div class="flex gap-28 flex-col pl-5 pt-5">
                    <ul class="flex flex-col text-white text-base leading-5 font-medium font-inter mb-10">
                        @if ($menu)
                            @foreach ($menu_items as $menu_item)
                                @if ($menu_item?->parent_id == null)
                                    <li class="border-b  border-white/10 p-4">
                                        <a href="{{ $menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0)' }}"
                                            class="home-two-nav-item text-white pb-[1px] leading-5 font-inter relative before:content-['{{ $menu_item?->title }}'] delay-200 hover:text-purple before:text-purple before:hidden before:border-purple w-full @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0) m-nav-dropdown flex items-center justify-between @endif">
                                            {{ $menu_item?->title }}
                                            @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                <svg class="pointer-events-none" width="10" height="10" viewBox="0 0 19 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            @endif
                                        </a>
                                        @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                            <ul class="mobile-sub-nav h-[auto] overflow-hidden transition-all duration-300 pl-5 pt-4">
                                                @foreach ($menu_items?->where('parent_id', $menu_item?->id) as $sub_menu)
                                                    <li class="relative pb-4 {{ $loop->first ? 'pb-1' : 'py-1' }}">
                                                        <a class="home-two-nav-item leading-5 relative hover:text-purple w-fit "
                                                            href="{{ $sub_menu?->url ? url('/') . $sub_menu?->url : 'javascript:void(0)' }}">
                                                            {{ $sub_menu?->title }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="flex gap-5 flex-col pl-5 mt-5">
                    <div class="flex gap-[14px] items-center">
                        <div id="currency_select"
                            class="custom-select home-three-mobile  w-[124px] relative flex gap-1 items-center pr-5 text-white border border-white/10 px-4 py-2 rounded-md">
                            <form action="{{ route('currency-switcher') }}" method="get"
                                id="currency_switcher_form_mobile_home_three">
                                <select name="currency_code" id="currency" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('Currency') }}
                                    </option>
                                    @foreach ($currency_list as $currency)
                                        <option @selected($currency->currency_code == session()->get('currency_code'))
                                            value="{{ $currency->currency_code }}">
                                            {{ $currency->currency_name }}
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
                            class="custom-select home_three_mobile relative w-[124px] flex gap-1 items-center pr-5 text-white border border-white/10 px-4 py-2 rounded-md">
                            <form action="{{ route('language-switcher') }}" method="get"
                                id="language_switcher_form_mobile_home_three">
                                <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                    <option value="" class="display-none">
                                        {{ __('Language') }}
                                    </option>
                                    @foreach ($language_list as $language)
                                        <option @selected($language->lang_code == session()->get('front_lang'))
                                            value="{{ $language->lang_code }}">
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
                        <a href="{{ Auth::check() ? route('user.dashboard') : route('user.login') }}">
                            <div class="home-two-btn-bg py-2.5 group bg-blue-seo/10 border-blue-seo/10 w-full">
                                <span
                                    class="text-base text-white group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ Auth::check() ? __('Dashboard') : __('Log In') }}
                                </span>
                                {{ get_svg('contact_icon') }}
                            </div>
                        </a>
                        @if(!Auth::guard('web')->check())
                        <a href="{{ route('user.register') }}">
                            <div class="home-two-btn-bg py-2.5 group bg-blue-seo border-blue-seo w-full">
                                <span
                                    class="text-base text-white group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ ('Sign Up') }}
                                </span>
                                {{ get_svg('contact_icon') }}
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- mobile-menu end  -->

    <main>
        <!-- hero -->
        @foreach ($section_visibility_3->where('serial_number', 1) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- hero end  -->

        <!-- about start  -->
        @foreach ($section_visibility_3->where('serial_number', 2) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- about end  -->

        <!-- services start  -->
        @foreach ($section_visibility_3->where('serial_number', 3) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- services end  -->

        <!-- Case start  -->
        @foreach ($section_visibility_3->where('serial_number', 4) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- Case end  -->

        <!-- team start  -->
        @foreach ($section_visibility_3->where('serial_number', 5) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- team end  -->

        <!-- pricing start  -->
        @foreach ($section_visibility_3->where('serial_number', 6) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- pricing-end  -->

        <!-- Testimonials start  -->
        @foreach ($section_visibility_3->where('serial_number', 7) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- Testimonials end  -->

        <!-- blog start  -->
        @foreach ($section_visibility_3->where('serial_number', 8) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- blog end  -->

        <!-- cta start  -->
        @foreach ($section_visibility_3->where('serial_number', 9) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_3.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- cta end  -->
    </main>
    <footer class="pt-10 md:pt-20 bg-main-black">
        <div class="theme-container mx-auto flex flex-wrap justify-between mb-20 gap-5">
            <div class="w-fit max-w-[300px]">
                <img src="{{ asset($general_setting?->white_logo) }}" alt="logo" />
                <p class="max-w-[300px] text-white/50 my-6">
                    {{ $footer?->about_us }}
                </p>

                <a href="{{ route('about-us') }}">
                    <div class="flex items-center gap-2 group mt-4">
                        <span
                            class="font-medium group-hover:text-white transition-all duration-300 text-white/50 leading-5 font-inter border-b border-transparent before:inline-block before:border-white before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                            {{ __('Read More') }}
                        </span>
                        <svg width="7" height="11" viewBox="0 0 7 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="stroke-white/50 group-hover:stroke-white transition-all duration-300"
                                d="M1.5 10L5.29289 6.20711C5.62623 5.87377 5.79289 5.70711 5.79289 5.5C5.79289 5.29289 5.62623 5.12623 5.29289 4.79289L1.5 1"
                                stroke="#ffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </a>
            </div>
            <div class="w-fit max-w-[300px]">
                <div class="flex flex-col items-center">
                    @if ($footer_menu)
                        @foreach ($footer_menus?->whereNull('parent_id')->take(1) as $item)
                            <div>
                                <h1 class="font-semibold text-18 text-white">{{ $item?->title }}</h1>
                                <ul class="mt-3.5">
                                    @if ($footer_menus->where('parent_id', $item?->id)->count() > 0)
                                        @foreach ($footer_menus?->where('parent_id', $item?->id) as $sub_item)
                                            <li class="">
                                                <a href="{{ $sub_item?->url ? url('/') . $sub_item?->url : 'javascript:void(0)' }}">
                                                    <div
                                                        class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 overflow-hidden">
                                                        <svg class="absolute -left-2 transition-all duration-300 group-hover:left-0"
                                                            width="6" height="12" viewBox="0 0 6 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span
                                                            class="group-hover:translate-x-4 transition-all duration-300">{{ $sub_item?->title }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="w-fit max-w-[300px]">
                <div class="max-w-[223px]">
                    <h1 class="font-semibold text-18 text-white">{{ __('Address') }}</h1>
                    <div
                        class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 mt-3.5">
                        <span class="transition-all duration-300">
                            {{ $footer?->address }}
                        </span>
                    </div>
                    <h1 class="font-semibold text-18 text-white mt-6">{{ __('Contact') }}</h1>
                    <div
                        class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 mt-3.5">
                        <span class="transition-all duration-300">
                            {{ $footer?->email }} <br />
                            {{ $footer?->phone }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="w-fit max-w-[300px]">
                <h1 class="font-semibold text-18 text-white">{{ __('Newsletter') }}</h1>
                <p class="transition-all duration-300 text-white/50 pt-3.5">
                    {{ __('Subscribe newsletter to get updates') }}
                </p>
                <form action="{{ route('store-newsletter') }}" method="post">
                    @csrf
                    <input type="email" id="eThree" name="email" placeholder="Email Address"
                        class="bg-white py-2.5 px-6 rounded-[28px] focus:outline-none focus:border-none w-full mt-5" />
                    <button type="submit">
                        <div class="home-two-btn-bg py-3.5 group bg-[#4A7DFF] border-[#4A7DFF] w-fit mt-2.5">
                            <span
                                class="text-base text-white group-hover:text-[#4A7DFF] transition-all duration-300 font-semibold font-inter relative z-10">{{ __('Subscribe') }}</span>
                            {{ get_svg('arrow1') }}
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="w-full h-[80px] md:h-[65px] bg-[#1C2433]">
            <div class="theme-container mx-auto h-full">
                <div class="w-full h-full flex flex-wrap justify-between items-center">
                    <span class="text-white/50 max-w-100">{{ $footer?->copyright }}</span>
                    <div class="relative w-full sm:w-fit flex justify-center">
                        <a href="#" aria-label="go top"
                            class="w-[45px] h-[45px] rounded-full border-[3px] border-[#323239] flex justify-center items-center bg-blue-sass absolute -top-[75px] sm:-top-[55px]">
                            <span>
                                <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="22.5" cy="22.5" r="21" fill="#4A7DFF" stroke="#323239"
                                        stroke-width="3" />
                                    <path d="M19 21L23 17M23 17L27 21M23 17V29" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <ul class="max-w-80 flex space-x-3 md:space-x-6 items-center">
                        <li class="hover:text-white hover:underline common-transition text-white/50 font-medium">
                            <a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                        </li>
                        <li class="text-paragraph font-medium">|</li>
                        <li class="hover:text-white hover:underline common-transition text-white/50 font-medium">
                            <a href="{{ route('terms-conditions') }}">{{ __('Terms & Conditions') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

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
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        "use strict";
        $(document).ready(function () {

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
            $(document).on('click', '#currency_select.custom-select.home_3_desktop_currency .select-items > div',
                function () {
                    $('#home_three_desktop_currency_form').submit();
                })
            //mobile currency select
            $(document).on('click', '#currency_select.custom-select.home-three-mobile .select-items > div',
                function () {
                    $('#currency_switcher_form_mobile_home_three').submit();
                })

            //desktop language select
            $(document).on('click', '#language_select.custom-select.home_3_desktop .select-items > div',
                function () {
                    $('#language_form_home_three_desktop').submit();
                })
            //mobile language select
            $(document).on('click', '#language_select.custom-select.home_three_mobile .select-items > div',
                function () {
                    $('#language_switcher_form_mobile_home_three').submit();
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
