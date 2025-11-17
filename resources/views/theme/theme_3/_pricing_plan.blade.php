 <section class="bg-main-black pb-16 md:pb-[130px]">
            <div class="theme-container w-full mx-auto">
                <div class="flex flex-col items-center w-full mb-10 sm:mb-[70px]">
                    <h1 class="font-medium text-white border border-white/10 bg-white/5 px-5 rounded-[30px] py-1 w-fit">
                        {{ getTranslatedValue($pricing_content,'sub_title') }}
                    </h1>
                    <h2 class="text-white font-semibold text-24 sm:text-48 pt-5 max-w-[819px] text-center">
                        {{ getTranslatedValue($pricing_content,'title') }}
                    </h2>
                </div>
                <div class="grid gap-5 lg:gap-[70px] grid-cols-4 md:grid-cols-8 xl:grid-cols-12  lg:px-8">
                    <!-- single card start  -->
                    @if($subscription_plans)
                     @foreach ($subscription_plans as $index=> $package)
                        <div
                            class="col-span-4 p-5 sm:p-10 lg:p-12 bg-white/5 border  rounded-[40px] transition-all duration-200 text-white h-fit {{ $index == 1 ? 'border-white/20 bg-white/10' : 'border-transparent hover:border-white/20 ' }} ">
                            <h1 class="text-18 font-semibold">{{ $package?->plan_name }}</h1>
                            <h2 class="text-48 font-semibold pt-5 pb-3.5">
                                {{ __('$') }}{{ $package?->plan_price }}<span class="text-base leading-7 font-normal">/ {{ $package?->expiration_date }}</span>
                            </h2>
                            <p class="pb-5 md:pb-10">{{ $package?->short_description }}</p>
                            <a href="{{ route('contact-us') }}">
                                <div
                                    class="flex justify-center gap-2 px-5 sm:px-10 py-[11px] rounded-[40px] bg-purple items-center overflow-hidden relative before:block before:w-[300px] before:h-[300px] before:absolute before:bg-white before:-top-[100px] before:rotate-45 hover:before:-top-[400px] transition-all duration-300 before:transition-all before:duration-1000 before:z-0 z-10 text-blue-seo hover:text-blue-seo after:block after:w-[300px] after:h-[300px] after:absolute after:bg-white after:-bottom-[100px] after:rotate-45 hover:after:-bottom-[400px] after:transition-all after:duration-1000 after:z-0 group">
                                    <span
                                        class="text-base group-hover:text-white transition-all duration-300 font-semibold font-inter py-1 relative z-10">
                                        {{ __('Choose This Package') }}
                                    </span>

                                    {{ get_svg('purple') }}
                                </div>
                            </a>
                            <ul class="flex flex-col gap-5 pt-5 md:pt-10">
                                @foreach (explode("\n",$package?->features) as $feature)
                                @if(!empty(trim($feature)))
                                    <li class="flex gap-3 items-center text-18 font-medium">
                                        {{ get_svg('feature-arrow') }}
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                     @endforeach
                    @else
                        <div class="col-span-12">
                            <p class="text-center">{{ __('No pricing packages available') }}.</p>
                        </div>
                    @endif
                    <!-- single card end  -->
                </div>
            </div>
        </section>
