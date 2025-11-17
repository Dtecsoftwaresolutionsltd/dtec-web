@extends('admin.master_layout')
@section('title')
    <title>{{ __('Support Ticket') }}</title>
@endsection

@section('body-header')
    <h3 class='crancy-header__title m-0'>{{ __('Support Ticket') }}</h3>
    <p class='crancy-header__text'>{{ __('Dashboard') }} >> {{ __('Support Ticket') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3 mg-top-30">

                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class='crancy-product-card__title'>{{ __('Support Ticket') }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer"
                                        id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('User') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Subject') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Ticket Id') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Status') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Unseen Messages') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @foreach ($support_tickets as $index => $support_ticket)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $support_ticket->user->name ?? 'N/A' }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ html_decode($support_ticket->subject) }}
                                                        </h4>
                                                    </td>



                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            #{{ $support_ticket->ticket_id }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @if ($support_ticket->status == 'open')
                                                            <span
                                                                class="badge bg-success text-white">{{ __('Open') }}</span>
                                                        @elseif ($support_ticket->status == 'in_progress')
                                                            <span
                                                                class="badge bg-warning text-white">{{ __('In Progress') }}</span>
                                                        @elseif ($support_ticket->status == 'resolved')
                                                            <span
                                                                class="badge bg-info text-white">{{ __('Resolved') }}</span>
                                                        @else
                                                            <span
                                                                class="badge bg-danger text-white">{{ __('Closed') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        @php
                                                            $unseen_count = $support_ticket->getUnseenMessagesForAdminCount();
                                                        @endphp
                                                        @if ($unseen_count > 0)
                                                            <span class="badge bg-danger text-white items-center justify-center">{{ $unseen_count }}</span>
                                                        @else
                                                            <span class="text-muted items-center justify-center">{{ __('None') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <a href="{{ route('admin.support-ticket', $support_ticket->id) }}"
                                                            class="crancy-btn"><i
                                                                class="far fa-message"></i>{{ __('View') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                        <!-- End crancy Table Body -->
                                    </table>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('js_section')
    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '{{ url('admin/support-ticket-delete/') }}' + "/" + id)
        }
    </script>
@endpush
