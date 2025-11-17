@extends('inner_layout')

@section('title')
    <title>{{ __('Edit Profile') }}</title>
@endsection


@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Profile') }}" />
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

                            <h4 class="text-18 font-semibol bg-buisness-gray rounded-lg py-5 px-30">
                                {{ __('Personal Information') }}
                            </h4>

                            <div class="mt-5">
                                <form action="{{ route('user.update-profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid sm:grid-cols-2 grid-cols-1 gap-5">
                                        <div class="form-box">
                                            <label for="fulName" class="text-base mb-2">{{ __('Full Name') }}</label>
                                            <input type="text" name="name" id="name" class="form-input"
                                                value="{{ $user->name }}">
                                        </div>
                                        <div class="form-box ">
                                            <label for="phoneNumber" class="text-base mb-2">{{ __('Phone Number') }}</label>
                                            <input type="text" name="phone" id="phone" class="form-input"
                                                value="{{ $user->phone }}">
                                        </div>
                                        <div class="form-box ">
                                            <label for="emailAddress"
                                                class="text-base mb-2">{{ __('Email Address') }}</label>
                                            <input type="text" name="email" id="email" class="form-input"
                                                value="{{ $user->email }}">
                                        </div>
                                        <div class="form-box ">
                                            <label for="postalCode" class="text-base mb-2">{{ __('Postal Code') }}</label>
                                            <input type="number" name="zip" id="zip" class="form-input"
                                                placeholder="Postal Code" value="{{ $user->zip }}">
                                        </div>

                                        <div class="form-box col-span-full">
                                            <label for="address" class="text-base mb-2">{{ __('Address') }}</label>
                                            <input type="text" name="address" id="address" class="form-input"
                                                placeholder="Address" value="{{ $user->address }}">
                                        </div>
                                        <div class="form-box col-span-full">
                                            <label for="photoImage" class="text-base mb-2">
                                                {{ __('Profile Image*') }}</label>
                                            <div class="form-input !h-auto !p-9" id="photoImage">
                                                <div>
                                                    <label for="logo"
                                                        class="w-[240px] aspect-square flex justify-center items-center flex-col gap-3.5 border border-dashed border-primary-300 rounded-[10px] p-3 bg-primary-200 text-primary-400 cursor-pointer bg-white">
                                                        <div class="size-[120px] rounded-lg overflow-hidden">
                                                            <img src="{{ $user->image ? asset($user->image) : asset($general_setting->placeholder_image) }}"
                                                                alt="" class="w-full h-full">
                                                        </div>
                                                        <p class="text-base text-paragraph">{{ __('Select') }} <span
                                                                class="text-[#2B4DFF]">{{ __('New File') }} </span> {{ __('to Upload') }}
                                                        </p>
                                                    </label>
                                                    <input type="file" name="image" id="logo" class="hidden">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end flex-wrap gap-5 mt-5">
                                        <a href="{{ route('user.dashboard') }}" class="">
                                            <div class="home-two-btn-bg py-3 group bg-[#FF002A0F] border-[#FF002A1A]">
                                                <span class="text-base text-[#FF002A] relative z-10">
                                                    {{ __('Cancel') }}
                                                </span>
                                            </div>
                                        </a>
                                        <button type="submit">
                                            <div class="home-two-btn-bg py-3 group bg-black border-black">
                                                <span class="text-base text-white group-hover:text-black font-semibold font-inter relative z-10">
                                                    {{ __('Save Change') }}
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


                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboard-end -->
    </main>
@endsection