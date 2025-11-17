<section id="service">
    <div class="w-full service-section-wrapper md:pb-[130px] pb-16 relative">
        <div class="theme-container mx-auto relative z-10">
            <div
                class="w-full md:py-[130px] py-16 xl:px-[80px] md:px-10 px-5 bg-main-gray rounded-[10px] border border-[#e7e3fa]">
                <div class="flex flex-col items-center mb-10 md:mb-[70px]">
                    <span
                        class="text-purple font-medium px-5 py-3 border border-[#e7e3fa] leading-none rounded-full inline-block mb-5 bg-white">
                        {{ __('Explore Services') }}
                    </span>
                    <h2
                        class="md:text-48 text-34 font-semibold text-main-black text-center lg:w-[685px] w-full">
                        {{ __('High Impact Marketing Services to grow your business') }}
                    </h2>
                </div>
                <div class="w-full grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 xl:gap-[70px] gap-8">
                    @foreach ($services as $service)
                        <div data-aos="zoom-in-left"
                            class="flex flex-col space-y-[30px] justify-between items-center rounded-[10px] bg-white px-8 py-10 hover:shadow-common group border border-transparent hover:border-purple common-transition">
                            <div class="w-[60px] h-[60px] flex justify-center items-center rounded-full bg-[#e7e3fa]">
                                <span>
                                    <img src="{{ asset($service->thumb_image) }}" alt="service-icon"
                                        class="size-[30px] object-contain" />
                                </span>
                            </div>
                            <div>
                                <a href="{{ route('service', $service->slug) }}">
                                    <p class="text-20 font-semibold text-center text-main-black mb-4">
                                        {{ $service?->title }}
                                    </p>
                                </a>
                                <p class="text-center text-paragraph service-description-line-clamp">
                                    {{ Str::limit(strip_tags(clean($service?->short_description)), 150) }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex justify-between absolute top-1/3">
            <div id="line-lottie"></div>
            <div class="transform rotate-180" id="line-lottie2"></div>
        </div>
    </div>
</section>
