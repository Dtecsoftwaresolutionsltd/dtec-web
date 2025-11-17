 <section class="bg-white w-full py-16 md:py-[130px]">
            <div class="theme-container w-full mx-auto">
                <div class="grid grid-cols-6 lg:grid-cols-12 gap-y-10">
                    <div class="col-span-6">
                        <h1
                            class="border text-purple border-purple/10 py-0.5 px-5 rounded-[30px] w-fit bg-main-gray font-medium">
                           {{ getTranslatedValue($testimonial_content_3,'sub_title') }}
                        </h1>
                        <h2 class="text-24 sm:text-48 font-semibold text-black pt-5 max-w-[457px]">
                           {{ getTranslatedValue($testimonial_content_3,'title') }}
                        </h2>
                        <p class="text-18 text-paragraph pt-5">
                            {{ getTranslatedValue($testimonial_content_3,'description') }}
                        </p>
                        <div class="flex flex-col md:flex-row gap-5 md:gap-[30px] mt-5 md:mt-9">
                            <div class="bg-main-gray border border-purple/10 rounded-2xl pt-2.5 px-[30px] pb-5 h-fit">
                                <div>
                                    <p class="text-main-black font-semibold">{{getTranslatedValue($testimonial_content_3,'avg_rating') }}</p>
                                    <div class="flex gap-2.5 pt-2.5">
                                        @for ($i = 0; $i < 5; $i++)
                                            {{ get_svg('ratting-purple') }}
                                        @endfor
                                    </div>
                                </div>
                            </div>
                            <div class="bg-main-gray border border-purple/10 rounded-2xl pt-2.5 px-[30px] pb-5 h-fit">
                                <div>
                                    <p class="text-main-black font-semibold">
                                        {{ getTranslatedValue($testimonial_content_3,'happy_clients') }}
                                    </p>
                                    <div class="flex relative mt-4 cursor-pointer">

                                        <img src="{{ asset(getImage($testimonial_content_3,'client_image')) }}" alt=""
                                            />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-6 flex flex-col items-start justify-start relative max-w-[502px]">
                        <div class="swiper overflow-hidden h3-testimonial-slider w-full h-full">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide flex flex-col justify-between">
                                    <div>
                                        <div class="flex gap-6 items-center">
                                            <div
                                                class="flex min-w-12 w-12 sm:w-[60px] min-h-12 h-12 sm:h-[60px] rounded-full overflow-hidden">
                                                <img class="w-full object-cover"
                                                    src="{{ $testimonial?->image }}" alt="" />
                                            </div>
                                            <h1 class="text-20 font-semibold text-main-black">
                                                {{ $testimonial->name }}
                                                <span class="text-sm font-medium text-paragraph">
                                                    {{ $testimonial?->designation }}</span>
                                            </h1>
                                        </div>
                                        <h1 class="text-20 sm:text-24 text-paragraph pt-[30px]">
                                           {{ $testimonial?->comment }}
                                        </h1>
                                    </div>
                                    <div class="flex justify-between items-center mt-5 md:mt-10">
                                        {{ get_svg('quote-icon') }}
                                        <div class="flex gap-2 sm:gap-4 items-center">
                                            <h1 class="text-18 font-semibold text-main-black">
                                                {{ __('Quality Service') }}
                                            </h1>
                                            <div class="flex gap-1 sm:gap-2.5">
                                                @for ($i=0;$i<5;$i++)
                                                    {{ get_svg('ratting-icon') }}
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="absolute w-fit mx-auto flex items-center -bottom-[70px]">
                            <div class="flex justify-between absolute w-full">
                                <button
                                    class="group h3-testimonial-prev border border-purple/15 w-[30px] h-[30px] rounded-full flex items-center justify-center bg-purple/10 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-purple before:bg-purple relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                                    {{ get_svg('left-arrow') }}
                                </button>
                                <button
                                    class="group rotate-180 h3-testimonial-next border border-purple/15 w-[30px] h-[30px] rounded-full flex items-center justify-center bg-purple/10 overflow-hidden before:inline-block before:w-11 before:h-11 before:border-[1.5px] before:border-purple before:bg-purple relative before:absolute before:z-0 before:-right-12 hover:before:right-0 before:transition-all before:duration-300">
                                    {{ get_svg('right-arrow') }}
                                </button>
                            </div>
                            <div class="h3-testimonial-pagination px-10"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
