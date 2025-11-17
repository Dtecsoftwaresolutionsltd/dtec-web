<section class="w-full bg-black-seo border-b border-white/5 relative">
    <div class="theme-container w-full mx-auto grid grid-cols-1 xl:grid-cols-2">
        <div class="col-span-1 py-16 md:py-[130px] xl:border-r border-white/5 relative">
            <!-- bg shape  -->
            <svg width="300" height="246" viewBox="0 0 300 246" fill="none" xmlns="http://www.w3.org/2000/svg"
                class="absolute bottom-24 -left-56 moving-anim-left">
                <path
                    d="M0 30.4415C0 12.2366 16.0831 -1.77243 34.1158 0.725185L274.116 33.9662C288.952 36.0211 300 48.7043 300 63.6825V216C300 232.569 286.569 246 270 246H30C13.4315 246 0 232.569 0 216V30.4415Z"
                    fill="url(#paint0_linear_460_21937)" />
                <defs>
                    <linearGradient id="paint0_linear_460_21937" x1="150" y1="-4" x2="150"
                        y2="246" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#794AFF" stop-opacity="0.15" />
                        <stop offset="1" stop-color="#794AFF" stop-opacity="0" />
                    </linearGradient>
                </defs>
            </svg>
            <h1 class="text-white font-medium py-1 px-5 rounded-[30px] border-[1.2px] border-white/10 w-fit">
                {{ getTranslatedValue($contact_us, 'title_one') }}
            </h1>
            <h2 class="max-w-[470px] font-semibold text-24 sm:text-48 text-white pt-5 mb-10">
                {{ getTranslatedValue($contact_us, 'description_one') }}
            </h2>
            <a href="{{ getTranslatedValue($contact_us, 'button_one_url') }}">
                <div class="home-two-btn-bg py-3 group w-fit bg-blue-seo border-blue-seo">
                    <span
                        class="text-base text-white group-hover:text-blue-seo transition-all duration-300 font-semibold font-inter relative z-10">
                        {{ getTranslatedValue($contact_us, 'button_one') }}
                    </span>
                    @include('theme.svg.arrow_right')
                </div>
            </a>
        </div>
        <div class="col-span-1 pb-16 pt-0 xl:pt-[130px] md:pb-[130px] flex flex-col xl:items-end">
            <!-- bg anim  -->
            <div class="absolute w-full h-full top-0 right-0 anim-light-bg z-0"></div>
            <div>
                <h1 class="text-white font-medium py-1 px-5 rounded-[30px] border-[1.2px] border-white/10 w-fit">
                    {{ getTranslatedValue($contact_us, 'title_two') }}
                </h1>
                <h2 class="max-w-[380px] font-semibold text-24 md:text-48 text-white pt-5 mb-10">
                    {{ getTranslatedValue($contact_us, 'description_two') }}
                </h2>

                <form action="{{ route('store-newsletter') }}" method="POST" class="flex flex-col sm:flex-row gap-3.5">
                    @csrf
                    <input type="email" name="email" placeholder="{{ __('Enter your email') }}"
                        class="py-1.5 px-6 border border-white/10 rounded-[28px] bg-main-gray/5 sm:w-[295px] w-full max-w-full relative z-10 focus:border-white focus:outline-none text-white">
                    <button id="Quland-subscription-btn" type="submit" data-text="Subscribe"
                        class="home-two-btn-white-rev group sm:w-fit w-full">
                        <span
                            class="text-base group-hover:text-blue-seo text-white transition-all duration-300 font-semibold font-inter relative z-10">{{ __('Subscribe') }}</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</section>
