 <section class="">
     <div class="w-full max-w-[1590px] rounded-b-[20px] overflow-hidden mx-auto relative flex flex-col items-center">
         @include('theme.theme_8.svg.cta_circle')
         <button type="button" aria-label="play-video"
             class="video-play-btn flex space-x-8 ml-7 sm:ml-0 items-center mt-16 md:mt-[130px] relative z-10">
             <span class="flex size-11 sm:size-[56px] rounded-full justify-center items-center bg-blue-sass/10 relative">
                 <span>
                     <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path
                             d="M10.9611 8.29308L2.99228 12.8467C1.65896 13.6086 0 12.6459 0 11.1102V2.00295C0 0.467309 1.65896 -0.495425 2.99228 0.266469L10.9611 4.82011C12.3048 5.5879 12.3048 7.52529 10.9611 8.29308Z"
                             fill="#007AFF" />
                     </svg>
                 </span>
                 <div class="absolute w-full h-full rounded-full h8-play-btn-line1"></div>
                 <div class="absolute w-[130%] h-[130%] rounded-full h8-play-btn-line2"></div>
                 <div class="absolute w-[160%] h-[160%] rounded-full h8-play-btn-line3"></div>
             </span>
         </button>
         <h1 class="text-24 sm:text-48 font-semibold text-main-black my-10 max-w-[640px] text-center relative z-10">
             {{ getTranslatedValue($automating_design_system_content, 'title') }}
         </h1>
         <a href="{{ getTranslatedValue($automating_design_system_content, 'get_start_button_url') }}">
             <div
                 class="home-two-btn-white group before:bg-blue-sass after:bg-blue-sass text-white hover:text-main-black hover:border-main-black/10 relative z-10">
                 <span
                     class="text-base group-hover:text-main-black delay-100 transition-all duration-300 font-semibold font-inter py-1 relative z-10">
                     {{ getTranslatedValue($automating_design_system_content, 'get_start_button_text') }}
                 </span>
                 @include('theme.theme_8.svg.black')
             </div>
         </a>
         <img src="{{ asset(getImage($automating_design_system_content, 'main_image')) }}" alt=""
             class="mt-[130px] relative z-10" />
         @include('theme.theme_8.svg.cta_1')
         @include('theme.theme_8.svg.cta_2')
     </div>
 </section>
