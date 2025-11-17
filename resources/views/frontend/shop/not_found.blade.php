<div class="mt-10">
    <div class="error-wrapper flex flex-col items-center gap-30">
        <div class="error-img">
            @include('frontend.shop.error_svg')
        </div>
        <div class="error-content text-center max-w-[452px] w-full">
            <h3 class="text-30 font-semibold">{{ __('Item not Found') }}</h3>
            <p class="my-5 text-paragraph">
                {{ __('Not Found typically means that the search of product you had previously added has been cleared.Thank you') }}
            </p>
            <a href="{{ route('product.shop') }}" class="home-two-btn-bg py-3 group bg-buisness-red border-buisness-red">
                <span
                    class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-semibold font-inter relative z-10">
                    {{ __('Go to Shop Page') }}
                </span>
                {{ get_svg('arrow1') }}
            </a>
        </div>
    </div>
</div>
