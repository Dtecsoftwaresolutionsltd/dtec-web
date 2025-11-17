 <section id="fun-fact">
     <div class="fun-fact-wrapper w-full md:pb-[130px] pb-16">
         <div class="theme-container mx-auto">
             <div class="grid xl:grid-cols-2 grid-cols-1 xl:gap-[155px]">
                 <div class="w-full">
                     <span
                         class="section-title-top-tag mb-5">{{ getTranslatedValue($fan_fact_content,'sub_title') }}</span>
                     <h2 class="md:text-48 text-34 font-semibold text-main-black mb-[50px]">
                         {{ getTranslatedValue($fan_fact_content,'title') }}
                     </h2>
                     <p class="text-paragraph mb-[50px] pl-5 border-l-[3px] border-purple">
                         {{ getTranslatedValue($fan_fact_content,'description') }}
                     </p>
                     <a href="{{ getTranslatedValue($fan_fact_content,'button_url') }}" class="home-two-btn-bg py-3 group bg-white  border-purple/10 inline-flex before:bg-purple after:bg-purple">
                         <div
                             class="text-base text-purple group-hover:text-white  transition-all duration-300 font-semibold font-inter relative z-10">
                             <div class="flex space-x-2.5 items-center text-purple group-hover:text-white">
                                 <span class="text-pone"> {{ getTranslatedValue($fan_fact_content,'button_text') }}
                                 </span>
                                 <span>
                                     {{ get_svg('fanfact') }}
                                 </span>
                             </div>
                         </div>
                     </a>
                 </div>
                 <div class="w-full relative xl:mt-0 mt-10 flex xl:flex-none flex-wrap gap-5">
                     <div
                         class="xl:absolute left-20 top-0 rounded-[20px] w-[300px] h-[178px] border border-[#e7e3fa] bg-main-gray overflow-hidden group">
                         <div class="flex justify-center items-center p-8 relative">
                             <div class="flex flex-col space-y-5 justify-between items-center relative z-10">
                                 <p class="md:text-48 text-34 font-semibold text-center text-main-black"
                                     data-scroll-qs="scroll"
                                     data-count-qs="{{ getTranslatedValue($fan_fact_content,'counter_number_one') }}"
                                     data-type-qs="{{ __('k+') }}" data-speed-qs="600"></p>
                                 <hr class="border-[3px] border-purple w-[80px]" />
                                 <p class="text-center text-paragraph text-18 font-semibold">
                                     {{ getTranslatedValue($fan_fact_content,'counter_text_one') }}
                                 </p>
                             </div>
                             <div
                                 class="absolute w-full h-full left-0 top-0 opacity-100 xl:opacity-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">

                                 <span class="w-full h-full">
                                     {{ get_svg('counter-shape') }}
                                 </span>
                             </div>
                         </div>
                     </div>
                     <div
                         class="xl:absolute left-0 bottom-0 rounded-[20px] w-[300px] h-[178px] border border-[#e7e3fa] bg-main-gray overflow-hidden group">
                         <div class="p-8 flex justify-center items-center relative">
                             <div class="flex flex-col space-y-5 justify-between items-center relative z-10">
                                 <p data-scroll-qs="scroll"
                                     data-count-qs="{{ getTranslatedValue($fan_fact_content,'counter_number_two') }}"
                                     data-type-qs="{{ __('k+') }}" data-speed-qs="600"
                                     class="md:text-48 text-34 font-semibold text-center text-main-black">
                                 </p>
                                 <hr class="border-[3px] border-purple w-[80px]" />
                                 <p class="text-center text-paragraph text-18 font-semibold">
                                     {{ getTranslatedValue($fan_fact_content,'counter_text_two') }}
                                 </p>
                             </div>
                             <div
                                 class="absolute w-full h-full left-0 top-0 xl:opacity-0 opacity-100 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                                 <span class="w-full h-full">
                                     {{ get_svg('counter-shape') }}
                                 </span>
                             </div>
                         </div>
                     </div>
                     <div
                         class="xl:absolute -right-12 bottom-20 rounded-[20px] w-[300px] h-[178px] border border-[#e7e3fa] bg-main-gray overflow-hidden group">
                         <div class="p-8 flex justify-center items-center relative">
                             <div class="flex flex-col space-y-5 justify-between items-center relative z-10">
                                 <p data-scroll-qs="scroll"
                                     data-count-qs="{{ getTranslatedValue($fan_fact_content,'counter_number_three') }}"
                                     data-type-qs="{{ __('+') }}" data-speed-qs="600"
                                     class="md:text-48 text-34 font-semibold text-center text-main-black">
                                 </p>
                                 <hr class="border-[3px] border-purple w-[80px]" />
                                 <p class="text-center text-paragraph text-18 font-semibold">
                                     {{ getTranslatedValue($fan_fact_content,'counter_text_three') }}
                                 </p>
                             </div>
                             <div
                                 class="absolute w-full h-full left-0 top-0 opacity-100 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                                 <span class="w-full h-full">
                                     {{ get_svg('counter-shape') }}
                                 </span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
