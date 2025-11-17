<section class="max-w-full overflow-hidden">
    <div class="theme-container mx-auto w-screen flex items-center">
        <div class="flex gap-5 lg:gap-[154px] w-full flex-col items-center lg:flex-row">
            <p class="w-full lg:max-w-[176px] text-base font-semibold text-main-black text-center lg:text-start">
                {{ __('We’ve more then 1250+ global clients') }}
            </p>

            <!-- Slider main container -->
            <div class="w-full flex-1 lg:-mr-[300px] max-w-full overflow-hidden">
                <div class="swiper partnerSwiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        @foreach ($partners as $partner)
                        <div class="swiper-slide">
                            <img src="{{ asset($partner->logo) }}" alt="" />
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
