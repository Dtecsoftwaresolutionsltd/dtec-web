 <section class="bg-[#007aff]/10 pb-16 md:pb-[130px]">
     <div class="max-w-[1616px] mx-auto">
         <div class="w-full pt-10 xl:pt-[123px]">
             <h1 class="w-full text-center font-medium text-paragraph">
                 {{ getTranslatedValue($partner_content, 'title') }}
             </h1>
             <div class="swiper h7-partner_slider mt-11 overflow-hidden">
                 <div class="swiper-wrapper">
                     <!-- Slides -->
                     @foreach ($partners as $partner)
                         <div class="swiper-slide">
                             <img src="{{ asset($partner->logo) }}" alt="" />
                         </div>
                     @endforeach
                     @foreach ($partners as $partner)
                         <div class="swiper-slide">
                             <img src="{{ asset($partner->logo) }}" alt="" />
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </section>
