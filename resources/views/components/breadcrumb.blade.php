@props(['name'])
<section id="h1-breadcrumb">
    <div class=" w-full h-fit overflow-hidden relative  pb-16 md:pb-24">
        <div class="absolute left-0 w-full h-full top-0 overflow-hidden z-0 pointer-events-none">
            <img src="{{ asset(breadcrumb_image()) }}" alt="" class="w-full h-full object-cover" />
        </div>
        <div class="theme-container mx-auto h-fit w-fit relative z-20">
            <div class="mt-[120px] xl:mt-[272px] md:mt-[150px] text-center w-fit mx-auto relative z-10">
                <h1 class="text-white text-34 sm:text-48 font-semibold">
                    {{ $name }}
                </h1>
                <div class="flex gap-5 items-center justify-center mt-4">
                    <a href="{{ route('home') }}"
                        class="home-two-nav-item leading-5 relative text-white hover:text-buisness-red before:border-buisness-red w-fit">
                        {{ __('Home') }}
                    </a>
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L5 6L1 11" stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    <a href=""
                        class="home-two-nav-item leading-5 relative text-white hover:text-buisness-red before:border-buisness-red w-fit">
                        {{ $name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
