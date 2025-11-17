 <section class="w-full py-3 relative overflow-hidden bg-white">
            <!-- background  -->
            <img src="{{ asset(getImage($hero_image, 'thumb_image')) }}" alt=""
                class="w-full object-cover absolute top-0 z-0 buisness-dark-black xl:min-h-[520px] sm:min-h-[570px] min-h-[580px]" />
            <!-- content  -->

            <div class="theme-container relative z-10 w-full mx-auto">
                <div class="grid grid-cols-7 lg:grid-cols-12 pt-[113px] xl:pt-[213px] pb-[114px]">
                    <div class="col-span-7">
                        <div class="swiper h5_hero_slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide pb-4">
                                    <div
                                        class="flex gap-2.5 relative z-10 px-3 sm:px-6 py-1.5 sm:py-3 rounded-[40px] border border-white/10 bg-white/5 items-center w-fit">
                                        {{ get_svg('star') }}
                                        <span class="font-semibold text-18 sm:text-20 text-white">
                                             {{ getTranslatedValue($hero_image,'sub_title') }}
                                        </span>
                                    </div>
                                    <h1 class="font-semibold text-34 sm:text-48 xl:text-75 text-white mt-4 sm:mt-8">
                                        {{ getTranslatedValue($hero_image,'title_one') }}
                                    </h1>
                                    <div class="flex flex-col sm:flex-row gap-8 pt-5 sm:pt-11">
                                        <a href="{{ getTranslatedValue($hero_image,'button_url') }}">
                                            <div
                                                class="home-two-btn-bg group bg-buisness-red border-buisness-red py-3 sm:py-[15px]">
                                                <span
                                                    class="text-base group-hover:text-buisness-red text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                                    {{ __('Explore Service') }}
                                                </span>
                                                {{ get_svg('white-red') }}
                                            </div>
                                        </a>
                                        <button type="button" aria-label="play-video"
                                            class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center">
                                            <span
                                                class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-white relative">
                                                <span>
                                                    {{ get_svg('play') }}
                                                </span>
                                                <div class="absolute w-full h-full rounded-full h5-play-btn-line1">
                                                </div>
                                                <div class="absolute w-[130%] h-[130%] rounded-full h5-play-btn-line2">
                                                </div>
                                                <div class="absolute w-[160%] h-[160%] rounded-full h5-play-btn-line3">
                                                </div>
                                            </span>
                                            <span
                                                class="text-white font-semibold border-b border-white">{{ __('How IT Works') }}</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="swiper-slide pb-4">
                                    <div
                                        class="flex gap-2.5 relative z-10 px-3 sm:px-6 py-1.5 sm:py-3 rounded-[40px] border border-white/10 bg-white/5 items-center w-fit">
                                        {{ get_svg('star') }}
                                        <span class="font-semibold text-18 sm:text-20 text-white">
                                             {{ getTranslatedValue($hero_image,'sub_title') }}
                                        </span>
                                    </div>
                                    <h1 class="font-semibold text-34 sm:text-48 xl:text-75 text-white mt-4 sm:mt-8">
                                        {{ getTranslatedValue($hero_image,'title_two') }}
                                    </h1>
                                    <div class="flex flex-col sm:flex-row gap-8 pt-5 sm:pt-11">
                                        <a href="{{ getTranslatedValue($hero_image,'button_url') }}">
                                            <div
                                                class="home-two-btn-bg group bg-buisness-red border-buisness-red py-3 sm:py-[15px]">
                                                <span
                                                    class="text-base group-hover:text-buisness-red text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                                    {{ __('Explore Service') }}
                                                </span>
                                                {{ get_svg('white-red') }}
                                            </div>
                                        </a>
                                        <button type="button" aria-label="play-video"
                                            class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center">
                                            <span
                                                class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-white relative">
                                                <span>
                                                    {{ get_svg('play') }}
                                                </span>
                                                <div class="absolute w-full h-full rounded-full h5-play-btn-line1">
                                                </div>
                                                <div class="absolute w-[130%] h-[130%] rounded-full h5-play-btn-line2">
                                                </div>
                                                <div class="absolute w-[160%] h-[160%] rounded-full h5-play-btn-line3">
                                                </div>
                                            </span>
                                            <span
                                                class="text-white font-semibold border-b border-white">{{ __('How IT Works') }}</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="swiper-slide pb-4">
                                    <div
                                        class="flex gap-2.5 relative z-10 px-3 sm:px-6 py-1.5 sm:py-3 rounded-[40px] border border-white/10 bg-white/5 items-center w-fit">
                                        {{ get_svg('star') }}
                                        <span class="font-semibold text-18 sm:text-20 text-white">
                                             {{ getTranslatedValue($hero_image,'sub_title') }}
                                        </span>
                                    </div>
                                    <h1 class="font-semibold text-34 sm:text-48 xl:text-75 text-white mt-4 sm:mt-8">
                                        {{ getTranslatedValue($hero_image,'title_three') }}
                                    </h1>
                                    <div class="flex flex-col sm:flex-row gap-8 pt-5 sm:pt-11">
                                        <a href="{{ getTranslatedValue($hero_image,'button_url') }}">
                                            <div
                                                class="home-two-btn-bg group bg-buisness-red border-buisness-red py-3 sm:py-[15px]">
                                                <span
                                                    class="text-base group-hover:text-buisness-red text-white transition-all duration-300 font-semibold font-inter relative z-10">
                                                    {{ __('Explore Service') }}
                                                </span>
                                                {{ get_svg('white-red') }}
                                            </div>
                                        </a>
                                        <button type="button" aria-label="play-video"
                                            class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center">
                                            <span
                                                class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-white relative">
                                                <span>
                                                    {{ get_svg('play') }}
                                                </span>
                                                <div class="absolute w-full h-full rounded-full h5-play-btn-line1">
                                                </div>
                                                <div class="absolute w-[130%] h-[130%] rounded-full h5-play-btn-line2">
                                                </div>
                                                <div class="absolute w-[160%] h-[160%] rounded-full h5-play-btn-line3">
                                                </div>
                                            </span>
                                            <span
                                                class="text-white font-semibold border-b border-white">{{ __('How IT Works') }}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-span-7 xl:col-span-5 w-full h-full flex xl:flex-col items-end justify-end xl:justify-center gap-2">
                        <button
                            class="group h5-hero-prev border border-white/15 w-[30px] h-[30px] rounded-full flex items-center justify-center bg-white/10 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-buisness-red before:bg-buisness-red relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                            {{ get_svg('arrow-left-white') }}
                        </button>
                        <button
                            class="group rotate-180 h5-hero-next border border-white/15 w-[30px] h-[30px] rounded-full flex items-center justify-center bg-white/10 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-buisness-red before:bg-buisness-red relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                            {{ get_svg('arrow-right-white') }}
                        </button>
                    </div>
                </div>

                <!-- cards  -->
                <div class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-[30px] pb-16 sm:pb-[130px]">
                    @foreach ($services_items as $service_item)
                    <!-- single card start  -->
                    <div data-aos="fade-up"
                        class="px-6 py-5 sm:px-[50px] col-span-4 sm:py-10 bg-white rounded-[20px] group shadow-card">
                        <div
                            class="sm:p-5 p-3.5 rounded-full bg-buisness-red/5 transition-all duration-300 ease-out  w-fit">
                            <img src="{{ asset($service_item?->theme_5_thumbnail_image) }}" alt="" class="sm:w-[45px] sm:h-[45px] w-[30px] h-[30px] object-contain">
                        </div>
                        <a href="{{ route('service', $service_item?->slug) }}">
                            <h1 class="text-22 text-main-black font-semibold pt-6">
                                {{ $service_item?->title }}
                            </h1>
                        </a>
                        <p class="text-paragraph pt-3.5">
                            {{ Str::limit($service_item?->short_description, 70) }}
                        </p>
                    </div>
                    <!-- single card end  -->
                    @endforeach
                </div>
            </div>
        </section>
