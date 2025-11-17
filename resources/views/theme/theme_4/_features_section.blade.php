 <section id="features">
            <div
                class="feature-section-wrapper w-full py-16 md:py-[130px] mt-8 md:mt-[130px] relative overflow-x-hidden">
                <div class="theme-container mx-auto">
                    <div class="w-full grid grid-cols-1 xl:grid-cols-2 gap-10 xl:gap-[140px] items-center">
                        <div class="w-full">
                            <div class="section-title-top-tag-two mb-5">
                                <span>{{ getTranslatedValue($ur_cool_features, 'section_title') }}</span>
                            </div>
                            <div class="mb-[50px]">
                                <h2 class="text-white font-semibold text-24 sm:text-48">
                                    {{ getTranslatedValue($ur_cool_features, 'title_top') }} <br />
                                    {{ getTranslatedValue($ur_cool_features, 'title_bottom') }}
                                </h2>
                            </div>
                            <div class="w-full">
                                <div data-aos="fade-up" class="feature-item-h-4 mb-7">
                                    <div
                                        class="feature-item-wrapper w-full px-5 py-5 md:px-[30px] md:py-[35px] flex flex-col sm:flex-row gap-5 sm:gap-10 items-start">
                                        <div class="w-[30px]">
                                            <img src="{{ asset(getImage($ur_cool_features, 'logo_one_image')) }}" alt=""
                                                class="w-[30px] h-[30px]" />
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-white font-semibold text-22 mb-3 leading-none">
                                                {{ getTranslatedValue($ur_cool_features, 'title_one') }}
                                            </h3>
                                            <p class="text-white opacity-50">
                                                {{ getTranslatedValue($ur_cool_features, 'description_one') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div data-aos="fade-up" data-aos-delay="100" class="feature-item-h-4 mb-7">
                                    <div
                                        class="feature-item-wrapper w-full px-5 py-5 md:px-[30px] md:py-[35px] flex flex-col sm:flex-row gap-5 sm:gap-10 items-start">
                                        <div class="w-[30px]">
                                            <img src="{{ asset(getImage($ur_cool_features, 'logo_two_image')) }}" alt=""
                                                class="w-[30px] h-[30px]" />
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-white font-semibold text-22 mb-3 leading-none">
                                                {{ getTranslatedValue($ur_cool_features, 'title_two') }}
                                            </h3>
                                            <p class="text-white opacity-50">
                                                {{ getTranslatedValue($ur_cool_features, 'description_two') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div data-aos="fade-up" data-aos-delay="200" class="feature-item-h-4">
                                    <div
                                        class="feature-item-wrapper w-full px-5 py-5 md:px-[30px] md:py-[35px] flex flex-col sm:flex-row gap-5 sm:gap-10 items-start">
                                        <div class="w-[30px]">
                                            <img src="{{ asset(getImage($ur_cool_features, 'logo_three_image')) }}"
                                                alt="" class="w-[30px] h-[30px]" />
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="text-white font-semibold text-22 mb-3 leading-none">
                                                {{ getTranslatedValue($ur_cool_features, 'title_three') }}
                                            </h3>
                                            <p class="text-white opacity-50">
                                                {{ getTranslatedValue($ur_cool_features, 'description_three') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-aos="fade-left" class="w-full">
                            <div
                                class="p-5 md:px-[74px] md:py-[67px] rounded-[20px] border border-[#231b2f] bg-[#0C022C]">
                                <img src="{{ asset(getImage($ur_cool_features, 'cool_right_image')) }}" alt=""
                                    class="rounded-md w-full" />
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

            </div>
        </section>
