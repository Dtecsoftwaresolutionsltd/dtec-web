<div class="dashboard-main w-full flex-1">
    <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">
        <div class="order-table border border-gray-200 rounded-lg overflow-hidden w-full overflow-x-auto">
            <div class="min-w-full divide-y divide-gray-200">
                <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">
                    <div class="error-section flex justify-center mt-[60px]">
                        <div class="error-wrapper flex flex-col items-center gap-12 overflow-hidden">
                            <div class="wrapper-img " data-aos="zoom-in">
                                @include('theme.svg.error_image')
                            </div>
                            <div class="wrapper-content text-center max-w-[467px] w-full">
                                <h3 class="text-30 mb-6 font-semibold " data-aos="fade-up" data-aos-duration="500">
                                    {{ __('Wishlist empty') }}</h3>
                                <p class="text-paragraph mb-6 aos-init aos-animate" data-aos="fade-up"
                                    data-aos-duration="600">
                                    {{ __('Not Found typically means that the search of car you had previously added has been cleared.') }}
                                    <span class="text-black">{{ __('Thank you') }}</span>
                                </p>
                                <a href="{{ route('product.shop') }}">
                                    <div class="home-two-btn-bg py-3 group bg-purple border-blue-seo">
                                        <span
                                            class="text-base text-white group-hover:text-purple transition-all duration-300 font-semibold font-inter relative z-10">
                                            {{ __('Go to Shop') }}
                                        </span>
                                        <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path class="group-hover:stroke-blue-seo transition-all duration-300"
                                                d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                                stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
