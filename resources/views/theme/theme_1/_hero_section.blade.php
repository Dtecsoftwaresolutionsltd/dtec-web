                    <section id="home-one-hero">
                        <div class="hero-one-section-wrapper w-full xl:h-[905px] overflow-hidden relative">
                            <div class="win-grid w-full h-full absolute left-0 top-0" id="win-grid"></div>
                            <div class="theme-container mx-auto h-full relative z-10 pointer-events-none">
                                <div
                                    class="w-full grid xl:grid-cols-2 grid-cols-1 2xl:gap-[130px] gap-14 items-center xl:pt-[223px] pt-[130px] h-full">
                                    <div class="article-area">
                                        <div
                                            class="inline-flex md:px-6 px-3 py-2.5 md:py-[14px] bg-white space-x-2.5 items-center rounded-full shadow-style-one mb-5">
                                            <span>
                                               {{ get_svg('star') }}
                                            </span>
                                            <span
                                                class="md:text-20 text-sm text-purple font-semibold pointer-events-auto">
                                                {{ getTranslatedValue($hero_content, 'subtitle') }}
                                            </span>
                                        </div>
                                        <h1
                                            class="text-4xl md:text-65 text-main-black font-semibold mb-[35px] pointer-events-auto custom-heading md:text-left">
                                           {!! strip_tags(clean(getTranslatedValue($hero_content, 'heading')),'<span>') !!}
                                        </h1>
                                        <div
                                            class="px-6 py-[14px] bg-white border-l-2 border-blue-sass mb-[35px] pointer-events-auto xl:w-full md:w-[500px]">
                                            <p class="text-ptwo text-paragraph">
                                               {{ getTranslatedValue($hero_content, 'description') }}
                                            </p>
                                        </div>
                                        <div class="flex space-x-[30px] items-center pointer-events-auto">
                                            <a href="{{ getTranslatedValue($hero_content,'left_button_url') }}">
                                                <div class="home-two-btn-bg py-3 group bg-purple border-blue-seo">
                                                    <span
                                                        class="text-base text-white group-hover:text-purple transition-all duration-300 font-semibold font-inter relative z-10">
                                                        {{ getTranslatedValue($hero_content, 'left_button_text') }}
                                                    </span>
                                                   <span>
                                                     {{ get_svg('home_cta_white') }}
                                                   </span>
                                                </div>
                                            </a>
                                            <a href="{{ getTranslatedValue($hero_content,'right_button_url') }}">
                                                <div class="flex items-center gap-2 group">
                                                    <p
                                                        class="mb-[1px] font-medium text-main-black leading-5 font-inter border-b border-main-black before:block before:pb-[1px] before:border-purple before:font-medium before:text-purple before:leading-5 before:font-inter before:border-b before:content-['Our_Services'] before:absolute before:-bottom-[1px] before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-[21px] relative">
                                                        {{ getTranslatedValue($hero_content,'right_button_text') }}
                                                    </p>
                                                   <span>
                                                    {{ get_svg('arrow2') }}
                                                   </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="image-area relative h-full">
                                        <div
                                            class="xl:absolute relative 2xl:w-[752px] lg:w-[600px] w-full left-0 top-0 h-full">
                                            <!-- main image -->
                                            <div class="xl:absolute relative left-0 bottom-0 w-full z-10">
                                                <div class="w-full flex justify-center">
                                                    <img src="{{ asset(getImage($hero_content, 'hero_image')) }}"
                                                        alt="" />
                                                </div>
                                            </div>
                                            <!-- tags -->
                                            <div class="absolute left-0 bottom-0 w-full h-full md:block hidden">
                                                <div id="hero-mouse-move-anim"
                                                    class="w-full relative h-full z-10 pointer-events-auto">
                                                    <div  class="layer">
                                                        <span
                                                            class="inline-block xl:px-[30px] px-6 xl:py-2.5 py-1.5 bg-[#BA4AFF] 2xl:text-pone xl:text-sm lg:text-pone text-white rounded-br-none rounded-full">{{ getTranslatedValue($hero_content,'card_text_one') }}</span>
                                                    </div>
                                                    <div  class="layer">
                                                        <span
                                                            class="inline-block xl:px-[30px] px-6 xl:py-2.5 py-1.5 bg-purple 2xl:text-pone xl:text-sm lg:text-pone text-white rounded-full rounded-bl-none">{{ getTranslatedValue($hero_content,'card_text_two') }}</span>
                                                    </div>
                                                    <div  class="layer h-fit">
                                                        <span
                                                            class="inline-block xl:px-[30px] px-6 xl:py-2.5 py-1.5 bg-blue-sass 2xl:text-pone xl:text-sm lg:text-pone text-white rounded-br-none rounded-full h-fit">{{ getTranslatedValue($hero_content,'card_text_three') }}</span>
                                                    </div>
                                                    <div  class="layer h-fit">
                                                        <span
                                                            class="inline-block xl:px-[30px] px-6 xl:py-2.5 py-1.5 bg-[#FF8C05] 2xl:text-pone xl:text-sm lg:text-pone text-white rounded-full rounded-bl-none h-fit">{{ getTranslatedValue($hero_content,'card_text_four') }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- white circle -->
                                            <div class="absolute left-0 bottom-[100px] w-full md:block hidden">
                                                <div class="flex justify-center">
                                                    <div class="w-[533px] h-[585px] bg-white rounded-[266px]"></div>
                                                </div>
                                            </div>
                                            <!-- shadow -->
                                            <div class="absolute left-0 bottom-0 w-full overflow-hidden">
                                                <div class="flex justify-center">
                                                   {{ get_svg("heroshadow") }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
