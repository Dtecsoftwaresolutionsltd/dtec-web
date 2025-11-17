@extends('admin.master_layout')
@section('title')
    <title>{{ __('Order Details') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Order Details') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Orders') }} >> {{ __('All Orders') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <div class="ed-invoice-page-wrapper">
                                        <div class="ed-invoice-main-wrapper">
                                            <div class="ed-invoice-page">
                                                <div class="ed-inv-logo-area">
                                                    <div class="ed-main-logo">
                                                        <img src="{{ asset($general_setting->logo) }}" alt="logo"
                                                            class="ed-logo">
                                                    </div>
                                                    <div>
                                                    </div>
                                                </div>
                                                <div class="ed-inv-billing-info">
                                                    <div class="ed-inv-info">
                                                        <p class="ed-inv-info-title">{{ __('Billed To') }}</p>
                                                        <table>
                                                            <tr>
                                                                <td>{{ __('Name') }}:</td>
                                                                <td> {{ html_decode($seller->name) }} </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Phone') }}:</td>
                                                                <td>{{ html_decode($seller?->phone) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Email') }}:</td>
                                                                <td>{{ html_decode($seller?->email) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Address') }}:</td>
                                                                <td>{{ html_decode($seller->address) }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="ed-inv-more-info">
                                                        <table>


                                                            <tr>
                                                                <td>{{ __('Payment Status') }}:</td>
                                                                <td>
                                                                    <div class="d-flex justify-content-start">
                                                                        @if ($order->payment_status == \App\Constants\Status::APPROVED)
                                                                            <div class="ed-inv-paid-status ">
                                                                                <span>{{ __('Success') }}</span></div>
                                                                        @elseif ($order->payment_status == \App\Constants\Status::REJECTED)
                                                                            <div class="ed-inv-paid-status rejected">
                                                                                <span>{{ __('Rejected') }}</span>
                                                                            </div>
                                                                        @else
                                                                            <div class="ed-inv-paid-status pending ">
                                                                                <span>{{ __('Pending') }}</span>
                                                                            </div>
                                                                        @endif




                                                                    </div>
                                                                </td>


                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Invoice No') }}:</td>
                                                                <td>#{{ $order->order_id }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ __('Created at') }}:</td>
                                                                <td>{{ $order->created_at->format('d M, Y') }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td>{{ __('Gateway') }}:</td>
                                                                <td>{{ html_decode($order->payment_method) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Transaction') }}:</td>
                                                                <td>{!! clean($order->transaction_id) !!}</td>
                                                            </tr>



                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="ed-inv-table-content">

                                                    <p class="ed-inv-table-headline">{{ __('Product List') }} </p>
                                                    <div class="ed-inv-invoice-table-main-wrapper">
                                                        <div class="ed-inv-invoice-table-wrapper">
                                                            <table class="ed-inv-invoice-table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            {{ __('SN') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('Product Name') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('Quantity') }}
                                                                        </th>

                                                                        <th>
                                                                            {{ __('Price') }}
                                                                        </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($order->order_detail as $detail)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ __($detail->singleProduct->translate->name) }}
                                                                            </td>
                                                                            <td>{{ $detail->quantity }}</td>
                                                                            <td>{{ __(currency($detail->price)) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="ed-inv-billing-summary d-flex justify-content-md-between align-items-center  ">

                                                    <div>
                                                        <form action="{{ route('admin.order.updateStatus', $order->id) }}"
                                                            method="POST" class="mt-2">
                                                            @csrf
                                                            @method('PATCH')

                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                <label for="paymentMethod"
                                                                    class="form-label">{{ __('Payment Status') }}</label>
                                                                <select class="form-select crancy__item-input"
                                                                    name="payment_status">
                                                                    <option value="0"
                                                                        {{ $order->payment_status == \App\Constants\Status::PENDING ? 'selected' : '' }}>
                                                                        {{ __('Pending') }}
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $order->payment_status == \App\Constants\Status::APPROVED ? 'selected' : '' }}>
                                                                        {{ __('Approved') }}
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $order->payment_status == \App\Constants\Status::REJECTED ? 'selected' : '' }}>
                                                                        {{ __('Rejected') }}
                                                                    </option>


                                                                </select>
                                                            </div>


                                                            <div class="crancy__item-form--group">
                                                                <label for="paymentMethod"
                                                                    class="form-label">{{ __('Order Status') }}</label>
                                                                <select class="form-select crancy__item-input"
                                                                    name="order_status">
                                                                    <option value="0"
                                                                        {{ $order->order_status == 0 ? 'selected' : '' }}>
                                                                        {{ __('Pending') }}
                                                                    </option>
                                                                    <option value="3"
                                                                        {{ $order->order_status == 3 ? 'selected' : '' }}>
                                                                        {{ __('Processing') }}
                                                                    </option>
                                                                    <option value="4"
                                                                        {{ $order->order_status == 4 ? 'selected' : '' }}>
                                                                        {{ __('Shipped') }}
                                                                    </option>
                                                                    <option value="5"
                                                                        {{ $order->order_status == 5 ? 'selected' : '' }}>
                                                                        {{ __('Completed') }}
                                                                    </option>
                                                                    <option value="2"
                                                                        {{ $order->order_status == 2 ? 'selected' : '' }}>
                                                                        {{ __('Rejected') }}
                                                                    </option>


                                                                </select>
                                                            </div>


                                                            <button class="crancy-btn mg-top-25"
                                                                type="submit">{{ __('Order Update') }}</button>


                                                            <button class="crancy-btn mg-top-25 delete_danger_btn"
                                                                type="button"
                                                                onclick="itemDeleteConfrimation({{ $order->id }})"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">{{ __('Order Delete') }}</button>



                                                        </form>
                                                    </div>


                                                    <div class="ed-inv-summary-wrapper">
                                                        <table>

                                                            <tr>
                                                                <td>{{ __('Subtotal') }}:</td>
                                                                <td> <span>{{ currency($order->subtotal) }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="ed-summry-total-sparetor"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Shipping Charge') }}:</td>
                                                                <td> <span>{{ currency($order->shipping_charge) }}</span>
                                                                </td>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <div class="ed-summry-total-sparetor"></div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>{{ __('Total') }}:</td>
                                                                <td><span>{{ currency($order->total) }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>



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
@endsection

@push('js_section')
    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '{{ url('admin/order-delete/') }}' + "/" + id)
        }
    </script>
@endpush
