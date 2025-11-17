<section class="py-[70px] sm:py-[130px] bg-it-gray">
    <div class="theme-container mx-auto w-full">
        <h1 class="px-5 bg-main-gray border border-it-blue/20 text-it-blue font-medium rounded-[30px] w-fit mx-auto">
            {{ getTranslatedValue($testimonial_content, 'section_title') }}
        </h1>
        <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-main-black text-center mx-auto mt-5">
            {{ getTranslatedValue($testimonial_content, 'title') }}
        </h2>
        <div class="w-full">
            <div class="swiper h5-story-slider h7-testimonial-slider mt-10 sm:mt-[70px]">
                <div class="swiper-wrapper pb-[50px]">

                    @foreach ($testimonials as $index => $testimonial)
                        <div class="swiper-slide">
                            <div class="flex flex-col items-center relative pt-[52px] pb-10 px-11 bg-white rounded-2xl">
                                <div class="w-[240px] aspect-square rounded-full card-shape-bg absolute">
                                </div>
                                @include('theme.theme_7.svg.testmonial_svg')
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
                    class="group h5-story-prev w-[30px] h-[30px] rounded-full flex items-center justify-center bg-it-blue/10 border-it-blue/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    @include('theme.theme_7.svg.testimonial_left_direction')
                </button>
                <button
                    class="group rotate-180 h5-story-next w-[30px] h-[30px] rounded-full flex items-center justify-center bg-it-blue/10 border-it-blue/20 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-it-blue before:bg-it-blue relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                    @include('theme.theme_7.svg.testimonial_right_direction')
                </button>
            </div>
            <div class="h5-story-pagination h7-pagination px-10"></div>
        </div>
    </div>
</section>
