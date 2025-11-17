 <section class="pb-16 sm:pb-[130px] bg-white">
     <div class="theme-container mx-auto grid grid-cols-6 lg:grid-cols-12 gap-[30px]">
         <div class="col-span-6">
             <h1 class="px-5 bg-main-gray border border-it-blue/20 text-it-blue font-medium rounded-[30px] w-fit">
                 {{ getTranslatedValue($working_process_content, 'section_title') }}
             </h1>
             <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-main-black mt-5">
                 {{ getTranslatedValue($working_process_content, 'title') }}
             </h2>
             <div class="w-fit relative mt-10 sm:mt-[100px]">
                 <div class="w-full h-auto">
                     <img src="{{ asset(getImage($working_process_content, 'working_process_main_image')) }}"
                         alt="" class="w-full h-auto" />
                 </div>
                 <button aria-label="play-video"
                     class="video-play-btn hero_video_play_btn w-[50px] sm:w-[100px] aspect-square rounded-[10px] flex justify-center items-center absolute -bottom-0 sm:-bottom-[50px] right-0 bg-it-blue">
                     @include('theme.theme_7.svg.working_process_video_icon')
                 </button>
             </div>
         </div>
         <div class="col-span-6 flex flex-col gap-[30px]">
             <!-- single card  -->
             <div class="grid grid-cols-6 md:grid-cols-12 xl:gap-12 sm:gap-3 gap-6">
                 <div class="col-span-6">
                     <div class="w-full h-auto">
                         <img src="{{ asset(getImage($working_process_content, 'working_process_image_1')) }}"
                             alt="" class="w-full h-auto" />
                     </div>

                 </div>
                 <div class="col-span-6">
                     <div class="flex h-full flex-col justify-center">
                         <div
                             class="w-10 aspect-square rounded-full border border-it-blue flex items-center justify-center">
                             <h1 class="font-semibold text-it-blue">{{ __('01') }}</h1>
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-4 mb-3">
                             {{ getTranslatedValue($working_process_content, 'title_1') }}
                         </h1>
                         <p class="text-paragraph">
                             {{ getTranslatedValue($working_process_content, 'description_1') }}
                         </p>
                     </div>
                 </div>
             </div>
             <!-- single card  -->
             <div class="grid grid-cols-6 md:grid-cols-12 xl:gap-12 sm:gap-3 gap-6">
                 <div class="col-span-6">
                     <div class="w-full h-auto">
                         <img src="{{ asset(getImage($working_process_content, 'working_process_image_2')) }}"
                             alt="" class="w-full h-auto" />
                     </div>
                 </div>
                 <div class="col-span-6">
                     <div class="flex h-full flex-col justify-center">
                         <div
                             class="w-10 aspect-square rounded-full border border-it-blue flex items-center justify-center">
                             <h1 class="font-semibold text-it-blue">{{ __('02') }}</h1>
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-4 mb-3">
                             {{ getTranslatedValue($working_process_content, 'title_2') }}
                         </h1>
                         <p class="text-paragraph">
                             {{ getTranslatedValue($working_process_content, 'description_2') }}
                         </p>
                     </div>
                 </div>
             </div>
             <!-- single card  -->
             <div class="grid grid-cols-6 md:grid-cols-12 xl:gap-12 sm:gap-3 gap-6">
                 <div class="col-span-6">
                     <div class="w-full h-auto">
                         <img src="{{ asset(getImage($working_process_content, 'working_process_image_3')) }}"
                             alt="" class="w-full h-auto" />
                     </div>
                 </div>
                 <div class="col-span-6">
                     <div class="flex h-full flex-col justify-center">
                         <div
                             class="w-10 aspect-square rounded-full border border-it-blue flex items-center justify-center">
                             <h1 class="font-semibold text-it-blue">{{ __('03') }}</h1>
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-4 mb-3">
                             {{ getTranslatedValue($working_process_content, 'title_3') }}
                         </h1>
                         <p class="text-paragraph">
                             {{ getTranslatedValue($working_process_content, 'description_3') }}
                         </p>
                     </div>
                 </div>
             </div>
             <!-- single card  -->
             <div class="grid grid-cols-6 md:grid-cols-12 xl:gap-12 sm:gap-3 gap-6">
                 <div class="col-span-6">
                     <div class="w-full h-auto">
                         <img src="{{ asset(getImage($working_process_content, 'working_process_image_4')) }}"
                             alt="" class="w-full h-auto" />
                     </div>
                 </div>
                 <div class="col-span-6">
                     <div class="flex h-full flex-col justify-center">
                         <div
                             class="w-10 aspect-square rounded-full border border-it-blue flex items-center justify-center">
                             <h1 class="font-semibold text-it-blue">{{ __('04') }}</h1>
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-4 mb-3">
                             {{ getTranslatedValue($working_process_content, 'title_4') }}
                         </h1>
                         <p class="text-paragraph">
                             {{ getTranslatedValue($working_process_content, 'description_4') }}
                         </p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
