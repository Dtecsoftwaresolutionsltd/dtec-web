 <section class="">
     <div class="theme-container mx-auto">
         <h1
             class="px-5 bg-blue-sass/10 border border-blue-sass/20 text-blue-sass font-medium rounded-[30px] w-fit mx-auto">
             {{ __('Feature Services') }}
         </h1>
         <h2
             class="sm:text-48 text-24 font-semibold text-main-black mb-[32px] mt-[18px] w-full max-w-[795px] text-center mx-auto">
             {{ getTranslatedValue($core_features_content, 'title') }}
         </h2>
         <div class="grid grid-cols-3 sm:grid-cols-6 lg:grid-cols-12 min-h-[303px] gap-[30px] mt-10 sm:mt-[70px]">
             <!-- single card  -->
             @foreach ($service_explores as $service)
                 <div class="col-span-3 flex items-center h-[246px] relative">
                     <div
                         class="group hover:absolute border border-blue-sass/10 px-[29px] py-[30px] rounded-2xl bg-white -right-0 h-[246px] hover:h-[290px] transition-all duration-300 hover:bg-blue-sass/5 overflow-hidden h5-story_slider_active_card">
                         <div class="size-[45px]">
                             <img src="{{ asset($service?->saas_icon) }}" alt=""
                                 class="size-full object-contain" />
                         </div>
                         <h1 class="text-18 font-semibold text-main-black mt-5 mb-2.5">
                             {{ $service?->title }}
                         </h1>
                         <p class="text-paragraph line-clamp-3">
                             {{ Str::limit($service?->short_description, 100) }}
                         </p>
                         <a href="{{ route('service', $service->slug) }}">
                             <div class="flex items-center text-paragraph hover:text-blue-sass gap-2 group mt-5">
                                 <span
                                     class="font-medium leading-5 font-inter border-b border-transparent before:inline-block before:border-blue-sass before:border-b before:absolute before:bottom-0 before:transition-all before:duration-300 before:w-0 hover:before:w-full before:overflow-hidden before:h-5 relative">
                                     {{ __('Read More') }}
                                 </span>
                                 @include('theme.theme_8.svg.read_more')
                             </div>
                         </a>
                     </div>
                 </div>
             @endforeach
             <!-- single card  -->
         </div>
     </div>
 </section>
