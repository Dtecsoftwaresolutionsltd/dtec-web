<section class="w-full overflow-hidden pb-16 md:pb-[130px] h4-testimonial-bg">
    <div class="flex w-full justify-center items-center flex-col mb-10 md:mb-[70px]">
        <h1 class="py-0.5 px-5 bg-white/5 border-white/10 border rounded-[30px] font-medium text-white">
            {{ getTranslatedValue($theme_four_testimonials, 'section_title') }}
        </h1>
        <h2 class="text-24 px-5 sm:px-0 sm:text-48 font-semibold text-white mt-5 flex">
            <p class="w-40 text-end" data-scroll-qs="scroll" data-count-qs={{ getTranslatedValue($theme_four_testimonials, 'count') }} data-type-qs="+" data-speed-qs="2000">

            </p>
            {{ getTranslatedValue($theme_four_testimonials, 'title') }}
        </h2>
    </div>
    <!-- first slider start  -->
    <div class="swiper h4-testimonials_first_slider mb-[30px]">
        <div class="swiper-wrapper">
            @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div
                        class="px-10 py-9 bg-white/5 rounded-xl border border-white/10 h4_testimonials_slide transition-all duration-300">
                        <div class="flex items-center gap-5">
                            <div class="w-[46px] h-[46px] rounded-full overflow-hidden">
                                <img src="{{ asset($testimonial->image) }}" alt="" class="w-full object-cover" />
                            </div>
                            <p>
                                <span class="text-white text-18 font-semibold font-inter">
                                    {{ $testimonial->name }},
                                </span>
                                <span class="text-white/50 font-normal text-sm">{{ $testimonial->designation }}</span>
                            </p>
                        </div>
                        <p class="text-white/50 pt-6 {{ env('DEMO_DATA') == true ? 'three-line-limit' : '' }}">
                            {{ $testimonial?->comment }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- first slider end  -->
    <!-- second slider start  -->
    <div class="swiper h4-testimonials_second_slider">
        <div class="swiper-wrapper">

            @foreach($testimonials as $testimonial)
                <div class="swiper-slide">
                    <div
                        class="px-10 py-9 bg-white/5 rounded-xl border border-white/10 h4_testimonials_slide transition-all duration-300">
                        <div class="flex items-center gap-5">
                            <div class="w-[46px] h-[46px] rounded-full overflow-hidden">
                                <img src="{{ asset($testimonial->image) }}" alt="" class="w-full object-cover" />
                            </div>
                            <p>
                                <span class="text-white text-18 font-semibold font-inter">
                                    {{ $testimonial->name }},
                                </span>
                                <span class="text-white/50 font-normal text-sm">{{ $testimonial->designation }}</span>
                            </p>
                        </div>
                        <p class="text-white/50 pt-6 {{ env('DEMO_DATA') == true ? 'three-line-limit' : '' }}">
                            {{ $testimonial?->comment }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- first slider end  -->
</section>