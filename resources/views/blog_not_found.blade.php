<div class="flex flex-col items-center justify-center py-16">
    <img data-aos="zoom-in" src="{{ asset($general_setting->error_image) }}" alt="Not Found">
    <h2 class="text-20 lg:text-48 text-main-black font-semibold mt-5 md:mt-[70px] text-center">{{ __('No Blogs Found') }}</h2>
    <p class="text-18 lg:text-24 text-paragraph mt-2.5 md:mt-5 mb-5 md:mb-10 text-center">{{ __("Sorry, we couldn't find any blogs matching your criteria.") }}</p>
    <a href="{{ route('blogs') }}" class="">
        <div class="home-two-btn-bg py-3 group bg-[#4A7DFF] border-[#4A7DFF] inline-flex">
            <span
                class="text-base text-white group-hover:text-[#4A7DFF] transition-all duration-300 font-inter relative z-10">
                {{ __('Go to Blogs') }}
            </span>
            <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path class="group-hover:stroke-[#4A7DFF] transition-all duration-300"
                    d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
    </a>
</div>
