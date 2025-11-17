        <section class="relative">
            <img src="{{ asset(getImage($cta_content_home_5,'background_image')) }}" alt=""
                class="absolute z-0 h-full object-cover" />
            <div class="theme-container w-full mx-auto relative z-10">
                <div class="py-16 md:py-[100px] grid grid-cols-6 md:grid-cols-12 gap-y-20">
                    <div class="col-span-6">
                        <div class="max-w-[476px]">
                            <h1
                                class="border text-white border-white/10 py-0.5 px-5 rounded-[30px] w-fit bg-white/5 font-medium">
                                {{ getTranslatedValue($cta_content_home_5,'sub_title') }}</h1>
                            <h2 class="text-34 lg:text-48 font-semibold text-white pt-5">
                                {{ getTranslatedValue($cta_content_home_5,'title') }}</h2>
                            <p class="text-white pt-5 pb-5 md:pb-10 font-medium">
                                {{ getTranslatedValue($cta_content_home_5,'description') }}</p>

                            <a href="{{ getTranslatedValue($cta_content_home_5,'button_url') }}">
                                <div class="home-two-btn-white group w-fit">
                                    <span
                                        class="text-base group-hover:text-white transition-all duration-300 font-semibold font-inter py-1 relative z-10 text-main-black">{{ getTranslatedValue($cta_content_home_5,'button_text') }}</span>
                                    {{ get_svg('cta_arrow') }}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-6 flex w-full h-full justify-center items-center relative">
                        <img src="{{ asset(getImage($cta_content_home_5,'play_video_image')) }}" alt=""
                            class="absolute moving-h2-hero-main-img" />
                        <button type="button" aria-label="play-video"
                            class="video-play-btn flex space-x-8 items-center">
                            <span class="size-[56px] rounded-full flex justify-center items-center bg-white relative">
                                <span>{{ get_svg('play') }}</span>
                                <div class="absolute w-full h-full left-0 top-0 rounded-full play-btn-line1"></div>
                                <div class="absolute w-full h-full rounded-full play-btn-line2"></div>
                                <div class="absolute w-full h-full rounded-full play-btn-line3"></div>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
