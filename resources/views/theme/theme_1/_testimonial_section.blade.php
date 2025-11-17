<section id="testimonial">
    <div
        class="testimoial-section-wrapper testimonial_bg w-full bg-cover bg-no-repeat md:py-[130px] md:pb-[180px] pt-16 pb-[120px]">
        <div class="theme-container mx-auto relative z-10">
            <div class="flex flex-col items-center mb-10  md:mb-[70px]">
                <span
                    class="text-white font-medium px-5 py-3 leading-none rounded-full inline-block mb-5 bg-purple">{{ getTranslatedValue($testimonial_content, 'sub_title') }}</span>
                <h2 class="md:text-48 text-34 font-semibold text-white text-center">
                    {{ getTranslatedValue($testimonial_content, 'title') }}
                </h2>
            </div>
            <div class="w-full lg:grid grid-cols-12 items-stretch gap-[30px]">
                <div class="col-span-4">
                    <div class="w-full h-[401px] relative">
                        <img src="{{ asset(getImage($testimonial_content, 'testimonial_image')) }}" alt=""
                            class="w-full h-full overflow-hidden rounded-[20px] object-top object-cover" />
                        <div class="absolute left-0 -bottom-5 sm:px-[56px] pl-1 w-full">
                            <div
                                class="w-full flex justify-between p-[7px] pl-5 bg-white shadow-style-one rounded-full items-center">
                                <span
                                    class="text-sm font-semibold text-main-black text-nowrap">{{ getTranslatedValue($testimonial_content, 'trusted_clients') }}</span>
                                <img src="{{ asset(getImage($testimonial_content, 'client_image')) }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-8 h-full relative mt-20 lg:mt-0">
                    <div class="w-full relative h-full">
                        <div class="w-full h-full testimonial-swiper">
                            <div class="swiper-wrapper w-full h-full">
                                @foreach ($testimonials as $testimonial)
                                    <div class="swiper-slide w-full h-full">
                                        <div class="w-full bg-purple h-full rounded-[20px] py-10 relative">
                                            <div class="shape absolute left-0 top-10">
                                                <span>
                                                    {{ get_svg(('testimonial-shape')) }}
                                                </span>
                                            </div>
                                            <div class="relative z-10">
                                                <div class="flex justify-between md:pl-[70px] pl-5 mb-10">
                                                    <div>
                                                        {{ get_svg('testimonial_quatation') }}
                                                    </div>
                                                    <div class="w-[422px] h-[60px] relative md:flex hidden justify-center">
                                                        <div class="w-full h-full absolute left-0 top-0 flex">
                                                            <div
                                                                class="w-1/2 h-full bg-gradient-to-l from-white opacity-30">
                                                            </div>
                                                            <div
                                                                class="w-1/2 h-full bg-gradient-to-r from-white opacity-30">
                                                            </div>
                                                        </div>
                                                        <div class="flex space-x-5 items-center">
                                                            <span
                                                                class="text-20 font-semibold text-white">{{ getTranslatedValue($testimonial_content, 'quality_service') }}</span>
                                                            <div class="flex space-x-[11px] items-center">
                                                                <span>
                                                                    {{ get_svg('testimonial_svg') }}
                                                                </span>
                                                                <span>
                                                                    {{ get_svg('testimonial_svg') }}
                                                                </span>
                                                                <span>
                                                                    {{ get_svg('testimonial_svg') }}
                                                                </span>
                                                                <span>
                                                                    {{ get_svg('testimonial_svg') }}
                                                                </span>
                                                                <span>
                                                                    {{ get_svg('testimonial_svg') }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="md:px-[70px] px-5">
                                                    <p class="text-white text-24 font-semibold mb-10 line-clamp-3">
                                                        {{ $testimonial?->comment }}
                                                    </p>
                                                    <div class="flex space-x-5 items-center">
                                                        <div class="w-[56px] h-[56px] rounded-full overflow-hidden">
                                                            <img src="{{ asset($testimonial->image) }}" alt=""
                                                                class="w-full h-full object-cover" />
                                                        </div>
                                                        <div>
                                                            <p class="text-white text-18 font-semibold">
                                                                {{ $testimonial->name }}
                                                            </p>
                                                            <p class="text-white text-sm font-medium">
                                                                {{ $testimonial->designation }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="w-full absolute -bottom-[60px] z-10">
                                <div class="flex justify-center w-full">
                                    <div class="flex space-x-5">
                                        <div>
                                            <button type="button"
                                                class="w-[30px] h-[30px] rounded-full flex justify-center items-center bg-purple focus:bg-blue-sass swiper-button-prev">
                                                <span>
                                                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.75 9L1 5.25M1 5.25L4.75 1.5M1 5.25L11 5.25"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div>
                                            <button type="button"
                                                class="w-[30px] h-[30px] rounded-full flex justify-center items-center bg-purple focus:bg-blue-sass swiper-button-next">
                                                <span>
                                                    <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.25 9L11 5.25M11 5.25L7.25 1.5M11 5.25L1 5.25"
                                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>