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

    <!-- faq start  -->
    <section class="relative pt-16 md:pt-[130px]">
        <div class="w-full relative z-10">
            <div class="theme-container mx-auto">
                <div class="flex justify-center items-center relative">
                    <div class="grid grid-cols-6 xl:grid-cols-11 w-full relative z-10 gap-y-5 xl:gap-[118px]">
                        <div class="col-span-6 xl:col-span-5 sm:pr-5">
                            <h1
                                class="border text-main-black border-buisness-red/10 py-0.5 px-5 rounded-[30px] w-fit bg-buisness-red/5 font-medium">
                                {{ getTranslatedValue($faqs_page_content, 'section_name') }}
                            </h1>
                            <h2
                                class="text-24 sm:text-48 font-semibold text-main-black mt-5 max-w-[720px] mb-14 mx-auto xl:mx-0 text-center xl:text-left">
                                {{ getTranslatedValue($faqs_page_content, 'title_1') }}
                            </h2>
                            <div class="w-full relative">
                                <img class="w-full rounded-xl"
                                    src="{{ asset(getImage($faqs_page_content, 'image_1')) }}" alt="" />
                                <div
                                    class="w-10 px-2 sm:w-16 md:w-[100px] aspect-square rounded-lg bg-buisness-red top-2 right-2 sm:-top-5 sm:-right-5 absolute flex justify-center items-center">
                                    <svg width="64" height="45" viewBox="0 0 64 45" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.5136 0H48.4158L27.9021 30.4053H0L20.5136 0Z" fill="white" />
                                        <path
                                            d="M21.7364 33.2233L13.791 45H43.0167L63.5303 14.5947H41.96L29.3917 33.2233H21.7364Z"
                                            fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-6">
                            <div data-aos="fade-up" class="flex flex-col gap-2.5 w-full">
                                <!-- faq single start  -->

                                @foreach ($faqs->where('faq_position','top') as $faq)
                                <div class="md:py-5 py-2.5 px-2 md:px-9 w-full rounded-[10px] service-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-buisness-red/10 bg-white"
                                    name="faq-{{ $faq?->id }}">
                                    <div class="w-full flex justify-between items-center  pointer-events-none h-fit">
                                        <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                            {{ $faq?->question }}
                                        </h1>
                                        <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 2L9.5 8L17 2" stroke="#FF002A" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p id="faq-body" class="mt-3.5 text-paragraph pointer-events-none h-fit">
                                        {{ $faq?->answer }}
                                    </p>
                                </div>
                                @endforeach
                                <!-- faq single end  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq end  -->
    <!-- faq start  -->
    <section class="relative  py-16 md:py-[130px]">
        <div class="w-full relative z-10">
            <div class="theme-container mx-auto">
                <div class="flex justify-center items-center relative rounded-3xl overflow-hidden">
                    <div class="grid grid-cols-6 xl:grid-cols-11 w-full relative z-10 gap-y-5 xl:gap-[118px]">
                        <div class="col-span-6 xl:col-span-5 sm:pr-5 xl:hidden">
                            <h1
                                class="text-24 sm:text-48 font-semibold text-main-black mt-5 max-w-[720px] mb-14 mx-auto xl:mx-0 text-center xl:text-left">
                                {{ getTranslatedValue($faqs_page_content, 'title_2') }}
                            </h1>
                            <div class="w-full relative">
                                <img class="w-full rounded-xl"
                                    src="{{ asset(getImage($faqs_page_content, 'image_2')) }}" alt="" />
                                
                            </div>
                        </div>
                        <div class="col-span-6 pt-6">
                            <div class="flex flex-col gap-2.5 w-full">
                                <!-- faq single start  -->
                                @foreach ($faqs->where('faq_position','bottom') as $faq)
                                <div class="py-5 px-2 md:px-9 w-full rounded-[10px] service-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-buisness-red/10 bg-white"
                                    name="faq-{{ $faq?->id }}">
                                    <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                        <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                            {{ $faq?->question }}
                                        </h1>
                                        <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 2L9.5 8L17 2" stroke="#FF002A" stroke-width="3"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p id="faq-body" class="md:mt-3.5 mt-6 text-paragraph pointer-events-none h-fit">
                                        {{ $faq?->answer }}
                                    </p>
                                </div>
                                @endforeach
                                <!-- faq single end  -->

                            </div>
                        </div>
                        <div class="col-span-6 xl:col-span-5 sm:pr-5 hidden xl:block">
                            <h1
                                class="text-24 sm:text-48 font-semibold text-main-black mt-5 max-w-[720px] mb-14 mx-auto xl:mx-0 text-center xl:text-left">
                                {{ getTranslatedValue($faqs_page_content, 'title_2') }}
                            </h1>
                            <div class="max-w-[520px] relative">
                                <img class="w-full rounded-xl"
                                    src="{{ asset(getImage($faqs_page_content, 'image_2')) }}" alt="" />
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq end  -->

</main>

@endsection
