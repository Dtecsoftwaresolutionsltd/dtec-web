  <section class="bg-main-gray w-full py-16 md:py-[130px]">
            <div class="theme-container w-full mx-auto">
                <div class="max-w-[661px] w-full flex flex-col items-center mx-auto mb-10 md:mb-[70px]">
                    <h1 class="border text-purple border-purple/10 py-0.5 px-5 rounded-[30px] w-fit bg-main-gray mb-1">
                        {{ __('Case Studies') }}
                    </h1>
                    <h2 class="text-24 sm:text-48 font-semibold text-black pt-5 text-center">
                        {{ __(' We Have 253+ Projects Discover Our Case Studies') }}</h2>
                </div>
                <div class="grid grid-cols-6 lg:grid-cols-12 gap-[30px] ">
                    <!-- card start  -->
                    @foreach ($caseStudies as $caseStudie)
                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 bg-white p-2.5 col-span-6 rounded-3xl h3_case_card_shadow transition-all duration-300 cursor-pointer gap-4">
                        <div class="col-span-1 h-full flex justify-center flex-col px-4 xl:px-10">
                            <p class="text-paragraph">{{ $caseStudie?->category?->name }}</p>
                            <h3  title="{{ $caseStudie->title }}" class="case_card_title text-black text-24 font-semibold pt-0.5 ">
                                <a href="{{ route('portfolio.show',$caseStudie->slug) }}"> {{ $caseStudie->title }} </a>
                            </h3>
                            <p class="text-paragraph py-5 xl:py-[30px]">
                              {{ $caseStudie->short_description }}
                            </p>

                            <a href="{{ route('portfolio.show',$caseStudie->slug) }}">
                                <div
                                    class="overflow-hidden  text-nowrap flex gap-2 items-center justify-center border border-main-black/10 rounded-[41px] px-[30px] py-1.5 w-fit relative before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-blue-seo before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                                    <span
                                        class="font-semibold text-main-black relative z-10 group-hover:text-white">{{ __('Read More') }}</span>
                                   {{ get_svg('black_arrow') }}
                                </div>
                            </a>
                        </div>
                        @if($caseStudie->theme_3_thumb_image != '')
                        <div data-aos="flip-right" data-aos-duration="1000"
                            class="col-span-1 rounded-2xl overflow-hidden h-[320px] sm:h-full">
                            <img src="{{ asset($caseStudie->theme_3_thumb_image) }}" alt="" class="w-full h-full object-cover" />
                        </div>
                        @else
                        <div data-aos="flip-right" data-aos-duration="1000"
                            class="col-span-1 rounded-2xl overflow-hidden h-[320px] sm:h-full">
                            <img src="{{ asset($caseStudie->thumb_image) }}" alt="" class="w-full h-full object-cover" />
                        </div>
                        @endif
                    </div>
                    @endforeach
                    <!-- card end  -->
                </div>
            </div>
        </section>
