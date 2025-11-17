<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset($general_setting->favicon) }}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title')
    <!--Todo: library css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    <!--Todo: compiled from input.css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!--Todo: overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

    <!-- End google font  -->
    @stack('style_section')

    @laravelPWA
</head>

<body class="home-one relative {{ Route::is('user.*') || Route::is("user-order.reviews") ? 'bg-buisness-gray' : '' }}">
    <!-- Preloader -->
    @include('components.preloder')

    <!--Todo: web-Menu start  -->
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
                    <div class="flex gap-[14px] items-center">
                   
                        {{-- language select --}}
                        <div id="language_select_inner"
                            class="custom-select home_5_desktop relative flex gap-1 items-center pr-5 text-white">
                            <form action="{{ route('language-switcher') }}" method="get" id="language_switcher_form">
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
                                            <a href="{{ $menu_item?->title == 'Home' ? route('home') : ($menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0);') }}"
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
                                        <li class=" border-b border-b-buisness-red/10 p-4">
                                            <a href="{{ $menu_item?->title == 'Home' ? route('home') : ($menu_item->url ? url('/') . $menu_item->url : 'javascript:void(0)') }}"
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
                                class="custom-select inner-mobile-currency relative w-[124px] flex gap-1 items-center text-white border border-buisness-red/10 px-4 py-2 rounded-md">
                                <form action="{{ route('currency-switcher') }}" method="get" id="inner_mobile_currency">
                                    <select name="currency_code" id="currency_mb" class="hidden" aria-placeholder="">
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
                                    id="language_switcher_form_mobile">
                                    <select name="lang_code" id="language_mb" class="hidden" aria-placeholder="">
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
                                <div class="home-two-btn-bg py-2.5 text-black group group-hover:text-buisness-red bg-[#FFE6EA] border-[#FFE6EA] w-full">
                                    <span
                                        class="text-base  group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                                        {{ Auth::check() ? __('Dashboard') : __('Login') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-black group-hover:stroke-buisness-red transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </a>
                            @if(!Auth::guard('web')->check())
                              <a href="{{ route('user.register') }}">
                                <div class="home-two-btn-bg py-2.5 text-white group group-hover:text-buisness-red bg-buisness-red border-buisness-red w-full">
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
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div>

                @yield('frontend_content')
                @if ($general_setting->cookie_consent_status == 1)
                    <!-- common-modal start  -->
                    <div class="common-modal cookie_consent_modal d-none bg-white">
                        <button type="button" class="btn-close cookie_consent_close_btn" aria-label="Close"></button>

                        <h5>{{ __('Cookies') }}</h5>
                        <p>{{ $general_setting->cookie_consent_message }}</p>


                        <a href="javascript:;"
                            class="td_btn td_style_1 td_type_3 td_radius_30 td_medium td_fs_14 report-modal-btn cookie_consent_accept_btn">
                            <span class="td_btn_in td_accent_color">
                                <span>{{ __('Accept') }}</span>
                            </span>
                        </a>

                    </div>
                    <!-- common-modal end  -->
                @endif


                @if ($general_setting->tawk_status == 1)
                    <script type="text/javascript">
                        var Tawk_API = Tawk_API || {},
                            Tawk_LoadStart = new Date();
                        (function () {
                            var s1 = document.createElement("script"),
                                s0 = document.getElementsByTagName("script")[0];
                            s1.async = true;
                            s1.src = '{{ $general_setting->tawk_chat_link }}';
                            s1.charset = 'UTF-8';
                            s1.setAttribute('crossorigin', '*');
                            s0.parentNode.insertBefore(s1, s0);
                        })();
                    </script>
                @endif


                @include('theme.theme_5._cta_section')

                <footer class="pt-20 bg-buisness-light-black">
                    <div class="theme-container mx-auto flex flex-wrap gap-5 justify-between mb-20">
                        <div class="w-fit max-w-[300px]">
                            <img src="{{ asset($general_setting?->home_five_logo ?? $general_setting?->white_logo) }}"
                                alt="logo" />
                            <p class="max-w-[300px] text-white my-6">
                                {{ $footer?->about_us }}
                            </p>

                            <div class="flex gap-[15px]">
                                <a href="{{ $footer?->facebook }}" aria-label="facebook" target="blank"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="11" height="16" viewBox="0 0 11 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.6667 0H8.55556C5.79413 0 3.55556 2.23857 3.55556 5V6.22222H0V9.77778H3.55556V16H7.11111V9.77778H10.6667V6.22222H7.11111V4.55556C7.11111 4.00327 7.55883 3.55556 8.11111 3.55556H10.6667V0Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->twitter }}" aria-label="twitter" target="blank"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="19" height="17" viewBox="0 0 19 17"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.7642 0C10.5722 0 8.7953 1.86585 8.7953 4.1675C8.7953 4.5153 8.83587 4.85315 8.91232 5.17611C6.80469 5.17611 3.63013 4.74999 0.978868 2.09376C0.626315 1.74054 -0.0237835 1.9767 0.000670803 2.47516C0.393588 10.484 3.82353 12.8202 5.58986 12.9656C4.44926 14.0921 2.79242 14.9813 1.1252 15.3804C0.685191 15.4857 0.576494 15.9674 1.00675 16.1073C2.19973 16.4953 3.90729 16.6448 4.82642 16.67C11.3286 16.67 16.6134 11.1972 16.731 4.3991C17.5847 3.84394 18.1315 2.63855 18.4388 1.78464C18.5136 1.57667 18.1728 1.33436 17.9687 1.41931C17.331 1.68479 16.5214 1.74773 15.8318 1.52302C15.1039 0.593104 14 0 12.7642 0Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->instagram }}" target="blank" aria-label="instagram"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10"><svg width="17" height="17" viewBox="0 0 17 17"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5 0C2.23858 0 0 2.23858 0 5V11.33C0 14.0914 2.23858 16.33 5 16.33H11.33C14.0914 16.33 16.33 14.0914 16.33 11.33V5C16.33 2.23858 14.0914 0 11.33 0H5ZM13.0645 4.08222C13.5155 4.08222 13.881 3.71666 13.881 3.26572C13.881 2.81478 13.5155 2.44922 13.0645 2.44922C12.6136 2.44922 12.248 2.81478 12.248 3.26572C12.248 3.71666 12.6136 4.08222 13.0645 4.08222ZM12.247 8.16551C12.247 10.4202 10.4192 12.248 8.16453 12.248C5.90983 12.248 4.08203 10.4202 4.08203 8.16551C4.08203 5.91081 5.90983 4.08301 8.16453 4.08301C10.4192 4.08301 12.247 5.91081 12.247 8.16551ZM8.16532 10.6138C9.51814 10.6138 10.6148 9.51717 10.6148 8.16434C10.6148 6.81152 9.51814 5.71484 8.16532 5.71484C6.8125 5.71484 5.71582 6.81152 5.71582 8.16434C5.71582 9.51717 6.8125 10.6138 8.16532 10.6138Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                </a>
                                <a href="{{ $footer?->linkedin }}" aria-label="linkedin" target="blank"
                                    class="w-[46px] h-[46px] rounded-full flex justify-center items-center border border-white/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span class="relative z-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            viewBox="0 0 24 24" fill="white">
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
                                                            <a
                                                                href="{{ $menu_item?->url ? url('/') . $menu_item?->url : 'javascript:void(0)' }}">
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
                                @if($offices)
                                    <h1 class="font-semibold text-18 text-white mb-3">{{ __('Address') }}</h1>
                                    @foreach($offices as $office)
                                        <a href="https://maps.google.com/?q={{ urlencode($office['location']) }}" target="_blank" rel="noopener noreferrer"
                                            class="text-sm text-white/50 hover:text-white hover:underline transition-all duration-300 mb-3 block">
                                            {{ $office['location'] }}
                                        </a>
                                    @endforeach
                                    <hr class="border-white/10 my-4">
                                @endif
                                <h1 class="font-semibold text-18 text-white">{{ __('Contact') }}</h1>
                                <div class="flex gap-2 items-center relative group font-medium text-white/50 hover:text-white transition-all duration-300 mt-3.5">
                                    <a href="mailto:{{ $footer?->email }}" class="hover:underline transition-all duration-300">
                                        {{ $footer?->email }}
                                    </a>
                                    <br />
                                    <span>{{ $footer?->phone }}</span>
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
                                    <div
                                        class="home-two-btn-bg py-3.5 group bg-buisness-red border-buisness-red w-fit mt-2.5">
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
                                                <path d="M1 6.33333L6.33333 1M6.33333 1L11.6667 6.33333M6.33333 1V17"
                                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                                <ul class="max-w-80 flex space-x-3 md:space-x-6 items-center">
                                    <li
                                        class="hover:text-white hover:underline common-transition text-paragraph font-medium">
                                        <a href="{{ route('privacy-policy') }}">{{ __('Privacy Policy') }}</a>
                                    </li>
                                    <li class="text-paragraph font-medium">|</li>
                                    <li
                                        class="hover:text-white hover:underline common-transition text-paragraph font-medium">
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

    <!-- logout  -->
    <div id="logoutModal" class="bg-transparent modal-body !p-0 fixed top-0 left-0 z-50 hidden">
        <div class="w-screen h-screen flex justify-center items-center relative">
            <!-- overlay -->
            <button id="logoutModalOverlay"
                class="w-screen h-screen absolute top-0 left-0 bg-black/60 modal-overlay"></button>

            <div class="w-full  max-w-[408px] bg-white p-30 rounded-xl relative z-20 modal-content">
                <div class="flex flex-col gap-30 justify-center items-center">
                    <div class="img">

                        @include('theme.svg.logout_image')

                    </div>
                    <div class=" text-center">
                        <h2 class="text-30 font-semibold leading-10 mb-30"> {{ __('Are you Sure?') }} <br>
                            {{ __('Logout Account') }}</h2>
                        <div class="flex justify-center gap-5 mt-5">
                            <button type="button" id="logoutCancelBtn"
                                class="home-two-btn-bg py-3 group bg-[#FF002A0F] border-[#FF002A1A]">
                                <span class="text-base text-[#FF002A] relative z-10">
                                    {{ __('Cancel') }}
                                </span>
                            </button>


                            <form method="get" action="{{ route('user.logout') }}">
                                @csrf
                                <button>
                                    <div class="home-two-btn-bg py-3 group bg-buisness-red border-business-red">
                                        <span
                                            class="text-base text-white group-hover:text-buisness-red font-semibold font-inter relative z-10">
                                            {{ __('Yes Logout') }}
                                        </span>
                                        <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:stroke-buisness-red transition-all duration-300"
                                                d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Delete Modal  -->
    <div id="accountDeleteModal" class="bg-transparent modal-body !p-0 fixed top-0 left-0 z-50 hidden">
        <div class="w-screen h-screen flex justify-center items-center relative">
            <!-- overlay -->
            <button id="accountDeleteModalOverlay"
                class="w-screen h-screen absolute top-0 left-0 bg-black/60 modal-overlay"></button>

            <div class="w-full  max-w-[408px] bg-white p-30 rounded-xl relative z-20 modal-content">
                <div class="flex flex-col gap-30 justify-center items-center">
                    <div class="img">
                        @include('theme.svg.account_delete')
                    </div>
                    <div class=" text-center">
                        <h2 class="text-30 font-semibold leading-10 mb-30"> {{ __('Are you Sure?') }} <br>
                            {{ __('Delete Account') }}</h2>
                        <form action="{{ route('user.confirm-account-delete') }}" method="POST" id="deleteAccountForm">
                            @csrf
                            @method('DELETE')
                            <div class="mb-5">
                                <div class="Quland-checkout-field text-left">
                                    <label class="text-base text-left block mb-2">{{ __('Current Password*') }}</label>
                                    <div class="relative flex items-center">
                                        <input type="password" name="password" id="password" placeholder="*********"
                                            class="form-input" />
                                        <button type="button" class="absolute right-4" id="togglePasswordBtn">
                                            <svg width="20" height="18" viewBox="0 0 20 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M18.5303 1.53033C18.8232 1.23744 18.8232 0.762557 18.5303 0.469667C18.2374 0.176778 17.7626 0.176778 17.4697 0.469667L1.46967 16.4697C1.17678 16.7626 1.17678 17.2374 1.46967 17.5303C1.76256 17.8232 2.23744 17.8232 2.53033 17.5303L5.37723 14.6834C6.74353 15.3266 8.3172 15.75 10 15.75C12.684 15.75 15.0903 14.6729 16.8206 13.345C17.6874 12.6797 18.4032 11.9376 18.9089 11.2089C19.4006 10.5003 19.75 9.7227 19.75 9C19.75 8.2773 19.4006 7.4997 18.9089 6.79115C18.4032 6.06244 17.6874 5.32028 16.8206 4.65503C16.5585 4.45385 16.2808 4.25842 15.989 4.07163L18.5303 1.53033ZM14.8995 5.16113L13.1287 6.93196C13.5213 7.5248 13.75 8.2357 13.75 9C13.75 11.0711 12.0711 12.75 10 12.75C9.2357 12.75 8.5248 12.5213 7.93196 12.1287L6.51524 13.5454C7.58077 13.9795 8.7621 14.25 10 14.25C12.2865 14.25 14.3802 13.3271 15.9073 12.155C16.6692 11.5703 17.2714 10.9374 17.6766 10.3536C18.0957 9.7497 18.25 9.2773 18.25 9C18.25 8.7227 18.0957 8.2503 17.6766 7.6464C17.2714 7.0626 16.6692 6.42972 15.9073 5.84497C15.5941 5.60461 15.2571 5.37472 14.8995 5.16113ZM9.0299 11.0307C9.3237 11.1713 9.6526 11.25 10 11.25C11.2426 11.25 12.25 10.2426 12.25 9C12.25 8.6526 12.1713 8.3237 12.0307 8.0299L9.0299 11.0307Z"
                                                    fill="#8B8A8A" />
                                                <path
                                                    d="M10 2.25C11.0323 2.25 12.0236 2.40934 12.9511 2.68101C13.1296 2.73328 13.1827 2.95662 13.0513 3.0881L12.2267 3.91265C12.1648 3.97451 12.0752 3.99928 11.99 3.97967C11.3506 3.83257 10.6839 3.75 10 3.75C7.71345 3.75 5.61978 4.67292 4.09267 5.84497C3.33078 6.42972 2.72857 7.0626 2.32343 7.6464C1.90431 8.2503 1.75 8.7227 1.75 9C1.75 9.2773 1.90431 9.7497 2.32343 10.3536C2.67725 10.8635 3.18138 11.4107 3.81091 11.9307C3.92677 12.0264 3.93781 12.2015 3.83156 12.3078L3.12265 13.0167C3.03234 13.107 2.88823 13.1149 2.79037 13.0329C2.09739 12.4517 1.51902 11.8255 1.0911 11.2089C0.59937 10.5003 0.25 9.7227 0.25 9C0.25 8.2773 0.59937 7.4997 1.0911 6.79115C1.59681 6.06244 2.31262 5.32028 3.17941 4.65503C4.90965 3.32708 7.31598 2.25 10 2.25Z"
                                                    fill="#8B8A8A" />
                                                <path
                                                    d="M10 5.25C10.1185 5.25 10.2357 5.25549 10.3513 5.26624C10.5482 5.28453 10.6194 5.51991 10.4796 5.6597L9.2674 6.87196C8.6141 7.0968 8.0968 7.6141 7.87196 8.2674L6.6597 9.4796C6.51991 9.6194 6.28453 9.5482 6.26624 9.3513C6.25549 9.2357 6.25 9.1185 6.25 9C6.25 6.92893 7.92893 5.25 10 5.25Z"
                                                    fill="#8B8A8A" />
                                            </svg>

                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-center gap-5 mt-5">
                                <button type="button" id="accountDeleteCancelBtn"
                                    class="home-two-btn-bg py-3 group bg-[#FF002A0F] border-[#FF002A1A]">
                                    <span class="text-base text-[#FF002A] relative z-10">
                                        {{ __('Cancel') }}
                                    </span>
                                </button>


                                <button type="submit" id="confirmDeleteBtn">
                                    <div class="home-two-btn-bg py-3 group bg-buisness-red border-business-red">
                                        <span
                                            class="text-base text-white group-hover:text-buisness-red font-semibold font-inter relative z-10">
                                            {{ __('Yes Delete') }}
                                        </span>
                                        <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:stroke-buisness-red transition-all duration-300"
                                                d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    @yield('popup_video')

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('global/select2/select2.min.js') }}"></script>
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


    @stack('script_section')

    <script>
        "use strict";
        $(document).ready(function () {
            //desktop currency select
            $(document).on('click', '#currency_select.custom-select.inner_desktop_currency > div', function (e) {
                let checkoutRoute = "{{ route('checkout.index') }}";
                let checkoutProcess = "{{ route('checkout.process-to-payment') }}";
                let currentUrl = window.location.origin + window.location.pathname;
                if (window.location.href === checkoutRoute || currentUrl === checkoutProcess) {
                    e.preventDefault(); // stop submit if same route
                    return false;
                }
                $('#currency_switcher_form').submit();
            })
            //mobile currency select
            $(document).on('click', '#currency_select.custom-select.inner-mobile-currency > div', function (e) {
                let checkoutRoute = "{{ route('checkout.index') }}";
                let checkoutProcess = "{{ route('checkout.process-to-payment') }}";
                let currentUrl = window.location.origin + window.location.pathname;
                if (window.location.href === checkoutRoute || currentUrl === checkoutProcess) {
                    e.preventDefault(); // stop submit if same route
                    return false;
                }
                $('#inner_mobile_currency').submit();
            })

            //desktop language select
            $(document).on('click', '#language_select_inner.custom-select > div', function () {
                $('#language_switcher_form').submit();
            })
            $(document).on('click', '#language_select.custom-select.inner_mobile > div', function () {
                $('#language_switcher_form_mobile').submit();
            })
        });
    </script>

    <script>
        // Mobile sub-nav functionality
        document.addEventListener('DOMContentLoaded', function () {

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
        });
        function addToWishlist(productId, element) {

            let is_user_logged_in = @json(Auth::check());
            if (!is_user_logged_in) {
                toastr.error("{{ __('Please login to add to wishlist.') }}");
                return;
            }


            $.ajax({
                url: element.dataset.url, // Get URL from data attribute
                type: "POST",
                data: {
                    product_id: productId,
                    _token: document.querySelector('meta[name="csrf-token"]').content
                },
                success: function (response) {
                    $(element).find('span svg').toggleClass('active');

                    toastr.success(response.message);

                    if (response.action === 'add') {
                        $('.wishlist_count').each(function () {
                            let current_qty = parseInt($(this).text().trim()) || 0;
                            $(this).text(current_qty + 1);
                        });

                    } else if (response.action === 'remove') {

                        $('.wishlist_count').each(function () {
                            let current_qty = parseInt($(this).text().trim()) || 0;
                            if (current_qty > 0) {
                                $(this).text(current_qty - 1);
                            } else {
                                $(this).text(0);
                            }
                        });
                    }

                    // Remove the product card from wishlist view
                    $("#wishlist-item-" + productId).fadeOut(300, function () {
                        $(this).remove();
                        set_timeout(function () {
                            location.reload();
                        }, 1000);
                        // Check if wishlist is empty after removal
                        if ($("#wishlist-container").children().length === 0) {
                            location.reload(); // Reload to show the "not found" message
                        }
                    });
                },
                error: function (xhr) {
                    toastr.error(xhr.responseJSON.message);
                }
            });
        }
        (function ($) {
            "use strict";
            $(document).ready(function () {

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

                if (demo_mode_message != null) {
                    toastr.warning(
                        "{{ __('All Language keywords are not implemented in the demo mode') }}"
                    );
                    toastr.info(
                        "{{ __('Admin can translate every word from the admin panel') }}");
                }

                const validation_errors = @json($errors->all());

                if (validation_errors.length > 0) {
                    validation_errors.forEach(error => toastr.error(error));
                }

                $('#accountDeleteBtn').on('click', function () {
                    var $modal = $('#accountDeleteModal');
                    if ($modal.length) {
                        $modal.toggleClass('hidden');
                    }
                });
                $('#logoutBtn').on('click', function () {
                    var $modal = $('#logoutModal');
                    if ($modal.length) {
                        $modal.toggleClass('hidden');
                    }
                });


                $("#currency_dropdown").on("change", function () {
                    $("#currency_form").submit();
                });

                $("#language_dropdown").on("change", function () {
                    $("#language_form").submit();
                });


                $(document).on('click', '.cart-add-btn', function (e) {
                    e.preventDefault();
                    var productId = $(this).data('product-id');
                    var quantity = $('input[name="quantity"]').val() || 1;
                    var $this = $(this);

                    // Create Form Data
                    let formData = new FormData();
                    formData.append('product_id', productId);
                    formData.append('quantity', quantity);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('cart.add') }}",
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $this.attr("disabled", true);
                        },
                        complete: function () {
                            $this.attr("disabled", false);
                        },
                        success: function (response) {
                            if (response.success) {
                                $('.cart-count').text(response.totalCartItem);

                                let total_count = parseInt($('.cart_btn').find(
                                    '.cartCount').html().trim());

                                $('.cart_btn').find('.cartCount').html(total_count +
                                    1);
                                toastr.success(
                                    "{{ __('Cart Added Successfully') }}");
                            } else {
                                toastr.error(
                                    "{{ __('Something Went Wrong') }}");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX error:", xhr.responseText);
                        }
                    });
                });


                if (localStorage.getItem('Quland-cookie') != '1') {
                    $('.cookie_consent_modal').removeClass('d-none');
                }

                $('.cookie_consent_close_btn').on('click', function () {
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('.cookie_consent_accept_btn').on('click', function () {
                    localStorage.setItem('Quland-cookie', '1');
                    $('.cookie_consent_modal').addClass('d-none');
                });

                $('#accountDeleteModalOverlay').on('click', function () {
                    $('#accountDeleteModal').toggleClass('hidden');
                });

                $('#logoutModalOverlay').on('click', function () {
                    $('#logoutModal').toggleClass('hidden');
                });

                $('#logoutCancelBtn').on('click', function () {
                    $('#logoutModal').toggleClass('hidden');
                });

                $('#togglePasswordBtn').on('click', function () {
                    var $passwordInput = $('#password');
                    var type = $passwordInput.attr('type') === 'text' ? 'password' : 'text';
                    $passwordInput.attr('type', type);
                });

                $('#accountDeleteCancelBtn').on('click', function () {
                    $('#accountDeleteModal').toggleClass('hidden');
                });


            });
        })(jQuery);
    </script>
    <script>
        $(document).ready(function () {
            $('#user-img').on('change', function (e) {
                const fileInput = this;
                const formData = new FormData();
                formData.append('image', fileInput.files[0]);

                // CSRF Token
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '{{ route('user.update-image') }}', // Create this route
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.image_url) {
                            $('#user-img-preview').attr('src', response.image_url);
                            toastr.success('Image updated successfully!');
                        } else {
                            toastr.error('Image update failed!');
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Something went wrong!');
                    }
                });
            });
        });
    </script>

</body>

</html>
