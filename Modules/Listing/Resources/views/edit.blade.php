@extends('admin.master_layout')
@section('title')
<title>{{ __('Edit Service') }}</title>
@endsection

@section('body-header')
<h3 class="crancy-header__title m-0">{{ __('Edit Service') }}</h3>
<p class="crancy-header__text">{{ __('Manage Service') }} >> {{ __('Edit Service') }}</p>
@endsection

@section('body-content')
<section class="crancy-adashboard crancy-show">
    <div class="container container__bscreen">
        <div class="row">
            <div class="col-12">
                <div class="crancy-body">
                    <div class="crancy-dsinner">
                        <div class="row">
                            <div class="col-12 mg-top-30">
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
                                                    href="{{ route('admin.listings.edit', ['listing' => $listing->id, 'lang_code' => $language->lang_code]) }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<form action="{{ route('admin.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="hidden" name="lang_code" value="{{ $listing_translate->lang_code }}">
    <input type="hidden" name="translate_id" value="{{ $listing_translate->id }}">

    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Basic Information') }}</h4>
                                        </div>

                                        <div class="row">
                                            @if (admin_lang() == request()->get('lang_code'))

                                                @if($logoicon_setting->value == 'all_theme' || $logoicon_setting->value == 'creative_agency' || $logoicon_setting->value == 'digital_marketing')
                                                    <div class="col-3 mg-top-form-20">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="crancy__item-form--group w-100 h-100">
                                                                    <label
                                                                        class="crancy__item-label">{{ $logoicon_setting->value == 'all_theme' ? __('Icon') : __('Home Page Icon') }}
                                                                    </label>
                                                                    <div
                                                                        class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                        <input type="file" class="btn-check" name="thumb_image"
                                                                            id="input-img1" autocomplete="off"
                                                                            onchange="previewImage(event)">
                                                                        <label class="crancy-image-video-upload__label"
                                                                            for="input-img1">
                                                                            <img id="view_img"
                                                                                src="{{ asset($listing->thumb_image) }}">
                                                                            <h4 class="crancy-image-video-upload__title">
                                                                                {{ __('Click here to') }} <span
                                                                                    class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                {{ __('and upload') }} </h4>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            <div class="col-3 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label
                                                                class="crancy__item-label">{{ __('Thumbnail Image') }}
                                                            </label>
                                                            <div
                                                                class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check"
                                                                    name="background_image" id="input-img"
                                                                    autocomplete="off" onchange="previewImage1(event)">
                                                                <label class="crancy-image-video-upload__label"
                                                                    for="input-img">
                                                                    <img id="view_img1"
                                                                        src="{{ asset($listing->background_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">
                                                                        {{ __('Click here to') }} <span
                                                                            class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                        {{ __('and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($logoicon_setting->value == 'seo_agency')
                                                <div class="col-3 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('Home Page Icon') }}
                                                                    * </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check"
                                                                        name="home_two_image" id="home-two-img"
                                                                        autocomplete="off" onchange="previewImage3(event)">
                                                                    <label class="crancy-image-video-upload__label"
                                                                        for="home-two-img">
                                                                        <img id="view_img3"
                                                                            src="{{ $listing->theme_2_thumbnail_image ? asset($listing->theme_2_thumbnail_image) : asset($general_setting->placeholder_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">
                                                                            {{ __('Click here to') }} <span
                                                                                class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                            {{ __('and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                            @if($logoicon_setting->value == 'it_business')
                                                <div class="col-3 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('Home Page Icon') }}
                                                                    * </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check"
                                                                        name="it_business_icon" id="it-business-img"
                                                                        autocomplete="off" onchange="previewImage5(event)">
                                                                    <label class="crancy-image-video-upload__label"
                                                                        for="it-business-img">
                                                                        <img id="view_img5"
                                                                            src="{{ $listing->it_business_icon ? asset($listing->it_business_icon) : asset($general_setting->placeholder_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">
                                                                            {{ __('Click here to') }} <span
                                                                                class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                            {{ __('and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if($logoicon_setting->value == 'saas')
                                                <div class="col-3 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('Home Page Icon') }}
                                                                    * </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check"
                                                                        name="saas_icon" id="it-saas-img"
                                                                        autocomplete="off" onchange="previewImage6(event)">
                                                                    <label class="crancy-image-video-upload__label"
                                                                        for="it-saas-img">
                                                                        <img id="view_img6"
                                                                            src="{{ $listing->saas_icon ? asset($listing->saas_icon) : asset($general_setting->placeholder_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">
                                                                            {{ __('Click here to') }} <span
                                                                                class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                            {{ __('and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            <div class="col-3 mg-top-form-20">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="crancy__item-form--group w-100 h-100">
                                                            <label
                                                                class="crancy__item-label">{{ __('Inner Page Logo') }}
                                                                * </label>
                                                            <div
                                                                class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                <input type="file" class="btn-check"
                                                                    name="inner_page_logo" id="inner-page-logo"
                                                                    autocomplete="off" onchange="previewImage4(event)">
                                                                <label class="crancy-image-video-upload__label"
                                                                    for="inner-page-logo">
                                                                    <img id="view_img4"
                                                                        src="{{ $listing->theme_5_thumbnail_image ? asset($listing->theme_5_thumbnail_image) : asset($general_setting->placeholder_image) }}">
                                                                    <h4 class="crancy-image-video-upload__title">
                                                                        {{ __('Click here to') }} <span
                                                                            class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                        {{ __('and upload') }} </h4>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @endif
                                        <div class="row">
                                        <div
                                            class="{{ admin_lang() == request()->get('lang_code') ? 'col-md-6' : 'col-12' }}">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">{{ __('Title') }} * </label>
                                                <input class="crancy__item-input" type="text" name="title" id="title"
                                                    value="{{ html_decode($listing_translate->title) }}">
                                            </div>
                                        </div>


                                        @if (admin_lang() == request()->get('lang_code'))
                                            <div class="col-md-6">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('Slug') }} *
                                                    </label>
                                                    <input class="crancy__item-input" type="text" name="slug" id="slug"
                                                        value="{{ html_decode($listing->slug) }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('Category') }} *
                                                    </label>
                                                    <select class="form-select crancy__item-input" name="category_id"
                                                        id="category-select">
                                                        <option value="">{{ __('Select Category') }}
                                                        </option>
                                                        @foreach ($categories as $category)
                                                        <option
                                                            {{ $category->id == $listing->category_id ? 'selected' : '' }}
                                                            value="{{ $category->id }}">
                                                            {{ $category->translate->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        </div>


                                        <div class="col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <label class="crancy__item-label">{{ __('Short Description') }}
                                                    *</label>
                                                <textarea
                                                    class="crancy__item-input crancy__item-textarea seo_description_box"
                                                    name="short_description"
                                                    id="short_description">{{ $listing_translate->short_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="crancy__item-form--group mg-top-form-20">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="crancy__item-label">{{ __('Description') }} *</label>
                                                    <button type="button" class="crancy-btn m-2" data-bs-toggle="modal"
                                                        data-bs-target="#aiGenerateModal">
                                                        {{ __('Generate with AI') }}
                                                    </button>
                                                </div>

                                                <textarea class="crancy__item-input crancy__item-textarea summernote"
                                                    name="description"
                                                    id="description">{!! clean(html_decode($listing_translate->description)) !!}</textarea>

                                            </div>
                                        </div>

                                    </div>

                                    @if (admin_lang() != request()->get('lang_code'))
                                    <button class="crancy-btn mg-top-25" type="submit">{{ __('Update Data') }}</button>
                                    @endif

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

    @if (admin_lang() == request()->get('lang_code'))
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12">
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('SEO Information') }}
                                            </h4>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('SEO title') }}
                                                    </label>
                                                    <input class="crancy__item-input" type="text" name="seo_title"
                                                        id="seo_title" value="{{ html_decode($listing->seo_title) }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="crancy__item-form--group mg-top-form-20">
                                                    <label class="crancy__item-label">{{ __('SEO Description') }}
                                                    </label>
                                                    <textarea
                                                        class="crancy__item-input crancy__item-textarea seo_description_box"
                                                        name="seo_description"
                                                        id="seo_description">{{ html_decode($listing->seo_description) }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="crancy-btn mg-top-25"
                                            type="submit">{{ __('Update Data') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
</form>
@endsection


@push('style_section')
<link rel="stylesheet" href="{{ asset('global/tagify/tagify.css') }}">
<style>
    .tox .tox-promotion,
    .tox-statusbar__branding {
        display: none !important;
    }

</style>
@endpush

@push('js_section')
@include('components.admin.ai_modal', ['id' => 'aiGenerateModal', 'action' => url('admin/openai/ask'), 'target' =>
'description'])


<script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

<script src="{{ asset('global/tagify/tagify.js') }}"></script>

<script>
    (function ($) {
        "use strict"
        $(document).ready(function () {
            $("#title").on("keyup", function (e) {
                let inputValue = $(this).val();
                let slug = inputValue.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
                $("#slug").val(slug);
            })

            tinymce.init({
                selector: '.summernote',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ]
            });

            $('.tags').tagify();

        });
    })(jQuery);

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };

    function previewImage1(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img1');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };

    function previewImage3(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img3');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };
    function previewImage4(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img4');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };
    function previewImage5(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img5');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };
    function previewImage6(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('view_img6');
            output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
    };

</script>
@endpush
