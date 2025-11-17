@extends('inner_layout')

@section('title')
    <title>{{ __('Ticket Details') }}</title>
@endsection

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
        <section id="h1-breadcrumb">
            <div class="h1-breadcrumb w-full h-fit overflow-hidden relative bg-main-gray pb-16 md:pb-24">
                <!-- <div class="win-grid win-grid-bg w-full h-full absolute left-0 top-0 z-0" id="win-grid"></div> -->
                <div class="absolute left-0 w-full h-full top-0 overflow-hidden z-0 pointer-events-none">
                    <img src="{{ asset(breadcrumb_image()) }}" alt="" class="w-full h-full object-cover" />
                </div>
                <div class="theme-container mx-auto h-fit  relative z-20">
                    <div class="mt-[120px] md:mt-[272px] w-full  relative z-10">
                        <div class="flex gap-5 items-center ">
                            <a href="{{ route('user.dashboard') }}"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Dashboard') }}
                            </a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a href="{{ route('user.ticket-support.index') }}"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Support Ticket') }}
                            </a>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 6L1 11" stroke="white" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <a href="#"
                                class="home-two-nav-item leading-5 relative text-18 font-inter before:border-buisness-red text-white transition-all duration-300 hover:text-buisness-red">
                                {{ __('Ticket Details') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

                            <div class="flex justify-between items-center mb-5">
                                <h4
                                    class="text-18 font-semibold bg-buisness-gray border border-[#E0E1E1] rounded-lg py-5 px-30">
                                    {{ __('Ticket Details') }} - #{{ $support_ticket->ticket_id }}
                                </h4>
                                <a href="{{ route('user.ticket-support.index') }}"
                                    class="home-two-btn-bg py-3 group bg-main-black border-main-black">
                                    <span
                                        class="text-base text-white group-hover:text-main-black font-semibold font-inter relative z-10">
                                        {{ __('Back to Tickets') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path class="group-hover:stroke-main-black transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="white" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Messages Section -->
                                <div class="lg:col-span-2">

                                    <div class=" ">
                                        <div class="bg-buisness-gray p-6 rounded-lg ">
                                            <h5 class="text-lg font-semibold mb-4">{{ __('Conversation') }}</h5>
                                            <div
                                                class="space-y-3 max-h-[calc(100vh-200px)] sm:max-h-[calc(100vh-500px)] overflow-y-auto h-full ">
                                                @foreach ($ticket_messages as $ticket_message)
                                                    <div
                                                        class="flex {{ $ticket_message->send_by == 'user' ? 'justify-end' : 'justify-start' }}">
                                                        <div class="max-w-xs w-full lg:max-w-md">
                                                            <div
                                                                class="overflow-hidden bg-white rounded-lg p-4 shadow-sm border mt-2 {{ $ticket_message->send_by == 'user' ? 'bg-buisness-gray border-[#E0E1E1]' : 'bg-buisness-gray border-[#E0E1E1]' }}">
                                                                <div class="text-16 text-paragraph mb-2">
                                                                    {!! clean(nl2br(html_decode($ticket_message->message))) !!}
                                                                </div>
                                                                <div class="text-xs text-gray-500">
                                                                    {{ $ticket_message->created_at->diffForHumans() }}
                                                                </div>
                                                                @if ($ticket_message->documents && $ticket_message->documents->count() > 0)
                                                                    <div class="mt-3 space-y-2">
                                                                        @foreach ($ticket_message->documents as $document) <div
                                                                            class="flex items-center gap-2 p-2  rounded">
                                                                            <svg class="w-4 h-4 text-gray-600" fill="none"
                                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                                                                </path>
                                                                            </svg>
                                                                            <a href="{{ route('download-file', $document->file_name) }}"
                                                                                class="text-sm text-blue-600 hover:text-blue-800 underline">
                                                                                {{ __('Download') }} </a>
                                                                        </div> @endforeach
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if ($support_ticket->status == 'open')
                                            <div class="mt-6 pt-6 bg-buisness-gray p-6 rounded-lg ">
                                                <form action="{{ route('user.ticket-support-message', $support_ticket->id) }}"
                                                    method="POST" enctype="multipart/form-data"> @csrf <div class="space-y-4">
                                                        <div>
                                                            <label for="message"
                                                                class="block text-sm font-medium text-gray-700 mb-2">{{ __('Your Message') }}
                                                                *
                                                            </label>
                                                            <textarea name="message" id="message" rows="4"
                                                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-0 focus:ring-main-black focus:border-main-black"
                                                                placeholder="{{ __('Type your message here...') }}">{{ old('message') }}
                                                                                            </textarea>
                                                            @error('message')
                                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div>
                                                            <label for="documents"
                                                                class="block text-sm font-medium text-gray-700 mb-2">{{ __('Attachments') }}
                                                            </label>
                                                            <input type="file" name="documents[]" id="documents" multiple
                                                                class="w-full px-3 py-2 "
                                                                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                                            <p class="text-xs text-gray-500 mt-1">
                                                                {{ __('You can upload multiple files (JPG, PNG, PDF, DOC)') }}
                                                            </p>
                                                            @error('documents.*')
                                                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="flex mt-2"> <button type="submit"
                                                                class="home-two-btn-bg py-3 group bg-main-black border-main-black">
                                                                <span
                                                                    class="text-base font-medium text-white group-hover:text-main-black font-inter relative z-10">{{ __('Send Message') }}</span>
                                                            </button> </div>
                                                    </div>
                                                </form>
                                            </div>
                                        @else
                                            <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                                                <p class="text-yellow-800 text-sm">
                                                    {{ __('This ticket is closed. You cannot send new messages.') }}
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Ticket Info Sidebar -->
                                <div class="lg:col-span-1">
                                    <div class="bg-gray-50 rounded-lg p-6">
                                        <h5 class="text-lg font-semibold mb-2">{{ __('Ticket Information') }}</h5>

                                        <div class="space-y-4">
                                            <div>
                                                <label class="text-sm font-medium text-gray-600">{{ __('Ticket ID') }}:
                                                    <b>#{{ $support_ticket->ticket_id }}</b></label>
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-600">{{ __('Subject') }}:
                                                    <b>{{ html_decode($support_ticket->subject) }}</b></label>
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-600">
                                                    {{ __('Status') }}:
                                                    @if ($support_ticket->status == 'open')
                                                        <span
                                                            class="inline-flex px-2 py-1 text-xs font-bold rounded-full bg-orange text-white">
                                                            <b>{{ __('Open') }}</b>
                                                        </span>
                                                    @elseif ($support_ticket->status == 'in_progress')
                                                        <span
                                                            class="inline-flex px-2 py-1 text-xs font-bold rounded-full bg-orange text-white">
                                                            <b>{{ __('In Progress') }}</b>
                                                        </span>
                                                    @elseif ($support_ticket->status == 'resolved')
                                                        <span
                                                            class="inline-flex px-2 py-1 text-xs font-bold rounded-full bg-orange text-white">
                                                            <b>{{ __('Resolved') }}</b>
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex px-2 py-1 text-xs font-bold rounded-full bg-red-100 text-red-800">
                                                            <b>{{ __('Closed') }}</b>
                                                        </span>
                                                    @endif
                                                </label>
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-600">{{ __('Created') }}:
                                                    <b>{{ $support_ticket->created_at->format('M d, Y h:i A') }}</b></label>
                                            </div>

                                            <div>
                                                <label class="text-sm font-medium text-gray-600">{{ __('Last Response') }}:
                                                    <b>{{ $last_message ? $last_message->created_at->diffForHumans() : __('No messages yet') }}</b></label>
                                            </div>
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