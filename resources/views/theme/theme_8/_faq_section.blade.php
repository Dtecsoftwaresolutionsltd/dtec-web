   <section class="relative h8-faq bg-white py-16  md:py-[130px]">
       <div class="w-full pb-16 md:pb-[30px] relative z-10">
           <div class="theme-container mx-auto">
               <div class="flex justify-center items-center px-4 md:px-0 relative rounded-3xl overflow-hidden">
                   <div class="max-w-[850px] w-full flex justify-center items-center flex-col relative z-10">
                       <h1
                           class="py-0.5 px-5 bg-blue-sass/10 border-blue-sass/20 border rounded-[30px] font-medium text-blue-sass">
                           {{ getTranslatedValue($faqs_content, 'section_title') }}
                       </h1>
                       <h2 class="text-24 sm:text-48 font-semibold text-main-black mt-5">
                           {{ getTranslatedValue($faqs_content, 'title') }}
                       </h2>
                       <div class="flex flex-col gap-2.5 w-full mt-10 md:mt-[50px] p-0 sm:p-5">
                           <!-- faq single start  -->
                           @foreach ($faqs as $faq)
                               <div class="md:py-5 py-2.5 px-2 md:px-9 w-full rounded-[10px] h8-faq-toggler overflow-hidden transition-all duration-300 max-h-fit h-fit border border-blue-sass/10 bg-blue-sass/5"
                                   name="faq-{{ $faq->id }}">
                                   <div class="w-full flex justify-between items-center pointer-events-none h-fit">
                                       <h1 class="font-semibold sm:text-18 text-main-black flex-1">
                                           {{ $faq->question }}
                                       </h1>
                                       <svg width="19" height="10" viewBox="0 0 19 10" fill="none"
                                           xmlns="http://www.w3.org/2000/svg">
                                           <path d="M2 2L9.5 8L17 2" stroke="#007AFF" stroke-width="3"
                                               stroke-linecap="round" stroke-linejoin="round" />
                                       </svg>
                                   </div>
                                   <p id="faq-body" class="md:mt-3.5 mt-6 text-paragraph pointer-events-none h-fit">
                                       {{ $faq->answer }}
                                   </p>
                               </div>
                           @endforeach
                           <!-- faq single end  -->
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
