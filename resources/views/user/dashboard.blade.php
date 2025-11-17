@extends('inner_layout')

@section('title')
<title>{{ __('User Dashboard') }}</title>
@endsection
@section('frontend_content')

<main>
    <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Dashboard') }}" />
    <!-- breadcrumb-ends -->

    <!-- dashboard-starts -->
    <section class="dashboard py-16 sm:py-20 ">
      <div class="theme-container mx-auto">
        <div class="flex flex-col xl:flex-row gap-30">
          <!-- dashboard-sidebar -->
         @include('user.sidebar')
          <!-- dashboard-main -->
          <div class="dashboard-main w-full flex-1 xl:max-w-[982px]">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-30 mb-7 ">
              <!-- column-starts -->
              <div class="bg-white flex items-center gap-5 p-6 rounded-lg" data-aos="fade-up">
                <span class="size-[64px] rounded-full flex items-center justify-center bg-buisness-gray text-buisness-red">
                  <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M26.667 29.3346H6.66699C4.45785 29.3346 2.66699 27.5438 2.66699 25.3346V6.66797C2.66699 4.45883 4.45785 2.66797 6.66699 2.66797H20.0003C22.2095 2.66797 24.0003 4.45883 24.0003 6.66797V10.668M26.667 29.3346C25.1942 29.3346 24.0003 28.1407 24.0003 26.668V10.668M26.667 29.3346C28.1397 29.3346 29.3337 28.1407 29.3337 26.668V13.3346C29.3337 11.8619 28.1398 10.668 26.667 10.668H24.0003M8.00033 9.33464H18.667M8.00033 16.0013H18.667M8.00033 22.668H13.3337"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </span>
                <div>
                  <h3 class="text-34 font-semibold">{{ $order_count ?? 0 }}</h3>
                  <p class="text-16 text-main-black">{{ __('Total Orders') }}</p>
                </div>
              </div>
              <!-- column-end -->
              <!-- column-starts -->
              <div class="bg-white flex items-center gap-5 p-6 rounded-lg" data-aos="fade-up">
                <span class="size-[64px] rounded-full flex items-center justify-center bg-buisness-gray text-buisness-red">
                  <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M16.3333 16.0013H15.5833C15.5833 16.3241 15.7899 16.6107 16.0962 16.7128L16.3333 16.0013ZM17.0833 9.33463C17.0833 8.92042 16.7475 8.58463 16.3333 8.58463C15.9191 8.58463 15.5833 8.92042 15.5833 9.33463H17.0833ZM20.0962 18.0461C20.4891 18.1771 20.9139 17.9648 21.0448 17.5718C21.1758 17.1788 20.9635 16.7541 20.5705 16.6231L20.0962 18.0461ZM16.3333 16.0013H17.0833V9.33463H16.3333H15.5833V16.0013H16.3333ZM16.3333 16.0013L16.0962 16.7128L20.0962 18.0461L20.3333 17.3346L20.5705 16.6231L16.5705 15.2898L16.3333 16.0013ZM29.6667 16.0013H28.9167C28.9167 22.9509 23.2829 28.5846 16.3333 28.5846V29.3346V30.0846C24.1113 30.0846 30.4167 23.7793 30.4167 16.0013H29.6667ZM16.3333 29.3346V28.5846C9.38375 28.5846 3.75 22.9509 3.75 16.0013H3H2.25C2.25 23.7793 8.55532 30.0846 16.3333 30.0846V29.3346ZM3 16.0013H3.75C3.75 9.05172 9.38375 3.41797 16.3333 3.41797V2.66797V1.91797C8.55532 1.91797 2.25 8.22329 2.25 16.0013H3ZM16.3333 2.66797V3.41797C23.2829 3.41797 28.9167 9.05172 28.9167 16.0013H29.6667H30.4167C30.4167 8.22329 24.1113 1.91797 16.3333 1.91797V2.66797Z"
                      fill="currentColor" />
                  </svg>

                </span>
                <div>
                  <h3 class="text-34 font-semibold">{{ $pending_orders ?? 0 }}</h3>
                  <p class="text-16 text-main-black">{{ __('Pending Orders') }}</p>
                </div>
              </div>
              <!-- column-end -->
              <!-- column-starts -->
              <div class="bg-white flex items-center gap-5 p-6 rounded-lg" data-aos="fade-up">
                <span class="size-[64px] rounded-full flex items-center justify-center bg-buisness-gray text-buisness-red">
                  <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M8.66634 5.33464H24.6663C27.6119 5.33464 29.9997 7.72245 29.9997 10.668V17.3346C29.9997 20.2802 27.6119 22.668 24.6663 22.668H13.9997C11.0542 22.668 8.66634 20.2802 8.66634 17.3346V5.33464ZM8.66634 5.33464C8.66634 3.86188 7.47243 2.66797 5.99967 2.66797H3.33301"
                      stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                      d="M15.333 27.332C15.333 28.4366 14.4376 29.332 13.333 29.332C12.2284 29.332 11.333 28.4366 11.333 27.332C11.333 26.2275 12.2284 25.332 13.333 25.332C14.4376 25.332 15.333 26.2275 15.333 27.332Z"
                      stroke="currentColor" stroke-width="1.5" />
                    <path
                      d="M27.333 27.332C27.333 28.4366 26.4376 29.332 25.333 29.332C24.2284 29.332 23.333 28.4366 23.333 27.332C23.333 26.2275 24.2284 25.332 25.333 25.332C26.4376 25.332 27.333 26.2275 27.333 27.332Z"
                      stroke="currentColor" stroke-width="1.5" />
                    <path d="M15.333 16C18.4745 17.7871 20.1964 17.7684 23.333 16" stroke="currentColor"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>

                </span>
                <div>
                  <h3 class="text-34 font-semibold">{{ $complete_orders ?? 0 }}</h3>
                  <p class="text-16 text-main-black">{{ __('Complete Orders') }}</p>
                </div>
              </div>
              <!-- column-end -->
            </div>


            @if($orders->isEmpty())
                 <div class="display-none">

                 </div>
            @else
                @include('user._with_dashboard_order')
            @endif

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- dashboard-end -->
  </main>

@endsection
