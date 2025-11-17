@extends('inner_layout')

@section('title')
    <title>{{ __('Create Ticket') }}</title>
@endsection

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Create Support Tickets') }}" />
        <!-- breadcrumb-ends -->

        <!-- dashboard-starts -->
        <section class="dashboard pt-20 pb-20">
            <div class="theme-container mx-auto">
                <div class="flex flex-col xl:flex-row gap-30">
                    <!-- dashboard-sidebar -->
                    @include('user.sidebar')
                    <!-- dashboard-main -->
                    <div class="dashboard-main w-full flex-1">
                        <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

                            <div class="flex justify-between items-center mb-5">
                                <h4 class="text-18 font-semibold bg-[#F6F8FF] rounded-lg py-5 px-30">
                                    {{ __('Create Support Ticket') }}</h4>
                                <a href="{{ route('user.ticket-support.index') }}" class="home-two-btn-bg py-3 group bg-buisness-red border-buisness-red">
                                    <span class="text-base text-white group-hover:text-buisness-red font-semibold font-inter relative z-10">
                                        {{ __('Ticket List') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-buisness-red transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="mt-5">
                                <form action="{{ route('user.ticket-support.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="grid grid-cols-1 gap-5">
                                        <div class="form-box">
                                            <label for="subject" class="text-base mb-2">{{ __('Subject') }} *</label>
                                            <input type="text" name="subject" id="subject" class="form-input"
                                                value="{{ old('subject') }}" placeholder="{{ __('Enter ticket subject') }}">
                                            @error('subject')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div>
                                            <label for="support_message" class="block text-base font-medium text-gray-700 mb-2">{{ __('Your Message') }} *</label>
                                            <textarea name="message" id="support_message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                                      placeholder="{{ __('Describe your issue in detail...') }}" style="transition: none;">{{ old('message') }}</textarea>
                                            @error('message')
                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-box">
                                            <label for="documents" class="text-base mb-2">{{ __('Attachments') }}</label>
                                            <div class="form-input !h-auto !p-4">
                                                <input type="file" name="documents[]" id="documents"
                                                    class="w-full" multiple accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                                <p class="text-sm text-gray-500 mt-2">{{ __('You can upload multiple files (JPG, PNG, PDF, DOC)') }}</p>
                                            </div>
                                            @error('documents.*')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="flex justify-end flex-wrap gap-5 mt-5">
                                        <a href="{{ route('user.ticket-support.index') }}" class="">
                                            <div class="home-two-btn-bg py-3 group bg-[#FF002A0F] border-[#FF002A1A]">
                                                <span class="text-base text-[#FF002A] relative z-10">
                                                    {{ __('Cancel') }}
                                                </span>
                                            </div>
                                        </a>
                                        <button type="submit">
                                            <div class="home-two-btn-bg py-3 group bg-buisness-red border-business-red">
                                                <span class="text-base text-white group-hover:text-buisness-red font-semibold font-inter relative z-10">
                                                    {{ __('Create Ticket') }}
                                                </span>
                                                <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path class="group-hover:stroke-buisness-red transition-all duration-300"
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
