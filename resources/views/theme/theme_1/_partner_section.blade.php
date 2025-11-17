 <section id="home-one-client">
     <div class="2xl:px-[152px] md:px-10 md:py-[130px] py-16 px-5  overflow-x-hidden">
         <p class="text-base text-paragraph font-medium mb-[50px] text-center">
             {{ __('We’ve more than 1250+ global clients') }}
         </p>
         <div class="w-full h1-partner_slider swiper">
             <div class="swiper-wrapper">
                 @foreach ($partners as $partner)
                     <div class="swiper-slide client-item flex justify-center">
                         <a href="{{ $partner->link }}" aria-label="partner">
                             <img src="{{ asset($partner->logo) }}" alt="" />
                         </a>
                     </div>
                 @endforeach
             </div>
         </div>
     </div>
 </section>
