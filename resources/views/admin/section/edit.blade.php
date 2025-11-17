@extends('admin.master_layout')
@section('title')
    <title>{{ __('Section Visibility') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Section Visibility') }}</h3>
    <p class="crancy-header__text">{{ __('Section Visibility') }} >> {{ __('Section Visibility') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.section-update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach ($pagesections as $pagesection)
                                    <div class="row">
                                        <div class="col-12 mg-top-30">
                                            <div class="crancy-product-card">
                                                <div class="create_new_btn_inline_box">
                                                    <h4 class="crancy-product-card__title">
                                                        {{ ucwords(str_replace('_', ' ', $pagesection->section_name)) }}</h4>
                                                </div>
                                                <input type="hidden" name="id[]" value="{{ $pagesection->id }}">
                                                <div class="row align-items-center">
                                                    <div class="col-md-6">
                                                        <div class="crancy__item-form--group mg-top-form-20">
                                                            <label class="crancy__item-label">{{ __('Section Postition') }}
                                                                * </label>
                                                            <input class="crancy__item-input" type="number"
                                                                name="position[]" id="name"
                                                                value="{{ old('serial_number', $pagesection->serial_number) }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                                * </label>
                                                            <label class="crancy__item-switch">
                                                                <input name="status[{{ $loop->index }}]" value="1"
                                                                    type="checkbox"
                                                                    {{ $pagesection->status == '1' ? 'checked' : '' }}>
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <button class="crancy-btn mg-top-25" type="submit">{{ __('Save Data') }}</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
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
