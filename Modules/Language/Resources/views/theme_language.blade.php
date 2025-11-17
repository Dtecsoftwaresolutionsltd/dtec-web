@extends('admin.master_layout')
@section('title')
    <title>{{ __('Theme language') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Theme language') }}</h3>
    <p class="crancy-header__text">{{ __('Dashboard') }} >> {{ __('Theme language') }}</p>
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
                                                            href="{{ route('admin.theme-language', ['lang_code' => $language->lang_code]) }}">
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
            <div class="row ">
                <div class="col-12 crancy-table">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">


                            <div class="row">
                                <div class="col-12">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Theme language') }}</h4>
                                        </div>

                                        <div class="row mg-top-30">

                                            <div class="col-12">
                                                <form action="">
                                                    <input type="hidden" name="lang_code"
                                                        value="{{ request()->get('lang_code') }}">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="crancy__item-form--group ">
                                                                <label class="crancy__item-label">{{ __('Search') }}
                                                                </label>
                                                                <input class="crancy__item-input localization-text"
                                                                    type="text" name="search" autocomplete="off"
                                                                    placeholder="{{ __('Search by key') }}"
                                                                    value="{{ request()->get('search') }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="crancy-btn mg-top-30"
                                                                type="submit">{{ __('Search') }}</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <hr>

                                            </div>

                                            <form action="{{ route('admin.update-theme-language') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="lang_code"
                                                    value="{{ request()->get('lang_code') }}">

                                                @foreach ($data as $index => $value)
                                                    <div class="col-12">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ $index }} </label>
                                                            <input class="crancy__item-input localization-text"
                                                                type="text" name="values[{{ $index }}]"
                                                                value="{{ $value }}"
                                                                data-key_value="{{ $index }}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                        </div>

                                        <button class="crancy-btn mg-top-25" type="submit">{{ __('Update') }}</button>
                                        </form>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>

                        </div>
                        <!-- End Dashboard Inner -->

                    </div>

                    <div class="">

                        {{ $data->links() }}
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection
