<section class="relative">
    <div class="w-full pb-16 md:pb-[130px] relative z-10">
        <div class="theme-container mx-auto">
            <div
                class="flex justify-center items-center px-4 md:px-0 py-10 md:py-20 relative border rounded-3xl border-blue-seo/20 bg-gray-seo overflow-hidden">
                <!-- animation circle  -->
                <div class="absolute -bottom-1 -right-1 flex justify-center items-center w-2 h-2">
                    <div class="animated_circle bg-blue-seo/10"></div>
                    <div class="animated_circle2 bg-blue-seo/10"></div>
                    <div class="animated_circle3 bg-blue-seo/10"></div>
                    <div class="animated_circle4 bg-blue-seo/10"></div>
                </div>
                <div class="max-w-[850px] w-full flex justify-center items-center flex-col relative z-10">
                    <div class="flex flex-col items-center mb-10 md:mb-[50px]">
                        <h1
                            class="py-0.5 px-5 bg-white border-blue-seo/20 border rounded-[30px] font-medium text-blue-seo">
                            {{ getTranslatedValue($faqs_sections, 'section_title') }}
                        </h1>
                        <h2 class="text-24 sm:text-48 font-semibold text-main-black mt-5">
                            {{ getTranslatedValue($faqs_sections, 'title') }}
                        </h2>
                    </div>
                    <div class="flex flex-col gap-2.5 w-full p-0 sm:p-5 sm:pt-0">
                        @foreach ($faqs as $faq)
                            <!-- faq single start  -->
                            <div class="py-2.5 md:py-5 px-2 md:px-9 w-full bg-white rounded-[10px] h2-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit"
                                name="faq-{{ $loop->iteration }}">
                                <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                    <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                        {{ $faq->question }}
                                    </h1>
                                    @include('theme.svg.faq_down_arrow')
                                </div>

                                <div class="mt-3.5 text-paragraph pointer-events-none h-fit">
                                    <p>{{ $faq->answer }}</p>
                                </div>
                            </div>
                            <!-- faq single end  -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-between absolute top-32">
        <div id="h2-faq-anim-left"></div>
        <div class="transform rotate-180" id="h2-faq-anim-right"></div>
    </div>
</section>