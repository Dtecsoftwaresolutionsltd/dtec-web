@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create State') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Create State') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Location') }} >> {{ __('Create State') }}</p>
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
                            <form action="{{ route('admin.state.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Create State') }}</h4>

                                                <a href="{{ route('admin.state.index') }}" class="crancy-btn "><i class="fa fa-list"></i> {{ __('State List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Country') }} * </label>
                                                        <select class="form-select crancy__item-input " name="country_id">
                                                            <option value="">{{ __('Select Country') }}</option>
                                                            @foreach ($countries as $country)
                                                                <option {{ $country->id == old('country_id') ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('State Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name" id="name">
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('Save') }}</button>

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

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
