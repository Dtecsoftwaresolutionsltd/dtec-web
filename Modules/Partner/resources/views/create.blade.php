@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Partner') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Create Partner') }}</h3>
    <p class="crancy-header__text">{{ __('Our Partner') }} >> {{ __('Create Partner') }}</p>
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
                            <form action="{{ route('admin.partner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Create Partner') }}</h4>

                                                <a href="{{ route('admin.partner.index') }}" class="crancy-btn "><i
                                                        class="fa fa-list"></i> {{ __('Partner List') }}</a>
                                            </div>


                                            <div class="row mg-top-30">

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('Image') }} *
                                                                </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" data-target="view_img"
                                                                        class="btn-check" name="logo" id="input-img1"
                                                                        autocomplete="off" onchange="previewImage(event)">
                                                                    <label class="crancy-image-video-upload__label"
                                                                        for="input-img1">
                                                                        <img id="view_img"
                                                                            src="{{ asset($general_setting->placeholder_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">
                                                                            {{ __('Click here to') }} <span
                                                                                class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                            {{ __('and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($theme_setting->value == 'creative_agency')
                                                            <div class="col-md-3">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Home Three Icon') }}
                                                                        * </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" data-target="view_img1"
                                                                            class="btn-check" name="home_three_icon"
                                                                            id="input-img2" autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img2">
                                                                            <img id="view_img1"
                                                                                src="{{ asset($general_setting->placeholder_image) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($theme_setting->value == 'ai_software')
                                                            <div class="col-md-3">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Home Four Icon') }}
                                                                        * </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" data-target="view_img2"
                                                                            class="btn-check" name="home_four_icon"
                                                                            id="input-img3" autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img3">
                                                                            <img id="view_img2"
                                                                                src="{{ asset($general_setting->placeholder_image) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($theme_setting->value == 'it_business')
                                                            <div class="col-md-3">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ __('Home Six Icon') }}
                                                                        * </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" data-target="view_img3"
                                                                            class="btn-check" name="home_six_icon"
                                                                            id="input-img4" autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img4">
                                                                            <img id="view_img3"
                                                                                src="{{ asset($general_setting->placeholder_image) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif

                                                    </div>

                                                </div>


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Link') }} </label>
                                                        <input class="crancy__item-input" type="text" name="link"
                                                            id="link">
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
    <script>
        "use strict"

        function previewImage(event) {
            const file = event.target.files[0];
            const targetId = event.target.getAttribute('data-target');
            const output = document.getElementById(targetId);

            const reader = new FileReader();
            reader.onload = function(e) {
                output.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    </script>
@endpush
