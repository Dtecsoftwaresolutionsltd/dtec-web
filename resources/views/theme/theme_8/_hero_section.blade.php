 <section class="w-full bg-white pt-[100px] sm:pt-[196px] relative overflow-hidden">
     @include('theme.theme_8.svg.line_one')
     <!-- content start -->
     <div class="w-full relative theme-container mx-auto z-10">
         <div class="w-full flex flex-col items-center">
             <h1 class="text-4xl md:text-75 tracking-tight font-semibold text-main-black pr-2 max-w-[1020px] mt-7 text-center"
                 data-depth="-0.28">
                 {{ getTranslatedValue($hero_content, 'title') }}
             </h1>
             <p class="text-18 font-medium font-inter text-paragraph mt-5 md:mt-8 max-w-[808px] text-center">
                 {{ getTranslatedValue($hero_content, 'short_description') }}
             </p>
             <div class="flex flex-col sm:flex-row gap-3 sm:gap-6 mt-5 md:mt-10">
                 <a href="{{ getTranslatedValue($hero_content, 'left_button_url') }}">
                     <div
                         class="home-two-btn-white group before:bg-blue-sass after:bg-blue-sass text-white hover:text-main-black hover:border-main-black/10">
                         <span
                             class="text-base group-hover:text-main-black delay-100 transition-all duration-300 font-semibold font-inter py-1 relative z-10">
                             {{ getTranslatedValue($hero_content, 'left_button_text') }}
                         </span>
                         @include('theme.theme_8.svg.black')
                     </div>
                 </a>
                 <a href="{{ getTranslatedValue($hero_content, 'right_button_url') }}">
                     <div
                         class="home-two-btn-white-rev group before:bg-blue-sass after:bg-blue-sass border border-main-black/10 hover:border-blue-sass">
                         <span
                             class="text-base group-hover:text-white text-main-black transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                             {{ getTranslatedValue($hero_content, 'right_button_text') }}
                         </span>
                         @include('theme.theme_8.svg.black_arrow')
                     </div>
                 </a>
             </div>
             <div class="">
                 <ul class="flex flex-col sm:flex-row gap-5 sm:gap-10 items-center mt-[30px]">
                     <li class="flex gap-2.5 items-center">
                         @include('theme.theme_8.svg.tick_mark')
                         <span class="text-paragraph">{{ getTranslatedValue($hero_content, 'note_one') }}</span>
                     </li>
                     <li class="flex gap-2.5 items-center">
                         @include('theme.theme_8.svg.tick_mark')
                         <span class="text-paragraph">
                             {{ getTranslatedValue($hero_content, 'note_two') }}
                         </span>
                     </li>
                     <li class="flex gap-2.5 items-center">
                         @include('theme.theme_8.svg.tick_mark')
                         <span class="text-paragraph">
                             {{ getTranslatedValue($hero_content, 'note_three') }} </span>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
     <!-- img sector  -->
     <div class="pt-[70px] sm:pt-[140px] relative h-fit">
         @include('theme.theme_8.svg.line_two')
         <div class="relative h-fit">
             <div class="theme-container w-full mx-auto relative z-10">
                 <img src="{{ asset(getImage($hero_content, 'thumb_image')) }}" alt="" class="" />
             </div>
             <div class="w-full h-1/2 absolute bottom-0 bg-[#007aff]/10 z-0"></div>
         </div>
     </div>
     <!-- content end  -->
 </section>
