@extends('admin.master_layout')
@section('title')
    <title>{{ __('Social Login') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Social Login') }}</h3>
    <p class="crancy-header__text">{{ __('Website Setup') }} >> {{ __('Social Login') }}</p>
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
                            <form action="{{ route('admin.social-login-update') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <h4 class="crancy-product-card__title">{{ __('Facebook Login') }}</h4>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                        </label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_facebook"
                                                                    {{ $general_setting->is_facebook == 1 ? 'checked' : '' }}
                                                                    type="checkbox">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Facebook Client Id') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="facebook_client_id"
                                                            value="{{ $general_setting->facebook_client_id }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Facebook App Secret') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="facebook_secret_id"
                                                            value="{{ $general_setting->facebook_secret_id }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Redirect URL') }} </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="facebook_redirect_url"
                                                            value="{{ $general_setting->facebook_redirect_url }}">
                                                    </div>
                                                </div>


                                            </div>

                                            <h4 class="crancy-product-card__title mg-top-30">{{ __('Google Login') }}</h4>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Visibility Status') }}
                                                        </label>
                                                        <div
                                                            class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                            <label class="crancy__item-switch">
                                                                <input name="is_gmail"
                                                                    {{ $general_setting->is_gmail == 1 ? 'checked' : '' }}
                                                                    type="checkbox">
                                                                <span
                                                                    class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Gmail Client Id') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="gmail_client_id"
                                                            value="{{ $general_setting->gmail_client_id }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Gmail Secret Id') }}
                                                        </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="gmail_secret_id"
                                                            value="{{ $general_setting->gmail_secret_id }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('Redirect URL') }} </label>
                                                        <input class="crancy__item-input" type="text"
                                                            name="gmail_redirect_url"
                                                            value="{{ $general_setting->gmail_redirect_url }}">
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
