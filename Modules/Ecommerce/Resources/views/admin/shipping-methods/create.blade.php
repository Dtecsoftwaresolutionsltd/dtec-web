@extends('admin.master_layout')
@section('title')
    <title>{{ isset($method) ? __('Edit Shipping Method') : __('Add New Shipping Method') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">
        {{ isset($method) ? __('Edit Shipping Method') : __('Add New Shipping Method') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Shipping Method') }} >>
        {{ isset($method) ? __('Edit Shipping Method') : __('Add New Shipping Method') }}</p>
@endsection

@section('body-content')
    <form action="{{ route('admin.shipping-method.store', isset($method) ? $method->id : null) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">
                    <div class="col-12">
                        <div class="crancy-body">
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Basic Information') }}</h4>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Name') }} *</label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="Name" value="{{ old('name', $method->name ?? '') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Price') }} *</label>
                                                        <div class="input-group">
                                                            <input class="crancy__item-input form-control offer-price"
                                                                type="number" name="price" id="price"
                                                                value="{{ old('price', $method->price ?? '') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="crancy-btn mg-top-25" type="submit">
                                            {{ isset($method) ? __('Update Data') : __('Save Data') }}
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
