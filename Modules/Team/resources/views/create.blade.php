@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Team Member') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Create Team Member') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Project') }} >> {{ __('Create Team Member') }}</p>
@endsection

@section('body-content')
    <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
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
                                                <div class="col-12 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label
                                                                    class="crancy__item-label">{{ __('Thumbnail Image') }} *
                                                                </label>
                                                                <div
                                                                    class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="image"
                                                                        id="input-img1" autocomplete="off"
                                                                        onchange="previewImage(event)">
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
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="name" value="{{ old('name') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Slug') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="slug"
                                                            id="slug" value="{{ old('slug') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Designation') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="designation"
                                                            id="designation" value="{{ old('designation') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Personal Mail') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="mail"
                                                            id="mail" value="{{ old('mail') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Phone Number') }} *
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="phone_number"
                                                            id="phone_number" value="{{ old('phone_number') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Facebook URL') }}
                                                            *</label>
                                                        <input class="crancy__item-input" type="text" name="facebook"
                                                            id="facebook" value="{{ old('facebook') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Twitter URL') }} </label>
                                                        <input class="crancy__item-input" type="text" name="twitter"
                                                            id="twitter" value="{{ old('twitter') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('LinkedIn URL') }} </label>
                                                        <input class="crancy__item-input" type="text" name="linkedin"
                                                            id="linkedin" value="{{ old('linkedin') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Instagram URL') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text" name="instagram"
                                                            id="instagram" value="{{ old('instagram') }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <label class="crancy__item-label">{{ __('Description') }} *</label>
                                                            <button type="button" class="crancy-btn m-2" data-bs-toggle="modal" data-bs-target="#aiGenerateModal">
                                                                {{ __('Generate with AI') }}
                                                            </button>
                                                        </div>
                                                        <textarea class="crancy__item-input crancy__item-textarea summernote" name="description" id="description">{{ old('description') }}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <button class="crancy-btn mg-top-25" type="submit">{{ __('Save Data') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
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

    @include('components.admin.ai_modal', ['id' => 'aiGenerateModal', 'action' => url('admin/openai/ask'), 'target' => 'description'])

    <script src="{{ asset('global/tinymce/js/tinymce/tinymce.min.js') }}"></script>

    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {
                $("#name").on("keyup", function(e) {
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
            });
        })(jQuery);

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
