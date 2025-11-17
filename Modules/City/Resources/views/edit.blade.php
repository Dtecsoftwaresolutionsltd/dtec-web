@extends('admin.master_layout')
@section('title')
    <title>{{ __('Edit City') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Edit City') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Location') }} >> {{ __('Edit City') }}</p>
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
                                                            href="{{ route('admin.city.edit', ['city' => $city->id, 'lang_code' => $language->lang_code]) }}">
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
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.city.update', $city->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="lang_code" value="{{ $city_translate->lang_code }}">
                                <input type="hidden" name="translate_id" value="{{ $city_translate->id }}">

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('Edit City') }}</h4>

                                                <a href="{{ route('admin.city.index') }}" class="crancy-btn "><i
                                                        class="fa fa-list"></i> {{ __('City List') }}</a>
                                            </div>

                                            <div class="row">

                                                @if (admin_lang() == request()->get('lang_code'))
                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Country') }} *
                                                            </label>
                                                            <select class="form-select crancy__item-input "
                                                                name="country_id" id="country_id" required>
                                                                <option value="">{{ __('Select Country') }}</option>
                                                                @foreach ($countries as $country)
                                                                    <option
                                                                        {{ $country->id == $selected_country_id ? 'selected' : '' }}
                                                                        value="{{ $country->id }}">{{ $country->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('State') }} *
                                                            </label>
                                                            <select class="form-select crancy__item-input " name="state_id"
                                                                id="state_id" required>
                                                                <option value="">{{ __('Select State') }}</option>
                                                                @foreach ($states as $state)
                                                                    <option
                                                                        {{ $state->id == $city->state_id ? 'selected' : '' }}
                                                                        value="{{ $state->id }}">{{ $state->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name"
                                                            id="name" value="{{ $city_translate->name }}" required>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25"
                                                type="submit">{{ __('Update') }}</button>

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

        $(document).ready(function() {
            $("#country_id").on('change', function() {
                var country_id = $(this).val();
                $.ajax({
                    url: "{{ route('get-states') }}",
                    type: 'GET',
                    data: {
                        country_id
                    },
                    success: function(data) {
                        var state_html = `<option value="">{{ __('Select State') }}</option>`;
                        $.each(data, function(key, value) {
                            state_html += '<option value="' + value.id + '">' + value
                                .name +
                                '</option>';
                        });

                        console.log(state_html);

                        $("#state_id").html(state_html);
                    },
                    error: function(err) {

                        var state_html = `<option value="">{{ __('Select State') }}</option>`;
                        $("#state_id").html(state_html);
                        toastr.error("Something went wrong!");

                    }
                });

            })
        })
    </script>
@endpush

