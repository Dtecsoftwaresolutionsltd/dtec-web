@extends('admin.master_layout')
@section('title')
    <title>{{ __('Purchase History') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Purchase History') }}</h3>
    <p class="crancy-header__text">{{ __('Subscription Plan') }} >> {{ __('Purchase History') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
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
                                            <h4 class="crancy-product-card__title">{{ __('Purchase History') }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer">

                                        <tbody class="crancy-table__body review-detials   plan-details">

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Order ID') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $history->order_id }}</h4>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Transaction') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $history->transaction }}</h4>
                                                </td>
                                            </tr>
                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('User Name') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $history?->user?->name }}
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Plan') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ $history->plan_name }}</h4>
                                                </td>

                                            </tr>

                                            @if($history->plan_info)
                                                @php
                                                    $planInfo = json_decode($history->plan_info, true);
                                                    $planData = $planInfo[0] ?? null;
                                                @endphp
                                                @if($planData)
                                                    @if($planData['short_description'])
                                                        <tr class="odd">
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <h4 class="crancy-table__product-title">{{ __('Description') }}</h4>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <h4 class="crancy-table__product-title">{{ __($planData['short_description']) }}</h4>
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if($planData['features'])
                                                        <tr class="odd">
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                <h4 class="crancy-table__product-title">{{ __('Features') }}</h4>
                                                            </td>
                                                            <td class="crancy-table__column-2 crancy-table__data-2">
                                                                @php
                                                                    $features = explode("\r\n", $planData['features']);
                                                                @endphp
                                                                <ul style="list-style-type: disc; padding-left: 1.5em;">
                                                                    @foreach($features as $feature)
                                                                        @if(trim($feature))
                                                                            <li>{{ __(trim($feature)) }}</li>
                                                                        @endif
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endif
                                            @endif

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Expiration') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ ucfirst($history->expiration) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Price') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ currency($history->plan_price) }}</h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Expiration Date') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        @if ($history->expiration == 'lifetime')
                                                            {{ __('Lifetime') }}
                                                        @elseif ($history->status == 'pending')
                                                            {{ __('N/A') }}
                                                        @elseif (!empty($history->expiration_date))
                                                            {{ \Carbon\Carbon::parse($history->expiration_date)->format('Y-m-d') }}
                                                        @else
                                                            {{ __('N/A') }}
                                                        @endif
                                                    </h4>
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Remaining day') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if ($history->status == 'active')
                                                        @if ($history->expiration_date == 'lifetime')
                                                            {{ __('Lifetime') }}
                                                        @else
                                                            @php
                                                                $startDate = \Carbon\Carbon::parse($history->created_at)->startOfDay();
                                                                $endDate = \Carbon\Carbon::parse($history->expiration_date)->startOfDay();
                                                                $remaining = $startDate->diffInDays($endDate, false);
                                                            @endphp

                                                            @if ($remaining > 0)
                                                                {{ $remaining }} {{ __('Days') }}
                                                            @else
                                                                {{ __('Expired') }}
                                                            @endif
                                                        @endif
                                                    @elseif ($history->status == 'pending')
                                                        {{ __('N/A') }}
                                                    @else
                                                        {{ __('Expired') }}
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Subscription Status') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if ($history->status == 'active')
                                                        @if ($history->expiration_date == 'lifetime')
                                                            <div class="badge bg-success">{{ __('Active') }}</div>
                                                        @else
                                                            @if (date('Y-m-d') <= $history->expiration_date)
                                                                <div class="badge bg-success">{{ __('Active') }}</div>
                                                            @else
                                                                <div class="badge bg-danger">{{ __('Expired') }}</div>
                                                            @endif
                                                        @endif
                                                    @elseif ($history->status == 'pending')
                                                        <div class="badge bg-danger">{{ __('Pending') }}</div>
                                                    @elseif ($history->status == 'expired')
                                                        <div class="badge bg-danger">{{ __('Expired') }}</div>
                                                    @elseif ($history->status == 'inactive')
                                                        <div class="badge bg-danger">{{ __('Inactive') }}</div>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Payment Status') }}</h4>
                                                </td>
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if ($history->payment_status == 'success')
                                                        <div class="badge bg-success">{{ __('Success') }}</div>
                                                    @else
                                                        <div class="badge bg-danger">{{ __('Pending') }}</div>
                                                    @endif
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Payment Method') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    {{ $history->payment_method }}
                                                </td>
                                            </tr>


                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Transaction') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    {!! clean($history->transaction) !!}
                                                </td>
                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Action') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    @if ($history->payment_status == 'pending')
                                                        <a href="javascript:;" class="crancy-btn" data-bs-toggle="modal"
                                                            data-bs-target="#paymentApproval">{{ __('Payment Approval') }}</a>
                                                    @endif
                                                    <a onclick="itemDeleteConfrimation({{ $history->id }})"
                                                        href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i>
                                                        {{ __('Delete') }}</a>
                                                </td>
                                            </tr>
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
    <!-- End crancy Dashboard -->


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to delete this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- payment approval --}}

    <div class="modal fade" id="paymentApproval" tabindex="-1" aria-labelledby="paymentApproval" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentApproval">{{ __('Payment Approval') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to approved this payment?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.purchase-history-payment-approved', $history->id) }}"
                        id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Approved') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js_section')
    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '{{ url('admin/purchase-history-destroy/') }}' + "/" + id)
        }
    </script>
@endpush
