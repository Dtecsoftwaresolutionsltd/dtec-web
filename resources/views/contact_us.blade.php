@extends('inner_layout')

@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@section('frontend_content')

    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ $pageTitle }}" />

        <!-- main container  start  -->
        <section class="py-16 md:py-[130px]">
            <div
                class="theme-container w-full mx-auto grid grid-cols-7 lg:grid-cols-12 gap-y-16 lg:gap-y-0 lg:gap-x-[70px]">
                <!-- address start  -->
                <div class="col-span-7 lg:col-span-5">
                    <h1 class="font-semibold text-main-black text-[28px]">
                        {{ $contact_us?->title }}
                    </h1>
                    <p class="text-paragraph mt-5">
                        {{ $contact_us?->description }}
                    </p>
                    <div class="flex flex-col gap-4 mt-6 max-w-[254px] w-full ">
                        <div class="flex items-start gap-2.5">
                            <div class=" mt-1">
                                <span>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="13.4" stroke="#FFE6EA" stroke-width="1.2" />
                                        <circle cx="14" cy="13.3333" r="2" stroke="#FF002A" />
                                        <path
                                            d="M20 13.2592C20 16.532 16.25 20.6666 14 20.6666C11.75 20.6666 8 16.532 8 13.2592C8 9.98644 10.6863 7.33331 14 7.33331C17.3137 7.33331 20 9.98644 20 13.2592Z"
                                            stroke="#FF002A" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <p class=" text-paragraph ">
                                    {{ $contact_us?->address }}
                                </p>
                            </div>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <div class="mt-1">
                                <span>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="13.4" stroke="#FFE6EA" stroke-width="1.2" />
                                        <rect x="7.33203" y="8" width="13.3333" height="12" rx="4" stroke="#FF002A" />
                                        <path
                                            d="M8 11L11.4393 13.8661C12.9226 15.1022 15.0774 15.1022 16.5607 13.8661L20 11"
                                            stroke="#FF002A" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <p class="text-paragraph mt-1">{{ $contact_us?->email }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-2.5">
                            <div class="mt-1">
                                <span>
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="14" cy="14" r="13.4" stroke="#FFE6EA" stroke-width="1.2" />
                                        <path
                                            d="M19.25 18.0833V17.1232C19.25 16.6461 18.9596 16.2172 18.5166 16.04L17.33 15.5653C16.7667 15.34 16.1246 15.5841 15.8533 16.1268L15.75 16.3333C15.75 16.3333 14.2917 16.0417 13.125 14.875C11.9583 13.7083 11.6667 12.25 11.6667 12.25L11.8732 12.1467C12.4159 11.8754 12.66 11.2333 12.4346 10.67L11.96 9.48338C11.7828 9.04044 11.3539 8.75 10.8768 8.75H9.91667C9.27233 8.75 8.75 9.27233 8.75 9.91667C8.75 15.0713 12.9287 19.25 18.0833 19.25C18.7277 19.25 19.25 18.7277 19.25 18.0833Z"
                                            stroke="#FF002A" stroke-linejoin="round" />
                                    </svg>
                                </span>

                            </div>
                            <div>
                                <p class="text-paragraph mt-1">{{ $contact_us?->phone }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-[15px] mt-6 pt-5 border-t border-t-[#FFE6EA]">
                        <h1 class="font-semibold text-18 text-main-black pr-2.5">
                            {{ __('Follow Us') }}
                        </h1>
                        <a href="{{ $footer?->facebook }}" target="blank" aria-label="facebook"
                            class="w-10 h-10 text-buisness-red hover:text-white rounded-full flex justify-center items-center border border-buisness-red/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                            <span class="relative z-10">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.25 2.375H12.9167C10.1552 2.375 7.91667 4.61358 7.91667 7.375V7.91667H4.75V11.0833H7.91667V16.625H11.0833V11.0833H14.25V7.91667H11.0833V6.54167C11.0833 5.98938 11.531 5.54167 12.0833 5.54167H14.25V2.375Z"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ $footer?->twitter }}" aria-label="twitter" target="blank"
                            class="w-10 h-10 text-buisness-red hover:text-white rounded-full flex justify-center items-center border border-buisness-red/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                            <span class="relative z-10">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.1014 3.16669C10.4358 3.16669 9.08565 4.58445 9.08565 6.33335C9.08565 6.59763 9.11648 6.85434 9.17457 7.09975C7.3625 7.09975 4.5125 6.68521 2.375 3.87039C2.375 10.9074 5.225 12.9013 6.65 13.0185C5.58125 14.0741 3.91598 14.8554 2.375 15.0024C3.03797 15.6042 5.11451 15.8071 6.06991 15.8334C11.0106 15.8334 15.0262 11.6748 15.1156 6.50934C16.0632 5.89312 16.5132 4.22258 16.625 3.87039C16.1634 4.35513 15.2 4.57409 14.4323 4.32395C13.8792 3.61736 13.0404 3.16669 12.1014 3.16669Z"
                                        stroke="currentColor" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ $footer?->instagram }}" aria-label="instagram" target="blank"
                            class="w-10 h-10 text-buisness-red hover:text-white rounded-full flex justify-center items-center border border-buisness-red/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                            <span class="relative z-10">
                                <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect x="1.58203" y="1.58331" width="15.8333" height="15.8333" rx="4"
                                        stroke="currentColor" />
                                    <ellipse cx="14.2487" cy="4.74998" rx="0.791667" ry="0.791667" fill="currentColor" />
                                    <circle cx="9.5013" cy="9.50002" r="3.95833" stroke="currentColor" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ $footer?->linkedin }}" aria-label="dribble" target="blank"
                            class="w-10 h-10 text-buisness-red hover:text-white rounded-full flex justify-center items-center border border-buisness-red/10 overflow-hidden relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-buisness-red before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                            <span class="relative z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none"
                                    viewBox="0 0 17 17">
                                    <path
                                        d="M3.94 6.33H0.98V16H3.94V6.33ZM2.46 5.07C3.54 5.07 4.33 4.25 4.33 3.27C4.31 2.27 3.54 1.5 2.48 1.5C1.42 1.5 0.62 2.27 0.62 3.27C0.62 4.25 1.4 5.07 2.44 5.07H2.46ZM6.09 16H9.05V10.61C9.05 10.33 9.07 10.05 9.15 9.85C9.37 9.31 9.87 8.75 10.7 8.75C11.8 8.75 12.19 9.58 12.19 10.77V16H15.15V10.38C15.15 7.77 13.74 6.61 11.8 6.61C10.41 6.61 9.74 7.37 9.37 7.91H9.05V6.33H6.09C6.13 7.13 6.09 16 6.09 16Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <!-- address end  -->
                <!-- contact form start -->
                <div class="col-span-7">
                    <div class="border border-buisness-red/10 shadow-container bg-white rounded-[10px] p-10">
                        <h1 class="text-[28px] tracking-tight font-semibold text-main-black pb-6">
                            {{ __('Send Us Message') }}
                        </h1>
                        <p class="text-paragraph mb-[30px]">
                            {{ __('Your email address will not be published. Required fields are marked *') }}
                        </p>

                        <form action="{{ route('store-contact-message') }}" method="POST"
                            class="w-full grid grid-cols-1 md:grid-cols-2 gap-4">
                            @csrf
                            <input type="text" placeholder="{{ __('Full Name') }}" name="name" value="{{ old('name') }}"
                                class=" h-[48px] rounded-lg p-4 focus:outline-none border border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]" />
                            <input type="text" placeholder="{{ __('Last Name') }}" name="name" value="{{ old('name') }}"
                                class=" h-[48px] rounded-lg p-4 focus:outline-none border border-border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]" />

                            <input type="email" placeholder="{{ __('Email') }}" name="email" value="{{ old('email') }}"
                                class=" h-[48px] rounded-lg p-4 focus:outline-none border border-border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]" />
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="{{ __('Phone') }}"
                                class=" h-[48px] rounded-lg p-4 focus:outline-none border border-border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]" />

                            <input type="text" name="subject" value="{{ old('subject') }}" placeholder="{{ __('Subject') }}"
                                class="col-span-full h-[48px] rounded-lg p-4 focus:outline-none border border-border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]" />

                            <textarea name="message" value="{{ old('message') }}" placeholder="{{ __('Message') }}"
                                class="col-span-full h-[124px] rounded-lg p-4 focus:outline-none border border-border-[#F0F0F0] focus:border-main-black bg-[#FAFAFA]"></textarea>

                            @if($general_setting?->recaptcha_status == 1)
                                <div class="col-span-full flex justify-end">
                                    <div class="g-recaptcha" data-sitekey="{{ $general_setting?->recaptcha_site_key }}"></div>
                                </div>
                            @endif

                            <div class=" col-span-full flex justify-end">
                                <button type="submit"
                                    class="home-two-btn-bg py-3 group bg-buisness-red border-buisness-red inline-flex">
                                    <span
                                        class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-inter relative z-10">
                                        {{ __('Send Message') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-buisness-red transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- contact-form end  -->
            </div>
            <section class="overflow-hidden mt-10 md:mt-[60px] w-full">
                <div class="theme-container w-full mx-auto">
                    <div class="relative w-full h-[240px] sm:h-[450px] mx-auto xl:rounded-lg overflow-hidden bg-red-300">
                        <iframe src="{{ html_decode($contact_us?->map_code) }}" allowfullscreen="" width="100%"
                            height="100%" class="map-radius" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </section>
        </section>
        <!-- main container  end  -->

    </main>

@endsection
@push('script_section')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
