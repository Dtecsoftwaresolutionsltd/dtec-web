 <section class="py-16 sm:py-[130px] bg-white">
     <div class="theme-container mx-auto w-full">
         <h1 class="px-5 bg-main-gray border border-it-blue/20 text-it-blue font-medium rounded-[30px] w-fit mx-auto">
             {{ getTranslatedValue($explore_services_content, 'section_title') }}
         </h1>
         <h2 class="max-w-[747px] font-semibold text-24 sm:text-48 text-main-black text-center mx-auto mt-5">
             {{ getTranslatedValue($explore_services_content, 'title') }}
         </h2>
         <div class="grid grid-cols-3 sm:grid-cols-6 lg:grid-cols-12 min-h-[303px] gap-[30px] mt-10 sm:mt-[70px]">
             <!-- single card  -->
             @foreach ($service_explores as $service)
                 <div class="col-span-3 flex items-center h-full">
                     <div
                         class="group border border-it-blue/10 px-[30px] py-[30px] rounded-2xl bg-white -right-0 h-[246px] hover:h-[300px] transition-all duration-300 hover:bg-it-gray overflow-hidden h5-story_slider_active_card">
                         <div class="">
                             <img src="{{ asset($service?->it_business_icon) }}" alt="" class="w-[45px] h-[45px]" />
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-5 mb-2.5">
                             {{ $service?->title }}
                         </h1>
                         <p class="text-paragraph line-clamp-3">
                             {{ Str::limit($service?->short_description, 200) }}
                         </p>
                         <a href="{{ route('service', $service?->slug) }}">
                             <div class="flex items-center text-paragraph hover:text-it-blue gap-2 group mt-5">
                                 <span
                                     class="font-medium leading-5 font-inter border-b border-transparent before:inline-block before:border-it-blue before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                     {{ __('Read More') }}
                                 </span>
                                 @include('theme.svg.arrow_right')
                             </div>
                         </a>
                     </div>
                 </div>
             @endforeach
             <!-- single card  -->

         </div>
     </div>
 </section>
