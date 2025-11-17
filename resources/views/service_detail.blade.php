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

        <!-- service details start   -->
        <section class="pt-16 md:pt-[130px]">
            <div class="theme-container w-full mx-auto">
                <div class="grid grid-cols-8 lg:grid-cols-12 gap-[30px]">
                    <div data-aos="fade-up" class="col-span-8">
                        <h1 class="font-semibold text-[28px] leading-[35px] text-main-black mb-5">
                            {{ $service?->title }}
                        </h1>
                        <p class="text-paragraph  mb-10 max-w-[786px]">
                            {{ $service?->short_description }}
                        </p>
                        <img src="{{ asset($service?->background_image) }}" alt="" />
                        <div class="mt-10 service-article">
                            {!! clean($service?->description) !!}
                        </div>

                    </div>
                    <div data-aos="fade-up" data-aos-delay="100" class="col-span-8 lg:col-span-4">
                        <div class="border border-buisness-red/10 rounded-2xl py-[30px] bg-buisness-gray">
                            <div class="flex gap-5 items-center px-10 pb-[30px]">
                                @include('theme.svg.category')
                                <h1 class="text-22 font-semibold text-main-black">
                                    {{ __('Popular Services') }}
                                </h1>
                            </div>
                            <hr class="bg-buisness-red/10" />
                            <div class="pt-10 flex flex-col px-10 gap-[30px]">

                                @foreach ($popular_services as $popular_service)

                                    <a href="{{ route('service', $popular_service->slug) }}">
                                        <div class="flex items-center gap-2 group text-gray-69 hover:text-buisness-red">
                                            <svg width="7" height="11" viewBox="0 0 7 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path class="transition-all duration-300"
                                                    d="M1.5 10L5.29289 6.20711C5.62623 5.87377 5.79289 5.70711 5.79289 5.5C5.79289 5.29289 5.62623 5.12623 5.29289 4.79289L1.5 1"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                            <p class="text-18 font-medium text-gray-69 font-inter border-b border-transparent leading-5 before:leading-5 before:block before:text-18 before:pb-[1px] before:border-buisness-red before:font-medium before:text-buisness-red before:font-inter before:border-b before:content-[attr(data-category)] before:absolute before:-bottom-[1px] before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-[21px] relative"
                                                data-category="{{ $popular_service?->title }}">
                                                {{ $popular_service->title }}
                                            </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="border border-buisness-red/10 rounded-2xl py-[30px] bg-buisness-gray mt-[30px]">
                            <div class="flex gap-5 items-center px-10 pb-[30px]">
                                @include('theme.svg.consultation')

                                <h1 class="text-22 font-semibold text-main-black">
                                    {{ __('Get Consultation') }}
                                </h1>
                            </div>
                            <hr class="bg-buisness-red/10" />
                            <form action="{{ route('store-contact-message') }}" method="POST">
                                @csrf
                                <div class="pt-10 flex flex-col px-10 gap-[30px]">
                                    <input placeholder="{{ __('Name') }}" id="fullName" type="text" name="name"
                                        value="{{ old('name') }}"
                                        class="placeholder:text-paragraph w-full h-[56px] bg-white border border-white rounded-md focus:border-main-black focus:outline-none focus:right-0 px-[25px]" />
                                    <input placeholder="{{ __('Enter your email...') }}" id="eOne" type="text" name="email"
                                        value="{{ old('email') }}"
                                        class="placeholder:text-paragraph w-full h-[56px] bg-white border border-white rounded-md focus:border-main-black focus:outline-none focus:right-0 px-[25px]" />
                                    <textarea placeholder="{{ __('Your message...') }}" id="message" type="text"
                                        name="message"
                                        class="placeholder:text-paragraph w-full bg-white border border-white rounded-md focus:border-main-black focus:outline-none focus:right-0 px-[25px] py-5 h-[140px]">{{ old('message') ? trim(old('message')) : '' }}</textarea>

                                    @if($general_setting->recaptcha_status == 1)
                                        <div class="col-span-6 md:col-span-12">
                                            <div class="g-recaptcha" data-sitekey="{{ $general_setting->recaptcha_site_key }}">
                                            </div>
                                        </div>
                                    @endif

                                    <button type="submit">
                                        <div class="home-two-btn-bg py-3 group bg-main-black border-main-black w-full">
                                            <span
                                                class="text-base text-white group-hover:text-main-black transition-all duration-300 font-inter relative z-10">
                                                {{ __('Get A Quote') }}
                                            </span>
                                            <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path class="group-hover:stroke-main-black transition-all duration-300"
                                                    d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="mt-[30px] flex justify-center items-end relative w-full rounded-2xl overflow-hidden">
                            <img src="{{ asset(getImage($blog_adds, 'add_image')) }}" alt="" class="w-full object-cover" />
                            <div class="w-full h-full absolute black_overlay"></div>
                            <div class="w-full max-w-[277px] absolute bottom-[30px]">
                                <h1 class="text-24 font-semibold text-white text-center mb-5">
                                    {{ getTranslatedValue($blog_adds, 'title') }}
                                </h1>
                                <a href="tel:{{ getTranslatedValue($blog_adds, 'phone_number') }}">
                                    <div
                                        class="home-two-btn-bg py-3 group bg-buisness-red border-buisness-red inline-flex w-full">
                                        <svg class="relative z-10" width="25" height="25" viewBox="0 0 25 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:fill-buisness-red transition-all duration-300"
                                                d="M24.1094 2.17188C24.625 2.3125 25 2.73438 25 3.25C25 15.2969 15.25 25 3.25 25C2.6875 25 2.26562 24.6719 2.125 24.1562L1 19.2812C0.90625 18.7656 1.14062 18.2031 1.65625 17.9688L6.90625 15.7188C7.375 15.5312 7.89062 15.6719 8.21875 16.0469L10.5625 18.9062C14.2188 17.1719 17.1719 14.1719 18.8594 10.6094L16 8.26562C15.625 7.9375 15.4844 7.42188 15.6719 6.95312L17.9219 1.70312C18.1562 1.1875 18.7188 0.90625 19.2344 1.04688L24.1094 2.17188Z"
                                                fill="white" />
                                        </svg>

                                        <span
                                            class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-inter relative z-10">
                                            {{ getTranslatedValue($blog_adds, 'phone_number') }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="bg-buisness-red/10 mt-[120px]" />
            </div>
        </section>
        <!-- service details end  -->
        <!-- related service start -->
        <section class="bg-white w-full pb-14 pt-16 md:pt-[100px] md:pb-[120px]">
            <div class="theme-container w-full mx-auto">
                <div class="max-w-[661px] w-full flex flex-col items-center mx-auto">
                    <h2 class="text-24 sm:text-48 font-semibold text-black pt-5 text-center">
                        {{ __('Related Services') }}
                    </h2>
                </div>
                <div
                    class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-8 gap-y-[30px] mt-10 md:mt-[70px]">
                    <!-- card start  -->

                    @foreach ($showServices as $service)
                        <div data-aos="fade-left" data-aos-duration="1000"
                            class="bg-white px-5 pt-5 pb-4 md:px-10 md:pt-10 md:pb-8 col-span-4 rounded-3xl hover:shadow-business-red-md transition-all duration-300 cursor-pointer border border-buisness-red/10 hover:border-white">
                            <a href="{{ route('service', $service?->slug) }}">
                                <img src="{{ asset($service?->theme_5_thumbnail_image) }}" alt="">

                                <h1 class="text-main-black font-semibold text-22 mt-6 mb-2">
                                    {{ $service?->title }}
                                </h1>
                                <p class="text-paragraph">
                                    {{ Str::limit($service?->short_description, 70, '...') }}
                                </p>
                            </a>
                        </div>
                    @endforeach
                    <!-- card end  -->
                </div>
            </div>
        </section>
        <!-- related service end  -->

    </main>
@endsection
@push('script_section')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
