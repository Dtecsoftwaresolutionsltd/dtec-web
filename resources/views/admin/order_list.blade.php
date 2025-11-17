@extends('admin.master_layout')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ $title }}</h3>
    <p class="crancy-header__text">{{ __('Dashboard') }} >> {{ $title }}</p>
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
                                            <h4 class="crancy-product-card__title">{{ $title }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <table class="crancy-table__main crancy-table__main-v3 dataTable no-footer"
                                        id="dataTable">
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Price') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Payment Method') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Payment Status') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @foreach ($orders as $index => $order)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            <br>
                                                            {{ $order->user->name }}
                                                        </h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($order->total, 2) }}</h4>
                                                    </td>


                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ $order->payment_method }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        @if ($order->payment_status == App\Constants\Status::ENABLE)
                                                            <span class="badge bg-success">{{ __('Success') }}</span>
                                                        @elseif ($order->payment_status == App\Constants\Status::PENDING)
                                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Rejected') }}</span>
                                                        @endif
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        @if ($order->order_status == App\Constants\Status::APPROVED)
                                                            <span class="badge bg-success">{{ __('Completed') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::PROCESSING)
                                                            <span class="badge bg-success">{{ __('Processing') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::SHIPPED)
                                                            <span class="badge bg-success">{{ __('Shipped') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::COMPLETED)
                                                            <span class="badge bg-success">{{ __('Completed') }}</span>
                                                        @elseif ($order->order_status == App\Constants\Status::REJECTED)
                                                            <span class="badge bg-warning">{{ __('Rejected') }}</span>
                                                        @else
                                                            <span class="badge bg-danger">{{ __('Pending') }}</span>
                                                        @endif

                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                        <a href="{{ route('admin.order', $order->order_id) }}"
                                                            class="crancy-btn"><i class="fas fa-eye"></i>
                                                            {{ __('View') }}</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
