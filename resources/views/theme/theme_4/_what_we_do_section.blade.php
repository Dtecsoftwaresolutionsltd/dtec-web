<section id="what-we-do">
            <div class="w-full what-we-do-wrapper pb-16 md:pb-[130px] relative overflow-x-hidden">
                <div class="theme-container mx-auto">
                    <div class="w-full">
                        <div class="title-area w-full flex justify-center">
                            <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                                <div class="section-title-top-tag-two mb-5">
                                    <span>{{ getTranslatedValue($what_we_do, 'section_title') }}</span>
                                </div>
                                <div class="">
                                    <h2 class="text-white font-semibold text-24 sm:text-48 text-center">
                                        {{ getTranslatedValue($what_we_do, 'title') }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px]">
                            <div data-aos="fade-left" class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-7">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_one_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_one') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_one') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
                                </div>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="100"
                                class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-[28px]">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_two_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_two') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_two') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
                                </div>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="200"
                                class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-[28px]">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_three_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_three') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_three') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
                                </div>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="300"
                                class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-[28px]">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_four_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_four') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_four') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
                                </div>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="400"
                                class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-[28px]">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_five_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_five') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_five') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
                                </div>
                            </div>
                            <div data-aos="fade-left" data-aos-delay="500"
                                class="service-item p-5 md:p-[50px] relative group">
                                <div
                                    class="service-item-ico w-[80px] h-[80px] rounded-[10px] flex justify-center items-center mb-[28px]">
                                    <img src="{{ asset(getImage($what_we_do, 'shape_six_image')) }}" alt=""
                                        class="relative z-10" />
                                </div>
                                <h1 class="mb-5 text-white font-medium">
                                    {{ getTranslatedValue($what_we_do, 'title_six') }}
                                </h1>
                                <p class="text-white opacity-55">
                                    {{ getTranslatedValue($what_we_do, 'description_six') }}
                                </p>
                                <div
                                    class="circle-shape absolute left-0 top-0 flex justify-center items-center w-full h-full group-hover:opacity-100 opacity-0 transition duration-300 ease-in-out">
                                    @include('theme.theme_4.svg.background_shape')
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

            </div>
        </section>
