@extends('admin.master_layout')
@section('title')
    <title>{{ __('Footer Info') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Footer Info') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Section') }} >> {{ __('Footer Info') }}</p>
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
                            <form action="{{ route('admin.update-header-footer') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('Contact Information') }}</h4>

                                            <div class="row">


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('About us') }} </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea" name="about_us" id="" cols="30" rows="5">{{ $header_footer->about_us }}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Play store link') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="mobile_playstore"
                                                            value="{{ $header_footer->mobile_playstore }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('App store link') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="mobile_appstore"
                                                            value="{{ $header_footer->mobile_appstore }}">
                                                    </div>
                                                </div>



                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Copyright') }} </label>
                                                        <input class="crancy__item-input" type="text" name="copyright"
                                                            value="{{ $header_footer->copyright }}">
                                                    </div>
                                                </div>



                                            </div>

                                            <h4 class="crancy-product-card__title mg-top-30">{{ __('Social Media') }}</h4>

                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Facebook') }} </label>
                                                        <input class="crancy__item-input" type="text" name="facebook"
                                                            value="{{ $header_footer->facebook }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Twitter') }} </label>
                                                        <input class="crancy__item-input" type="text" name="twitter"
                                                            value="{{ $header_footer->twitter }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Linkedin') }} </label>
                                                        <input class="crancy__item-input" type="text" name="linkedin"
                                                            value="{{ $header_footer->linkedin }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Instagram') }} </label>
                                                        <input class="crancy__item-input" type="text" name="instagram"
                                                            value="{{ $header_footer->instagram }}">
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
