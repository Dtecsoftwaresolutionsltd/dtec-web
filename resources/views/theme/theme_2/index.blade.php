<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset($general_setting->favicon) }}" />
    <title>{{ $seo_setting?->seo_title }}</title>
    <!-- swiper -->
    <link href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/assets/css/aos.css') }}" rel="stylesheet" />
    <!-- compiled from input.css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">
    @laravelPWA
</head>

<body class="home-two box-border">
    <!-- Preloader -->
    @include('components.preloder')

    <!-- Header -->
    <div class="xl:block w-full  bg-white fixed top-0 z-20 hidden">
        <div
            class="top-bar w-full max-w-[1619px] mx-auto border-b border-[#F2EDFF] flex justify-between items-center py-2 2xl:px-0 px-2">
           
            <div class="flex items-center justify-end gap-3.5">
                <div class="flex space-x-2.5 items-center mr-7 text-[#161519]">
                    <span>
                        <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21 10.5001C21 10.0087 20.9947 9.01723 20.9842 8.52439C20.9189 5.45886 20.8862 3.92609 19.7551 2.79066C18.6239 1.65523 17.0497 1.61568 13.9012 1.53657C11.9607 1.48781 10.0393 1.48781 8.09882 1.53656C4.95033 1.61566 3.37608 1.65521 2.24495 2.79065C1.11382 3.92608 1.08114 5.45885 1.01576 8.52438C0.994745 9.51007 0.994745 10.4899 1.01577 11.4756C1.08114 14.5412 1.11383 16.0739 2.24496 17.2094C3.37608 18.3448 4.95033 18.3843 8.09883 18.4634C8.90159 18.4836 9.70108 18.4954 10.5 18.4989"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                            <path d="M1 4L7.91302 7.92462C10.4387 9.35846 11.5613 9.35846 14.087 7.92462L21 4"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"></path>
                            <path
                                d="M21 15.5L13 15.5M21 15.5C21 14.7998 19.0057 13.4915 18.5 13M21 15.5C21 16.2002 19.0057 17.5085 18.5 18"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                    </span>
                    <span class="text-inherit font-normal">{{ __('Email') }} : <u>{{ $footer?->email }}</u></span>
                </div>
            
                <div class="flex gap-[14px] items-center home_two_curr_lang">
                    <div id="currency_select"
                        class="custom-select home_2_desktop_currency relative flex gap-1 items-center pr-5 text-[#161519]">
                        
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
                        class="custom-select home_2_desktop relative flex gap-1 items-center pr-5 text-[#161519]">
                        <form action="{{ route('language-switcher') }}" method="get"
                            id="language_form_home_two_desktop">
                            <select name="lang_code" id="language" class="hidden" aria-placeholder="">
                                <option value="" class="">
                                    {{ __('Language') }}
                                </option>

                                @foreach ($language_list as $language)
                                    <option @selected(session()->get('front_lang') == $language->lang_code) value="{{ $language->lang_code }}">
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
        <header class="flex justify-between max-w-[1619px] relative py-6 mx-auto items-center h-full w-full">
            <div class="flex gap-28 items-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset($general_setting?->logo) }}" alt="logo" />
                </a>
                <ul class="flex gap-10 text-paragraph text-base leading-5 font-medium font-inter">

                    @if ($menu)
                        @foreach ($menu_items as $item)
                            @if ($item?->parent_id == null)
                                <li class="group relative">
                                    <a href="{{ $item?->url ? url('/') . $item?->url : 'javascript:void(0)' }}"
                                        class="home-two-nav-item relative before:content-['{{ $item?->title }}'] @if ($menu_items?->where('parent_id', $item?->id)->count() > 0) flex gap-2 items-center hover:text-purple @endif"
                                        target="{{ $item?->target }}">
                                        {{ $item?->title }}
                                        @if ($menu_items?->where('parent_id', $item?->id)->count() > 0)
                                            <svg class="transition-all duration-300 group-hover:rotate-180"
                                                width="10" height="10" viewBox="0 0 19 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2L9.5 8L17 2" stroke="currentColor" stroke-width="3"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @endif
                                    </a>
                                    @if ($menu_items?->where('parent_id', $item?->id)->count() > 0)
                                        <div
                                            class="absolute px-2 -left-7 h-0 group-hover:h-[320px] overflow-hidden top-5 transition-all duration-700">
                                            <ul
                                                class="max-h-fit min-w-[200px] bg-white mt-8 shadow-card-sm transition-all duration-300 overflow-hidden px-5 top-20 pb-4 rounded-b-md">
                                                @foreach ($menu_items?->where('parent_id', $item?->id) as $sub_item)
                                                    <li class="relative py-2">
                                                        <a class="home-two-nav-item leading-5 relative hover:text-purple w-fit text-paragraph font-medium font-inter"
                                                            href="{{ $sub_item?->url ? url('/') . $sub_item?->url : 'javascript:void(0)' }}"
                                                            target="{{ $sub_item?->target }}">
                                                            {{ $sub_item?->title }}
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
                <a href="{{ route('user.wishlist.index') }}">
                    <div
                        class="size-[46px] rounded-full flex justify-center items-center border border-[#794AFF1A] relative">
                        <span>
                            <svg width="22" height="20" viewBox="0 0 22 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.6851 3L11 3.70253L10.315 3.00001C8.18404 0.814723 4.72912 0.814721 2.5982 3.00001C0.5245 5.12662 0.460783 8.55383 2.45393 10.7599L8.18026 17.0982C9.70154 18.782 12.2984 18.782 13.8197 17.0982L19.5461 10.7599C21.5392 8.5538 21.4755 5.1266 19.4018 2.99999C17.2709 0.814707 13.816 0.81471 11.6851 3Z"
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
        </header>
    </div>
    <!-- mobile-Menu start  -->
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
                            class="custom-select home-two-mobile relative w-[124px] flex gap-1 items-center pr-5 text-[#161519] border border-black/10 px-4 py-2 rounded-md">
                            <form action="{{ route('currency-switcher') }}" id="currency_switcher_form_mobile_home_two">
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
                            class="custom-select mobile home_two_mobile relative w-[124px] flex gap-1 items-center pr-5 text-[#161519] border border-black/10 px-4 py-2 rounded-md">
                            <form action="{{ route('language-switcher') }}" id="language_switcher_form_mobile_home_two">
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
    <!-- mobile-menu end  -->
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div>
                <main class="w-full">
                    <!-- hero section start  -->
                    @foreach ($section_visibility_2->where('serial_number', 1) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- hero section end  -->

                    <!-- features start  -->
                    @foreach ($section_visibility_2->where('serial_number', 2) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- features end  -->

                    <!-- partner slider start  -->
                    @foreach ($section_visibility_2->where('serial_number', 3) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- partner slider end  -->

                    <!-- about start  -->
                    @foreach ($section_visibility_2->where('serial_number', 4) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- about end  -->

                    <!-- service start  -->
                    @foreach ($section_visibility_2->where('serial_number', 5) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- service end  -->

                    <!-- Testimonials start  -->
                    @foreach ($section_visibility_2->where('serial_number', 6) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- Testimonials end  -->

                    <!-- faq start  -->
                    @foreach ($section_visibility_2->where('serial_number', 7) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- faq end  -->

                    <!-- cta start  -->
                    @foreach ($section_visibility_2->where('serial_number', 8) as $visibility)
                        @if ($visibility->component_name != null)
                            @include('theme.theme_2.' . $visibility->component_name)
                        @endif
                    @endforeach
                    <!-- cta end  -->
                </main>
                <footer class="pt-20 bg-black-seo relative overflow-hidden">
                    <div class="theme-container mx-auto grid grid-cols-4 md:grid-cols-8 xl:grid-cols-12 mb-20 gap-4">
                        <div class="col-span-4">
                            <img src="{{ asset($general_setting?->white_logo) }}" alt="logo" />
                            <p class="max-w-[300px] text-white/50 mt-[30px] mb-6">
                                {{ $footer?->about_us }}
                            </p>
                            <div class="flex gap-[15px]">
                                <a href="{{ $footer?->facebook }}" target="blank" aria-label="Facebook"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-blue-seo before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="11" height="16"
                                            viewBox="0 0 11 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6667 0H8.55556C5.79413 0 3.55556 2.23857 3.55556 5V6.22222H0V9.77778H3.55556V16H7.11111V9.77778H10.6667V6.22222H7.11111V4.55556C7.11111 4.00327 7.55883 3.55556 8.11111 3.55556H10.6667V0Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->twitter }}" target="blank" aria-label="Twitter"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-blue-seo before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="19" height="17"
                                            viewBox="0 0 19 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.7642 0C10.5722 0 8.7953 1.86585 8.7953 4.1675C8.7953 4.5153 8.83587 4.85315 8.91232 5.17611C6.80469 5.17611 3.63013 4.74999 0.978868 2.09376C0.626315 1.74054 -0.0237835 1.9767 0.000670803 2.47516C0.393588 10.484 3.82353 12.8202 5.58986 12.9656C4.44926 14.0921 2.79242 14.9813 1.1252 15.3804C0.685191 15.4857 0.576494 15.9674 1.00675 16.1073C2.19973 16.4953 3.90729 16.6448 4.82642 16.67C11.3286 16.67 16.6134 11.1972 16.731 4.3991C17.5847 3.84394 18.1315 2.63855 18.4388 1.78464C18.5136 1.57667 18.1728 1.33436 17.9687 1.41931C17.331 1.68479 16.5214 1.74773 15.8318 1.52302C15.1039 0.593104 14 0 12.7642 0Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->instagram }}" target="blank" aria-label="Instagram"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-blue-seo before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="17" height="17"
                                            viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5 0C2.23858 0 0 2.23858 0 5V11.33C0 14.0914 2.23858 16.33 5 16.33H11.33C14.0914 16.33 16.33 14.0914 16.33 11.33V5C16.33 2.23858 14.0914 0 11.33 0H5ZM13.0645 4.08222C13.5155 4.08222 13.881 3.71666 13.881 3.26572C13.881 2.81478 13.5155 2.44922 13.0645 2.44922C12.6136 2.44922 12.248 2.81478 12.248 3.26572C12.248 3.71666 12.6136 4.08222 13.0645 4.08222ZM12.247 8.16551C12.247 10.4202 10.4192 12.248 8.16453 12.248C5.90983 12.248 4.08203 10.4202 4.08203 8.16551C4.08203 5.91081 5.90983 4.08301 8.16453 4.08301C10.4192 4.08301 12.247 5.91081 12.247 8.16551ZM8.16532 10.6138C9.51814 10.6138 10.6148 9.51717 10.6148 8.16434C10.6148 6.81152 9.51814 5.71484 8.16532 5.71484C6.8125 5.71484 5.71582 6.81152 5.71582 8.16434C5.71582 9.51717 6.8125 10.6138 8.16532 10.6138Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->linkedin }}" target="blank" aria-label="Dribble"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-blue-seo before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10">
                                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.983 3.5C4.983 4.88071 3.86371 6 2.483 6C1.10229 6 -0.017 4.88071 -0.017 3.5C-0.017 2.11929 1.10229 1 2.483 1C3.86371 1 4.983 2.11929 4.983 3.5Z"
                                                fill="white" />
                                            <path d="M0 8H5V24H0V8Z" fill="white" />
                                            <path
                                                d="M8 8H12.5V10.25H12.56C13.1817 9.08325 14.7642 7.875 17.078 7.875C22.014 7.875 23 10.875 23 15.25V24H18V16.25C18 14.25 17.958 11.75 15.25 11.75C12.5 11.75 12 13.875 12 16.1V24H8V8Z"
                                                fill="white" />
                                        </svg>

                                    </span>
                                </a>
                            </div>
                        </div>

                        @if ($footer_menu)
                            @foreach ($footer_menus->whereNull('parent_id')->take(2) as $item)
                                @if ($item->parent_id == null)
                                    <div class="col-span-3 md:col-span-4 xl:col-span-3">
                                        <h1 class="font-semibold text-18 text-white">{{ $item->title }}</h1>
                                        <ul class="mt-3.5">
                                            @if ($footer_menus?->where('parent_id', $item?->id)->count() > 0)
                                                @foreach ($footer_menus?->where('parent_id', $item?->id) as $sub_item)
                                                    <li class="">
                                                        <a
                                                            href="{{ $sub_item?->url ? url('/') . $sub_item?->url : 'javascript:void(0)' }}">
                                                            <div
                                                                class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 overflow-hidden">
                                                                <svg class="absolute -left-2 transition-all duration-300 group-hover:left-0"
                                                                    width="6" height="12" viewBox="0 0 6 12"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 1L5 6L1 11" stroke="white"
                                                                        stroke-width="1.5" stroke-linecap="round"
                                                                        stroke-linejoin="round" />
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
                                @endif
                            @endforeach
                        @endif
                        <div class="col-span-2">
                            <h1 class="font-semibold text-18 text-white">{{ __('Address') }}</h1>
                            <div
                                class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 mt-3.5">
                                <span class="transition-all duration-300">
                                    {{ $footer?->address }}
                                </span>
                            </div>
                            <h1 class="font-semibold text-18 text-white">{{ __('Contact') }}</h1>
                            <div
                                class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white hover:underline transition-all duration-300 mt-3.5">
                                <span class="transition-all duration-300">
                                    {{ $footer?->email }} <br />
                                    {{ $footer?->phone }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -right-[268px] top-[132px]">
                        <img src="{{ asset(home2_footer_image()) }}" alt="footer" />
                    </div>
                    <div class="w-full h-[80px] md:h-[65px] bg-[#323239] relative z-10">
                        <div class="theme-container mx-auto h-full">
                            <div class="w-full h-full flex flex-col sm:flex-row justify-between items-center">
                                <span class="text-white/50 pt-3 md:pt-0">{{ $footer?->copyright }}</span>
                                <div class="relative">
                                    <a href="#" aria-label="go top"
                                        class="w-[45px] h-[45px] rounded-full border-[3px] border-[#323239] flex justify-center items-center bg-purple absolute -top-[70px] md:-top-[55px]">
                                        <span>
                                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="22.5" cy="22.5" r="21" fill="#794aff"
                                                    stroke="#323239" stroke-width="3" />
                                                <path d="M19 21L23 17M23 17L27 21M23 17V29" stroke="white"
                                                    stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <ul class="flex space-x-4 sm:space-x-6 items-center">
                                    <li
                                        class="hover:text-white hover:underline common-transition text-white/50 font-medium">
                                        <a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                                    </li>
                                    <li class="text-white/50 font-medium">|</li>
                                    <li
                                        class="hover:text-white hover:underline common-transition text-white/50 font-medium">
                                        <a href="{{ route('terms-conditions') }}">{{ __('Terms & Conditions') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lottie.js') }}"></script>
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
            $(document).on('click', '#currency_select.custom-select.home_2_desktop_currency .select-items > div',
                function() {
                    $('#home_two_desktop_currency_form').submit();
                })
            //mobile currency select
            $(document).on('click', '#currency_select.custom-select.home-two-mobile .select-items > div',
                function() {
                    $('#currency_switcher_form_mobile_home_two').submit();
                })

            //desktop language select
            $(document).on('click', '#language_select.custom-select.home_2_desktop .select-items > div',
                function() {
                    $('#language_form_home_two_desktop').submit();
                })
            //mobile language select
            $(document).on('click', '#language_select.custom-select.home_two_mobile .select-items > div',
                function() {
                    $('#language_switcher_form_mobile_home_two').submit();
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
