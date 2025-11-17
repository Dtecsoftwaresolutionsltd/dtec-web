<section class="relative w-full">
    <!-- bg circle  -->

    <div class="bg-circle_color w-[408px] h-[408px] rounded-full absolute -left-[204px] -top-[150px]"></div>

    <div class="w-full pb-16 md:pb-[130px] relative z-10">
        <div class="theme-container mx-auto">
            <div
                class="flex justify-center items-center py-10 md:py-20 relative sm:border rounded-3xl border-white/10 sm:bg-white/5 overflow-hidden">
                <div class="max-w-[850px] w-full flex justify-center items-center flex-col relative z-10">
                    <h1 class="py-0.5 px-5 bg-white/5 border-white/10 border rounded-[30px] font-medium text-white">
                        {{ getTranslatedValue($theme_four_faqs, 'title') }}
                    </h1>
                    <h2 class="text-24 sm:text-48 font-semibold text-white mt-5">
                        {{ getTranslatedValue($theme_four_faqs, 'description') }}
                    </h2>
                    <div class="flex flex-col gap-2.5 w-full mt-10 sm:mt-[50px] sm:px-4">
                        <!-- faq single start  -->
                        @foreach($faqs as $key => $faq)
                            <div data-aos="fade-up"
                                class="py-2.5 md:py-5 px-2 md:px-9 w-full bg-white/5 border border-white/10 rounded-[10px] h4-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit single_faq_bg"
                                name="faq-{{ $key + 1 }}">
                                <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                    <h1 class="font-semibold sm:text-18 text-white flex-1">
                                        {{ $faq->question }}
                                    </h1>
                                    @include('theme.svg.theme_4_faq_down_arrow')
                                </div>
                                <div class="mt-3.5 text-white pointer-events-none h-fit">
                                    {!! clean($faq?->answer) !!}
                                </div>
                            </div>
                        @endforeach
                        <!-- faq single end  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-1 absolute left-40 top-96 z-10">
        @include('theme.theme_4.svg.shape_one')
    </div>
    <div class="shape-3 absolute left-96 top-[550px] z-10">
        @include('theme.theme_4.svg.shape_two')
    </div>
    <div class="shape-2 absolute right-96 top-96 z-10">
        @include('theme.theme_4.svg.shape_three')
    </div>

    <div class="shape-4 absolute right-96 top-[550px] z-10">
        @include('theme.theme_4.svg.shape_four')
    </div>
    <div class="bg-circle_color w-[408px] h-[408px] rounded-full absolute -right-[204px] bottom-0"></div>
</section>