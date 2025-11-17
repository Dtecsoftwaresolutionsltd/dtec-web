@extends('inner_layout')

@section('title')
  <title>{{ config('app.name', __('Sign Up')) }}</title>
@endsection
@section('frontend_content')

  <div id="smooth-wrapper">
    <div id="smooth-content">
      <div>
        <main>
          <section id="h1-breadcrumb">
            <div class=" w-full h-fit overflow-hidden relative  pb-16 md:pb-24">
              <!-- <div class="win-grid win-grid-bg w-full h-full absolute left-0 top-0 z-0" id="win-grid"></div> -->
              <div class="absolute left-0 w-full h-full top-0 overflow-hidden z-0 pointer-events-none">
                <img src="{{ asset(breadcrumb_image()) }}" alt="" class="w-full h-full object-cover" />
              </div>
              <div class="theme-container mx-auto h-fit w-fit relative z-20">
                <div class="mt-[120px] xl:mt-[272px] md:mt-[150px] text-center w-fit mx-auto relative z-10">

                </div>
              </div>
            </div>
          </section>
          <!-- main container  start  -->
          <section class="-mt-[100px] pb-16 sm:pb-[130px] relative z-10">
            <div class="theme-container w-full mx-auto">
              <div class="flex justify-center items-center">
                <div class="max-w-[660px] w-full rounded-[10px] bg-white border border-grayscale-300 py-12 px-30">
                  <div class="mb-10">
                    <h4 class="text-34 font-semibold">{{ __('Create User Account') }}</h4>
                    <p class="text-16 text-paragraph">
                      {{ __('Your email addrss will not be published. Required fields are marked*') }}</p>
                  </div>
                  <form class="sign_up_form" method="POST" action="{{ route('user.store-register') }}">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                      <div class="form-box col-span-full">
                        <label for="fulName" class="text-base mb-2">{{ __('Full Name') }}</label>
                        <input type="text" id="fulName" class="form-input" placeholder="{{ __('Full Name') }}" name="name"
                          value="{{ old('name') }}">
                      </div>
                      <div class="form-box col-span-full">
                        <label for="emailAddress" class="text-base mb-2">{{ __('Email Address*') }}</label>
                        <input type="text" id="emailAddress" class="form-input" placeholder="{{ __('Email Address') }}"
                          name="email" value="{{ old('email') }}">
                      </div>
                      <div class="form-box">
                        <label for="currentPass" class="text-base mb-2">{{ __('Password*') }}</label>
                        <div class="relative flex items-center">
                          <input type="password" name="password" id="password" placeholder="*********"
                            class="form-input" />
                          <button type="button" class="absolute right-4 toggle-password text-[#8B8A8A]"
                            onclick="togglePasswordVisibility(this.previousElementSibling,this)">
                            <svg class="eye-hidden" width="20" height="18" xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24" fill="currentColor">
                              <path
                                d="M17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968ZM5.9356 7.3497C4.60673 8.56015 3.6378 10.1672 3.22278 12.0002C4.14022 16.0521 7.7646 19.0002 12.0003 19.0002C13.5997 19.0002 15.112 18.5798 16.4243 17.8384L14.396 15.8101C13.7023 16.2472 12.8808 16.5002 12.0003 16.5002C9.51498 16.5002 7.50026 14.4854 7.50026 12.0002C7.50026 11.1196 7.75317 10.2981 8.19031 9.60442L5.9356 7.3497ZM12.9139 14.328L9.67246 11.0866C9.5613 11.3696 9.50026 11.6777 9.50026 12.0002C9.50026 13.3809 10.6196 14.5002 12.0003 14.5002C12.3227 14.5002 12.6309 14.4391 12.9139 14.328ZM20.8068 16.5925L19.376 15.1617C20.0319 14.2268 20.5154 13.1586 20.7777 12.0002C19.8603 7.94818 16.2359 5.00016 12.0003 5.00016C11.1544 5.00016 10.3329 5.11773 9.55249 5.33818L7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925ZM11.7229 7.50857C11.8146 7.50299 11.9071 7.50016 12.0003 7.50016C14.4855 7.50016 16.5003 9.51488 16.5003 12.0002C16.5003 12.0933 16.4974 12.1858 16.4919 12.2775L11.7229 7.50857Z">
                              </path>
                            </svg>

                            <svg class="eye-visible hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                              viewBox="0 0 24 24" fill="currentColor">
                              <path
                                d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                              </path>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <div class="form-box">
                        <label for="conPass" class="text-base mb-2">{{ __('Confirm Password*') }}</label>
                        <div class="relative flex items-center">
                          <input type="password" name="password_confirmation" id="conPass" placeholder="*********"
                            class="form-input" />
                          <button type="button" class="absolute right-4 toggle-password text-[#8B8A8A]"
                            onclick="togglePasswordVisibility(this.previousElementSibling,this)">
                            <svg class="eye-hidden" width="20" height="18" xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 24 24" fill="currentColor">
                              <path
                                d="M17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968ZM5.9356 7.3497C4.60673 8.56015 3.6378 10.1672 3.22278 12.0002C4.14022 16.0521 7.7646 19.0002 12.0003 19.0002C13.5997 19.0002 15.112 18.5798 16.4243 17.8384L14.396 15.8101C13.7023 16.2472 12.8808 16.5002 12.0003 16.5002C9.51498 16.5002 7.50026 14.4854 7.50026 12.0002C7.50026 11.1196 7.75317 10.2981 8.19031 9.60442L5.9356 7.3497ZM12.9139 14.328L9.67246 11.0866C9.5613 11.3696 9.50026 11.6777 9.50026 12.0002C9.50026 13.3809 10.6196 14.5002 12.0003 14.5002C12.3227 14.5002 12.6309 14.4391 12.9139 14.328ZM20.8068 16.5925L19.376 15.1617C20.0319 14.2268 20.5154 13.1586 20.7777 12.0002C19.8603 7.94818 16.2359 5.00016 12.0003 5.00016C11.1544 5.00016 10.3329 5.11773 9.55249 5.33818L7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925ZM11.7229 7.50857C11.8146 7.50299 11.9071 7.50016 12.0003 7.50016C14.4855 7.50016 16.5003 9.51488 16.5003 12.0002C16.5003 12.0933 16.4974 12.1858 16.4919 12.2775L11.7229 7.50857Z">
                              </path>
                            </svg>

                            <svg class="eye-visible hidden" xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                              viewBox="0 0 24 24" fill="currentColor">
                              <path
                                d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z">
                              </path>
                            </svg>
                          </button>
                        </div>
                      </div>
                      <div class="col-span-full">
                        <button type="submit" class="sign_up_btn w-full">
                          <div
                            class="home-two-btn-bg py-3  bg-main-black border-main-black !flex before:hidden after:hidden hover:text-white w-full">
                            <span class="text-base text-white font-semibold">
                              {{ __('Create Account') }}
                            </span>
                          </div>
                        </button>
                      </div>
                      <div class="col-span-full flex justify-center items-center gap-2">
                        <div class="w-full max-w-[100px] h-[1px] bg-gray-300"></div>
                        <h5 class="text-20 font-semibold">{{ __('OR') }}</h5>
                        <div class="w-full max-w-[100px] h-[1px]  bg-gray-300"></div>
                      </div>

                      <div class="form-box">
                        <a href="{{ route('user.login-google') }}">
                          <div class="home-two-btn-bg py-3 flex w-full before:hidden after:hidden hover:border-purple">
                            <span>
                              <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M20.6258 11.2139C20.6258 10.4225 20.5603 9.84497 20.4185 9.24609H11.1973V12.818H16.6099C16.5008 13.7057 15.9115 15.0425 14.602 15.9408L14.5836 16.0603L17.4992 18.2738L17.7012 18.2936C19.5563 16.6145 20.6258 14.1441 20.6258 11.2139Z"
                                  fill="#4285F4" />
                                <path
                                  d="M11.1967 20.6258C13.8484 20.6258 16.0745 19.7702 17.7006 18.2944L14.6014 15.9415C13.772 16.5083 12.6589 16.904 11.1967 16.904C8.59946 16.904 6.39512 15.225 5.60933 12.9043L5.49415 12.9139L2.4625 15.2132L2.42285 15.3212C4.03791 18.4654 7.35536 20.6258 11.1967 20.6258Z"
                                  fill="#34A853" />
                                <path
                                  d="M5.61006 12.9038C5.40272 12.305 5.28273 11.6632 5.28273 11.0002C5.28273 10.3371 5.40272 9.69549 5.59915 9.09661L5.59366 8.96906L2.524 6.63281L2.42357 6.67963C1.75792 7.98437 1.37598 9.44953 1.37598 11.0002C1.37598 12.5509 1.75792 14.016 2.42357 15.3207L5.61006 12.9038Z"
                                  fill="#FBBC05" />
                                <path
                                  d="M11.1967 5.09664C13.0409 5.09664 14.2849 5.87733 14.9943 6.52974L17.7661 3.8775C16.0638 2.32681 13.8485 1.375 11.1967 1.375C7.35539 1.375 4.03792 3.53526 2.42285 6.6794L5.59844 9.09638C6.39514 6.77569 8.59949 5.09664 11.1967 5.09664Z"
                                  fill="#EB4335" />
                              </svg>
                            </span>
                            <span class="text-base text-black">
                              {{ __('Sign Up with Google') }}
                            </span>
                          </div>
                        </a>
                      </div>
                      <div class="form-box">
                        <a href="{{ route('user.login-facebook') }}">
                          <div class="home-two-btn-bg py-3 flex w-full before:hidden after:hidden hover:border-purple">
                            <span>
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"
                                  fill="#1877F2" />
                              </svg>
                            </span>
                            <span class="text-base text-black">
                              {{ __('Sign Up with Facebook') }}
                            </span>
                          </div>
                        </a>
                      </div>
                      <div class="col-span-full">
                        <h5 class="text-20 text-center text-paragraph">
                          {{ __('Already have an account?') }}
                          <a href="{{ route('user.login') }}" class="text-black">{{ __('Login') }}</a>
                        </h5>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </section>
          <!-- main container  end  -->

        </main>

      </div>
    </div>
  </div>

@endsection

@push('script_section')
  <script>
    function togglePasswordVisibility(input, button) {
      // Toggle password visibility
      input.type = input.type === 'password' ? 'text' : 'password';

      // Toggle icons
      const eyeHidden = button.querySelector('.eye-hidden');
      const eyeVisible = button.querySelector('.eye-visible');

      if (input.type === 'password') {
        // Password is hidden, show eye-hidden icon
        eyeHidden.classList.remove('hidden');
        eyeVisible.classList.add('hidden');
      } else {
        // Password is visible, show eye-visible icon
        eyeHidden.classList.add('hidden');
        eyeVisible.classList.remove('hidden');
      }
    }
  </script>
@endpush