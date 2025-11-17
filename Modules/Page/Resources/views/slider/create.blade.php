@extends('admin.master_layout')
@section('title')
    <title>{{ isset($slider) ? __('Manage Slider') : __('Slider Information') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ isset($slider) ? __('Edit Slider') : __('Add New Slider') }}
    </h3>
    <p class="crancy-header__text">{{ __('Manage Slider') }} >>
        {{ isset($slider) ? __('Edit Slider') : __('Add New Slider') }}</p>
@endsection

@section('body-content')
    <form action="{{ route('admin.slider.store', isset($slider) ? $slider->id : null) }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="lang_code" value="{{ $listing_translate->lang_code ?? '' }}">
        <input type="hidden" name="translate_id" value="{{ $listing_translate->id ?? '' }}">

        <!-- crancy Dashboard -->
        <section class="crancy-adashboard crancy-show">
            <div class="container container__bscreen">
                <div class="row">
                    <div class="col-12">
                        <div class="crancy-body">
                            <!-- Dashboard Inner -->
                            <div class="crancy-dsinner">
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Basic Information') }}</h4>
                                            </div>

                                            <div class="row">

                                                <div class="col-12 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label
                                                                    class="crancy__item-label">{{ __('Thumbnail Image') }}
                                                                    * </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="image"
                                                                        id="input-img1" autocomplete="off"
                                                                        onchange="previewImage(event)">
                                                                    <label class="crancy-image-video-upload__label"
                                                                        for="input-img1">
                                                                        <img id="view_img"
                                                                            src="{{ isset($slider) && $slider->image ? asset($slider->image) : asset($general_setting->placeholder_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">
                                                                            {{ __('Click here to') }}
                                                                            <span
                                                                                class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                            {{ __('and upload') }}
                                                                        </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                <label class="crancy__item-label">{{ __('Title') }}
                                                                    * </label>
                                                                <input class="crancy__item-input" type="text"
                                                                    name="title" id="title"
                                                                    value="{{ old('title', $slider->translate->title ?? '') }}">
                                                            </div>


                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                <label class="crancy__item-label">{{ __('Heading') }}
                                                                    *</label>
                                                                <input class="crancy__item-input" type="text"
                                                                    name="small_text" id="small_text"
                                                                    value="{{ old('small_text', $slider->translate->small_text ?? '') }}">
                                                            </div>

                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                <label
                                                                    class="crancy__item-label">{{ __('URL') }}</label>
                                                                <input class="crancy__item-input" type="text"
                                                                    name="url" id="url"
                                                                    value="{{ old('url', $slider->url ?? '') }}"
                                                                    placeholder="Ex: about-us, contact-us">
                                                            </div>
                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                <label
                                                                    class="crancy__item-label">{{ __('Button Text') }}</label>
                                                                <input class="crancy__item-input" type="text"
                                                                    name="button_text" id="button_text"
                                                                    value="{{ old('button_text', $slider->translate->button_text ?? '') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="crancy-btn mg-top-25" type="submit">
                                            {{ isset($slider) ? __('Update Data') : __('Save Data') }}
                                        </button>
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
    </form>
@endsection


@push('style_section')
    <style>
        .offer-price {
            width: auto !important;
        }
    </style>
@endpush

@push('js_section')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
