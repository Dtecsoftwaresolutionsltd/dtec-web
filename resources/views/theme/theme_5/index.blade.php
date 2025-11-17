<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset($general_setting?->favicon) }}" type="image/x-icon" />
    <title>{{ $seo_setting?->seo_title }}</title>
    <!-- swiper -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    <!-- compiled from input.css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/custom.css') }}" />

    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}" />

    @laravelPWA
</head>

<body class="home-two box-border relative scroll-smooth">
    <div class="flex justify-center relative z-50">
        <!-- Preloader -->
        @include('components.preloder')
        <div id="h5-header" class="header-wrapper w-full fixed top-0 z-50 border-b border-white/10 xl:block hidden">
            <div
                class="top-bar w-full max-w-[1619px] mx-auto border-b border-[#FFFFFF1A] flex justify-between items-center py-2 2xl:px-0 px-2">
                
                   
                <div class="flex items-center justify-end">
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
                    <div class="flex gap-[14px] items-center">
                        <div id="currency_select"
                            class="custom-select home_5_desktop_currency inner relative flex gap-1 items-center pr-5 text-white">
                            <form action="{{ route('currency-switcher') }}" method="get" id="home_five_desktop_currency_form">
                                <select name="currency_code" id="currency" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('Currency') }}
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
                        <div id="language_select_inner"
                            class="custom-select home_5_desktop relative flex gap-1 items-center pr-5 text-white">
                            <form action="{{ route('language-switcher') }}" method="get" id="language_form_home_five_desktop">
                                <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                    <option value="" class="">
                                        {{ __('Language') }}
                                    </option>

                                    @foreach ($language_list as $language)
                                        <option @selected(session()->get('front_lang') == $language->lang_code)
                                            value="{{ $language->lang_code }}">
                                            {{ $language->lang_name }}
                                            </>
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
            <header
                class="py-6 px-4 mx-auto w-full  justify-center items-center transition-all duration-300 ease-in-out flex">
                <div class="w-full max-w-[1619px] relative flex justify-between items-center">
                    <div class="flex gap-28 items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset($general_setting?->home_five_logo ?? $general_setting?->white_logo) }}"
                                alt="logo" />
                        </a>
                        <ul class="flex gap-10 text-white text-base leading-5 font-medium font-inter">

                            @if ($menu)
                                @foreach ($menu_items as $menu_item)
                                    @if ($menu_item?->parent_id == null)
                                        <li
                                            class="@if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0) group relative @endif">
                                            <a href="{{ $menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0);' }}"
                                                class="home-two-nav-item relative before:content-['{{ $menu_item?->title }}'] before:text-buisness-red before:border-buisness-red transition-all ease-out duration-300 hover:text-buisness-red @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0) flex items-center gap-2 @endif"
                                                target="{{ $menu_item?->target }}">
                                                {{ $menu_item?->title }}
                                                @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                    <svg class="transition-all duration-300 group-hover:rotate-180" width="10"
                                                        height="10" viewBox="0 0 19 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                @endif
                                            </a>
                                            @if ($menu_items->where('parent_id', $menu_item?->id)->count() > 0)
                                                <div
                                                    class="absolute px-2 -left-7 h-0 group-hover:h-[340px] overflow-hidden top-5 transition-all duration-700">
                                                    <ul
                                                        class="min-w-[200px] bg-buisness-light-black border-t-buisness-light-black border border-white/10 mt-[36px] transition-all duration-300 overflow-hidden px-5 top-20 pb-4 rounded-b-md">
                                                        @foreach ($menu_items->where('parent_id', $menu_item?->id) as $sub_menu)
                                                            <li class="relative py-2">
                                                                <a class="home-two-nav-item leading-5 relative text-white hover:text-buisness-red before:border-buisness-red w-fit"
                                                                    href="{{ $sub_menu?->url ? url('/') . $sub_menu?->url : 'javascript:void(0);' }}"
                                                                    target="{{ $sub_menu?->target }}">
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
                        </ul>
                    </div>

                    <div class="xl:flex hidden space-x-4 items-center">
                        <form action="{{ route('project.search') }}" method="GET">

                            <div
                                class="flex items-center gap-2 rounded-[100px] bg-[#141417] border border-[#302F31]  px-4 py-2  transition-all duration-300">
                                <button type="submit" class="cursor-pointer" for="hh-search" type="button">
                                    <svg class="cursor-pointer" width="17" height="17" viewBox="0 0 17 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.9729 7.46687C13.9729 10.922 11.172 13.7229 7.71687 13.7229C4.26176 13.7229 1.46084 10.922 1.46084 7.46687C1.46084 4.01176 4.26176 1.21084 7.71687 1.21084C11.172 1.21084 13.9729 4.01176 13.9729 7.46687ZM7.71687 14.9337C11.8407 14.9337 15.1837 11.5907 15.1837 7.46687C15.1837 3.34303 11.8407 0 7.71687 0C3.59303 0 0.25 3.34303 0.25 7.46687C0.25 11.5907 3.59303 14.9337 7.71687 14.9337ZM16.5333 16.2832C15.9108 16.9056 14.9016 16.9056 14.2791 16.2832L12.7673 14.7713C13.6473 14.1617 14.4118 13.3972 15.0214 12.5172L16.5333 14.029C17.1557 14.6515 17.1557 15.6607 16.5333 16.2832Z"
                                            fill="#898989" />
                                    </svg>
                                </button>
                                <input id="hh-search" type="text" name="query"
                                    class="outline-none bg-transparent text-white" placeholder="Search..." />

                            </div>

                        </form>
                        <a href={{ !Auth::guard('web')->user() ? route('user.login') : route('user.dashboard') }}>
                            <div class="home-two-btn-bg py-3   group bg-buisness-red border-buisness-red">
                                <span
                                    class="text-base  text-white group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                                    @if (!Auth::guard('web')->user())
                                        {{ __('Sign In') }}
                                    @else
                                        {{ __('Dashboard') }}
                                    @endif
                                </span>
                                @if (!Auth::guard('web')->user())
                                    <span
                                        class="relative z-10  transition-all duration-300 text-white group-hover:text-buisness-red">
                                        <svg class="" width="14" height="18" viewBox="0 0 14 18" fill="none"
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
            </header>
        </div>
        <!-- mobile-Menu start  -->
        <header class="flex xl:hidden flex-col relative">
            <div
                class="h-16 bg-buisness-light-black flex items-center justify-between fixed top-0 left-0 z-50 w-full px-2.5">
                <a href="{{ route('home') }}" aria-label="logo">
                    <img src="{{ asset($general_setting?->home_five_logo ?? $general_setting?->white_logo) }}"
                        alt="logo" />
                </a>

                <div class="flex sm:gap-3.5  gap-1 items-center">
                    <button aria-label="mobile-Menu"
                        class="text-white size-[46px] rounded-full flex justify-center items-center border border-[#302F31] toggle_nav_menu"
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
                <div class="fixed h-screen overflow-y-scroll pb-[100px] bg-buisness-light-black w-full top-16 -left-full z-50 transition-all duration-300 delay-0"
                    id="mobile-nav-div">
                    <div class="flex gap-28 flex-col pl-5 pt-5">
                        <ul class="flex flex-col text-white text-base leading-5 font-medium font-inter mb-10">

                            @if ($menu)
                                @foreach ($menu_items as $menu_item)
                                    @if ($menu_item?->parent_id == null)
                                        <li class="border-t border-b border-t-buisness-red/10 border-b-buisness-red/10 p-4">
                                            <a href="{{ $menu_item->url ? url('/') . $menu_item->url : 'javascript:void(0)' }}"
                                                class="home-two-nav-item relative before:content-[' {{ $menu_item?->title }}'] before:text-buisness-red before:hidden transition-all ease-out duration-300 hover:text-buisness-red w-full @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0) m-nav-dropdown flex justify-between items-center @endif"
                                                target="{{ $menu_item?->target }}">
                                                {{ $menu_item?->title }}
                                                @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                    <svg class="pointer-events-none" width="10" height="10" viewBox="0 0 19 10"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                @endif
                                            </a>
                                            @if ($menu_items?->where('parent_id', $menu_item?->id)->count() > 0)
                                                <ul
                                                    class="mobile-sub-nav h-[auto] overflow-hidden transition-all duration-300 pl-5 pt-4">
                                                    @foreach ($menu_items?->where('parent_id', $menu_item?->id) as $sub_menu)
                                                        <li class="relative pb-4">
                                                            <a class="home-two-nav-item leading-5 relative hover:text-buisness-red before:border-buisness-red w-fit py-1"
                                                                href="{{ $sub_menu->url ? url('/') . $sub_menu->url : 'javascript:void(0)' }}"
                                                                target="{{ $sub_menu?->target }}">
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
                                class="custom-select home-five-mobile relative w-[124px] flex gap-1 items-center text-white border border-buisness-red/10 px-4 py-2 rounded-md">
                                <form action="{{ route('currency-switcher') }}" method="get" id="currency_switcher_form_mobile_home_five">
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
                                            <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            {{-- language select --}}
                            <div id="language_select"
                                class="custom-select home_5_mobile w-[124px]  inner_mobile relative flex gap-1 items-center pr-5 text-white border border-buisness-red/10 px-4 py-2 rounded-md">
                                <form action="{{ route('language-switcher') }}" method="get"
                                    id="language_switcher_form_mobile_home_5">
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
                                            <path d="M11 1L6 5L0.999999 0.999999" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-3 pr-5">
                            <a href="{{ Auth::check() ? route('user.dashboard') : route('user.login') }}">
                                <div
                                    class="home-two-btn-bg py-2.5 text-black group group-hover:text-buisness-red bg-[#FFE6EA] border-[#FFE6EA] w-full">
                                    <span
                                        class="text-base  group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                                        {{ Auth::check() ? __('Dashboard') : __('Login') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            class="stroke-black group-hover:stroke-buisness-red transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            @if(!Auth::guard('web')->check())
                                <a href="{{ route('user.register') }}">
                                    <div
                                        class="home-two-btn-bg py-2.5 text-white group group-hover:text-buisness-red bg-buisness-red border-buisness-red w-full">
                                        <span
                                            class="text-base  group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                                            {{('signup') }}
                                        </span>

                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- mobile-menu end  -->
    </div>

    <main class="w-full overflow-x-hidden">
        <!-- hero section start  -->
        @foreach ($section_visibility_5->where('serial_number', 1) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- hero section  end  -->

        <!-- about start  -->
        @foreach ($section_visibility_5->where('serial_number', 2) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- about end  -->

        <!-- service start  -->
        @foreach ($section_visibility_5->where('serial_number', 3) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- service end  -->

        <!-- team start  -->
        @foreach ($section_visibility_5->where('serial_number', 4) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- team end  -->

        <!-- story start  -->
        @foreach ($section_visibility_5->where('serial_number', 5) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- story end  -->

        <!-- fun fact  start  -->
        @foreach ($section_visibility_5->where('serial_number', 6) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- fun fact  end  -->

        <!-- testimonial start  -->
        @foreach ($section_visibility_5->where('serial_number', 7) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- testimonial end  -->

        <!-- blog start  -->
        @foreach ($section_visibility_5->where('serial_number', 8) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- blog end  -->

        <!-- client start  -->
        @foreach ($section_visibility_5->where('serial_number', 9) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- client end  -->

        <!-- cta start  -->
        @foreach ($section_visibility_5->where('serial_number', 10) as $visibility)
            @if ($visibility->component_name != null)
                @include('theme.theme_5.' . $visibility->component_name)
            @endif
        @endforeach
        <!-- cta end  -->
    </main>

    <!-- video player modal start   -->
    <div id="video-player" aria-label="play-video"
        class="video-play-btn fixed top-0 left-0 w-screen h-screen bg-black/70 z-[51] hidden justify-center items-center player-open-anim transition-all duration-300 overflow-hidden origin-top-left">
        <button class="text-24 text-white/90 transition-all duration-300 hover:text-white/100 absolute right-10 top-10">
            X
        </button>
        <iframe class="absolute max-w-[80%] aspect-[1280/720] mx-auto"
            src="https://www.youtube.com/embed/{{ getTranslatedValue($hero_image, 'hero_video_id') }}" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>
    <!-- video player modal end  -->

    <footer class="pt-20 bg-buisness-light-black">
        <div class="theme-container mx-auto flex flex-wrap gap-5 justify-between mb-20">
            <div class="w-fit max-w-[300px]">
                <img src="{{ asset($general_setting?->home_five_logo ?? $general_setting?->white_logo) }}" alt="logo" />
                <p class="max-w-[300px] text-white my-6">
                    {{ $footer?->about_us }}
                </p>

                <div class="flex gap-[15px]">
                    <a href="{{ $footer?->facebook }}" aria-label="facebook" target="blank"
                        class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                        <span class="relative z-10"><svg width="11" height="16" viewBox="0 0 11 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.6667 0H8.55556C5.79413 0 3.55556 2.23857 3.55556 5V6.22222H0V9.77778H3.55556V16H7.11111V9.77778H10.6667V6.22222H7.11111V4.55556C7.11111 4.00327 7.55883 3.55556 8.11111 3.55556H10.6667V0Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $footer?->twitter }}" aria-label="twitter" target="blank"
                        class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                        <span class="relative z-10"><svg width="19" height="17" viewBox="0 0 19 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.7642 0C10.5722 0 8.7953 1.86585 8.7953 4.1675C8.7953 4.5153 8.83587 4.85315 8.91232 5.17611C6.80469 5.17611 3.63013 4.74999 0.978868 2.09376C0.626315 1.74054 -0.0237835 1.9767 0.000670803 2.47516C0.393588 10.484 3.82353 12.8202 5.58986 12.9656C4.44926 14.0921 2.79242 14.9813 1.1252 15.3804C0.685191 15.4857 0.576494 15.9674 1.00675 16.1073C2.19973 16.4953 3.90729 16.6448 4.82642 16.67C11.3286 16.67 16.6134 11.1972 16.731 4.3991C17.5847 3.84394 18.1315 2.63855 18.4388 1.78464C18.5136 1.57667 18.1728 1.33436 17.9687 1.41931C17.331 1.68479 16.5214 1.74773 15.8318 1.52302C15.1039 0.593104 14 0 12.7642 0Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $footer?->instagram }}" target="blank" aria-label="instagram"
                        class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                        <span class="relative z-10"><svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M5 0C2.23858 0 0 2.23858 0 5V11.33C0 14.0914 2.23858 16.33 5 16.33H11.33C14.0914 16.33 16.33 14.0914 16.33 11.33V5C16.33 2.23858 14.0914 0 11.33 0H5ZM13.0645 4.08222C13.5155 4.08222 13.881 3.71666 13.881 3.26572C13.881 2.81478 13.5155 2.44922 13.0645 2.44922C12.6136 2.44922 12.248 2.81478 12.248 3.26572C12.248 3.71666 12.6136 4.08222 13.0645 4.08222ZM12.247 8.16551C12.247 10.4202 10.4192 12.248 8.16453 12.248C5.90983 12.248 4.08203 10.4202 4.08203 8.16551C4.08203 5.91081 5.90983 4.08301 8.16453 4.08301C10.4192 4.08301 12.247 5.91081 12.247 8.16551ZM8.16532 10.6138C9.51814 10.6138 10.6148 9.51717 10.6148 8.16434C10.6148 6.81152 9.51814 5.71484 8.16532 5.71484C6.8125 5.71484 5.71582 6.81152 5.71582 8.16434C5.71582 9.51717 6.8125 10.6138 8.16532 10.6138Z"
                                    fill="white" />
                            </svg>
                        </span>
                    </a>
                    <a href="{{ $footer?->linkedin }}" aria-label="linkedin" target="blank"
                        class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                        <span class="relative z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"
                                fill="white">
                                <path
                                    d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0  2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.27c-.97 0-1.75-.79-1.75-1.76s.78-1.76 1.75-1.76 1.75.79 1.75 1.76-.78 1.76-1.75 1.76zm13.5 11.27h-3v-5.6c0-1.34-.03-3.07-1.87-3.07-1.87 0-2.16 1.46-2.16 2.97v5.7h-3v-10h2.88v1.36h.04c.4-.76 1.38-1.55 2.84-1.55 3.04 0 3.6 2 3.6  4.59v5.6z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
            <div class="w-fit max-w-[300px]">
                <div class="flex flex-col items-center">
                    @if ($footer_menu)
                        @foreach ($footer_menus?->whereNull('parent_id')->take(1) as $menu)
                            <div>
                                <h1 class="font-semibold text-18 text-white">{{ $menu?->title }}</h1>
                                <ul class="mt-3.5">
                                    @if ($footer_menus?->where('parent_id', $menu?->id)->count() > 0)
                                        @foreach ($footer_menus?->where('parent_id', $menu?->id) as $menu_item)
                                            <li class="">
                                                <a href="{{ $menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0)' }}">
                                                    <div
                                                        class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 overflow-hidden">
                                                        <svg class="absolute -left-2 transition-all duration-300 group-hover:left-0"
                                                            width="6" height="12" viewBox="0 0 6 12" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                        <span
                                                            class="group-hover:translate-x-4 transition-all duration-300">{{ $menu_item?->title }}</span>
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
                    <input type="email" placeholder="Email Address" name="email" id="eFive"
                        class="bg-transparent border border-white/10 py-2.5 px-6 rounded-[28px] focus:outline-none w-full mt-5 text-white" />
                    <button type="submit">
                        <div class="home-two-btn-bg py-3.5 group bg-buisness-red border-buisness-red w-fit mt-2.5">
                            <span
                                class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                                {{ __('Subscribe') }}
                            </span>
                            {{ get_svg('white-red') }}
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <div class="w-full h-[80px] md:h-[65px] bg-buisness-dark-black">
            <div class="theme-container mx-auto h-full">
                <div class="w-full h-full flex flex-wrap justify-between items-center">
                    <span class="text-white/50 max-w-100">{{ $footer?->copyright }}</span>
                    <div class="relative w-full sm:w-fit flex justify-center">
                        <a href="#" aria-label="go top"
                            class="w-[45px] h-[45px] rounded-full border-[3px] border-buisness-light-black flex justify-center items-center bg-buisness-red absolute -top-[75px] sm:-top-[55px]">
                            <span><svg width="13" height="18" viewBox="0 0 13 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 6.33333L6.33333 1M6.33333 1L11.6667 6.33333M6.33333 1V17" stroke="white"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <ul class="max-w-80 flex space-x-3 md:space-x-6 items-center">
                        <li class="hover:text-white hover:underline common-transition text-paragraph font-medium">
                            <a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                        </li>
                        <li class="text-paragraph font-medium">|</li>
                        <li class="hover:text-white hover:underline common-transition text-paragraph font-medium">
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
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script>
        AOS.init({
            disable: function () {
                let maxWidth = 800;
                return window.innerWidth < maxWidth;
            },
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

            // Check if mobile menu toggle is working
            const toggleBtn = document.querySelector('.toggle_nav_menu');

            if (toggleBtn) {
                toggleBtn.addEventListener('click', function (e) {

                });
            }
            //desktop currency select
            $(document).on('click', '#currency_select.custom-select.home_5_desktop_currency .select-items > div',
                function () {
                    $('#home_five_desktop_currency_form').submit();
                })
            //mobile currency select
            $(document).on('click', '#currency_select.custom-select.home-five-mobile .select-items > div',
                function () {
                    $('#currency_switcher_form_mobile_home_five').submit();
                })

            //desktop language select
            $(document).on('click', '#language_select_inner.custom-select.home_5_desktop .select-items > div',function () {
                    $('#language_form_home_five_desktop').submit();
            })

            //mobile language select
            $(document).on('click', '#language_select.custom-select.home_5_mobile .select-items > div', function () {
                $('#language_switcher_form_mobile_home_5').submit();
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
