@extends('inner_layout')

@section('title')
  <title>{{ __('User Dashboard') }}</title>
@endsection
@section('frontend_content')

  <main>
    <!-- breadcrumb -->
    <x-breadcrumb name="{{ __('Change Password') }}" />
    <!-- breadcrumb-ends -->

    <!-- dashboard-starts -->
    <section class="dashboard py-20">
      <div class="theme-container mx-auto">
        <div class="flex flex-col xl:flex-row gap-30">
          <!-- dashboard-sidebar -->
          @include('user.sidebar')

          <!-- dashboard-main -->
          <div class="dashboard-main w-full flex-1">
            <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">
              <h4 class="text-24 font-semibold">{{ __('Update your Password') }}</h4>
              <p class="text-paragraph">{{ __('Your email address will not be published. Required fields are marked *') }}
              </p>
              <div class="grid items-center md:grid-cols-12 gap-30 mt-5">
                <!-- column-starts -->
                <div class="md:col-span-6">
                  <form method="POST" action="{{ route('user.update-password') }}">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 gap-5">
                      <div class="form-box">
                        <label for="currentPass" class="text-base mb-2">{{ __('Current Password*') }}</label>
                        <div class="relative flex items-center">
                          <input type="password" name="current_password" id="currentPass" placeholder="*********"
                            class="form-input" />
                        </div>
                      </div>
                      <div class="form-box">
                        <label for="newPass" class="text-base mb-2">{{ __('New Password') }}</label>
                        <div class="relative flex items-center">
                          <input type="password" name="password" id="newPass" placeholder="*********"
                            class="form-input" />
                        </div>
                      </div>
                      <div class="form-box">
                        <label for="conPass" class="text-base mb-2">{{ __('Confirm Password') }}</label>
                        <div class="relative flex items-center">
                          <input type="password" name="password_confirmation" id="conPass" placeholder="*********"
                            class="form-input" />
                        </div>
                      </div>
                    </div>
                    <div class="flex justify-end gap-5 mt-5">
                      <a href="{{ route('user.dashboard') }}">
                        <div class="home-two-btn-bg py-3 group bg-[#FF002A0F] border-[#FF002A1A]">
                          <span class="text-base text-[#FF002A] relative z-10">
                            {{ __('Cancel') }}
                          </span>
                        </div>
                      </a>
                      <button type="submit">
                        <div class="home-two-btn-bg py-3 group bg-black border-black">
                            <span class="text-base text-white group-hover:text-black font-semibold font-inter relative z-10">
                                {{ __('Update Password') }}
                            </span>
                            <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="group-hover:stroke-black transition-all duration-300"
                                    d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                      </button>
                    </div>
                  </form>

                </div>
                <!-- column-end -->
                <div class="md:col-span-5">
                  <div class="flex justify-end items-center">
                    <div class="img">
                      @include('theme.svg.change_password')

                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- dashboard-end -->
  </main>

@endsection