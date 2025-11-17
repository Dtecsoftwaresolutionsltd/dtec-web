   <section class="bg-main-black">
            <div class="py-16 md:py-20 border-b border-white/5">
                <div class="theme-container mx-auto w-full grid grid-cols-6 lg:grid-cols-12 gap-y-5">
                    <div class="col-span-6">
                        <h1
                            class="font-medium text-white border border-white/10 bg-white/5 px-5 rounded-[30px] py-1 w-fit">
                            {{ getTranslatedValue($cta_content_3,'sub_title') }}
                        </h1>
                        <h2 class="text-24 sm:text-48 font-semibold text-white pt-5">
                           {{ getTranslatedValue($cta_content_3,'title') }}
                        </h2>
                        <a href="{{ getTranslatedValue($cta_content_3,'button_url') }}">
                            <div
                                class="home-two-btn-bg py-2.5 sm:py-3.5 group bg-purple border-purple w-fit mt-5 md:mt-12">
                                <span
                                    class="text-base text-white group-hover:text-purple transition-all duration-300 font-semibold font-inter relative z-10">
                                    {{ getTranslatedValue($cta_content_3,'button_text') }}
                                </span>
                                {{ get_svg('home_cta_white') }}
                            </div>
                        </a>
                    </div>
                    <div class="col-span-6">
                        <div class="flex w-full lg:justify-end">
                            <div class="w-full lg:max-w-[440px]">
                                <h1 class="text-white font-semibold text-22">
                                    {{ getTranslatedValue($cta_content_3,'follow_us_text') }}
                                </h1>
                                <div class="flex gap-5 flex-wrap pt-[30px]">
                                    @if(is_array($socails_media))
                                    @foreach ($socails_media as $socail_media)
                                    <a href="{{ $socail_media['url'] }}" target="blank">
                                        <div
                                            class="overflow-hidden flex gap-2 items-center justify-center border bg-white/5 border-white/10 rounded-[41px] px-6 sm:px-[30px] py-1.5 w-fit relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-[#4A7DFF] before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                            <span class="relative z-10 text-white">{{ $socail_media['social_media_name'] }}</span>
                                        </div>
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
