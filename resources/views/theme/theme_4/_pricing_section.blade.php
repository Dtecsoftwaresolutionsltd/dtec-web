 <section id="h4-pricing" class="relative">
            <div class="w-full h4-pricing-wrapper py-16 md:py-[130px] pricing_section_bg">
                <div class="theme-container mx-auto">
                    <div class="w-full">
                        <div class="title-area w-full flex justify-center">
                            <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                                <div class="section-title-top-tag-two mb-5">
                                    <span>{{ __('Pricing Package') }}</span>
                                </div>
                                <div class="">
                                    <h2 class="text-white font-semibold text-24 sm:text-48 text-center max-w-[819px]">
                                        {{ getTranslatedValue($pricingContent, 'heading') }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-[30px]">
                            <!-- single card  start -->

                            @if($subscription_plans)
                            @foreach($subscription_plans as $key => $package)
                            <div data-aos="{{ $key == 1 ? 'zoom-out' : '' }}" data-aos-delay="{{ $key == 1 ? '150' : '' }}"
                                class="col-span-4 border border-white/10 bg-white/5 rounded-xl p-5 md:p-[50px] price_card_bg transition-all duration-300 relative">
                                @if($package?->plan_name == 'Standard Plan')
                                <div
                                    class="flex gap-2 py-2 px-4 bg-purple rounded-3xl w-fit absolute top-2.5 right-2.5">
                                    @include('theme.svg.pricing_rating')
                                </div>
                                @endif
                                <h1 class="text-18 font-semibold text-white pb-4">
                                    {{ $package?->plan_name }}
                                </h1>
                                <h2 class="text-48 text-white">
                                    ${{ $package?->plan_price }}<span class="text-base leading-[30px]">/
                                        {{ $package?->expiration_date }}</span>
                                </h2>
                                <p class="text-white pb-8 pt-4">{{ $package?->short_description }}</p>
                                <a href="{{ route('contact-us') }}" class="">
                                    <div
                                        class="group bg-white w-full h-11 md:h-[56px] flex justify-center items-center gap-2.5 rounded-[40px] relative price_button_bg before:inline-block before:absolute before:w-full before:h-full before:scale-x-0 hover:before:scale-x-100 overflow-hidden before:transition-transform before:ease-out before:duration-300 before:origin-right hover:before:origin-left before:z-0">
                                        <span
                                            class="font-inter font-semibold text-purple relative z-10 group-hover:text-white transition-all duration-300">
                                            {{__('Choose This Package') }}
                                        </span>
                                        @include('theme.svg.pricing_icon')
                                    </div>
                                </a>
                                <ul class="flex flex-col gap-4 mt-9">
                                    @foreach(explode("\n", $package?->features) as $key => $feature)
                                    @if(!empty(trim($feature)))
                                    <li class="flex gap-3 items-center">
                                        @include('theme.theme_4.svg.icon_feature')
                                        <span class="sm:text-18 font-medium text-white">{{ $feature }}</span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                            @else
                            <div class="col-12">
                                <p class="text-center">{{ __('No pricing packages available') }}.</p>
                            </div>
                            @endif
                            <!-- single card end  -->

                            <!-- single card end  -->
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
