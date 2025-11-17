 <section id="h1-breadcrumb">
     <div class="h1-breadcrumb w-full h-fit overflow-hidden relative bg-main-gray pb-16 md:pb-24">
         <div class="win-grid win-grid-bg w-full h-full absolute left-0 top-0 z-0" id="win-grid"></div>
         <div class="absolute left-1/4 w-full top-[300px] overflow-hidden z-0 pointer-events-none">
             <div class="flex justify-center">
                 <img src="./assets/images/home-one-hero-circle-shadow.svg" alt="" />
             </div>
         </div>
         <div class="theme-container mx-auto h-fit  relative z-20">
             <div class="mt-[120px] md:mt-[272px] w-full  relative z-10">
                 <div class="flex gap-5 items-center ">
                     <a href="{{ route('user.dashboard') }}"
                         class="home-two-nav-item leading-5 relative text-18 font-inter text-paragraph transition-all duration-300 hover:text-purple">
                         {{ __('Home') }}
                     </a>
                     <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="M1 1L5 6L1 11" stroke="#794AFF" stroke-width="1.5" stroke-linecap="round"
                             stroke-linejoin="round" />
                     </svg>
                     <a href="{{ route('user.dashboard') }}"
                         class="home-two-nav-item leading-5 relative text-18 font-inter text-paragraph transition-all duration-300 hover:text-purple">
                         {{ __('Dashboard') }}
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </section>
