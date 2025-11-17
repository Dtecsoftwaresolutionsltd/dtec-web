 <div class="bg-blue-sass/5">
     <!-- what we do start   -->
     <section class="py-16 md:py-[130px]">
         <div class="theme-container w-full mx-auto grid lg:grid-cols-12 xl:gap-20 lg:gap-16 gap-10 items-center">
             <div class="lg:col-span-6 col-span-full">
                 <img src="{{ asset(getImage($why_use_us_two_content, 'main_image')) }}" alt=""
                     class="shadow-blue-sass-sh" />
             </div>
             <div class="lg:col-span-6 col-span-full h-full flex flex-col justify-center lg:items-end">
                 <div class="">
                     <h1
                         class="px-5 bg-blue-sass/10 border border-blue-sass/20 text-blue-sass font-medium rounded-[30px] w-fit">
                         {{ getTranslatedValue($why_use_us_two_content, 'section_title') }}
                     </h1>
                     <h2
                         class="md:text-48 text-24 font-semibold text-main-black mb-[32px] mt-[18px] w-full max-w-[487px]">
                         {{ getTranslatedValue($why_use_us_two_content, 'title') }}
                     </h2>
                     <p class="text-paragraph mb-[45px] w-full max-w-[508px]">
                         {{ getTranslatedValue($why_use_us_two_content, 'short_description') }}
                     </p>

                     <a href="{{ getTranslatedValue($why_use_us_two_content, 'get_start_button_url') }}">
                         <div
                             class="home-two-btn-white-rev group bg-blue-sass before:bg-white after:bg-white hover:border-blue-sass transition-all duration-500 w-fit">
                             <span
                                 class="text-base group-hover:text-blue-sass text-white transition-all duration-300 font-semibold font-inter relative z-10 py-0.5">
                                 {{ getTranslatedValue($why_use_us_two_content, 'get_start_button_text') }}
                             </span>
                             @include('theme.theme_8.svg.arrow_new')
                         </div>
                     </a>
                 </div>
             </div>
         </div>
     </section>
     <!-- what we do end   -->
     <!-- testimonials start  -->
     <section class="">
         <div class="theme-container mx-auto">
             <h1
                 class="md:text-48 text-24 font-semibold text-main-black mb-[60px] mt-[18px] w-full max-w-[795px] text-center mx-auto">
                 {{ __('Customer Say About Our Services') }}
             </h1>
         </div>
         <div class="relative h-fit">
             <div class="theme-container mx-auto relative z-10">
                 <div class="w-full rounded-[20px] px-10 lg:px-[110px] pt-[30px] bg-[#182030] relative overflow-hidden">
                     <!-- animated circle bg  -->
                     <div class="absolute -top-1 -right-1 flex justify-center items-center w-2 h-2 z-0">
                         <div class="animated_circle_bg bg-blue-sass/10"></div>
                         <div class="animated_circle_bg2 bg-blue-sass/10"></div>
                         <div class="animated_circle_bg3 bg-blue-sass/10"></div>
                         <div class="animated_circle_bg4 bg-blue-sass/10"></div>
                         <div class="animated_circle_bg5 bg-blue-sass/10"></div>
                         <div class="animated_circle_bg6 bg-blue-sass/10"></div>
                     </div>
                     <!-- animated circle bg  -->
                     <div class="grid grid-cols-7 md:grid-cols-10 relative z-10">
                         <img src="{{ asset(testimonail_bg()) }}" alt=""
                             class="absolute top-bottom-moving top-10" />
                         <div class="col-span-7 flex flex-col justify-center">
                             <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                     d="M55.9702 11.994C53.2589 8.94822 49.9682 7.40381 46.1898 7.40381C42.7939 7.40381 39.9151 8.61307 37.6326 10.9978C35.3647 13.3674 34.2147 16.3105 34.2147 19.7458C34.2147 22.9921 35.3763 25.8849 37.6672 28.3439C39.688 30.5133 42.2336 31.8932 45.2472 32.4556C44.7202 36.4511 41.1881 40.0676 34.7278 43.2188L33.5645 43.7863L38.3341 52.5918L39.4108 52.046C53.0727 45.1209 59.9997 35.334 59.9997 22.957C59.9997 18.687 58.6441 14.9986 55.9702 11.994ZM39.3601 49.2764L36.9704 44.8652C44.1567 41.0997 47.7976 36.5731 47.7976 31.3976V30.2895L46.6966 30.1648C43.7312 29.8292 41.3715 28.6804 39.4828 26.6527C37.6077 24.6397 36.6961 22.3806 36.6961 19.7458C36.6961 16.9323 37.5889 14.6322 39.4252 12.7133C41.2467 10.8101 43.4595 9.8849 46.1899 9.8849C49.2725 9.8849 51.8654 11.1144 54.1167 13.6436C56.4058 16.2156 57.5186 19.262 57.5186 22.9569C57.5186 28.6296 55.9213 33.7509 52.7711 38.1786C49.7653 42.4033 45.257 46.133 39.3601 49.2764Z"
                                     fill="white" />
                                 <path
                                     d="M22.3404 11.9886C19.599 8.94653 16.2947 7.40399 12.519 7.40399C9.11988 7.40399 6.25406 8.61548 4.0016 11.0047C1.76848 13.3733 0.636094 16.3142 0.636094 19.7459C0.636094 22.9922 1.79766 25.8849 4.08832 28.3441C6.10488 30.5088 8.61996 31.8874 11.5775 32.4524C11.0569 36.4509 7.55414 40.0692 1.14562 43.221L0 43.7842L4.65094 52.596L5.73832 52.0473C19.4621 45.1226 26.4207 35.3352 26.4207 22.9571C26.4206 18.6838 25.0477 14.9934 22.3404 11.9886ZM5.70223 49.2724L3.3777 44.868C10.5118 41.101 14.1267 36.5734 14.1267 31.3977V30.292L13.0282 30.1652C10.1236 29.8301 7.79297 28.6811 5.90367 26.6527C4.02855 24.6399 3.11719 22.3807 3.11719 19.7459C3.11719 16.9289 3.99703 14.6263 5.80676 12.7068C7.5968 10.8082 9.79254 9.88509 12.519 9.88509C15.6047 9.88509 18.2146 11.1164 20.497 13.6495C22.8135 16.2201 23.9395 19.2648 23.9395 22.9571C23.9395 28.6289 22.3352 33.7495 19.1708 38.1767C16.152 42.4002 11.6243 46.1293 5.70223 49.2724Z"
                                     fill="white" />
                             </svg>
                             <p class="max-w-[571px] text-white font-semibold text-18 sm:text-24 mt-6">
                                 {{ $testimonials[0]->comment ?? '' }}

                             </p>
                             <div class="mt-11 border-l-2 border-blue-sass">
                                 <h1 class="font-semibold text-18 text-white pl-[30px]">
                                     {{ $testimonials[0]->name ?? '' }}
                                 </h1>
                                 <p class="font-medium text-sm text-white mt-0.5 pl-[30px]">
                                     {{ $testimonials[0]->designation ?? '' }}
                                 </p>
                             </div>
                         </div>
                         <div class="col-span-7 md:col-span-3">
                             <img src="{{ asset(getImage($why_use_us_content, 'testimonial_image')) }}" alt=""
                                 class="" />
                         </div>
                     </div>
                 </div>
             </div>
             <div class="bg-white h-1/2 w-full absolute bottom-0 z-0"></div>
         </div>
     </section>
     <!-- testimonials end  -->
 </div>
