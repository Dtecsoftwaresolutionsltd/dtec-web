    <section class="pb-16 md:pb-[130px]">
            <div class="theme-container w-full mx-auto">
                <div
                    class="border border-buisness-dark-black/10 grid grid-cols-3 md:grid-cols-6 lg:grid-cols-12 rounded-[15px]">
                    <!-- single card start -->
                    <div class="col-span-3 border-r border-buisness-dark-black/10 p-5 md:p-[50px] lg:p-5 xl:p-[50px]">
                        <img src="{{ asset(getImage($counter_content_5, 'counter_one_image')) }}" alt="" />
                        <h1 class="text-48 font-semibold text-main-black pt-5 md:pt-11" data-scroll-qs="scroll"
                            data-count-qs="{{ getTranslatedValue($counter_content_5, 'counter_one_number') }}"
                            data-type-qs="K+" data-speed-qs="1000">
                            {{ getTranslatedValue($counter_content_5, 'counter_one_number') }}{{ __('K+') }}
                        </h1>
                        <h2 class="text-18 font-medium text-paragraph pt-2.5">
                            {{ getTranslatedValue($counter_content_5, 'counter_one_title') }}
                        </h2>
                        <p class="text-paragraph leading-[30px] tracking-tight pt-5">
                            {{ getTranslatedValue($counter_content_5, 'counter_details_one') }}
                        </p>
                    </div>
                    <!-- single card  end -->
                    <!-- single card start -->
                    <div class="col-span-3 border-r border-buisness-dark-black/10 p-5 md:p-[50px] lg:p-5 xl:p-[50px]">
                        <img src="{{ asset(getImage($counter_content_5, 'counter_two_image')) }}" alt="" />

                        <h1 class="text-48 font-semibold text-main-black pt-5 md:pt-11" data-scroll-qs="scroll"
                            data-count-qs="{{ getTranslatedValue($counter_content_5, 'counter_two_number') }}"
                            data-type-qs="K+" data-speed-qs="1000">
                            {{ getTranslatedValue($counter_content_5, 'counter_two_number') }}{{ __('K+') }}
                        </h1>
                        <h2 class="text-18 font-medium text-paragraph pt-2.5">
                            {{ getTranslatedValue($counter_content_5, 'counter_two_title') }}
                        </h2>
                        <p class="text-paragraph leading-[30px] tracking-tight pt-5">
                            {{ getTranslatedValue($counter_content_5, 'counter_details_two') }}
                        </p>
                    </div>
                    <!-- single card  end -->
                    <!-- single card start -->
                    <div class="col-span-3 border-r border-buisness-dark-black/10 p-5 md:p-[50px] lg:p-5 xl:p-[50px]">
                        <img src="{{ asset(getImage($counter_content_5, 'counter_three_image')) }}" alt="" />

                        <h1 class="text-48 font-semibold text-main-black pt-5 md:pt-11" data-scroll-qs="scroll"
                            data-count-qs="{{ getTranslatedValue($counter_content_5, 'counter_three_number') }}"
                            data-type-qs="+" data-speed-qs="1000">
                            {{ getTranslatedValue($counter_content_5, 'counter_three_number') }}{{ __('+') }}
                        </h1>
                        <h2 class="text-18 font-medium text-paragraph pt-2.5">
                            {{ getTranslatedValue($counter_content_5, 'counter_three_title') }}
                        </h2>
                        <p class="text-paragraph leading-[30px] tracking-tight pt-5">
                            {{ getTranslatedValue($counter_content_5, 'counter_details_three') }}
                        </p>
                    </div>
                    <!-- single card  end -->
                    <!-- single card start -->
                    <div class="col-span-3 p-5 md:p-[50px] lg:p-5 xl:p-[50px]">
                        <img src="{{ asset(getImage($counter_content_5, 'counter_four_image')) }}" alt="" />

                        <h1 class="text-48 font-semibold text-main-black pt-5 md:pt-11" data-scroll-qs="scroll"
                            data-count-qs="{{ getTranslatedValue($counter_content_5, 'counter_four_number') }}"
                            data-type-qs="+" data-speed-qs="1000">
                            {{ getTranslatedValue($counter_content_5, 'counter_four_number') }}{{ __('+') }}
                        </h1>
                        <h2 class="text-18 font-medium text-paragraph pt-2.5">
                            {{ getTranslatedValue($counter_content_5, 'counter_four_title') }}
                        </h2>
                        <p class="text-paragraph leading-[30px] tracking-tight pt-5">
                            {{ getTranslatedValue($counter_content_5, 'counter_details_four') }}
                        </p>
                    </div>
                    <!-- single card  end -->
                </div>
            </div>
        </section>
