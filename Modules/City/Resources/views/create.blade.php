@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create City') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Create City') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Location') }} >> {{ __('Create City') }}</p>
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
                            <form action="{{ route('admin.city.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Create City') }}</h4>

                                                <a href="{{ route('admin.city.index') }}" class="crancy-btn "><i
                                                        class="fa fa-list"></i> {{ __('City List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Country') }} * </label>
                                                        <select class="form-select crancy__item-input " name="state_id"
                                                            id="state_id" required>
                                                            <option value="">{{ __('Select State') }}</option>
                                                            @foreach ($states as $state)
                                                                <option
                                                                    {{ $state->id == old('state_id') ? 'selected' : '' }}
                                                                    value="{{ $state->id }}">{{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('City Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="name" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit">{{ __('Save') }}</button>

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
@endpush
