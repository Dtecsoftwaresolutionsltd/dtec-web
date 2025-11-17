<div class="flex flex-col items-center justify-center py-16">
    @include('frontend.shop.error_svg')
    <h2 class="text-20 lg:text-48 text-main-black font-semibold mt-5 md:mt-[70px] text-center">{{ __('No Items Found') }}</h2>
    <p class="text-18 lg:text-24 text-paragraph mt-2.5 md:mt-5 mb-5 md:mb-10 text-center">{{ __("Sorry, we couldn't find any blogs matching your criteria.") }}</p>
    <a href="{{ route('product.shop') }}" class="">
        <div class="home-two-btn-bg group bg-buisness-dark-black border-buisness-dark-black py-[15px] w-fit">
            <span
                class="text-base group-hover:text-buisness-dark-black text-white transition-all duration-300 font-semibold font-inter relative z-10">
                {{ __('Back to shop') }}
            </span>
            {{ get_svg('white-black') }}
        </div>
    </a>
</div>
