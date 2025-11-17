@extends('admin.master_layout')

@section('title')
    <title>{{ __('Add Menu Item') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Add Menu Item') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Menu') }} >> {{ __('Add Menu Item') }}</p>
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
                            <form action="{{ route('admin.menus.menu-items.store', $menu_id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Edit Menu Item') }}</h4>

                                                <a href="{{ route('admin.menus.menu-items.index', $menu_id) }}"
                                                    class="crancy-btn "><i class="fa fa-list"></i>
                                                    {{ __('Back to Menu Items') }}</a>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Title') }}
                                                            ({{ __('Default') }}) * </label>
                                                        <input
                                                            class="crancy__item-input @error('title') is-invalid @enderror"
                                                            type="text" name="title" value="{{ old('title') }}">
                                                        @error('title')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('CSS Class') }}</label>
                                                            <input type="text"
                                                                class="crancy__item-input @error('css_class') is-invalid @enderror"
                                                                id="css_class" name="css_class"
                                                                value="{{ old('css_class') }}">
                                                            @error('css_class')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Target') }}</label>
                                                            <select
                                                                class="crancy__item-select @error('target') is-invalid @enderror"
                                                                id="target" name="target" required>
                                                                <option value="_self"
                                                                    {{ old('target') == '_self' ? 'selected' : '' }}>Same
                                                                    Window</option>
                                                                <option value="_blank"
                                                                    {{ old('target') == '_blank' ? 'selected' : '' }}>New
                                                                    Window</option>
                                                                <option value="_parent"
                                                                    {{ old('target') == '_parent' ? 'selected' : '' }}>
                                                                    Parent Frame</option>
                                                                <option value="_top"
                                                                    {{ old('target') == '_top' ? 'selected' : '' }}>Top
                                                                    Frame</option>
                                                            </select>
                                                            @error('target')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label">{{ __('Parent Item') }}</label>
                                                            <select
                                                                class="crancy__item-select @error('parent_id') is-invalid @enderror"
                                                                id="parent_id" name="parent_id">
                                                                <option value="">{{ __('No Parent (Root Item)') }}
                                                                </option>
                                                                @foreach ($parentItems as $parent)
                                                                    <option value="{{ $parent->id }}"
                                                                        {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                                        {{ $parent->translated_title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('parent_id')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label">{{ __('Sort Order') }}</label>
                                                            <input type="number"
                                                                class="crancy__item-input @error('sort_order') is-invalid @enderror"
                                                                id="sort_order" name="sort_order"
                                                                value="{{ old('sort_order') }}" min="0">
                                                            @error('sort_order')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label
                                                                class="crancy__item-label">{{ __('URL / Route') }}</label>
                                                            <select
                                                                class="crancy__item-select @error('url') is-invalid @enderror"
                                                                name="url" id="url">
                                                                <option value="custom"
                                                                    {{ old('url') === 'custom' ? 'selected' : '' }}>
                                                                    {{ __('Custom URL (Manual Entry)') }}
                                                                </option>
                                                                @foreach ($frontendRoutes as $route)
                                                                    <option value="{{ $route['route'] }}"
                                                                        {{ old('url') === $route['route'] ? 'selected' : '' }}>
                                                                        {{ $route['name'] }} ({{ $route['route'] }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('url')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="crancy__item-form--group mg-top-form-20 "
                                                            id="custom_url_input">
                                                            <label
                                                                class="crancy__item-label">{{ __('Enter Custom URL') }}</label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="custom_url" value="{{ old('custom_url') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                            </label>
                                                            <div
                                                                class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                <label class="crancy__item-switch">
                                                                    <input value="1"
                                                                        {{ old('is_active', true) ? 'checked' : '' }}
                                                                        name="is_active" type="checkbox">
                                                                    <span
                                                                        class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit">{{ __('Create Menu Item') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection

@push('js_section')
    <script>
        "use strict";
        document.addEventListener('DOMContentLoaded', function() {
            const urlSelect = document.getElementById('url');
            const customUrlInput = document.getElementById('custom_url_input');

            function toggleCustomInput() {
                if (urlSelect.value === 'custom') {
                    customUrlInput.style.display = 'block';
                } else {
                    customUrlInput.style.display = 'none';
                }
            }

            urlSelect.addEventListener('change', toggleCustomInput);
            toggleCustomInput(); // initial check
        });
    </script>
@endpush
