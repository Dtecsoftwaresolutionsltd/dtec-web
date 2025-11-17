<div class="col-span-8 lg:col-span-4">
    <form action="{{ route('blogs') }}" method="GET">
        <div class="flex items-center relative">
            <button type="submit" for="search" class="absolute right-6">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M14.2 14.2L17 17M16.2 8.6C16.2 4.40264 12.7974 1 8.6 1C4.40264 1 1 4.40264 1 8.6C1 12.7974 4.40264 16.2 8.6 16.2C12.7974 16.2 16.2 12.7974 16.2 8.6Z"
                        stroke="#FF002A" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <input placeholder="Type to search..." id="search" value="{{ request('search') }}"
                name="search" type="text"
                class="placeholder:text-paragraph w-full h-[65px] bg-[#F5F6F6] border border-purple/10 focus:border-buisness-red/20 focus:outline-none focus:right-0 rounded-full px-[25px]" />
        </div>
    </form>
    <!-- links  -->
    <div class="mt-[54px]">
        <h1 class="text-22 text-main-black font-semibold"> {{ __('Category') }} </h1>
        <ul class="mt-6">
            @foreach ($categories as $category)
                <li class="my-1.5">
                    <a href="{{ route('blogs', ['category' => $category?->slug]) }}"
                        class="text-paragraph hover:text-main-black transition-all duration-300 flex gap-3 items-center">
                        <svg width="6" height="13" viewBox="0 0 6 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1.92285L4.59655 6.63592L1 11.349" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>{{ $category?->name }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- recent blogs  -->
    <div class="mt-[54px]">
        <h1 class="text-22 text-main-black font-semibold"> {{ __('Recent News') }} </h1>
        <div class="mt-8 flex flex-col gap-4">
            @foreach ($recent_blogs as $resent_blog)
                <!-- single -->
                <a href="{{ route('blog', $resent_blog?->slug) }}" class="flex gap-2 sm:gap-[25px] items-center group">
                    <div class="w-20 h-[90px] rounded-md overflow-hidden bg-red-100">
                        <img src="{{ asset($resent_blog?->image) }}" alt=""
                            class="w-full h-full object-cover group-hover:scale-110 transition-all duration-300" />
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-paragraph">{{ $resent_blog?->created_at?->format('F d, Y') }}</p>
                        <p
                            class="text-main-black font-semibold mt-1.5 transition-all duration-300 group-hover:underline">
                            {{ $resent_blog?->title }}</p>
                    </div>
                </a>
                <!-- single -->
             @endforeach
        </div>
        <!-- tags  -->
        <div class="mt-[54px]">
            <h1 class="text-22 text-main-black font-semibold"> {{ __('Popular Tags') }} </h1>
            <div class="mt-8 flex gap-2.5 flex-wrap">
                @foreach ($allTags as $tag)
                    <a href="{{ route('blogs',['tag' => $tag]) }}"
                        class="group overflow-hidden flex justify-center items-center relative text-sm border border-main-black/10 rounded-md py-1.5 before:inline-block before:absolute before:z-0 before:w-full before:h-full before:bg-main-black before:scale-x-0 group hover:before:scale-x-100 before:origin-right hover:before:origin-left before:transition-transform before:ease-out before:duration-300">
                        <span
                            class="px-[18px] relative z-20 transition-colors ease-in-out duration-300 group-hover:text-white">
                            {{ $tag }} </span>
                    </a>
                 @endforeach
            </div>
        </div>
        <!-- banner  -->
        <div
            class="mt-[30px] flex justify-center items-end relative w-full rounded-2xl overflow-hidden">
            <img src="{{ asset(getImage($blog_adds,'add_image')) }}" alt="" class="w-full object-cover" />
            <div class="w-full h-full absolute black_overlay"></div>
            <div class="w-full max-w-[277px] absolute bottom-[30px]">
                <h1 class="text-24 font-semibold text-white text-center mb-5"> {{ getTranslatedValue($blog_adds,'title') }} </h1>
                <a href="tel:{{ getTranslatedValue($blog_adds,'phone_number') }}">
                    <div class="home-two-btn-bg py-3 group bg-buisness-red border-buisness-red inline-flex w-full">
                        <svg class="relative z-10" width="25" height="25" viewBox="0 0 25 25"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="group-hover:fill-buisness-red transition-all duration-300"
                                d="M24.1094 2.17188C24.625 2.3125 25 2.73438 25 3.25C25 15.2969 15.25 25 3.25 25C2.6875 25 2.26562 24.6719 2.125 24.1562L1 19.2812C0.90625 18.7656 1.14062 18.2031 1.65625 17.9688L6.90625 15.7188C7.375 15.5312 7.89062 15.6719 8.21875 16.0469L10.5625 18.9062C14.2188 17.1719 17.1719 14.1719 18.8594 10.6094L16 8.26562C15.625 7.9375 15.4844 7.42188 15.6719 6.95312L17.9219 1.70312C18.1562 1.1875 18.7188 0.90625 19.2344 1.04688L24.1094 2.17188Z"
                                fill="white" />
                        </svg>
                        <span
                            class="text-base text-white group-hover:text-buisness-red transition-all duration-300 font-inter relative z-10">
                             {{ getTranslatedValue($blog_adds,'phone_number') }} </span>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
