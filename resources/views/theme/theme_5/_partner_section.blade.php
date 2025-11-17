        <section class="pb-16 md:pb-[130px]">
            <div class="theme-container mx-auto w-full border border-buisness-dark-black/5 rounded-2xl">
                <div class="w-full py-10 md:py-[70px]">
                    <h1 class="w-full text-center font-medium text-paragraph">
                        {{ __('We’ve more then 1250+ global clients') }}
                    </h1>
                    <div class="swiper h5-client_slider mt-11 overflow-hidden">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($partners as $partner)
                            <div class="swiper-slide">
                               <div class="w-full flex justify-center">
                                 <img src="{{ asset($partner?->logo) }}" alt="" />
                               </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
