@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit Menu') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Edit Menu') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Car') }} >> {{ __('Menu List') }} >> {{ __('Edit') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Create Menu') }}</h4>

                                                <a href="{{ route('admin.menus.index') }}" class="crancy-btn "><i
                                                        class="fa fa-list"></i> {{ __('Menu List') }}</a>
                                            </div>


                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Menu Name (Default)') }} *
                                                        </label>
                                                        <input
                                                            class="crancy__item-input @error('name') is-invalid @enderror"
                                                            type="text" name="name"
                                                            value="{{ old('name', $menu->name) }}">
                                                        @error('name')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Location') }} * </label>
                                                        <select class="form-control @error('location') is-invalid @enderror"
                                                            id="location" name="location" required>
                                                            <option value="">{{ __('Select Location') }}</option>
                                                            <option value="header"
                                                                {{ old('location', $menu->location) == 'header' ? 'selected' : '' }}>
                                                                {{ __('Header') }}
                                                            </option>
                                                            <option value="footer"
                                                                {{ old('location', $menu->location) == 'footer' ? 'selected' : '' }}>
                                                                {{ __('Footer') }}
                                                            </option>
                                                        </select>
                                                        @error('location')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Sort Order') }} * </label>
                                                        <input
                                                            class="crancy__item-input @error('namsort_ordere') is-invalid @enderror"
                                                            type="number" name="sort_order"
                                                            value="{{ old('sort_order', $menu->sort_order) }}">
                                                        @error('sort_order')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                        </label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_active" type="checkbox" id="is_active"
                                                                    name="is_active" value="1"
                                                                    {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit">{{ __('Update Menu') }}</button>

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
@endsection
