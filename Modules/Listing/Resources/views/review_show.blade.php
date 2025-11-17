@extends('admin.master_layout')
@section('title')
    <title>{{ __('Review Detail') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Review Detail') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Service') }} >> {{ __('Review Detail') }}</p>
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
                                            <h4 class="crancy-product-card__title">{{ __('Review Detail') }}</h4>

                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 no-footer">

                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body review-detials">

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('User') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><a
                                                            href="{{ route('admin.user-show', $review->user_id) }}">
                                                            {{ html_decode($review?->user?->name) }}</a></h4>
                                                </td>
                                            </tr>


                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Product') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title"><a
                                                            href="{{ route('product.view', $review->product->slug) }}">{{ html_decode($review?->product?->translate->name) }}</a>
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Crated at') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ $review->created_at->format('d F Y') }}
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Review') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ html_decode($review->reviews) }}
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">
                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Rating') }}</h4>
                                                </td>


                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">
                                                        {{ $review->rating }} {{ __('star') }}
                                                    </h4>
                                                </td>

                                            </tr>

                                            <tr class="odd">

                                                <td class="crancy-table__column-2 crancy-table__data-2">
                                                    <h4 class="crancy-table__product-title">{{ __('Action') }}</h4>
                                                </td>

                                                <td class="crancy-table__column-2 crancy-table__data-2">

                                                    <a onclick="itemDeleteConfrimation({{ $review->id }})"
                                                        href="javascript:;" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        class="crancy-btn delete_danger_btn"><i class="fas fa-trash"></i>
                                                        {{ __('Delete') }}</a>

                                                    @if ($review->status == 'disable')
                                                        <a href="javascript:;" data-bs-toggle="modal"
                                                            data-bs-target="#reviewApproval"
                                                            class="crancy-btn approval_button"><i class="fas fa-check"></i>
                                                            {{ __('Make Approval') }}</a>
                                                    @endif


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

    <!-- Approval Confirmation Modal -->
    <div class="modal fade" id="reviewApproval" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Approval Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to approved this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.review-approval', $review->id) }}" class="delet_modal_form"
                        method="POST">
                        @csrf
                        @method('PUT')

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
            $("#item_delect_confirmation").attr("action", '{{ url('admin/listing/review-delete/') }}' + "/" + id)
        }
    </script>
@endpush
