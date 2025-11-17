 <section class="w-full bg-white pt-[130px] sm:pt-[196px] pb-[70px] sm:pb-[120px] relative overflow-hidden">
     <!-- content start -->
     <div class="w-full relative theme-container mx-auto grid grid-cols-6 lg:grid-cols-12 z-10">
         <div class="lg:col-span-7 col-span-full flex h-full items-center">
             <div class="h-fit">
                 <h1
                     class="flex text-20 font-semibold text-main-black bg-it-blue/10 border border-it-blue/20 items-center gap-2.5 w-fit px-6 py-1 rounded-[40px]">
                     @include('theme.svg.theme_7_hero_rating')

                     {{ getTranslatedValue($hero_content, 'section_title') }}
                 </h1>
                 <h1 class="text-4xl md:text-65 tracking-tight font-semibold text-main-black pr-2 max-w-[658px] mt-7"
                     data-depth="-0.28">
                     {{ getTranslatedValue($hero_content, 'title') }}
                 </h1>
                 <p class="text-18 font-medium font-inter text-paragraph mt-5 md:mt-8 max-w-[571px]">
                     {{ getTranslatedValue($hero_content, 'short_description') }}
                 </p>
                 <div class="flex flex-col  sm:flex-row gap-3 sm:gap-6 mt-5 md:mt-10">
                     <a href="{{ getTranslatedValue($hero_content, 'left_button_url') }}">
                         <div
                             class="home-two-btn-white group before:bg-it-blue after:bg-it-blue text-white hover:text-paragraph hover:border-paragraph">
                             <span
                                 class="text-base group-hover:text-paragraph delay-100 transition-all duration-300 font-semibold font-inter py-1 relative z-10">
                                 {{ getTranslatedValue($hero_content, 'left_button_text') }}
                             </span>
                             @include('theme.theme_7.svg.left_arrow')
                         </div>
                     </a>
                     <a href="{{ getTranslatedValue($hero_content, 'right_button_url') }}">
                         <div
                             class="home-two-btn-white-rev group before:bg-it-blue after:bg-it-blue border border-paragraph hover:border-it-blue">
                             <span
                                 class="text-base group-hover:text-white text-paragraph transition-all duration-300 font-semibold font-inter relative z-10 py-1">
                                 {{ getTranslatedValue($hero_content, 'right_button_text') }}
                             </span>
                             @include('theme.theme_7.svg.right_arrow')
                         </div>
                     </a>
                 </div>
             </div>
         </div>
         <div class="lg:col-span-5 col-span-full">
             <div class="w-full h-full mt-5 xl:mt-0">
                <img src="{{ asset(getImage($hero_content, 'thumb_image')) }}" alt="" class="md:w-auto w-full h-auto" />
             </div>
         </div>
     </div>
     <!-- content end  -->
     <div class="w-fit h-fit absolute right-0 bottom-0 bg-it-blue xl:block hidden">
         @include('theme.theme_7.svg.hero_bg_dot')

     </div>
 </section>
