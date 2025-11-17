@extends('admin.master_layout')
@section('title')
    <title>{{ $pageTitle }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ $pageTitle }}</h3>
    <p class="crancy-header__text">{{ __('Frontend Management') }} >> {{ $pageTitle }}</p>
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
                                                            href="{{ route('admin.front-end.section', ['id' => $key, 'lang_code' => $language->lang_code]) }}">
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

    <!-- End crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <div class="crancy-product-card mg-top-30">
                                @php
                                    function renderFormFields($content, $dataValues, $parentKey = '')
                                    {
                                        // Fields to skip
                                        $skipFields = ['builder', 'name', 'images', 'type'];

                                        foreach ($content as $field => $value) {
                                            if (in_array($field, $skipFields)) {
                                                continue;
                                            }

                                            // Handle nested structures
                                            if (is_array($value) && !isset($value['type'])) {
                                                echo '<div class="nested-section mt-4">';
                                                echo '<div class="nested-header">';
                                                echo '<h5 class="mb-3">' .
                                                    str_replace('_', ' ', ucfirst($field)) .
                                                    '</h5>';
                                                echo '</div>';
                                                echo '<div class="nested-content">';

                                                $newParentKey = $parentKey ? "{$parentKey}[{$field}]" : $field;
                                                renderFormFields($value, $dataValues[$field] ?? [], $newParentKey);

                                                echo '</div>';
                                                echo '</div>';
                                            } else {
                                                // Handle input fields for leaf nodes
                                                $fieldName = $parentKey ? "{$parentKey}[{$field}]" : $field;
                                                $fieldValue = $dataValues[$field] ?? '';

                                                Log::info($fieldValue);
                                                echo '<div class="crancy__item-form--group mt-3">';
                                                echo '<label class="crancy__item-label">';
                                                echo '<span class="label-text">' .
                                                    str_replace('_', ' ', ucfirst($field)) .
                                                    '</span>';
                                                echo '</label>';
                                                echo '<input type="text" name="' .
                                                    $fieldName .
                                                    '" class="crancy__item-input" value="' .
                                                    html_decode($fieldValue ?? '') .
                                                    '">';
                                                echo '</div>';
                                            }
                                        }
                                    }
                                @endphp

                                <form
                                    action="{{ route('admin.front-end.store', ['key' => $key, 'id' => $frontend->id ?? null]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="type" value="{{ $contentType }}">
                                    <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">

                                    <div class="row">
                                        @if ($lang_code === 'en' && isset($content['images']) && count($content['images']) > 0)
                                            <div class="col-md-3 pr-md-4">
                                                @foreach ($content['images'] as $imageKey => $imageDetails)
                                                    @php
                                                        $existingImagePath = $dataValues['images'][$imageKey] ?? null;
                                                    @endphp

                                                    <div
                                                        class="crancy__item-form--group @if (!$loop->first) mg-top-25 @endif w-100">
                                                        <label for="{{ $imageKey }}">
                                                            {{ str_replace('_', ' ', ucfirst($imageKey)) }}
                                                            @if (isset($imageDetails['size']))
                                                                <span data-toggle="tooltip" data-placement="top"
                                                                    class="fa fa-info-circle text--primary"
                                                                    title="{{ __('Recommended image size') }}: {{ $imageDetails['size'] }}">
                                                                </span>
                                                            @endif
                                                        </label>

                                                        <div
                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                            <input type="file" id="{{ $imageKey }}"
                                                                name="{{ $imageKey }}" class="custom-file-input d-none"
                                                                accept="image/jpeg,image/png,image/gif,image/webp"
                                                                onchange="previewImage(event, '{{ $imageKey }}')">

                                                            <label class="crancy-image-video-upload__label"
                                                                for="{{ $imageKey }}">
                                                                <img id="view_img_{{ $imageKey }}"
                                                                    src="{{ $existingImagePath ? asset($existingImagePath) : asset($general_setting->placeholder_image) }}"
                                                                    alt="{{ $imageKey }}">
                                                                <h4 class="crancy-image-video-upload__title">
                                                                    {{ __('Click here to') }}
                                                                    <span
                                                                        class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                    {{ __('and upload') }}
                                                                </h4>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        {{-- Content Section --}}
                                        <div
                                            class="{{ $lang_code === 'en' && isset($content['images']) && count($content['images']) > 0 ? 'col-md-9 pl-md-4' : 'col-12' }}">
                                            @if ($content)
                                                @php
                                                    $renderContent = isset($content['content'])
                                                        ? $content['content']
                                                        : $content;
                                                    renderFormFields($renderContent, $dataValues ?? []);
                                                @endphp
                                                <button type="submit"
                                                    class="crancy-btn mg-top-25">{{ __('Update') }}</button>
                                            @else
                                                <p>{{ __('Nothing to display') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('style_section')
    <style>
        .crancy-product-card__upload--border img {
            max-height: 200px !important;
        }

        .nested-section {
            border-left: 2px solid #e5e7eb;
            padding-left: 20px;
            margin-left: 10px;
        }

        .nested-header {
            position: relative;
            margin-bottom: 15px;
        }

        .nested-header:before {
            content: '';
            position: absolute;
            left: -22px;
            top: 12px;
            width: 20px;
            height: 2px;
            background: #e5e7eb;
        }

        .nested-content {
            padding-left: 10px;
        }

        .label-text {
            font-weight: 500;
            color: #374151;
        }

        .info-tooltip {
            margin-left: 5px;
            color: #6b7280;
            cursor: help;
        }

        .nested-section .nested-section {
            margin-top: 15px;
        }
    </style>
@endpush
@push('js_section')
    <script>
        "use strict";

        function previewImage(event, target_view_id) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(`view_img_${target_view_id}`);

                console.log(output);

                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
