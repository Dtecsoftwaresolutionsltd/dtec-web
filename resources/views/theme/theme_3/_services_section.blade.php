<section class="bg-white w-full pb-16 md:pb-[130px] overflow-x-hidden">
            <div class="theme-container w-full mx-auto">
                <div class="max-w-[661px] w-full flex flex-col items-center mx-auto mb-10 md:mb-[70px]">
                    <h1 class="border text-purple border-purple/10 py-0.5 px-5 rounded-[30px] w-fit bg-main-gray">
                        {{ __('Popular Services') }}
                    </h1>
                    <h2 class="text-24 sm:text-48 font-semibold text-black pt-5 text-center">
                        {{ __('High Impact Creative Services to grow your business') }}
                    </h2>
                </div>
                <div
                    class="grid grid-cols-4 md:grid-cols-8 lg:grid-cols-12 gap-x-4 md:gap-x-8 gap-y-[30px] ">
                    <!-- card start  -->
                    @foreach ($services as $index => $service)
                    <div data-aos="fade-left"
                        class="bg-white px-5 pt-5 pb-4 md:px-10 md:pt-10 md:pb-8 col-span-4 rounded-3xl h3_service_card_shadow transition-all duration-{{ $index * 100 }} cursor-pointer">
                        <img class="mb-6" width="35" height="38" src="{{ asset($service->thumb_image) }}" alt="">
                        <a href="{{ route('service',$service->slug) }}"
                            class="text-main-black font-semibold text-22 pt-6 mb-2">
                            {{ $service?->title }}
                        </a>
                        <p class="text-paragraph mt-1.5">
                            {{ Str::limit($service->short_description, 50, '...') }}
                        </p>
                    </div>
                    @endforeach

                    <!-- card end  -->
                </div>
            </div>
</section>
