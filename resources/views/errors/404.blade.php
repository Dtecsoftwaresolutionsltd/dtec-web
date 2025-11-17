<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404</title>
    <!--library css-->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/aos.css') }}" />
    <!-- compiled from input.css -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- overwrite custom css -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css')}}" />
</head>

<body>
    <div class="w-screen h-screen overflow-hidden flex flex-col justify-center items-center p-4">
        <img data-aos="zoom-in offset:100" src="{{ asset($general_setting->error_image) }}" alt="" class="" />
        <h1 class="text-20 lg:text-48 text-main-black font-semibold mt-5 md:mt-[70px] text-center">
           {{ __(' OPPS! This Page Are Can’t Be Found') }}
        </h1>
        <h2 class="text-18 lg:text-24 text-paragraph mt-2.5 md:mt-5 mb-5 md:mb-10 text-center">
            {{ __('We can’t find this page your looking for') }}
        </h2>
        <a href="{{ route('home') }}" class="">
            <div class="home-two-btn-bg py-3 group bg-[#161519] border-[#161519] inline-flex">
                <span
                    class="text-base text-white group-hover:text-[#161519] transition-all duration-300 font-inter relative z-10">
                    {{ __('Go to Home') }}
                </span>
                <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path class="group-hover:stroke-[#161519] transition-all duration-300"
                        d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </a>
    </div>
    <div class="shape-1 absolute left-40 top-96 z-10">
        {{ get_svg('404.icon1') }}
    </div>
    <div class="shape-2 absolute right-96 top-96 z-10">
        {{ get_svg('404.icon3') }}
    </div>
    <div class="shape-3 absolute left-96 top-[550px] z-10">
        {{ get_svg('404.icon2') }}
    </div>
    <div class="shape-4 absolute right-96 top-[550px] z-10">
        {{ get_svg('404.icon4') }}
    </div>
    <script src="{{ asset('frontend/assets/js/aos.js') }}"></script>
    <script>

AOS.init({
      disable: 'mobile', // Disables AOS on phones and tablets
      // Other AOS options...
    });



    </script>
</body>

</html>
