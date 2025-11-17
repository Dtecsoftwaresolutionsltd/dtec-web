@extends('admin.master_layout')
@section('title')
    <title>{{ __('Menu List') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Menu List') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Menu') }} >> {{ __('Menu List') }}</p>
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
                                    <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Menu List') }}</h4>

                                            <a href="{{ route('admin.menus.create') }}" class="crancy-btn "><span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                                    <path d="M8 1V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M1 8H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                </span> {{ __('Create New') }}</a>
                                        </div>
                                    </div>
                                </div>

                                <!-- crancy Table -->
                                <div id="crancy-table__main_wrapper" class=" dt-bootstrap5 no-footer">

                                    <table class="crancy-table__main crancy-table__main-v3 no-footer" id="dataTable">
                                        <!-- crancy Table Head -->
                                        <thead class="crancy-table__head">
                                            <tr>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Serial') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Name') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Location') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Status') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Sort Order') }}
                                                </th>

                                                <th class="crancy-table__column-2 crancy-table__h2 sorting">
                                                    {{ __('Items Count') }}
                                                </th>

                                                <th class="crancy-table__column-3 crancy-table__h3 sorting">
                                                    {{ __('Action') }}
                                                </th>

                                            </tr>
                                        </thead>
                                        <!-- crancy Table Body -->
                                        <tbody class="crancy-table__body">
                                            @forelse($menus as $index => $menu)
                                                <tr class="odd">

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ ++$index }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $menu->translated_name }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <span class="badge bg-info text-white">{{ ucfirst($menu->location) }}</span>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input toggle-status"
                                                                   id="status_{{ $menu->id }}"
                                                                   data-url="{{ route('admin.menus.toggle-status', $menu) }}"
                                                                   {{ $menu->is_active ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="status_{{ $menu->id }}"></label>
                                                        </div>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $menu->sort_order }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">
                                                        <h4 class="crancy-table__product-title">{{ $menu->menuItems->count() }}</h4>
                                                    </td>

                                                    <td class="crancy-table__column-2 crancy-table__data-2">

                                                            <a href="{{ route('admin.menus.edit', $menu) }}"
                                                               class="crancy-btn" title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.menus.menu-items.index', $menu) }}"
                                                               class="crancy-btn" title="Manage Items">
                                                                <i class="fas fa-list"></i>
                                                            </a>
                                                            <a onclick="itemDeleteConfrimation({{ $menu->id }})" href="javascript:;"
                                                               data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                               class="crancy-btn delete_danger_btn" title="Delete">
                                                                <i class="fas fa-trash"></i>
                                                            </a>

                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">{{ __('No data found') }}</td>
                                                </tr>
                                            @endforelse

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

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
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
        function itemDeleteConfrimation(id){
            $("#item_delect_confirmation").attr("action",'{{ url("admin/menus/") }}'+"/"+id)
        }

        $(document).ready(function() {
            $('.toggle-status').change(function() {
                const url = $(this).data('url');
                const checked = $(this).is(':checked');
                const $checkbox = $(this);

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success('{{ __("Status updated successfully") }}');
                        } else {
                            toastr.error('{{ __("Failed to update status") }}');
                            // Revert the checkbox
                            $checkbox.prop('checked', !checked);
                        }
                    },
                    error: function() {
                        toastr.error('{{ __("Failed to update status") }}');
                        // Revert the checkbox
                        $checkbox.prop('checked', !checked);
                    }
                });
            });
        });
    </script>
@endpush
