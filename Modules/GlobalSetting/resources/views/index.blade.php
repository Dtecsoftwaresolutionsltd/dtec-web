@extends('admin.master_layout')
@section('title')
    <title>{{ __('Setting') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Setting') }}</h3>
    <p class="crancy-header__text">{{ __('Dashboard') }} >> {{ __('Setting') }}</p>
@endsection

@section('body-content')
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row row__bscreen">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="crancy-personals mg-top-30">
                                <div class="row">
                                    <div class="col-lg-3 col-md-2 col-12 crancy-personals__list">
                                        <div class="crancy-psidebar">
                                            <!-- Features Tab List -->
                                            <div class="list-group crancy-psidebar__list" id="list-tab" role="tablist">
                                                <a class="list-group-item active" data-bs-toggle="list" href="#id1"
                                                    role="tab" aria-selected="true"><span class="crancy-psidebar__icon">

                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M12.8485 4H11.1515C10.2143 4 9.45453 4.71634 9.45453 5.6C9.45453 6.61121 8.37258 7.25411 7.48444 6.77064L7.39423 6.72153C6.58258 6.27971 5.54472 6.54191 5.07612 7.30717L4.22763 8.69281C3.75902 9.45808 4.03711 10.4366 4.84877 10.8785C5.73734 11.3622 5.73733 12.6378 4.84876 13.1215C4.03711 13.5634 3.75902 14.5419 4.22763 15.3072L5.07612 16.6928C5.54472 17.4581 6.58258 17.7203 7.39423 17.2785L7.48444 17.2294C8.37258 16.7459 9.45453 17.3888 9.45453 18.4C9.45453 19.2837 10.2143 20 11.1515 20H12.8485C13.7857 20 14.5455 19.2837 14.5455 18.4C14.5455 17.3888 15.6274 16.7459 16.5156 17.2294L16.6058 17.2785C17.4174 17.7203 18.4553 17.4581 18.9239 16.6928L19.7724 15.3072C20.241 14.5419 19.9629 13.5634 19.1512 13.1215C18.2627 12.6378 18.2627 11.3622 19.1512 10.8785C19.9629 10.4366 20.241 9.45809 19.7724 8.69283L18.9239 7.30719C18.4553 6.54192 17.4174 6.27972 16.6058 6.72154L16.5156 6.77065C15.6274 7.25412 14.5455 6.61122 14.5455 5.6C14.5455 4.71634 13.7857 4 12.8485 4Z"
                                                                stroke-width="1.5" stroke-linejoin="round" />
                                                            <circle cx="12" cy="12" r="3"
                                                                stroke-width="1.5" />
                                                        </svg>
                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('General Setting') }}</h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#id2"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.4042 9.59584L18.8 5.2M5.2 18.8L9.59583 14.4042M14.4042 14.4042L18.8 18.8M5.2 5.2L9.59583 9.59583M8.6 3.5H15.4C18.2167 3.5 20.5 5.78335 20.5 8.6V15.4C20.5 18.2167 18.2167 20.5 15.4 20.5H8.6C5.78335 20.5 3.5 18.2167 3.5 15.4V8.6C3.5 5.78335 5.78335 3.5 8.6 3.5ZM15.4 12C15.4 13.8778 13.8778 15.4 12 15.4C10.1222 15.4 8.6 13.8778 8.6 12C8.6 10.1222 10.1222 8.6 12 8.6C13.8778 8.6 15.4 10.1222 15.4 12Z"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>

                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Logo and Favicon') }} </h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#id3"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.4042 9.59584L18.8 5.2M5.2 18.8L9.59583 14.4042M14.4042 14.4042L18.8 18.8M5.2 5.2L9.59583 9.59583M8.6 3.5H15.4C18.2167 3.5 20.5 5.78335 20.5 8.6V15.4C20.5 18.2167 18.2167 20.5 15.4 20.5H8.6C5.78335 20.5 3.5 18.2167 3.5 15.4V8.6C3.5 5.78335 5.78335 3.5 8.6 3.5ZM15.4 12C15.4 13.8778 13.8778 15.4 12 15.4C10.1222 15.4 8.6 13.8778 8.6 12C8.6 10.1222 10.1222 8.6 12 8.6C13.8778 8.6 15.4 10.1222 15.4 12Z"
                                                                stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>


                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Google reCaptcha') }} </h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#id4"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M14.5 8.25C14.0858 8.25 13.75 8.58579 13.75 9C13.75 9.41421 14.0858 9.75 14.5 9.75V8.25ZM17.2764 9.55279L16.6056 9.8882V9.8882L17.2764 9.55279ZM17.3292 11.3354C17.5144 11.7059 17.9649 11.8561 18.3354 11.6708C18.7059 11.4856 18.8561 11.0351 18.6708 10.6646L17.3292 11.3354ZM17.1272 9.91119L17.5384 9.28396L16.284 8.46158L15.8728 9.08881L17.1272 9.91119ZM13.7644 13.6729L13.1372 13.2617V13.2617L13.7644 13.6729ZM12.0726 13.6424L11.431 14.0308L12.0726 13.6424ZM10.1644 10.4901L9.52284 10.8784H9.52284L10.1644 10.4901ZM8.43044 10.5302L7.77155 10.1719L8.43044 10.5302ZM5.34111 14.6417C5.14324 15.0056 5.27783 15.461 5.64173 15.6589C6.00562 15.8568 6.46103 15.7222 6.65889 15.3583L5.34111 14.6417ZM6 2.75H18V1.25H6V2.75ZM21.25 6V18H22.75V6H21.25ZM18 21.25H6V22.75H18V21.25ZM2.75 18V6H1.25V18H2.75ZM6 21.25C4.20507 21.25 2.75 19.7949 2.75 18H1.25C1.25 20.6234 3.37665 22.75 6 22.75V21.25ZM21.25 18C21.25 19.7949 19.7949 21.25 18 21.25V22.75C20.6234 22.75 22.75 20.6234 22.75 18H21.25ZM18 2.75C19.7949 2.75 21.25 4.20507 21.25 6H22.75C22.75 3.37665 20.6234 1.25 18 1.25V2.75ZM6 1.25C3.37665 1.25 1.25 3.37665 1.25 6H2.75C2.75 4.20507 4.20507 2.75 6 2.75V1.25ZM14.5 9.75H16.382V8.25H14.5V9.75ZM16.6056 9.8882L17.3292 11.3354L18.6708 10.6646L17.9472 9.21738L16.6056 9.8882ZM16.382 9.75C16.4767 9.75 16.5632 9.8035 16.6056 9.8882L17.9472 9.21738C17.6508 8.6245 17.0448 8.25 16.382 8.25V9.75ZM15.8728 9.08881L13.1372 13.2617L14.3917 14.084L17.1272 9.91119L15.8728 9.08881ZM12.7142 13.2541L10.8061 10.1017L9.52284 10.8784L11.431 14.0308L12.7142 13.2541ZM7.77155 10.1719L5.34111 14.6417L6.65889 15.3583L9.08934 10.8885L7.77155 10.1719ZM10.8061 10.1017C10.1065 8.946 8.41688 8.98511 7.77155 10.1719L9.08934 10.8885C9.18153 10.7189 9.4229 10.7133 9.52284 10.8784L10.8061 10.1017ZM13.1372 13.2617C13.0363 13.4155 12.8095 13.4114 12.7142 13.2541L11.431 14.0308C12.0978 15.1323 13.6857 15.1609 14.3917 14.084L13.1372 13.2617Z"
                                                                fill="#32343A" />
                                                        </svg>

                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Tawk Chat') }} </h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#id5"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon crancy-psidebar__icon--fill">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M19 2H21C21.5523 2 22 2.44772 22 3V5M21 3C13.0585 9.39136 8.94212 11.1129 2 12M18 10V20C18 21.1046 18.8954 22 20 22C21.1046 22 22 21.1046 22 20V10C22 8.89543 21.1046 8 20 8C18.8954 8 18 8.89543 18 10ZM2 18L2 20C2 21.1046 2.89543 22 4 22C5.10457 22 6 21.1046 6 20L6 18C6 16.8954 5.10457 16 4 16C2.89543 16 2 16.8954 2 18ZM10 14V20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20V14C14 12.8954 13.1046 12 12 12C10.8954 12 10 12.8954 10 14Z"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Google Analytic') }} </h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#openai"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon crancy-psidebar__icon--fill">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="9" stroke-width="1.5"/>
                                                            <path d="M8 12h8M12 8v8" stroke-width="1.5" stroke-linecap="round"/>
                                                        </svg>
                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('OpenAI') }} </h4>
                                                </a>
                                                <a class="list-group-item" data-bs-toggle="list" href="#id6"
                                                    role="tab" aria-selected="false"><span
                                                        class="crancy-psidebar__icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M18 2H6C3.79086 2 2 3.79086 2 6V18C2 20.2091 3.79086 22 6 22H10.5V15H7V12H10.5V10C10.5 7.79086 12.2909 6 14.5 6H17V9H14.5C13.9477 9 13.5 9.44772 13.5 10V12H17V15H13.5V22H18C20.2091 22 22 20.2091 22 18V6C22 3.79086 20.2091 2 18 2Z"
                                                                stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Facebook Pixel') }}</h4>
                                                </a>

                                                <a class="list-group-item" data-bs-toggle="list" href="#id7"
                                                    role="tab" aria-selected="false">
                                                    <span class="crancy-psidebar__icon">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M16.273 11.814C16.651 12.216 16.632 12.849 16.23 13.228L13.184 16.095C12.615 16.657 11.859 16.939 11.1 16.939C10.341 16.939 9.578 16.656 8.996 16.087L7.81 15.046C7.395 14.681 7.355 14.049 7.719 13.635C8.086 13.22 8.717 13.18 9.13 13.544L10.355 14.621C10.782 15.035 11.412 15.036 11.795 14.654L14.857 11.77C15.259 11.393 15.891 11.411 16.271 11.813L16.273 11.814ZM22 5C22 5.553 21.553 6 21 6H20V19C20 21.757 17.757 24 15 24H9C6.243 24 4 21.757 4 19V6H3C2.447 6 2 5.553 2 5C2 4.447 2.447 4 3 4H6.101C6.566 1.721 8.586 0 11 0H13C15.414 0 17.435 1.721 17.899 4H21C21.553 4 22 4.447 22 5ZM8.172 4H15.828C15.415 2.836 14.304 2 13 2H11C9.696 2 8.585 2.836 8.172 4ZM18 6H6V19C6 20.654 7.346 22 9 22H15C16.654 22 18 20.654 18 19V6Z"
                                                                fill="currentColor" />
                                                        </svg>

                                                    </span>
                                                    <h4 class="crancy-psidebar__title">{{ __('Database Clear') }}</h4>
                                                </a>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-md-10 col-12  crancy-personals__content">
                                        <div class="crancy-ptabs">

                                            <div class="crancy-ptabs__inner">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <!--  Features Single Tab -->
                                                    <div class="tab-pane fade active show" id="id1"
                                                        role="tabpanel">
                                                        <form action="{{ route('admin.update-general-setting') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('General Setting') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('App Name') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    value="{{ $general_setting->app_name }}"
                                                                                                    name="app_name">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group  mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Select Theme') }}</label>
                                                                                                <select
                                                                                                    class="form-select crancy__item-input"
                                                                                                    name="selected_theme">
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'all_theme' ? 'selected' : '' }}
                                                                                                        value="all_theme">
                                                                                                        {{ __('All Theme') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'digital_marketing' ? 'selected' : '' }}
                                                                                                        value="digital_marketing">
                                                                                                        {{ __('Digital Marketing') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'seo_agency' ? 'selected' : '' }}
                                                                                                        value="seo_agency">
                                                                                                        {{ __('SEO Agency') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'creative_agency' ? 'selected' : '' }}
                                                                                                        value="creative_agency">
                                                                                                        {{ __('Creative Agency') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'ai_software' ? 'selected' : '' }}
                                                                                                        value="ai_software">
                                                                                                        {{ __('AI Software') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'business_consulting' ? 'selected' : '' }}
                                                                                                        value="business_consulting">
                                                                                                        {{ __('Business Consulting') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'it_business' ? 'selected' : '' }}
                                                                                                        value="it_business">
                                                                                                        {{ __('IT Business') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->selected_theme == 'saas' ? 'selected' : '' }}
                                                                                                        value="saas">
                                                                                                        {{ __('Saas') }}
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group  mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Preloader Status') }}</label>
                                                                                                <select
                                                                                                    class="form-select crancy__item-input"
                                                                                                    name="preloader_status">
                                                                                                    <option
                                                                                                        {{ isset($general_setting->preloader_status) && $general_setting->preloader_status == 'enable' ? 'selected' : '' }}
                                                                                                        value="enable">
                                                                                                        {{ __('Enable') }}
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ isset($general_setting->preloader_status) && $general_setting->preloader_status == 'disable' ? 'selected' : '' }}
                                                                                                        value="disable">
                                                                                                        {{ __('Disable') }}
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Contact Message Receiver Email') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    value="{{ $general_setting->contact_message_mail }}"
                                                                                                    name="contact_message_mail">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group  mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Timezone') }}</label>
                                                                                                <select
                                                                                                    class="form-select crancy__item-input"
                                                                                                    name="timezone">
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Abidjan' ? 'selected' : '' }}
                                                                                                        value="Africa/Abidjan"
                                                                                                        selected>
                                                                                                        Africa/Abidjan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Accra' ? 'selected' : '' }}
                                                                                                        value="Africa/Accra">
                                                                                                        Africa/Accra
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }}value="Africa/Addis_Ababa">
                                                                                                        Africa/Addis_Ababa
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Algiers' ? 'selected' : '' }}
                                                                                                        value="Africa/Algiers">
                                                                                                        Africa/Algiers
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Asmara' ? 'selected' : '' }}value="Africa/Asmara">
                                                                                                        Africa/Asmara
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Bamako' ? 'selected' : '' }}value="Africa/Bamako">
                                                                                                        Africa/Bamako
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Bangui' ? 'selected' : '' }}value="Africa/Bangui">
                                                                                                        Africa/Bangui
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Banjul' ? 'selected' : '' }}
                                                                                                        value="Africa/Banjul">
                                                                                                        Africa/Banjul
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Bissau' ? 'selected' : '' }}
                                                                                                        value="Africa/Bissau">
                                                                                                        Africa/Bissau
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Blantyre' ? 'selected' : '' }}
                                                                                                        value="Africa/Blantyre">
                                                                                                        Africa/Blantyre
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Brazzaville' ? 'selected' : '' }}
                                                                                                        value="Africa/Brazzaville">
                                                                                                        Africa/Brazzaville
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Bujumbura' ? 'selected' : '' }}
                                                                                                        value="Africa/Bujumbura">
                                                                                                        Africa/Bujumbura
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Cairo"' ? 'selected' : '' }}
                                                                                                        value="Africa/Cairo">
                                                                                                        Africa/Cairo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Casablanca' ? 'selected' : '' }}
                                                                                                        value="Africa/Casablanca">
                                                                                                        Africa/Casablanca
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Ceuta' ? 'selected' : '' }}
                                                                                                        value="Africa/Ceuta">
                                                                                                        Africa/Ceuta
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Conakry' ? 'selected' : '' }}
                                                                                                        value="Africa/Conakry">
                                                                                                        Africa/Conakry
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Dakar' ? 'selected' : '' }}
                                                                                                        value="Africa/Dakar">
                                                                                                        Africa/Dakar
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Dar_es_Salaam' ? 'selected' : '' }}
                                                                                                        value="Africa/Dar_es_Salaam">
                                                                                                        Africa/Dar_es_Salaam
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Djibouti' ? 'selected' : '' }}
                                                                                                        value="Africa/Djibouti">
                                                                                                        Africa/Djibouti
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Douala' ? 'selected' : '' }}
                                                                                                        value="Africa/Douala">
                                                                                                        Africa/Douala
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/El_Aaiun' ? 'selected' : '' }}
                                                                                                        value="Africa/El_Aaiun">
                                                                                                        Africa/El_Aaiun
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Freetown' ? 'selected' : '' }}
                                                                                                        value="Africa/Freetown">
                                                                                                        Africa/Freetown
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Gaborone' ? 'selected' : '' }}
                                                                                                        value="Africa/Gaborone">
                                                                                                        Africa/Gaborone
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Harare' ? 'selected' : '' }}
                                                                                                        value="Africa/Harare">
                                                                                                        Africa/Harare
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Johannesburg' ? 'selected' : '' }}
                                                                                                        value="Africa/Johannesburg">
                                                                                                        Africa/Johannesburg
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Juba' ? 'selected' : '' }}
                                                                                                        value="Africa/Juba">
                                                                                                        Africa/Juba</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Kampala' ? 'selected' : '' }}
                                                                                                        value="Africa/Kampala">
                                                                                                        Africa/Kampala
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Khartoum' ? 'selected' : '' }}
                                                                                                        value="Africa/Khartoum">
                                                                                                        Africa/Khartoum
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Kigali' ? 'selected' : '' }}
                                                                                                        value="Africa/Kigali">
                                                                                                        Africa/Kigali
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Kinshasa' ? 'selected' : '' }}
                                                                                                        value="Africa/Kinshasa">
                                                                                                        Africa/Kinshasa
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Lagos' ? 'selected' : '' }}
                                                                                                        value="Africa/Lagos">
                                                                                                        Africa/Lagos
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Libreville' ? 'selected' : '' }}
                                                                                                        value="Africa/Libreville">
                                                                                                        Africa/Libreville
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Lome' ? 'selected' : '' }}
                                                                                                        value="Africa/Lome">
                                                                                                        Africa/Lome</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Luanda' ? 'selected' : '' }}
                                                                                                        value="Africa/Luanda">
                                                                                                        Africa/Luanda
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Lubumbashi' ? 'selected' : '' }}
                                                                                                        value="Africa/Lubumbashi">
                                                                                                        Africa/Lubumbashi
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Lusaka' ? 'selected' : '' }}
                                                                                                        value="Africa/Lusaka">
                                                                                                        Africa/Lusaka
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Malabo' ? 'selected' : '' }}
                                                                                                        value="Africa/Malabo">
                                                                                                        Africa/Malabo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Maputo' ? 'selected' : '' }}
                                                                                                        value="Africa/Maputo">
                                                                                                        Africa/Maputo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Maseru' ? 'selected' : '' }}
                                                                                                        value="Africa/Maseru">
                                                                                                        Africa/Maseru
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Mbabane' ? 'selected' : '' }}
                                                                                                        value="Africa/Mbabane">
                                                                                                        Africa/Mbabane
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Mogadishu' ? 'selected' : '' }}
                                                                                                        value="Africa/Mogadishu">
                                                                                                        Africa/Mogadishu
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Monrovia' ? 'selected' : '' }}
                                                                                                        value="Africa/Monrovia">
                                                                                                        Africa/Monrovia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Nairobi' ? 'selected' : '' }}
                                                                                                        value="Africa/Nairobi">
                                                                                                        Africa/Nairobi
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Ndjamena' ? 'selected' : '' }}
                                                                                                        value="Africa/Ndjamena">
                                                                                                        Africa/Ndjamena
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Niamey' ? 'selected' : '' }}
                                                                                                        value="Africa/Niamey">
                                                                                                        Africa/Niamey
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Nouakchott' ? 'selected' : '' }}
                                                                                                        value="Africa/Nouakchott">
                                                                                                        Africa/Nouakchott
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Ouagadougou' ? 'selected' : '' }}
                                                                                                        value="Africa/Ouagadougou">
                                                                                                        Africa/Ouagadougou
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Porto-Novo' ? 'selected' : '' }}
                                                                                                        value="Africa/Porto-Novo">
                                                                                                        Africa/Porto-Novo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Sao_Tome' ? 'selected' : '' }}
                                                                                                        value="Africa/Sao_Tome">
                                                                                                        Africa/Sao_Tome
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Tripoli' ? 'selected' : '' }}
                                                                                                        value="Africa/Tripoli">
                                                                                                        Africa/Tripoli
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Tunis' ? 'selected' : '' }}
                                                                                                        value="Africa/Tunis">
                                                                                                        Africa/Tunis
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Africa/Windhoek' ? 'selected' : '' }}
                                                                                                        value="Africa/Windhoek">
                                                                                                        Africa/Windhoek
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Adak' ? 'selected' : '' }}
                                                                                                        value="America/Adak">
                                                                                                        America/Adak
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Anchorage' ? 'selected' : '' }}
                                                                                                        value="America/Anchorage">
                                                                                                        America/Anchorage
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Anguilla' ? 'selected' : '' }}
                                                                                                        value="America/Anguilla">
                                                                                                        America/Anguilla
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Antigua' ? 'selected' : '' }}
                                                                                                        value="America/Antigua">
                                                                                                        America/Antigua
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Araguaina' ? 'selected' : '' }}
                                                                                                        value="America/Araguaina">
                                                                                                        America/Araguaina
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Buenos_Aires' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Buenos_Aires">
                                                                                                        America/Argentina/Buenos_Aires
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Catamarca' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Catamarca">
                                                                                                        America/Argentina/Catamarca
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Cordoba' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Cordoba">
                                                                                                        America/Argentina/Cordoba
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Jujuy' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Jujuy">
                                                                                                        America/Argentina/Jujuy
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/La_Rioja' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/La_Rioja">
                                                                                                        America/Argentina/La_Rioja
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Mendoza' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Mendoza">
                                                                                                        America/Argentina/Mendoza
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Rio_Gallegos' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Rio_Gallegos">
                                                                                                        America/Argentina/Rio_Gallegos
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Salta' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Salta">
                                                                                                        America/Argentina/Salta
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/San_Juan' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/San_Juan">
                                                                                                        America/Argentina/San_Juan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/San_Luis' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/San_Luis">
                                                                                                        America/Argentina/San_Luis
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Tucuman' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Tucuman">
                                                                                                        America/Argentina/Tucuman
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Argentina/Ushuaia' ? 'selected' : '' }}
                                                                                                        value="America/Argentina/Ushuaia">
                                                                                                        America/Argentina/Ushuaia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Aruba' ? 'selected' : '' }}
                                                                                                        value="America/Aruba">
                                                                                                        America/Aruba
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Asuncion' ? 'selected' : '' }}
                                                                                                        value="America/Asuncion">
                                                                                                        America/Asuncion
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Atikokan' ? 'selected' : '' }}
                                                                                                        value="America/Atikokan">
                                                                                                        America/Atikokan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Bahia' ? 'selected' : '' }}
                                                                                                        value="America/Bahia">
                                                                                                        America/Bahia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Bahia_Banderas' ? 'selected' : '' }}
                                                                                                        value="America/Bahia_Banderas">
                                                                                                        America/Bahia_Banderas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Barbados' ? 'selected' : '' }}
                                                                                                        value="America/Barbados">
                                                                                                        America/Barbados
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Belem' ? 'selected' : '' }}
                                                                                                        value="America/Belem">
                                                                                                        America/Belem
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Belize' ? 'selected' : '' }}
                                                                                                        value="America/Belize">
                                                                                                        America/Belize
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Blanc-Sablon' ? 'selected' : '' }}
                                                                                                        value="America/Blanc-Sablon">
                                                                                                        America/Blanc-Sablon
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Boa_Vista' ? 'selected' : '' }}
                                                                                                        value="America/Boa_Vista">
                                                                                                        America/Boa_Vista
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Bogota' ? 'selected' : '' }}
                                                                                                        value="America/Bogota">
                                                                                                        America/Bogota
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Boise' ? 'selected' : '' }}
                                                                                                        value="America/Boise">
                                                                                                        America/Boise
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Cambridge_Bay' ? 'selected' : '' }}
                                                                                                        value="America/Cambridge_Bay">
                                                                                                        America/Cambridge_Bay
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Campo_Grande' ? 'selected' : '' }}
                                                                                                        value="America/Campo_Grande">
                                                                                                        America/Campo_Grande
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Cancun' ? 'selected' : '' }}
                                                                                                        value="America/Cancun">
                                                                                                        America/Cancun
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Caracas' ? 'selected' : '' }}
                                                                                                        value="America/Caracas">
                                                                                                        America/Caracas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Cayenne' ? 'selected' : '' }}
                                                                                                        value="America/Cayenne">
                                                                                                        America/Cayenne
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Cayman' ? 'selected' : '' }}
                                                                                                        value="America/Cayman">
                                                                                                        America/Cayman
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Chicago' ? 'selected' : '' }}
                                                                                                        value="America/Chicago">
                                                                                                        America/Chicago
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Chihuahua' ? 'selected' : '' }}
                                                                                                        value="America/Chihuahua">
                                                                                                        America/Chihuahua
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Costa_Rica' ? 'selected' : '' }}
                                                                                                        value="America/Costa_Rica">
                                                                                                        America/Costa_Rica
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Creston' ? 'selected' : '' }}
                                                                                                        value="America/Creston">
                                                                                                        America/Creston
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Cuiaba' ? 'selected' : '' }}
                                                                                                        value="America/Cuiaba">
                                                                                                        America/Cuiaba
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Curacao' ? 'selected' : '' }}
                                                                                                        value="America/Curacao">
                                                                                                        America/Curacao
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Danmarkshavn' ? 'selected' : '' }}
                                                                                                        value="America/Danmarkshavn">
                                                                                                        America/Danmarkshavn
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Dawson' ? 'selected' : '' }}
                                                                                                        value="America/Dawson">
                                                                                                        America/Dawson
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Dawson_Creek' ? 'selected' : '' }}
                                                                                                        value="America/Dawson_Creek">
                                                                                                        America/Dawson_Creek
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Denver' ? 'selected' : '' }}
                                                                                                        value="America/Denver">
                                                                                                        America/Denver
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Detroit' ? 'selected' : '' }}
                                                                                                        value="America/Detroit">
                                                                                                        America/Detroit
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Dominica' ? 'selected' : '' }}
                                                                                                        value="America/Dominica">
                                                                                                        America/Dominica
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Edmonton' ? 'selected' : '' }}
                                                                                                        value="America/Edmonton">
                                                                                                        America/Edmonton
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Eirunepe' ? 'selected' : '' }}
                                                                                                        value="America/Eirunepe">
                                                                                                        America/Eirunepe
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/El_Salvador' ? 'selected' : '' }}
                                                                                                        value="America/El_Salvador">
                                                                                                        America/El_Salvador
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Fort_Nelson' ? 'selected' : '' }}
                                                                                                        value="America/Fort_Nelson">
                                                                                                        America/Fort_Nelson
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Fortaleza' ? 'selected' : '' }}
                                                                                                        value="America/Fortaleza">
                                                                                                        America/Fortaleza
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Glace_Bay' ? 'selected' : '' }}
                                                                                                        value="America/Glace_Bay">
                                                                                                        America/Glace_Bay
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Goose_Bay' ? 'selected' : '' }}
                                                                                                        value="America/Goose_Bay">
                                                                                                        America/Goose_Bay
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Grand_Turk' ? 'selected' : '' }}
                                                                                                        value="America/Grand_Turk">
                                                                                                        America/Grand_Turk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Grenada' ? 'selected' : '' }}
                                                                                                        value="America/Grenada">
                                                                                                        America/Grenada
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Guadeloupe' ? 'selected' : '' }}
                                                                                                        value="America/Guadeloupe">
                                                                                                        America/Guadeloupe
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Guatemala' ? 'selected' : '' }}
                                                                                                        value="America/Guatemala">
                                                                                                        America/Guatemala
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Guayaquil' ? 'selected' : '' }}
                                                                                                        value="America/Guayaquil">
                                                                                                        America/Guayaquil
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Guyana' ? 'selected' : '' }}
                                                                                                        value="America/Guyana">
                                                                                                        America/Guyana
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Halifax' ? 'selected' : '' }}
                                                                                                        value="America/Halifax">
                                                                                                        America/Halifax
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Havana' ? 'selected' : '' }}
                                                                                                        value="America/Havana">
                                                                                                        America/Havana
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Hermosillo' ? 'selected' : '' }}
                                                                                                        value="America/Hermosillo">
                                                                                                        America/Hermosillo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Indianapolis' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Indianapolis">
                                                                                                        America/Indiana/Indianapolis
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Knox' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Knox">
                                                                                                        America/Indiana/Knox
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Marengo' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Marengo">
                                                                                                        America/Indiana/Marengo
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Petersburg' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Petersburg">
                                                                                                        America/Indiana/Petersburg
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Tell_City' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Tell_City">
                                                                                                        America/Indiana/Tell_City
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Vevay' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Vevay">
                                                                                                        America/Indiana/Vevay
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Vincennes' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Vincennes">
                                                                                                        America/Indiana/Vincennes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Indiana/Winamac' ? 'selected' : '' }}
                                                                                                        value="America/Indiana/Winamac">
                                                                                                        America/Indiana/Winamac
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Inuvik' ? 'selected' : '' }}
                                                                                                        value="America/Inuvik">
                                                                                                        America/Inuvik
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Iqaluit' ? 'selected' : '' }}
                                                                                                        value="America/Iqaluit">
                                                                                                        America/Iqaluit
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Jamaica' ? 'selected' : '' }}
                                                                                                        value="America/Jamaica">
                                                                                                        America/Jamaica
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Juneau' ? 'selected' : '' }}
                                                                                                        value="America/Juneau">
                                                                                                        America/Juneau
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Kentucky/Louisville' ? 'selected' : '' }}
                                                                                                        value="America/Kentucky/Louisville">
                                                                                                        America/Kentucky/Louisville
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Kentucky/Monticello' ? 'selected' : '' }}
                                                                                                        value="America/Kentucky/Monticello">
                                                                                                        America/Kentucky/Monticello
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Kralendijk' ? 'selected' : '' }}
                                                                                                        value="America/Kralendijk">
                                                                                                        America/Kralendijk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/La_Paz' ? 'selected' : '' }}
                                                                                                        value="America/La_Paz">
                                                                                                        America/La_Paz
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Lima' ? 'selected' : '' }}
                                                                                                        value="America/Lima">
                                                                                                        America/Lima
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Los_Angeles' ? 'selected' : '' }}
                                                                                                        value="America/Los_Angeles">
                                                                                                        America/Los_Angeles
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Lower_Princes' ? 'selected' : '' }}
                                                                                                        value="America/Lower_Princes">
                                                                                                        America/Lower_Princes
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Maceio' ? 'selected' : '' }}
                                                                                                        value="America/Maceio">
                                                                                                        America/Maceio
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Managua' ? 'selected' : '' }}
                                                                                                        value="America/Managua">
                                                                                                        America/Managua
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Manaus' ? 'selected' : '' }}
                                                                                                        value="America/Manaus">
                                                                                                        America/Manaus
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Marigot' ? 'selected' : '' }}
                                                                                                        value="America/Marigot">
                                                                                                        America/Marigot
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Martinique' ? 'selected' : '' }}
                                                                                                        value="America/Martinique">
                                                                                                        America/Martinique
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Matamoros' ? 'selected' : '' }}
                                                                                                        value="America/Matamoros">
                                                                                                        America/Matamoros
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Mazatlan' ? 'selected' : '' }}
                                                                                                        value="America/Mazatlan">
                                                                                                        America/Mazatlan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Menominee' ? 'selected' : '' }}
                                                                                                        value="America/Menominee">
                                                                                                        America/Menominee
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Merida' ? 'selected' : '' }}
                                                                                                        value="America/Merida">
                                                                                                        America/Merida
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Metlakatla' ? 'selected' : '' }}
                                                                                                        value="America/Metlakatla">
                                                                                                        America/Metlakatla
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Mexico_City' ? 'selected' : '' }}
                                                                                                        value="America/Mexico_City">
                                                                                                        America/Mexico_City
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Miquelon' ? 'selected' : '' }}
                                                                                                        value="America/Miquelon">
                                                                                                        America/Miquelon
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Moncton' ? 'selected' : '' }}
                                                                                                        value="America/Moncton">
                                                                                                        America/Moncton
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Monterrey' ? 'selected' : '' }}
                                                                                                        value="America/Monterrey">
                                                                                                        America/Monterrey
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Montevideo' ? 'selected' : '' }}
                                                                                                        value="America/Montevideo">
                                                                                                        America/Montevideo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Montserrat' ? 'selected' : '' }}
                                                                                                        value="America/Montserrat">
                                                                                                        America/Montserrat
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Nassau' ? 'selected' : '' }}
                                                                                                        value="America/Nassau">
                                                                                                        America/Nassau
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/New_York' ? 'selected' : '' }}
                                                                                                        value="America/New_York">
                                                                                                        America/New_York
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Nipigon' ? 'selected' : '' }}
                                                                                                        value="America/Nipigon">
                                                                                                        America/Nipigon
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Nome' ? 'selected' : '' }}
                                                                                                        value="America/Nome">
                                                                                                        America/Nome
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Noronha' ? 'selected' : '' }}
                                                                                                        value="America/Noronha">
                                                                                                        America/Noronha
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/North_Dakota/Beulah' ? 'selected' : '' }}
                                                                                                        value="America/North_Dakota/Beulah">
                                                                                                        America/North_Dakota/Beulah
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/North_Dakota/Center' ? 'selected' : '' }}
                                                                                                        value="America/North_Dakota/Center">
                                                                                                        America/North_Dakota/Center
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/North_Dakota/New_Salem' ? 'selected' : '' }}
                                                                                                        value="America/North_Dakota/New_Salem">
                                                                                                        America/North_Dakota/New_Salem
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Nuuk' ? 'selected' : '' }}
                                                                                                        value="America/Nuuk">
                                                                                                        America/Nuuk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Ojinaga' ? 'selected' : '' }}
                                                                                                        value="America/Ojinaga">
                                                                                                        America/Ojinaga
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Panama' ? 'selected' : '' }}
                                                                                                        value="America/Panama">
                                                                                                        America/Panama
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Pangnirtung' ? 'selected' : '' }}
                                                                                                        value="America/Pangnirtung">
                                                                                                        America/Pangnirtung
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Paramaribo' ? 'selected' : '' }}
                                                                                                        value="America/Paramaribo">
                                                                                                        America/Paramaribo
                                                                                                    </option>


                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Phoenix' ? 'selected' : '' }}
                                                                                                        value="America/Phoenix">
                                                                                                        America/Phoenix
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Port-au-Prince' ? 'selected' : '' }}
                                                                                                        value="America/Port-au-Prince">
                                                                                                        America/Port-au-Prince
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Port_of_Spain' ? 'selected' : '' }}
                                                                                                        value="America/Port_of_Spain">
                                                                                                        America/Port_of_Spain
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Porto_Velho' ? 'selected' : '' }}
                                                                                                        value="America/Porto_Velho">
                                                                                                        America/Porto_Velho
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Puerto_Rico' ? 'selected' : '' }}
                                                                                                        value="America/Puerto_Rico">
                                                                                                        America/Puerto_Rico
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Punta_Arenas' ? 'selected' : '' }}
                                                                                                        value="America/Punta_Arenas">
                                                                                                        America/Punta_Arenas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Rainy_River' ? 'selected' : '' }}
                                                                                                        value="America/Rainy_River">
                                                                                                        America/Rainy_River
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Rankin_Inlet' ? 'selected' : '' }}
                                                                                                        value="America/Rankin_Inlet">
                                                                                                        America/Rankin_Inlet
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Recife' ? 'selected' : '' }}
                                                                                                        value="America/Recife">
                                                                                                        America/Recife
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Regina' ? 'selected' : '' }}
                                                                                                        value="America/Regina">
                                                                                                        America/Regina
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Resolute' ? 'selected' : '' }}
                                                                                                        value="America/Resolute">
                                                                                                        America/Resolute
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Rio_Branco' ? 'selected' : '' }}
                                                                                                        value="America/Rio_Branco">
                                                                                                        America/Rio_Branco
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Santarem' ? 'selected' : '' }}
                                                                                                        value="America/Santarem">
                                                                                                        America/Santarem
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Santiago' ? 'selected' : '' }}
                                                                                                        value="America/Santiago">
                                                                                                        America/Santiago
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Santo_Domingo' ? 'selected' : '' }}
                                                                                                        value="America/Santo_Domingo">
                                                                                                        America/Santo_Domingo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Sao_Paulo' ? 'selected' : '' }}
                                                                                                        value="America/Sao_Paulo">
                                                                                                        America/Sao_Paulo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Scoresbysund' ? 'selected' : '' }}
                                                                                                        value="America/Scoresbysund">
                                                                                                        America/Scoresbysund
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Sitka' ? 'selected' : '' }}
                                                                                                        value="America/Sitka">
                                                                                                        America/Sitka
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Barthelemy' ? 'selected' : '' }}
                                                                                                        value="America/St_Barthelemy">
                                                                                                        America/St_Barthelemy
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Johns' ? 'selected' : '' }}
                                                                                                        value="America/St_Johns">
                                                                                                        America/St_Johns
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Kitts' ? 'selected' : '' }}
                                                                                                        value="America/St_Kitts">
                                                                                                        America/St_Kitts
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Lucia' ? 'selected' : '' }}
                                                                                                        value="America/St_Lucia">
                                                                                                        America/St_Lucia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Thomas' ? 'selected' : '' }}
                                                                                                        value="America/St_Thomas">
                                                                                                        America/St_Thomas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/St_Vincent' ? 'selected' : '' }}
                                                                                                        value="America/St_Vincent">
                                                                                                        America/St_Vincent
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Swift_Current' ? 'selected' : '' }}
                                                                                                        value="America/Swift_Current">
                                                                                                        America/Swift_Current
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Tegucigalpa' ? 'selected' : '' }}
                                                                                                        value="America/Tegucigalpa">
                                                                                                        America/Tegucigalpa
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Thule' ? 'selected' : '' }}
                                                                                                        value="America/Thule">
                                                                                                        America/Thule
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Thunder_Bay' ? 'selected' : '' }}
                                                                                                        value="America/Thunder_Bay">
                                                                                                        America/Thunder_Bay
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Tijuana' ? 'selected' : '' }}
                                                                                                        value="America/Tijuana">
                                                                                                        America/Tijuana
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Toronto' ? 'selected' : '' }}
                                                                                                        value="America/Toronto">
                                                                                                        America/Toronto
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Tortola' ? 'selected' : '' }}
                                                                                                        value="America/Tortola">
                                                                                                        America/Tortola
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Vancouver' ? 'selected' : '' }}
                                                                                                        value="America/Vancouver">
                                                                                                        America/Vancouver
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Whitehorse' ? 'selected' : '' }}
                                                                                                        value="America/Whitehorse">
                                                                                                        America/Whitehorse
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Winnipeg' ? 'selected' : '' }}
                                                                                                        value="America/Winnipeg">
                                                                                                        America/Winnipeg
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Yakutat' ? 'selected' : '' }}
                                                                                                        value="America/Yakutat">
                                                                                                        America/Yakutat
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'America/Yellowknife' ? 'selected' : '' }}
                                                                                                        value="America/Yellowknife">
                                                                                                        America/Yellowknife
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Casey' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Casey">
                                                                                                        Antarctica/Casey
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Davis' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Davis">
                                                                                                        Antarctica/Davis
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/DumontDUrville' ? 'selected' : '' }}
                                                                                                        value="Antarctica/DumontDUrville">
                                                                                                        Antarctica/DumontDUrville
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Macquarie' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Macquarie">
                                                                                                        Antarctica/Macquarie
                                                                                                    </option>


                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Mawson' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Mawson">
                                                                                                        Antarctica/Mawson
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/McMurdo' ? 'selected' : '' }}
                                                                                                        value="Antarctica/McMurdo">
                                                                                                        Antarctica/McMurdo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Palmer' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Palmer">
                                                                                                        Antarctica/Palmer
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Rothera' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Rothera">
                                                                                                        Antarctica/Rothera
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Syowa' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Syowa">
                                                                                                        Antarctica/Syowa
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Troll' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Troll">
                                                                                                        Antarctica/Troll
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Antarctica/Vostok' ? 'selected' : '' }}
                                                                                                        value="Antarctica/Vostok">
                                                                                                        Antarctica/Vostok
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Arctic/Longyearbyen' ? 'selected' : '' }}
                                                                                                        value="Arctic/Longyearbyen">
                                                                                                        Arctic/Longyearbyen
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Aden' ? 'selected' : '' }}
                                                                                                        value="Asia/Aden">
                                                                                                        Asia/Aden</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Almaty' ? 'selected' : '' }}
                                                                                                        value="Asia/Almaty">
                                                                                                        Asia/Almaty</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Amman' ? 'selected' : '' }}
                                                                                                        value="Asia/Amman">
                                                                                                        Asia/Amman</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Anadyr' ? 'selected' : '' }}
                                                                                                        value="Asia/Anadyr">
                                                                                                        Asia/Anadyr</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Aqtau' ? 'selected' : '' }}
                                                                                                        value="Asia/Aqtau">
                                                                                                        Asia/Aqtau</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Aqtobe' ? 'selected' : '' }}
                                                                                                        value="Asia/Aqtobe">
                                                                                                        Asia/Aqtobe</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Ashgabat' ? 'selected' : '' }}
                                                                                                        value="Asia/Ashgabat">
                                                                                                        Asia/Ashgabat
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Atyrau' ? 'selected' : '' }}
                                                                                                        value="Asia/Atyrau">
                                                                                                        Asia/Atyrau</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Baghdad' ? 'selected' : '' }}
                                                                                                        value="Asia/Baghdad">
                                                                                                        Asia/Baghdad
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Bahrain' ? 'selected' : '' }}
                                                                                                        value="Asia/Bahrain">
                                                                                                        Asia/Bahrain
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Baku' ? 'selected' : '' }}
                                                                                                        value="Asia/Baku">
                                                                                                        Asia/Baku</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Bangkok' ? 'selected' : '' }}
                                                                                                        value="Asia/Bangkok">
                                                                                                        Asia/Bangkok
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Barnaul' ? 'selected' : '' }}
                                                                                                        value="Asia/Barnaul">
                                                                                                        Asia/Barnaul
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Beirut' ? 'selected' : '' }}
                                                                                                        value="Asia/Beirut">
                                                                                                        Asia/Beirut</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Bishkek' ? 'selected' : '' }}
                                                                                                        value="Asia/Bishkek">
                                                                                                        Asia/Bishkek
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Brunei' ? 'selected' : '' }}
                                                                                                        value="Asia/Brunei">
                                                                                                        Asia/Brunei</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Chita' ? 'selected' : '' }}
                                                                                                        value="Asia/Chita">
                                                                                                        Asia/Chita</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Choibalsan' ? 'selected' : '' }}
                                                                                                        value="Asia/Choibalsan">
                                                                                                        Asia/Choibalsan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Colombo' ? 'selected' : '' }}
                                                                                                        value="Asia/Colombo">
                                                                                                        Asia/Colombo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Damascus' ? 'selected' : '' }}
                                                                                                        value="Asia/Damascus">
                                                                                                        Asia/Damascus
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Dhaka' ? 'selected' : '' }}
                                                                                                        value="Asia/Dhaka">
                                                                                                        Asia/Dhaka</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Dili' ? 'selected' : '' }}
                                                                                                        value="Asia/Dili">
                                                                                                        Asia/Dili</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Dubai' ? 'selected' : '' }}
                                                                                                        value="Asia/Dubai">
                                                                                                        Asia/Dubai</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Dushanbe' ? 'selected' : '' }}
                                                                                                        value="Asia/Dushanbe">
                                                                                                        Asia/Dushanbe
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Famagusta' ? 'selected' : '' }}
                                                                                                        value="Asia/Famagusta">
                                                                                                        Asia/Famagusta
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Gaza' ? 'selected' : '' }}
                                                                                                        value="Asia/Gaza">
                                                                                                        Asia/Gaza</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Hebron' ? 'selected' : '' }}
                                                                                                        value="Asia/Hebron">
                                                                                                        Asia/Hebron</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Ho_Chi_Minh' ? 'selected' : '' }}
                                                                                                        value="Asia/Ho_Chi_Minh">
                                                                                                        Asia/Ho_Chi_Minh
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }}
                                                                                                        value="Asia/Hong_Kong">
                                                                                                        Asia/Hong_Kong
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Hovd' ? 'selected' : '' }}
                                                                                                        value="Asia/Hovd">
                                                                                                        Asia/Hovd</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Irkutsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Irkutsk">
                                                                                                        Asia/Irkutsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Jakarta' ? 'selected' : '' }}
                                                                                                        value="Asia/Jakarta">
                                                                                                        Asia/Jakarta
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Jayapura' ? 'selected' : '' }}
                                                                                                        value="Asia/Jayapura">
                                                                                                        Asia/Jayapura
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Jerusalem' ? 'selected' : '' }}
                                                                                                        value="Asia/Jerusalem">
                                                                                                        Asia/Jerusalem
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kabul' ? 'selected' : '' }}
                                                                                                        value="Asia/Kabul">
                                                                                                        Asia/Kabul</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kamchatka' ? 'selected' : '' }}
                                                                                                        value="Asia/Kamchatka">
                                                                                                        Asia/Kamchatka
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Karachi' ? 'selected' : '' }}
                                                                                                        value="Asia/Karachi">
                                                                                                        Asia/Karachi
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kathmandu' ? 'selected' : '' }}
                                                                                                        value="Asia/Kathmandu">
                                                                                                        Asia/Kathmandu
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Khandyga' ? 'selected' : '' }}
                                                                                                        value="Asia/Khandyga">
                                                                                                        Asia/Khandyga
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kolkata' ? 'selected' : '' }}
                                                                                                        value="Asia/Kolkata">
                                                                                                        Asia/Kolkata
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Krasnoyarsk">
                                                                                                        Asia/Krasnoyarsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }}
                                                                                                        value="Asia/Kuala_Lumpur">
                                                                                                        Asia/Kuala_Lumpur
                                                                                                    </option>


                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kuching' ? 'selected' : '' }}
                                                                                                        value="Asia/Kuching">
                                                                                                        Asia/Kuching
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Kuwait' ? 'selected' : '' }}
                                                                                                        value="Asia/Kuwait">
                                                                                                        Asia/Kuwait</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Macau' ? 'selected' : '' }}
                                                                                                        value="Asia/Macau">
                                                                                                        Asia/Macau</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Magadan' ? 'selected' : '' }}
                                                                                                        value="Asia/Magadan">
                                                                                                        Asia/Magadan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Makassar' ? 'selected' : '' }}
                                                                                                        value="Asia/Makassar">
                                                                                                        Asia/Makassar
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Manila' ? 'selected' : '' }}
                                                                                                        value="Asia/Manila">
                                                                                                        Asia/Manila</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Muscat' ? 'selected' : '' }}
                                                                                                        value="Asia/Muscat">
                                                                                                        Asia/Muscat</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Nicosia' ? 'selected' : '' }}
                                                                                                        value="Asia/Nicosia">
                                                                                                        Asia/Nicosia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Novokuznetsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Novokuznetsk">
                                                                                                        Asia/Novokuznetsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Novosibirsk">
                                                                                                        Asia/Novosibirsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Omsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Omsk">
                                                                                                        Asia/Omsk</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Oral' ? 'selected' : '' }}
                                                                                                        value="Asia/Oral">
                                                                                                        Asia/Oral</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Phnom_Penh' ? 'selected' : '' }}
                                                                                                        value="Asia/Phnom_Penh">
                                                                                                        Asia/Phnom_Penh
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Pontianak' ? 'selected' : '' }}
                                                                                                        value="Asia/Pontianak">
                                                                                                        Asia/Pontianak
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Pyongyang' ? 'selected' : '' }}
                                                                                                        value="Asia/Pyongyang">
                                                                                                        Asia/Pyongyang
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Qatar' ? 'selected' : '' }}
                                                                                                        value="Asia/Qatar">
                                                                                                        Asia/Qatar</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Qostanay' ? 'selected' : '' }}
                                                                                                        value="Asia/Qostanay">
                                                                                                        Asia/Qostanay
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Qyzylorda' ? 'selected' : '' }}
                                                                                                        value="Asia/Qyzylorda">
                                                                                                        Asia/Qyzylorda
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Riyadh' ? 'selected' : '' }}
                                                                                                        value="Asia/Riyadh">
                                                                                                        Asia/Riyadh</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Sakhalin' ? 'selected' : '' }}
                                                                                                        value="Asia/Sakhalin">
                                                                                                        Asia/Sakhalin
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Samarkand' ? 'selected' : '' }}
                                                                                                        value="Asia/Samarkand">
                                                                                                        Asia/Samarkand
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Seoul' ? 'selected' : '' }}
                                                                                                        value="Asia/Seoul">
                                                                                                        Asia/Seoul</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Shanghai' ? 'selected' : '' }}
                                                                                                        value="Asia/Shanghai">
                                                                                                        Asia/Shanghai
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Singapore' ? 'selected' : '' }}
                                                                                                        value="Asia/Singapore">
                                                                                                        Asia/Singapore
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Srednekolymsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Srednekolymsk">
                                                                                                        Asia/Srednekolymsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Taipei' ? 'selected' : '' }}
                                                                                                        value="Asia/Taipei">
                                                                                                        Asia/Taipei</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Tashkent' ? 'selected' : '' }}
                                                                                                        value="Asia/Tashkent">
                                                                                                        Asia/Tashkent
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Tbilisi' ? 'selected' : '' }}
                                                                                                        value="Asia/Tbilisi">
                                                                                                        Asia/Tbilisi
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Tehran' ? 'selected' : '' }}
                                                                                                        value="Asia/Tehran">
                                                                                                        Asia/Tehran</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Thimphu' ? 'selected' : '' }}
                                                                                                        value="Asia/Thimphu">
                                                                                                        Asia/Thimphu
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Tokyo' ? 'selected' : '' }}
                                                                                                        value="Asia/Tokyo">
                                                                                                        Asia/Tokyo</option>


                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Tomsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Tomsk">
                                                                                                        Asia/Tomsk</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Ulaanbaatar' ? 'selected' : '' }}
                                                                                                        value="Asia/Ulaanbaatar">
                                                                                                        Asia/Ulaanbaatar
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Urumqi' ? 'selected' : '' }}
                                                                                                        value="Asia/Urumqi">
                                                                                                        Asia/Urumqi</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Ust-Nera' ? 'selected' : '' }}
                                                                                                        value="Asia/Ust-Nera">
                                                                                                        Asia/Ust-Nera
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Vientiane' ? 'selected' : '' }}
                                                                                                        value="Asia/Vientiane">
                                                                                                        Asia/Vientiane
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Vladivostok' ? 'selected' : '' }}
                                                                                                        value="Asia/Vladivostok">
                                                                                                        Asia/Vladivostok
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Yakutsk' ? 'selected' : '' }}
                                                                                                        value="Asia/Yakutsk">
                                                                                                        Asia/Yakutsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Yangon' ? 'selected' : '' }}
                                                                                                        value="Asia/Yangon">
                                                                                                        Asia/Yangon</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }}
                                                                                                        value="Asia/Yekaterinburg">
                                                                                                        Asia/Yekaterinburg
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Asia/Yerevan' ? 'selected' : '' }}
                                                                                                        value="Asia/Yerevan">
                                                                                                        Asia/Yerevan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Azores' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Azores">
                                                                                                        Atlantic/Azores
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Bermuda' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Bermuda">
                                                                                                        Atlantic/Bermuda
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Canary' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Canary">
                                                                                                        Atlantic/Canary
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Cape_Verde">
                                                                                                        Atlantic/Cape_Verde
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Faroe' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Faroe">
                                                                                                        Atlantic/Faroe
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Madeira' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Madeira">
                                                                                                        Atlantic/Madeira
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Reykjavik' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Reykjavik">
                                                                                                        Atlantic/Reykjavik
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/South_Georgia' ? 'selected' : '' }}
                                                                                                        value="Atlantic/South_Georgia">
                                                                                                        Atlantic/South_Georgia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/St_Helena' ? 'selected' : '' }}
                                                                                                        value="Atlantic/St_Helena">
                                                                                                        Atlantic/St_Helena
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Atlantic/Stanley' ? 'selected' : '' }}
                                                                                                        value="Atlantic/Stanley">
                                                                                                        Atlantic/Stanley
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Adelaide' ? 'selected' : '' }}
                                                                                                        value="Australia/Adelaide">
                                                                                                        Australia/Adelaide
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Brisbane' ? 'selected' : '' }}
                                                                                                        value="Australia/Brisbane">
                                                                                                        Australia/Brisbane
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Broken_Hill' ? 'selected' : '' }}
                                                                                                        value="Australia/Broken_Hill">
                                                                                                        Australia/Broken_Hill
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Darwin' ? 'selected' : '' }}
                                                                                                        value="Australia/Darwin">
                                                                                                        Australia/Darwin
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Eucla' ? 'selected' : '' }}
                                                                                                        value="Australia/Eucla">
                                                                                                        Australia/Eucla
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Hobart' ? 'selected' : '' }}
                                                                                                        value="Australia/Hobart">
                                                                                                        Australia/Hobart
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Lindeman' ? 'selected' : '' }}
                                                                                                        value="Australia/Lindeman">
                                                                                                        Australia/Lindeman
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }}
                                                                                                        value="Australia/Lord_Howe">
                                                                                                        Australia/Lord_Howe
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Melbourne' ? 'selected' : '' }}
                                                                                                        value="Australia/Melbourne">
                                                                                                        Australia/Melbourne
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Perth' ? 'selected' : '' }}
                                                                                                        value="Australia/Perth">
                                                                                                        Australia/Perth
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Australia/Sydney' ? 'selected' : '' }}
                                                                                                        value="Australia/Sydney">
                                                                                                        Australia/Sydney
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Amsterdam' ? 'selected' : '' }}
                                                                                                        value="Europe/Amsterdam">
                                                                                                        Europe/Amsterdam
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Andorra' ? 'selected' : '' }}
                                                                                                        value="Europe/Andorra">
                                                                                                        Europe/Andorra
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Astrakhan' ? 'selected' : '' }}
                                                                                                        value="Europe/Astrakhan">
                                                                                                        Europe/Astrakhan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Athens' ? 'selected' : '' }}
                                                                                                        value="Europe/Athens">
                                                                                                        Europe/Athens
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Belgrade' ? 'selected' : '' }}
                                                                                                        value="Europe/Belgrade">
                                                                                                        Europe/Belgrade
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Berlin' ? 'selected' : '' }}
                                                                                                        value="Europe/Berlin">
                                                                                                        Europe/Berlin
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Bratislava' ? 'selected' : '' }}
                                                                                                        value="Europe/Bratislava">
                                                                                                        Europe/Bratislava
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Brussels' ? 'selected' : '' }}
                                                                                                        value="Europe/Brussels">
                                                                                                        Europe/Brussels
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Bucharest' ? 'selected' : '' }}
                                                                                                        value="Europe/Bucharest">
                                                                                                        Europe/Bucharest
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Budapest' ? 'selected' : '' }}
                                                                                                        value="Europe/Budapest">
                                                                                                        Europe/Budapest
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Busingen' ? 'selected' : '' }}
                                                                                                        value="Europe/Busingen">
                                                                                                        Europe/Busingen
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Chisinau' ? 'selected' : '' }}
                                                                                                        value="Europe/Chisinau">
                                                                                                        Europe/Chisinau
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Copenhagen' ? 'selected' : '' }}
                                                                                                        value="Europe/Copenhagen">
                                                                                                        Europe/Copenhagen
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Dublin' ? 'selected' : '' }}
                                                                                                        value="Europe/Dublin">
                                                                                                        Europe/Dublin
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Gibraltar' ? 'selected' : '' }}
                                                                                                        value="Europe/Gibraltar">
                                                                                                        Europe/Gibraltar
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Guernsey' ? 'selected' : '' }}
                                                                                                        value="Europe/Guernsey">
                                                                                                        Europe/Guernsey
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Helsinki' ? 'selected' : '' }}
                                                                                                        value="Europe/Helsinki">
                                                                                                        Europe/Helsinki
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Isle_of_Man' ? 'selected' : '' }}
                                                                                                        value="Europe/Isle_of_Man">
                                                                                                        Europe/Isle_of_Man
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Istanbul' ? 'selected' : '' }}
                                                                                                        value="Europe/Istanbul">
                                                                                                        Europe/Istanbul
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Jersey' ? 'selected' : '' }}
                                                                                                        value="Europe/Jersey">
                                                                                                        Europe/Jersey
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Kaliningrad' ? 'selected' : '' }}
                                                                                                        value="Europe/Kaliningrad">
                                                                                                        Europe/Kaliningrad
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Kiev' ? 'selected' : '' }}
                                                                                                        value="Europe/Kiev">
                                                                                                        Europe/Kiev</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Kirov' ? 'selected' : '' }}
                                                                                                        value="Europe/Kirov">
                                                                                                        Europe/Kirov
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Lisbon' ? 'selected' : '' }}
                                                                                                        value="Europe/Lisbon">
                                                                                                        Europe/Lisbon
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Ljubljana' ? 'selected' : '' }}
                                                                                                        value="Europe/Ljubljana">
                                                                                                        Europe/Ljubljana
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/London' ? 'selected' : '' }}
                                                                                                        value="Europe/London">
                                                                                                        Europe/London
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Luxembourg' ? 'selected' : '' }}
                                                                                                        value="Europe/Luxembourg">
                                                                                                        Europe/Luxembourg
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Madrid' ? 'selected' : '' }}
                                                                                                        value="Europe/Madrid">
                                                                                                        Europe/Madrid
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Malta' ? 'selected' : '' }}
                                                                                                        value="Europe/Malta">
                                                                                                        Europe/Malta
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Mariehamn' ? 'selected' : '' }}
                                                                                                        value="Europe/Mariehamn">
                                                                                                        Europe/Mariehamn
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Minsk' ? 'selected' : '' }}
                                                                                                        value="Europe/Minsk">
                                                                                                        Europe/Minsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Monaco' ? 'selected' : '' }}
                                                                                                        value="Europe/Monaco">
                                                                                                        Europe/Monaco
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Moscow' ? 'selected' : '' }}
                                                                                                        value="Europe/Moscow">
                                                                                                        Europe/Moscow
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Oslo' ? 'selected' : '' }}
                                                                                                        value="Europe/Oslo">
                                                                                                        Europe/Oslo</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Paris' ? 'selected' : '' }}
                                                                                                        value="Europe/Paris">
                                                                                                        Europe/Paris
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Podgorica' ? 'selected' : '' }}
                                                                                                        value="Europe/Podgorica">
                                                                                                        Europe/Podgorica
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Prague' ? 'selected' : '' }}
                                                                                                        value="Europe/Prague">
                                                                                                        Europe/Prague
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Riga' ? 'selected' : '' }}
                                                                                                        value="Europe/Riga">
                                                                                                        Europe/Riga</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Rome' ? 'selected' : '' }}
                                                                                                        value="Europe/Rome">
                                                                                                        Europe/Rome</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Samara' ? 'selected' : '' }}
                                                                                                        value="Europe/Samara">
                                                                                                        Europe/Samara
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/San_Marino' ? 'selected' : '' }}
                                                                                                        value="Europe/San_Marino">
                                                                                                        Europe/San_Marino
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Sarajevo' ? 'selected' : '' }}
                                                                                                        value="Europe/Sarajevo">
                                                                                                        Europe/Sarajevo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Saratov' ? 'selected' : '' }}
                                                                                                        value="Europe/Saratov">
                                                                                                        Europe/Saratov
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Simferopol' ? 'selected' : '' }}
                                                                                                        value="Europe/Simferopol">
                                                                                                        Europe/Simferopol
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Skopje' ? 'selected' : '' }}
                                                                                                        value="Europe/Skopje">
                                                                                                        Europe/Skopje
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Sofia' ? 'selected' : '' }}
                                                                                                        value="Europe/Sofia">
                                                                                                        Europe/Sofia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Stockholm' ? 'selected' : '' }}
                                                                                                        value="Europe/Stockholm">
                                                                                                        Europe/Stockholm
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Tallinn' ? 'selected' : '' }}
                                                                                                        value="Europe/Tallinn">
                                                                                                        Europe/Tallinn
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Tirane' ? 'selected' : '' }}
                                                                                                        value="Europe/Tirane">
                                                                                                        Europe/Tirane
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Ulyanovsk' ? 'selected' : '' }}
                                                                                                        value="Europe/Ulyanovsk">
                                                                                                        Europe/Ulyanovsk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Uzhgorod' ? 'selected' : '' }}
                                                                                                        value="Europe/Uzhgorod">
                                                                                                        Europe/Uzhgorod
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Vaduz' ? 'selected' : '' }}
                                                                                                        value="Europe/Vaduz">
                                                                                                        Europe/Vaduz
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Vatican' ? 'selected' : '' }}
                                                                                                        value="Europe/Vatican">
                                                                                                        Europe/Vatican
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Vienna' ? 'selected' : '' }}
                                                                                                        value="Europe/Vienna">
                                                                                                        Europe/Vienna
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Vilnius' ? 'selected' : '' }}
                                                                                                        value="Europe/Vilnius">
                                                                                                        Europe/Vilnius
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Volgograd' ? 'selected' : '' }}
                                                                                                        value="Europe/Volgograd">
                                                                                                        Europe/Volgograd
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Warsaw' ? 'selected' : '' }}
                                                                                                        value="Europe/Warsaw">
                                                                                                        Europe/Warsaw
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Zagreb' ? 'selected' : '' }}
                                                                                                        value="Europe/Zagreb">
                                                                                                        Europe/Zagreb
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Zaporozhye' ? 'selected' : '' }}
                                                                                                        value="Europe/Zaporozhye">
                                                                                                        Europe/Zaporozhye
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Europe/Zurich' ? 'selected' : '' }}
                                                                                                        value="Europe/Zurich">
                                                                                                        Europe/Zurich
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Antananarivo' ? 'selected' : '' }}
                                                                                                        value="Indian/Antananarivo">
                                                                                                        Indian/Antananarivo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Chagos' ? 'selected' : '' }}
                                                                                                        value="Indian/Chagos">
                                                                                                        Indian/Chagos
                                                                                                    </option>

                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Christmas' ? 'selected' : '' }}
                                                                                                        value="Indian/Christmas">
                                                                                                        Indian/Christmas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Cocos' ? 'selected' : '' }}
                                                                                                        value="Indian/Cocos">
                                                                                                        Indian/Cocos
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Comoro' ? 'selected' : '' }}
                                                                                                        value="Indian/Comoro">
                                                                                                        Indian/Comoro
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Kerguelen' ? 'selected' : '' }}
                                                                                                        value="Indian/Kerguelen">
                                                                                                        Indian/Kerguelen
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Mahe' ? 'selected' : '' }}
                                                                                                        value="Indian/Mahe">
                                                                                                        Indian/Mahe</option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Maldives' ? 'selected' : '' }}
                                                                                                        value="Indian/Maldives">
                                                                                                        Indian/Maldives
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Mauritius' ? 'selected' : '' }}
                                                                                                        value="Indian/Mauritius">
                                                                                                        Indian/Mauritius
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Mayotte' ? 'selected' : '' }}
                                                                                                        value="Indian/Mayotte">
                                                                                                        Indian/Mayotte
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Indian/Reunion' ? 'selected' : '' }}
                                                                                                        value="Indian/Reunion">
                                                                                                        Indian/Reunion
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Apia' ? 'selected' : '' }}
                                                                                                        value="Pacific/Apia">
                                                                                                        Pacific/Apia
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Auckland' ? 'selected' : '' }}
                                                                                                        value="Pacific/Auckland">
                                                                                                        Pacific/Auckland
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Bougainville' ? 'selected' : '' }}
                                                                                                        value="Pacific/Bougainville">
                                                                                                        Pacific/Bougainville
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Chatham' ? 'selected' : '' }}
                                                                                                        value="Pacific/Chatham">
                                                                                                        Pacific/Chatham
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Chuuk' ? 'selected' : '' }}
                                                                                                        value="Pacific/Chuuk">
                                                                                                        Pacific/Chuuk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Easter' ? 'selected' : '' }}
                                                                                                        value="Pacific/Easter">
                                                                                                        Pacific/Easter
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Efate' ? 'selected' : '' }}
                                                                                                        value="Pacific/Efate">
                                                                                                        Pacific/Efate
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Enderbury' ? 'selected' : '' }}
                                                                                                        value="Pacific/Enderbury">
                                                                                                        Pacific/Enderbury
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Fakaofo' ? 'selected' : '' }}
                                                                                                        value="Pacific/Fakaofo">
                                                                                                        Pacific/Fakaofo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Fiji' ? 'selected' : '' }}
                                                                                                        value="Pacific/Fiji">
                                                                                                        Pacific/Fiji
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Funafuti' ? 'selected' : '' }}
                                                                                                        value="Pacific/Funafuti">
                                                                                                        Pacific/Funafuti
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Galapagos' ? 'selected' : '' }}
                                                                                                        value="Pacific/Galapagos">
                                                                                                        Pacific/Galapagos
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Gambier' ? 'selected' : '' }}
                                                                                                        value="Pacific/Gambier">
                                                                                                        Pacific/Gambier
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Guadalcanal' ? 'selected' : '' }}
                                                                                                        value="Pacific/Guadalcanal">
                                                                                                        Pacific/Guadalcanal
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Guam' ? 'selected' : '' }}
                                                                                                        value="Pacific/Guam">
                                                                                                        Pacific/Guam
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Honolulu' ? 'selected' : '' }}
                                                                                                        value="Pacific/Honolulu">
                                                                                                        Pacific/Honolulu
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }}
                                                                                                        value="Pacific/Kiritimati">
                                                                                                        Pacific/Kiritimati
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Kosrae' ? 'selected' : '' }}
                                                                                                        value="Pacific/Kosrae">
                                                                                                        Pacific/Kosrae
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Kwajalein' ? 'selected' : '' }}
                                                                                                        value="Pacific/Kwajalein">
                                                                                                        Pacific/Kwajalein
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Majuro' ? 'selected' : '' }}
                                                                                                        value="Pacific/Majuro">
                                                                                                        Pacific/Majuro
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Marquesas' ? 'selected' : '' }}
                                                                                                        value="Pacific/Marquesas">
                                                                                                        Pacific/Marquesas
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Midway' ? 'selected' : '' }}
                                                                                                        value="Pacific/Midway">
                                                                                                        Pacific/Midway
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Nauru' ? 'selected' : '' }}
                                                                                                        value="Pacific/Nauru">
                                                                                                        Pacific/Nauru
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'IPacific/Niue' ? 'selected' : '' }}
                                                                                                        value="Pacific/Niue">
                                                                                                        Pacific/Niue
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Norfolk' ? 'selected' : '' }}
                                                                                                        value="Pacific/Norfolk">
                                                                                                        Pacific/Norfolk
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Noumea' ? 'selected' : '' }}
                                                                                                        value="Pacific/Noumea">
                                                                                                        Pacific/Noumea
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Pago_Pago' ? 'selected' : '' }}
                                                                                                        value="Pacific/Pago_Pago">
                                                                                                        Pacific/Pago_Pago
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Palau' ? 'selected' : '' }}
                                                                                                        value="Pacific/Palau">
                                                                                                        Pacific/Palau
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Pitcairn' ? 'selected' : '' }}
                                                                                                        value="Pacific/Pitcairn">
                                                                                                        Pacific/Pitcairn
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Pohnpei' ? 'selected' : '' }}
                                                                                                        value="Pacific/Pohnpei">
                                                                                                        Pacific/Pohnpei
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Port_Moresby' ? 'selected' : '' }}
                                                                                                        value="Pacific/Port_Moresby">
                                                                                                        Pacific/Port_Moresby
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Rarotonga' ? 'selected' : '' }}
                                                                                                        value="Pacific/Rarotonga">
                                                                                                        Pacific/Rarotonga
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Saipan' ? 'selected' : '' }}
                                                                                                        value="Pacific/Saipan">
                                                                                                        Pacific/Saipan
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Tahiti' ? 'selected' : '' }}
                                                                                                        value="Pacific/Tahiti">
                                                                                                        Pacific/Tahiti
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Tarawa' ? 'selected' : '' }}
                                                                                                        value="Pacific/Tarawa">
                                                                                                        Pacific/Tarawa
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }}
                                                                                                        value="Pacific/Tongatapu">
                                                                                                        Pacific/Tongatapu
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Wake' ? 'selected' : '' }}
                                                                                                        value="Pacific/Wake">
                                                                                                        Pacific/Wake
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'Pacific/Wallis' ? 'selected' : '' }}
                                                                                                        value="Pacific/Wallis">
                                                                                                        Pacific/Wallis
                                                                                                    </option>
                                                                                                    <option
                                                                                                        {{ $general_setting->timezone == 'UTC' ? 'selected' : '' }}
                                                                                                        value="UTC">UTC
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="id2" role="tabpanel">
                                                        <form action="{{ route('admin.update-logo-favicon') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('Logo and Favicon') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">

                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="crancy__item-form--group mg-top-20">
                                                                                                        <label
                                                                                                            class="crancy__item-label">{{ __('Website Logo') }}</label>
                                                                                                        <div
                                                                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="btn-check"
                                                                                                                name="logo"
                                                                                                                id="input-img1"
                                                                                                                autocomplete="off"
                                                                                                                onchange="reviewImage(event)">
                                                                                                            <label
                                                                                                                class="crancy-image-video-upload__label"
                                                                                                                for="input-img1">
                                                                                                                <img id="view_img"
                                                                                                                    src="{{ asset($general_setting->logo) }}"
                                                                                                                    class="home2_explore_img">
                                                                                                                <h4
                                                                                                                    class="crancy-image-video-upload__title">
                                                                                                                    {{ __('Click here to') }}
                                                                                                                    <span
                                                                                                                        class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                    {{ __('and upload') }}
                                                                                                                </h4>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="crancy__item-form--group mg-top-20">
                                                                                                        <label
                                                                                                            class="crancy__item-label">{{ __('Website White Logo') }}</label>
                                                                                                        <div
                                                                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="btn-check"
                                                                                                                name="white_logo"
                                                                                                                id="input-white-img"
                                                                                                                autocomplete="off"
                                                                                                                onchange="reviewWhiteImage(event)">
                                                                                                            <label
                                                                                                                class="crancy-image-video-upload__label"
                                                                                                                for="input-white-img">
                                                                                                                <img id="view_white_img"
                                                                                                                    src="{{ asset($general_setting->white_logo) }}"
                                                                                                                    class="home2_explore_img">
                                                                                                                <h4
                                                                                                                    class="crancy-image-video-upload__title">
                                                                                                                    {{ __('Click here to') }}
                                                                                                                    <span
                                                                                                                        class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                    {{ __('and upload') }}
                                                                                                                </h4>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        @if ($theme_setting == 'business_consulting')
                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <div
                                                                                                            class="crancy__item-form--group mg-top-20">
                                                                                                            <label
                                                                                                                class="crancy__item-label">{{ __('Home Five Logo') }}</label>
                                                                                                            <div
                                                                                                                class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                                <input
                                                                                                                    type="file"
                                                                                                                    class="btn-check"
                                                                                                                    name="home_five_logo"
                                                                                                                    id="home-five-img"
                                                                                                                    autocomplete="off"
                                                                                                                    onchange="homeFiveImage(event)">
                                                                                                                <label
                                                                                                                    class="crancy-image-video-upload__label"
                                                                                                                    for="home-five-img">
                                                                                                                    <img id="view_home_five_img"
                                                                                                                        src="{{ asset($general_setting->home_five_logo) }}"
                                                                                                                        class="home2_explore_img">
                                                                                                                    <h4
                                                                                                                        class="crancy-image-video-upload__title">
                                                                                                                        {{ __('Click here to') }}
                                                                                                                        <span
                                                                                                                            class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                        {{ __('and upload') }}
                                                                                                                    </h4>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif

                                                                                        @if ($theme_setting == 'it_business')
                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <div
                                                                                                            class="crancy__item-form--group mg-top-20">
                                                                                                            <label
                                                                                                                class="crancy__item-label">{{ __('Home Six/Seven Logo') }}</label>
                                                                                                            <div
                                                                                                                class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                                <input
                                                                                                                    type="file"
                                                                                                                    class="btn-check"
                                                                                                                    name="home_six_logo"
                                                                                                                    id="home-six-img"
                                                                                                                    autocomplete="off"
                                                                                                                    onchange="homeSixImage(event)">
                                                                                                                <label
                                                                                                                    class="crancy-image-video-upload__label"
                                                                                                                    for="home-six-img">
                                                                                                                    <img id="view_home_six_img"
                                                                                                                        src="{{ asset($general_setting->home_six_logo) }}"
                                                                                                                        class="home2_explore_img">
                                                                                                                    <h4
                                                                                                                        class="crancy-image-video-upload__title">
                                                                                                                        {{ __('Click here to') }}
                                                                                                                        <span
                                                                                                                            class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                        {{ __('and upload') }}
                                                                                                                    </h4>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="col-12">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <div
                                                                                                            class="crancy__item-form--group mg-top-20">
                                                                                                            <label
                                                                                                                class="crancy__item-label">{{ __('Home Six Footer Logo') }}</label>
                                                                                                            <div
                                                                                                                class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                                <input
                                                                                                                    type="file"
                                                                                                                    class="btn-check"
                                                                                                                    name="home_six_footer_logo"
                                                                                                                    id="home-six-footer-img"
                                                                                                                    autocomplete="off"
                                                                                                                    onchange="homeSixFooterImage(event)">
                                                                                                                <label
                                                                                                                    class="crancy-image-video-upload__label"
                                                                                                                    for="home-six-footer-img">
                                                                                                                    <img id="home_six_footer_logo"
                                                                                                                        src="{{ asset($general_setting->home_six_footer_logo) }}"
                                                                                                                        class="home2_explore_img">
                                                                                                                    <h4
                                                                                                                        class="crancy-image-video-upload__title">
                                                                                                                        {{ __('Click here to') }}
                                                                                                                        <span
                                                                                                                            class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                        {{ __('and upload') }}
                                                                                                                    </h4>
                                                                                                                </label>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif

                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="crancy__item-form--group mg-top-20">
                                                                                                        <label
                                                                                                            class="crancy__item-label">{{ __('Footer Logo') }}</label>
                                                                                                        <div
                                                                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="btn-check"
                                                                                                                name="footer_logo"
                                                                                                                id="input-img-footer"
                                                                                                                autocomplete="off"
                                                                                                                onchange="footerLogo(event)">
                                                                                                            <label
                                                                                                                class="crancy-image-video-upload__label"
                                                                                                                for="input-img-footer">
                                                                                                                <img id="view_footer_img"
                                                                                                                    src="{{ asset($general_setting->footer_logo) }}"
                                                                                                                    class="home2_explore_img">
                                                                                                                <h4
                                                                                                                    class="crancy-image-video-upload__title">
                                                                                                                    {{ __('Click here to') }}
                                                                                                                    <span
                                                                                                                        class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                    {{ __('and upload') }}
                                                                                                                </h4>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-md-4">
                                                                                                    <div
                                                                                                        class="crancy__item-form--group mg-top-20">
                                                                                                        <label
                                                                                                            class="crancy__item-label">{{ __('Website favicon') }}</label>
                                                                                                        <div
                                                                                                            class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                                                            <input
                                                                                                                type="file"
                                                                                                                class="btn-check"
                                                                                                                name="favicon"
                                                                                                                id="input-favicon"
                                                                                                                autocomplete="off"
                                                                                                                onchange="reviewImage2(event)">
                                                                                                            <label
                                                                                                                class="crancy-image-video-upload__label"
                                                                                                                for="input-favicon">
                                                                                                                <img id="view_img2"
                                                                                                                    src="{{ asset($general_setting->favicon) }}">
                                                                                                                <h4
                                                                                                                    class="crancy-image-video-upload__title">
                                                                                                                    {{ __('Click here to') }}
                                                                                                                    <span
                                                                                                                        class="crancy-primary-color">{{ __('Choose File') }}</span>
                                                                                                                    {{ __('and upload') }}
                                                                                                                </h4>
                                                                                                            </label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="id3" role="tabpanel">
                                                        <form action="{{ route('admin.update-google-captcha') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('Google reCaptcha') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Visibility Status') }}
                                                                                                </label>
                                                                                                <div
                                                                                                    class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                    <label
                                                                                                        class="crancy__item-switch">
                                                                                                        <input
                                                                                                            name="status"
                                                                                                            {{ $general_setting->recaptcha_status == 1 ? 'checked' : '' }}
                                                                                                            type="checkbox">
                                                                                                        <span
                                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Captcha Site Key') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    name="site_key"
                                                                                                    value="{{ $general_setting->recaptcha_site_key }}">
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Captcha Secret Key') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    name="secret_key"
                                                                                                    value="{{ $general_setting->recaptcha_secret_key }}">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="id4" role="tabpanel">
                                                        <form action="{{ route('admin.update-tawk-chat') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('Tawk Chat') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Visibility Status') }}
                                                                                                </label>
                                                                                                <div
                                                                                                    class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                    <label
                                                                                                        class="crancy__item-switch">
                                                                                                        <input
                                                                                                            name="status"
                                                                                                            {{ $general_setting->tawk_status == 1 ? 'checked' : '' }}
                                                                                                            type="checkbox">
                                                                                                        <span
                                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Tawk Chat Link') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    name="chat_link"
                                                                                                    value="{{ $general_setting->tawk_chat_link }}">
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="openai" role="tabpanel">
                                                        <form action="{{ route('admin.update-openai-config') }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">{{ __('OpenAI Settings') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                                                <label class="crancy__item-label">{{ __('OpenAI API Key') }}</label>
                                                                                                <input class="crancy__item-input" type="text" name="openai_api_key" value="{{ $general_setting->openai_api_key ?? '' }}" placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12">
                                                                                            <div class="crancy__item-form--group mg-top-form-20">
                                                                                                <label class="crancy__item-label">{{ __('OpenAI Organization (optional)') }}</label>
                                                                                                <input class="crancy__item-input" type="text" name="openai_organization" value="{{ $general_setting->openai_organization ?? '' }} " placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn" type="submit">{{ __('Save') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="id5" role="tabpanel">
                                                        <form action="{{ route('admin.update-google-analytic') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('Google Analytic') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Visibility Status') }}
                                                                                                </label>
                                                                                                <div
                                                                                                    class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                    <label
                                                                                                        class="crancy__item-switch">
                                                                                                        <input
                                                                                                            name="status"
                                                                                                            {{ $general_setting->google_analytic_status == 1 ? 'checked' : '' }}
                                                                                                            type="checkbox">
                                                                                                        <span
                                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Analytic Id') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    name="analytic_id"
                                                                                                    value="{{ $general_setting->google_analytic_id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="id6" role="tabpanel">
                                                        <form action="{{ route('admin.update-facebook-pixel') }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="crancy-ptabs__separate">
                                                                        <div class="crancy-ptabs__form-main">
                                                                            <div class="crancy__item-group">
                                                                                <h3 class="crancy__item-group__title">
                                                                                    {{ __('Facebook Pixel') }}</h3>
                                                                                <div class="crancy__item-form--group">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Visibility Status') }}
                                                                                                </label>
                                                                                                <div
                                                                                                    class="crancy-ptabs__notify-switch  crancy-ptabs__notify-switch--two">
                                                                                                    <label
                                                                                                        class="crancy__item-switch">
                                                                                                        <input
                                                                                                            name="status"
                                                                                                            {{ $general_setting->pixel_status == 1 ? 'checked' : '' }}
                                                                                                            type="checkbox">
                                                                                                        <span
                                                                                                            class="crancy__item-switch--slide crancy__item-switch--round"></span>
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="col-12">
                                                                                            <div
                                                                                                class="crancy__item-form--group mg-top-form-20">
                                                                                                <label
                                                                                                    class="crancy__item-label">{{ __('Pixel App Id') }}
                                                                                                </label>
                                                                                                <input
                                                                                                    class="crancy__item-input"
                                                                                                    type="text"
                                                                                                    name="app_id"
                                                                                                    value="{{ $general_setting->pixel_app_id }}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class=" mg-top-40">
                                                                                <button class="crancy-btn"
                                                                                    type="submit">{{ __('Update') }}</button>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="id7" role="tabpanel">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="crancy-ptabs__separate">
                                                                    <div class="crancy-ptabs__form-main">
                                                                        <div class="crancy__item-group">
                                                                            <h3 class="crancy__item-group__title">
                                                                                {{ __('Database Clear') }}</h3>
                                                                            <div class="crancy__item-form--group">
                                                                                <div class="row">

                                                                                    <div class="col-12">
                                                                                        <div
                                                                                            class="alert alert-warning alert-has-icon">
                                                                                            <div class="alert-icon"><i
                                                                                                    class="far fa-lightbulb"></i>
                                                                                            </div>
                                                                                            <div class="alert-body">
                                                                                                <div class="alert-title">
                                                                                                    {{ __('Warning') }}
                                                                                                </div>
                                                                                                <p>{{ __('If you want to use the software from scratch, you can click here to reset the database. You do not need to remove the existing data one by one.') }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class=" mg-top-40">
                                                                            <button data-bs-toggle="modal"
                                                                                data-bs-target="#dbCleawrModal"
                                                                                class="crancy-btn"
                                                                                type="button">{{ __('Clear Now') }}</button>
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
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="dbCleawrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Clear Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to clear this database?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('admin.database-clear') }}" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Clear Now') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js_section')
    <script>
        "use strict";

        function reviewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function reviewWhiteImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_white_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function footerLogo(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_footer_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function reviewImage2(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img2');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function icon2Image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_img_5');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function homeFiveImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_home_five_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function homeSixImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('view_home_six_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function homeSixFooterImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('home_six_footer_logo');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
