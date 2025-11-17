@extends('inner_layout')

@section('title')
    <title>{{ config('app.name', __('Reset Password')) }}</title>
@endsection
@section('frontend_content')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div>
                <main>

                    <!-- main container  start  -->
                    <section class="py-16 md:pt-[250px] pb-20">
                        <div class="theme-container w-full mx-auto">
                            <div class="flex justify-center items-center">
                                <div
                                    class="max-w-[660px] w-full rounded-[10px] bg-white border border-grayscale-300 py-12 px-30">
                                    <div class="mb-10">
                                        <h4 class="text-34 font-semibold"> {{ __('Reset Password') }}</h4>
                                    </div>
                                    <form class="sign_up_form seller_login" method="POST"
                                        action="{{ route('user.store-reset-password', $user->forget_password_token) }}">
                                        @csrf
                                        <input type="hidden" value="{{ $user->email }}" name="email">

                                        <div class="">
                                            <div class="Quland-checkout-field">
                                                <label class="text-base mb-2">{{ __('Password*') }}</label>
                                                <div class="relative flex items-center">
                                                    <input type="password" name="password" id="password"
                                                        placeholder="*********" class="form-input" />
                                                    <button type="button" class="absolute right-4 toggle-password"
                                                        onclick="togglePasswordVisibility(this.previousElementSibling)">
                                                        <svg width="20" height="18" viewBox="0 0 20 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M18.5303 1.53033C18.8232 1.23744 18.8232 0.762557 18.5303 0.469667C18.2374 0.176778 17.7626 0.176778 17.4697 0.469667L1.46967 16.4697C1.17678 16.7626 1.17678 17.2374 1.46967 17.5303C1.76256 17.8232 2.23744 17.8232 2.53033 17.5303L5.37723 14.6834C6.74353 15.3266 8.3172 15.75 10 15.75C12.684 15.75 15.0903 14.6729 16.8206 13.345C17.6874 12.6797 18.4032 11.9376 18.9089 11.2089C19.4006 10.5003 19.75 9.7227 19.75 9C19.75 8.2773 19.4006 7.4997 18.9089 6.79115C18.4032 6.06244 17.6874 5.32028 16.8206 4.65503C16.5585 4.45385 16.2808 4.25842 15.989 4.07163L18.5303 1.53033ZM14.8995 5.16113L13.1287 6.93196C13.5213 7.5248 13.75 8.2357 13.75 9C13.75 11.0711 12.0711 12.75 10 12.75C9.2357 12.75 8.5248 12.5213 7.93196 12.1287L6.51524 13.5454C7.58077 13.9795 8.7621 14.25 10 14.25C12.2865 14.25 14.3802 13.3271 15.9073 12.155C16.6692 11.5703 17.2714 10.9374 17.6766 10.3536C18.0957 9.7497 18.25 9.2773 18.25 9C18.25 8.7227 18.0957 8.2503 17.6766 7.6464C17.2714 7.0626 16.6692 6.42972 15.9073 5.84497C15.5941 5.60461 15.2571 5.37472 14.8995 5.16113ZM9.0299 11.0307C9.3237 11.1713 9.6526 11.25 10 11.25C11.2426 11.25 12.25 10.2426 12.25 9C12.25 8.6526 12.1713 8.3237 12.0307 8.0299L9.0299 11.0307Z"
                                                                fill="#8B8A8A" />
                                                            <path
                                                                d="M10 2.25C11.0323 2.25 12.0236 2.40934 12.9511 2.68101C13.1296 2.73328 13.1827 2.95662 13.0513 3.0881L12.2267 3.91265C12.1648 3.97451 12.0752 3.99928 11.99 3.97967C11.3506 3.83257 10.6839 3.75 10 3.75C7.71345 3.75 5.61978 4.67292 4.09267 5.84497C3.33078 6.42972 2.72857 7.0626 2.32343 7.6464C1.90431 8.2503 1.75 8.7227 1.75 9C1.75 9.2773 1.90431 9.7497 2.32343 10.3536C2.67725 10.8635 3.18138 11.4107 3.81091 11.9307C3.92677 12.0264 3.93781 12.2015 3.83156 12.3078L3.12265 13.0167C3.03234 13.107 2.88823 13.1149 2.79037 13.0329C2.09739 12.4517 1.51902 11.8255 1.0911 11.2089C0.59937 10.5003 0.25 9.7227 0.25 9C0.25 8.2773 0.59937 7.4997 1.0911 6.79115C1.59681 6.06244 2.31262 5.32028 3.17941 4.65503C4.90965 3.32708 7.31598 2.25 10 2.25Z"
                                                                fill="#8B8A8A" />
                                                            <path
                                                                d="M10 5.25C10.1185 5.25 10.2357 5.25549 10.3513 5.26624C10.5482 5.28453 10.6194 5.51991 10.4796 5.6597L9.2674 6.87196C8.6141 7.0968 8.0968 7.6141 7.87196 8.2674L6.6597 9.4796C6.51991 9.6194 6.28453 9.5482 6.26624 9.3513C6.25549 9.2357 6.25 9.1185 6.25 9C6.25 6.92893 7.92893 5.25 10 5.25Z"
                                                                fill="#8B8A8A" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="Quland-checkout-field">
                                                <label class="text-base mb-2">{{ __('Confirm Password*') }}</label>
                                                <div class="relative flex items-center">
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" placeholder="*********"
                                                        class="form-input" />
                                                    <button type="button" class="absolute right-4 toggle-password"
                                                        onclick="togglePasswordVisibility(this.previousElementSibling)">
                                                        <svg width="20" height="18" viewBox="0 0 20 18"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M18.5303 1.53033C18.8232 1.23744 18.8232 0.762557 18.5303 0.469667C18.2374 0.176778 17.7626 0.176778 17.4697 0.469667L1.46967 16.4697C1.17678 16.7626 1.17678 17.2374 1.46967 17.5303C1.76256 17.8232 2.23744 17.8232 2.53033 17.5303L5.37723 14.6834C6.74353 15.3266 8.3172 15.75 10 15.75C12.684 15.75 15.0903 14.6729 16.8206 13.345C17.6874 12.6797 18.4032 11.9376 18.9089 11.2089C19.4006 10.5003 19.75 9.7227 19.75 9C19.75 8.2773 19.4006 7.4997 18.9089 6.79115C18.4032 6.06244 17.6874 5.32028 16.8206 4.65503C16.5585 4.45385 16.2808 4.25842 15.989 4.07163L18.5303 1.53033ZM14.8995 5.16113L13.1287 6.93196C13.5213 7.5248 13.75 8.2357 13.75 9C13.75 11.0711 12.0711 12.75 10 12.75C9.2357 12.75 8.5248 12.5213 7.93196 12.1287L6.51524 13.5454C7.58077 13.9795 8.7621 14.25 10 14.25C12.2865 14.25 14.3802 13.3271 15.9073 12.155C16.6692 11.5703 17.2714 10.9374 17.6766 10.3536C18.0957 9.7497 18.25 9.2773 18.25 9C18.25 8.7227 18.0957 8.2503 17.6766 7.6464C17.2714 7.0626 16.6692 6.42972 15.9073 5.84497C15.5941 5.60461 15.2571 5.37472 14.8995 5.16113ZM9.0299 11.0307C9.3237 11.1713 9.6526 11.25 10 11.25C11.2426 11.25 12.25 10.2426 12.25 9C12.25 8.6526 12.1713 8.3237 12.0307 8.0299L9.0299 11.0307Z"
                                                                fill="#8B8A8A" />
                                                            <path
                                                                d="M10 2.25C11.0323 2.25 12.0236 2.40934 12.9511 2.68101C13.1296 2.73328 13.1827 2.95662 13.0513 3.0881L12.2267 3.91265C12.1648 3.97451 12.0752 3.99928 11.99 3.97967C11.3506 3.83257 10.6839 3.75 10 3.75C7.71345 3.75 5.61978 4.67292 4.09267 5.84497C3.33078 6.42972 2.72857 7.0626 2.32343 7.6464C1.90431 8.2503 1.75 8.7227 1.75 9C1.75 9.2773 1.90431 9.7497 2.32343 10.3536C2.67725 10.8635 3.18138 11.4107 3.81091 11.9307C3.92677 12.0264 3.93781 12.2015 3.83156 12.3078L3.12265 13.0167C3.03234 13.107 2.88823 13.1149 2.79037 13.0329C2.09739 12.4517 1.51902 11.8255 1.0911 11.2089C0.59937 10.5003 0.25 9.7227 0.25 9C0.25 8.2773 0.59937 7.4997 1.0911 6.79115C1.59681 6.06244 2.31262 5.32028 3.17941 4.65503C4.90965 3.32708 7.31598 2.25 10 2.25Z"
                                                                fill="#8B8A8A" />
                                                            <path
                                                                d="M10 5.25C10.1185 5.25 10.2357 5.25549 10.3513 5.26624C10.5482 5.28453 10.6194 5.51991 10.4796 5.6597L9.2674 6.87196C8.6141 7.0968 8.0968 7.6141 7.87196 8.2674L6.6597 9.4796C6.51991 9.6194 6.28453 9.5482 6.26624 9.3513C6.25549 9.2357 6.25 9.1185 6.25 9C6.25 6.92893 7.92893 5.25 10 5.25Z"
                                                                fill="#8B8A8A" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($general_setting->recaptcha_status == 1)
                                            <div class="form-input col-lg-12 mt-4">
                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ $general_setting->recaptcha_site_key }}"></div>
                                            </div>
                                        @endif

                                        <div class="col-span-full mt-4">
                                            <div
                                                class="home-two-btn-bg py-3  bg-blue-seo border-blue-seo !flex before:hidden after:hidden hover:text-white w-full">
                                                <button type="submit" class="w-full">
                                                    <span class="text-base text-white font-semibold">

                                                        {{ __('Continue') }}

                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function togglePasswordVisibility(input) {
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
@endpush
