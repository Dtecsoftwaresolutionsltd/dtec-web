<section class="testimonial-section py-[70px] sm:py-[130px]">
    <div class="theme-container mx-auto w-full">
        <h1 class="px-5 py-2 bg-white/5 border border-white/10 text-white font-medium rounded-[30px] w-fit mx-auto">
            {{ getTranslatedValue($testimonial_content, 'section_title') }}
        </h1>
        <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-white text-center mx-auto mt-5">
            {{ getTranslatedValue($testimonial_content, 'title') }}
        </h2>
        <div class="w-full">
            <div class="swiper h1-story-slider-v2  mt-10 sm:mt-[70px]">
                <div class="swiper-wrapper pb-[50px]">

                    @foreach ($testimonials as $index => $testimonial)
                    <div class="swiper-slide">
                        <div class="flex flex-col items-center relative pt-[52px] pb-10 px-11 bg-white rounded-2xl">
                            <div class="w-[240px] aspect-square rounded-full testimonial-shape-bg absolute">
                            </div>
                            @include('theme.theme_7.svg.testimonial_red')
                            <h1 class="font-medium text-18 text-center text-main-black mt-5 mb-8">
                                {{ Str::limit($testimonial?->comment, 200) }}
                            </h1>
                            <img src="{{ asset($testimonial->image) }}" alt=""
                                class="w-[56px] h-[56px] rounded-full object-cover" />
                            <h1 class="font-semibold text-18 text-main-black text-center mt-3">
                                {{ $testimonial?->name }}
                            </h1>
                            <p class="text-paragraph text-center font-medium text-sm">
                                {{ $testimonial?->designation }}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="relative w-fit mx-auto flex items-center">
            <div class="flex justify-between absolute w-full">
                <button
                    class="group h1-story-prev-v2 w-[30px] h-[30px] rounded-full flex items-center justify-center hover:bg-buisness-red before:hidden bg-white/20 border-white/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    <span class="text-white ">
                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.5 8.25L0.75 4.5M0.75 4.5L4.5 0.75M0.75 4.5L10.75 4.5" stroke="white"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>


                    </span>
                </button>
                <button
                    class="group  h1-story-next-v2 w-[30px] h-[30px] rounded-full flex items-center justify-center hover:bg-buisness-red before:hidden bg-white/20 border-white/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    <span class="text-white ">
                        <svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 8.25L10.75 4.5M10.75 4.5L7 0.75M10.75 4.5L0.75 4.5" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </span>
                </button>
            </div>
            <div class="h1-story-pagination-v2 px-10"></div>
        </div>
    </div>
</section>
