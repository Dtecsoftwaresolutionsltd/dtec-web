@extends('inner_layout')

@section('title')
    <title>{{ __('Support Ticket') }}</title>
@endsection

@section('frontend_content')
    <main>
        <!-- breadcrumb -->
       <x-breadcrumb name="{{ __('Support Tickets') }}" />
        <!-- breadcrumb-ends -->

        <!-- dashboard-starts -->
        <section class="dashboard py-20">
            <div class="theme-container mx-auto">
                <div class="flex flex-col xl:flex-row gap-30">
                    <!-- dashboard-sidebar -->
                    @include('user.sidebar')
                    <!-- dashboard-main -->
                    <div class="dashboard-main w-full flex-1 max-w-[982px]">
                        <div class="p-6 rounded-[10px] bg-white " data-aos="fade-up">

                            <div class="flex justify-between items-center mb-5">
                                <h4 class="text-18 font-semibold bg-buisness-gray rounded-lg py-5 px-30">
                                    {{ __('Support Tickets') }}</h4>
                                <a href="{{ route('user.ticket-support.create') }}" class="home-two-btn-bg py-3 group bg-white border-gray-300 hover:border-main-black">
                                    <span class="text-base text-main-black group-hover:text-main-black font-semibold font-inter relative z-10">
                                        {{ __('New Ticket') }}
                                    </span>
                                    <svg class="relative z-10" width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-main-black transition-all duration-300"
                                            d="M1.10254 10.5L4.89543 6.70711C5.22877 6.37377 5.39543 6.20711 5.39543 6C5.39543 5.79289 5.22877 5.62623 4.89543 5.29289L1.10254 1.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="mt-5">
                                @if($support_tickets->count() > 0)
                                    <div class="border border-[#E0E1E1] rounded-lg overflow-hidden w-full overflow-x-auto">
                                        <table class="min-w-full divide-y divide-[#E0E1E1]">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Serial') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Subject') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Ticket ID') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Status') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start text-nowrap">{{ __('Unseen Messages') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Created') }}</th>
                                                    <th scope="col" class="p-4 px-30 bg-gray-50 text-start">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-[#E0E1E1]">
                                                @foreach ($support_tickets as $index => $support_ticket)
                                                    <tr class="bg-white transition-all">
                                                        <td class="px-30 py-3.5 text-start">{{ ++$index }}</td>
                                                        <td class="px-30 py-3.5 text-start">
                                                            <div class="text-16 text-nowrap font-medium">{{ html_decode($support_ticket->subject) }}</div>
                                                        </td>
                                                        <td class="px-30 py-3.5 text-start">
                                                            <span class="text-16 text-nowrap text-paragraph">#{{ $support_ticket->ticket_id }}</span>
                                                        </td>
                                                        <td class="px-30 py-3.5 text-start">
                                                            @if ($support_ticket->status == 'open')
                                                                <span class="status status-success text-base py-1">{{ __('Open') }}</span>
                                                            @elseif ($support_ticket->status == 'in_progress')
                                                                <span class="inline-flex px-2 py-1 text-16 text-nowrap font-medium rounded-full bg-yellow-100 text-yellow-800">{{ __('In Progress') }}</span>
                                                            @elseif ($support_ticket->status == 'resolved')
                                                                <span class="inline-flex px-2 py-1 text-16 text-nowrap font-medium rounded-full bg-blue-100 text-blue-800">{{ __('Resolved') }}</span>
                                                            @else
                                                                <span class="status status-canceled text-base">{{ __('Closed') }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="x-30 py-3.5 text-center">
                                                            @php
                                                                $unseen_count = $support_ticket->getUnseenMessagesForUserCount();
                                                            @endphp
                                                            @if ($unseen_count > 0)
                                                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800 justify-center items-center">{{ $unseen_count }}</span>
                                                            @else
                                                                <span class="text-gray-400 justify-center items-center">{{ __('None') }}</span>
                                                            @endif
                                                        </td>
                                                        <td class="px-30 py-3.5 text-start text-nowrap text-gray-500">
                                                            {{ $support_ticket->created_at->format('M d, Y') }}
                                                        </td>
                                                        <td class="px-30 py-3.5 text-start">
                                                            <a href="{{ route('user.ticket-support.show', $support_ticket->ticket_id) }}"
                                                               class="home-two-btn-bg py-3 group bg-black border-black">
                                                                <span class="text-sm font-medium text-white group-hover:text-black transition-all duration-300 font-inter relative z-10">{{ __('View') }}</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center py-12">
                                        <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">{{ __('No Support Tickets') }}</h3>
                                        <p class="text-gray-500 mb-6">{{ __('You haven\'t created any support tickets yet.') }}</p>
                                        <a href="{{ route('user.ticket-support.create') }}" class="home-two-btn-bg py-3 px-6 group bg-main-black border-main-black text-white rounded-lg hover:bg-white  hover:text-main-black transition-all duration-300">
                                            <span class="text-base font-medium">{{ __('Create Your First Ticket') }}</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- dashboard-end -->
    </main>
@endsection
