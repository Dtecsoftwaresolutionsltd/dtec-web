@extends('admin.master_layout')
@section('title')
    <title>{{ __('Shipping Method') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Shipping Method') }}</h3>
    <p class="crancy-header__text">{{ __('Dashboard') }} >> {{ __('Shipping Method') }}</p>
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
                                            <h4 class="crancy-product-card__title">{{ __('Shipping Method') }}</h4>

                                            <a href="{{ route('admin.shipping-method.create') }}" class="crancy-btn "><span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        viewBox="0 0 16 16" fill="none">
                                                        <path d="M8 1V15" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M1 8H15" stroke="white" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span> {{ __('Create New') }}</a>
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
                                                    {{ __('Status') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="crancy-table__body">
                                            @foreach ($methods as $index => $method)
                                                <tr class="odd">
                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ Str::limit($method->name, 20) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">
                                                            {{ currency($method->price) }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input onClick="manageStatus({{ $method->id }})"
                                                                    name="status" type="checkbox"
                                                                    {{ $method->status == 1 ? 'checked' : '' }}>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <div class="dropdown">
                                                            <button class="crancy-btn dropdown-toggle" type="button"
                                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                {{ __('Action') }}
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                                <li>
                                                                    <a href="{{ route('admin.shipping-method.edit', $method->id) }}"
                                                                        class=" dropdown-item"><i class="fas fa-edit"></i>
                                                                        {{ __('Edit') }}
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a onclick="itemDeleteConfrimation({{ $method->id }})"
                                                                        href="javascript:;" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal"
                                                                        class="dropdown-item"><i class="fas fa-trash"></i>
                                                                        {{ __('Delete') }}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
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
            $("#item_delect_confirmation").attr("action", '{{ url('admin/ecommerce/shipping-method/delete') }}' + "/" + id)
        }

        function manageStatus(id) {
            var appMODE = "{{ env('APP_MODE') }}"
            if (appMODE == 'DEMO') {
                toastr.error('This Is Demo Version. You Can Not Change Anything');
                return;
            }

            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/ecommerce/shipping-method/status/') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(err) {}
            })
        }
    </script>
@endpush
