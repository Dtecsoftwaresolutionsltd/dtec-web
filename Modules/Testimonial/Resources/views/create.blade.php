@extends('admin.master_layout')
@section('title')
    <title>{{ __('Create Testimonial') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Create Testimonial') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Section') }} >> {{ __('Create Testimonial') }}</p>
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
                            <form action="{{ route('admin.testimonial.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Create Testimonial') }}</h4>

                                                <a href="{{ route('admin.testimonial.index') }}" class="crancy-btn "><i
                                                        class="fa fa-list"></i> {{ __('Testimonial List') }}</a>
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

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="name" placeholder="ex: John Doe">
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Designation') }} *
                                                            </label>
                                                            <input class="crancy__item-input" type="text"
                                                                name="designation" id="designation"
                                                                placeholder="ex: CEO, CTO ">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Rating') }} *
                                                            </label>
                                                            <input class="crancy__item-input" type="text" name="rating"
                                                                id="rating" placeholder="Rate between 1 to 5">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <label class="crancy__item-label">{{ __('Comment') }} * </label>
                                                            <button type="button" class="crancy-btn m-2" data-bs-toggle="modal" data-bs-target="#aiGenerateModal">
                                                                {{ __('Generate with AI') }}
                                                            </button>
                                                        </div>
                                                        <textarea class="crancy__item-input crancy__item-textarea" name="comment" id="comment">{{ old('comment') }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                        </label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="status" type="checkbox">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
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

    @include('components.admin.ai_modal', ['id' => 'aiGenerateModal', 'action' => url('admin/openai/ask'), 'target' => 'description'])

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
