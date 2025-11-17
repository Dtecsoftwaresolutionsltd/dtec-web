@extends('admin.master_layout')
@section('title')
    <title>{{ __('Our Feature') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Our Feature') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Section') }} >> {{ __('Our Feature') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show language_box">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card translation_main_box">

                                        <div class="crancy-customer-filter">
                                            <div
                                                class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">
                                                        {{ __('Switch to language translation') }}</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul>
                                                @foreach ($language_list as $language)
                                                    <li><a
                                                            href="{{ route('admin.our-feature', ['lang_code' => $language->lang_code]) }}">
                                                            @if (request()->get('lang_code') == $language->lang_code)
                                                                <i class="fas fa-eye"></i>
                                                            @else
                                                                <i class="fas fa-edit"></i>
                                                            @endif

                                                            {{ $language->lang_name }}
                                                        </a></li>
                                                @endforeach
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                @php
                                                    $edited_language = $language_list
                                                        ->where('lang_code', request()->get('lang_code'))
                                                        ->first();
                                                @endphp

                                                <p>{{ __('Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-md-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.update-our-feature') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                @method('PUT')

                                <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                                <input type="hidden" name="translate_id" value="{{ $translate->id }}">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="row">
                                                <div class="col-md-6 mg-top-form-20">
                                                    @if (admin_lang() == request()->get('lang_code'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Feature one image') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="feature_icon1" id="input-img1"
                                                                            autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img1">
                                                                            <img id="view_img"
                                                                                src="{{ asset($homepage->feature_icon1) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Feature one title') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="feature_title1" id="feature_title1"
                                                            value="{{ $translate->feature_title1 }}">
                                                    </div>

                                                </div>

                                                <div class="col-md-6 mg-top-form-20">
                                                    @if (admin_lang() == request()->get('lang_code'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Feature two image') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="feature_icon2" id="input-img2"
                                                                            autocomplete="off"
                                                                            onchange="previewImage2(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img2">
                                                                            <img id="view_img2"
                                                                                src="{{ asset($homepage->feature_icon2) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Feature two title') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="feature_title2" id="feature_title2"
                                                            value="{{ $translate->feature_title2 }}">
                                                    </div>

                                                </div>

                                                <div class="col-md-6 mg-top-form-20">
                                                    @if (admin_lang() == request()->get('lang_code'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Feature three image') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="feature_icon3" id="input-img3"
                                                                            autocomplete="off"
                                                                            onchange="previewImage3(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img3">
                                                                            <img id="view_img3"
                                                                                src="{{ asset($homepage->feature_icon3) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Feature three title') }}
                                                            * </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="feature_title3" id="feature_title3"
                                                            value="{{ $translate->feature_title3 }}">
                                                    </div>

                                                </div>

                                                <div class="col-md-6 mg-top-form-20">
                                                    @if (admin_lang() == request()->get('lang_code'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Feature four image') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="feature_icon4" id="input-img4"
                                                                            autocomplete="off"
                                                                            onchange="previewImage4(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img4">
                                                                            <img id="view_img4"
                                                                                src="{{ asset($homepage->feature_icon4) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Feature four title') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="feature_title4" id="feature_title4"
                                                            value="{{ $translate->feature_title4 }}">
                                                    </div>

                                                </div>

                                                <div class="col-md-6 mg-top-form-20">
                                                    @if (admin_lang() == request()->get('lang_code'))
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Feature five image') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check"
                                                                            name="feature_icon5" id="input-img5"
                                                                            autocomplete="off"
                                                                            onchange="previewImage5(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img5">
                                                                            <img id="view_img5"
                                                                                src="{{ asset($homepage->feature_icon5) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Feature five title') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="feature_title5" id="feature_title5"
                                                            value="{{ $translate->feature_title5 }}">
                                                    </div>

                                                </div>



                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit">{{ __('Update') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>

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
            reader.onload = function() {
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage2(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img2');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage3(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img3');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage4(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img4');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage5(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img5');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
