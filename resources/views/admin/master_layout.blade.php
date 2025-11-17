<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Site keywords here">
    <meta name="description" content="#">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Title -->
    @yield('title')

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset($general_setting->favicon) }}">

    <!--  Stylesheet -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('global/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/overview.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/dev.css') }}">
    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">


    @stack('style_section')
</head>

<body id="crancy-dark-light">

    <div class="crancy-body-area ">
        <!-- crancy Admin Menu -->
        <div class="crancy-smenu" id="CrancyMenu">
            <!-- Admin Menu -->
            <div class="admin-menu">

                <!-- Logo -->
                <div class="logo crancy-sidebar-padding pd-right-0">
                    <a class="crancy-logo" href="{{ route('admin.dashboard') }}">
                         <img src="{{ asset($general_setting->logo) }}"
                                        alt="#">
                    </a>
                    <div id="crancy__sicon" class="crancy__sicon close-icon">
                        <span>
                            <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 1L1 6.00489L5 11.0098" stroke="#fff" stroke-width="1.2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </span>
                    </div>
                </div>

                @include('admin.sidebar')


            </div>
            <!-- End Admin Menu -->
        </div>
        <!-- End crancy Admin Menu -->

        <!-- Start Header -->
        <header class="crancy-header">
            <div class="container g-0">
                <div class="row g-0">
                    <div class="col-12">
                        <!-- Dashboard Header -->
                        <div class="crancy-header__inner">
                            <div class="crancy-header__middle">
                                <div id="crancy__sicon" class="crancy__sicon close-icon d-none">
                                    <span>
                                        <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1L5 6.00489L1 11.0098" stroke="#BFCDFF" stroke-width="1.2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                </div>

                                <div class="crancy-header__heading">
                                    @yield('body-header')

                                </div>


                                <div class="crancy-header__right">
                                    <div class="crancy-header__group">
                                        <div class="crancy-header__group-two">
                                            <div class="crancy-header__right">



                                                <!-- Header Option Group -->
                                                <div class="crancy-header__options">

                                                    <!-- Header Notifications -->
                                                    <div class="crancy-header__single">
                                                        <a target="_blank" class="crancy-header__blink"
                                                            href="{{ route('home') }}">
                                                            <i class="fas fa-globe    "></i>
                                                        </a>

                                                    </div>
                                                    <!-- End Notifications -->

                                                    <!-- Header Message -->
                                                    <div class="crancy-header__single crancy-header__single--messages">
                                                        <a class="crancy-header__blink"
                                                            href="{{ route('admin.contact-message') }}">
                                                            <svg class="crancy-header__svg--icon"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M20.7848 17.875C20.7228 17.687 20.6779 17.404 20.8029 17.131C21.2589 16.152 21.4999 15.069 21.4999 14C21.4999 11.005 19.6648 8.27499 16.9208 7.11499C15.7878 4.40799 13.1129 2.50098 10.0009 2.50098C5.86588 2.50098 2.50186 5.865 2.50186 10C2.50186 11.077 2.74095 12.161 3.19595 13.139C3.29495 13.347 3.30188 13.609 3.21988 13.869L2.56583 15.814C2.41283 16.275 2.53184 16.777 2.87784 17.123C3.12384 17.369 3.44791 17.5 3.78091 17.5C3.91691 17.5 4.05292 17.478 4.18692 17.434L6.12491 16.783C6.39391 16.698 6.65488 16.706 6.86588 16.807C6.94088 16.842 7.02081 16.867 7.09781 16.9C8.25681 19.657 10.9959 21.501 13.9999 21.501C15.0699 21.501 16.1518 21.26 17.1278 20.806C17.4028 20.68 17.688 20.725 17.871 20.785L19.8139 21.436C20.2759 21.589 20.779 21.467 21.123 21.123C21.467 20.779 21.587 20.277 21.434 19.812L20.7848 17.875ZM5.8129 15.832L3.87003 16.485C3.72703 16.533 3.62287 16.453 3.58487 16.415C3.54787 16.378 3.4668 16.276 3.5148 16.131L4.17081 14.179C4.33281 13.669 4.30798 13.146 4.10098 12.712C3.70898 11.869 3.50186 10.931 3.50186 9.99902C3.50186 6.41602 6.41688 3.5 10.0009 3.5C13.5849 3.5 16.4999 6.41602 16.4999 9.99902C16.4999 13.582 13.5849 16.498 10.0009 16.498C9.06788 16.498 8.1309 16.291 7.2919 15.901C6.8539 15.693 6.3309 15.665 5.8129 15.832ZM19.8358 18.189L20.485 20.126C20.534 20.275 20.4519 20.378 20.4149 20.415C20.3779 20.452 20.2718 20.533 20.1288 20.486L18.185 19.835C17.674 19.669 17.1639 19.69 16.7089 19.897C15.8619 20.292 14.9249 20.5 13.9999 20.5C11.7039 20.5 9.58591 19.258 8.42691 17.327C8.94391 17.439 9.47289 17.498 10.0009 17.498C14.1359 17.498 17.4999 14.134 17.4999 9.99902C17.4999 9.46202 17.4409 8.94 17.3329 8.435C19.2599 9.592 20.4999 11.707 20.4999 14C20.4999 14.925 20.2909 15.862 19.8949 16.712C19.6879 17.163 19.6678 17.672 19.8358 18.189ZM6.49991 8.5C6.49991 8.224 6.72391 8 6.99991 8H12.9999C13.2759 8 13.4999 8.224 13.4999 8.5C13.4999 8.776 13.2759 9 12.9999 9H6.99991C6.72391 9 6.49991 8.776 6.49991 8.5ZM9.99991 12H6.99991C6.72391 12 6.49991 11.776 6.49991 11.5C6.49991 11.224 6.72391 11 6.99991 11H9.99991C10.2759 11 10.4999 11.224 10.4999 11.5C10.4999 11.776 10.2759 12 9.99991 12Z" />
                                                            </svg>
                                                        </a>

                                                    </div>
                                                    <!-- End Header Message -->



                                                    <!-- Header Settings -->
                                                    <div class="crancy-header__settings">
                                                        <a class="crancy-header__blink"
                                                            href="{{ route('admin.general-setting') }}">
                                                            <svg class="crancy-header__svg--icon"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M20.7439 15.7206L20.1043 15.3289V15.3289L20.7439 15.7206ZM19.7894 17.2794L20.429 17.6711V17.6711L19.7894 17.2794ZM3.25609 8.27942L2.61648 7.88775H2.61648L3.25609 8.27942ZM4.21064 6.72057L4.85025 7.11223L4.21064 6.72057ZM6.81852 6.06172L7.1771 5.403L7.1771 5.403L6.81852 6.06172ZM3.95487 10.7383L3.59629 11.397H3.59629L3.95487 10.7383ZM17.1815 17.9383L16.8229 18.597L16.8229 18.597L17.1815 17.9383ZM20.0451 13.2617L19.6866 13.9204V13.9205L20.0451 13.2617ZM4.21064 17.2794L3.57103 17.6711L3.57103 17.6711L4.21064 17.2794ZM3.25609 15.7206L3.8957 15.3289L3.8957 15.3289L3.25609 15.7206ZM19.7894 6.72058L20.429 6.32892V6.32892L19.7894 6.72058ZM20.7439 8.27943L20.1043 8.67109V8.67109L20.7439 8.27943ZM20.0451 10.7383L20.4037 11.397L20.0451 10.7383ZM17.1815 6.06174L17.5401 6.72046V6.72046L17.1815 6.06174ZM3.95487 13.2617L4.31345 13.9205H4.31345L3.95487 13.2617ZM6.81851 17.9383L6.45994 17.2795L6.45993 17.2795L6.81851 17.9383ZM17.08 6.11698L16.7214 5.45825L17.08 6.11698ZM6.92 6.11697L6.56142 6.77569L6.56142 6.77569L6.92 6.11697ZM17.08 17.883L17.4386 17.2243L17.4386 17.2243L17.08 17.883ZM6.92 17.883L7.27858 18.5418L7.27858 18.5418L6.92 17.883ZM11.0455 3.75H12.9545V2.25H11.0455V3.75ZM12.9545 20.25H11.0455V21.75H12.9545V20.25ZM11.0455 20.25C10.3631 20.25 9.88635 19.7389 9.88635 19.2H8.38635C8.38635 20.6493 9.61906 21.75 11.0455 21.75V20.25ZM14.1136 19.2C14.1136 19.7389 13.6369 20.25 12.9545 20.25V21.75C14.3809 21.75 15.6136 20.6493 15.6136 19.2H14.1136ZM12.9545 3.75C13.6369 3.75 14.1136 4.26107 14.1136 4.8H15.6136C15.6136 3.35071 14.3809 2.25 12.9545 2.25V3.75ZM11.0455 2.25C9.61906 2.25 8.38635 3.35071 8.38635 4.8H9.88635C9.88635 4.26107 10.3631 3.75 11.0455 3.75V2.25ZM20.1043 15.3289L19.1498 16.8878L20.429 17.6711L21.3835 16.1122L20.1043 15.3289ZM3.8957 8.67108L4.85025 7.11223L3.57103 6.32891L2.61648 7.88775L3.8957 8.67108ZM4.85025 7.11223C5.15889 6.6082 5.88055 6.40506 6.45993 6.72045L7.1771 5.403C5.93027 4.72428 4.31676 5.11109 3.57103 6.32891L4.85025 7.11223ZM4.31345 10.0795C3.75746 9.77688 3.6043 9.14696 3.8957 8.67108L2.61648 7.88775C1.85352 9.13373 2.32606 10.7055 3.59629 11.397L4.31345 10.0795ZM19.1498 16.8878C18.8411 17.3918 18.1195 17.5949 17.5401 17.2795L16.8229 18.597C18.0697 19.2757 19.6832 18.8889 20.429 17.6711L19.1498 16.8878ZM21.3835 16.1122C22.1465 14.8663 21.6739 13.2945 20.4037 12.603L19.6866 13.9205C20.2425 14.2231 20.3957 14.853 20.1043 15.3289L21.3835 16.1122ZM4.85025 16.8878L3.8957 15.3289L2.61648 16.1122L3.57103 17.6711L4.85025 16.8878ZM19.1498 7.11225L20.1043 8.67109L21.3835 7.88777L20.429 6.32892L19.1498 7.11225ZM20.1043 8.67109C20.3957 9.14697 20.2425 9.77689 19.6866 10.0795L20.4037 11.397C21.6739 10.7055 22.1465 9.13374 21.3835 7.88777L20.1043 8.67109ZM17.5401 6.72046C18.1195 6.40507 18.8411 6.60822 19.1498 7.11225L20.429 6.32892C19.6832 5.1111 18.0697 4.72429 16.8229 5.40301L17.5401 6.72046ZM3.8957 15.3289C3.6043 14.853 3.75746 14.2231 4.31345 13.9205L3.59629 12.603C2.32606 13.2945 1.85352 14.8663 2.61648 16.1122L3.8957 15.3289ZM3.57103 17.6711C4.31675 18.8889 5.93027 19.2757 7.1771 18.597L6.45993 17.2795C5.88055 17.5949 5.15889 17.3918 4.85025 16.8878L3.57103 17.6711ZM17.4386 6.7757L17.5401 6.72046L16.8229 5.40301L16.7214 5.45825L17.4386 6.7757ZM6.45993 6.72045L6.56142 6.77569L7.27858 5.45824L7.1771 5.403L6.45993 6.72045ZM17.5401 17.2795L17.4386 17.2243L16.7214 18.5417L16.8229 18.597L17.5401 17.2795ZM6.56142 17.2243L6.45994 17.2795L7.17709 18.597L7.27858 18.5418L6.56142 17.2243ZM3.59629 11.397C4.07404 11.6571 4.07404 12.3429 3.59629 12.603L4.31345 13.9205C5.83498 13.0922 5.83498 10.9078 4.31345 10.0795L3.59629 11.397ZM7.27858 18.5418C7.77798 18.2699 8.38635 18.6314 8.38635 19.2H9.88635C9.88635 17.4934 8.06035 16.4084 6.56142 17.2243L7.27858 18.5418ZM15.6136 19.2C15.6136 18.6314 16.222 18.2699 16.7214 18.5417L17.4386 17.2243C15.9397 16.4083 14.1136 17.4934 14.1136 19.2H15.6136ZM20.4037 12.603C19.926 12.3429 19.926 11.6571 20.4037 11.397L19.6866 10.0795C18.165 10.9078 18.165 13.0922 19.6866 13.9204L20.4037 12.603ZM6.56142 6.77569C8.06035 7.59165 9.88635 6.50663 9.88635 4.8H8.38635C8.38635 5.3686 7.77798 5.7301 7.27858 5.45824L6.56142 6.77569ZM16.7214 5.45825C16.222 5.73011 15.6136 5.36861 15.6136 4.8H14.1136C14.1136 6.50663 15.9397 7.59166 17.4386 6.7757L16.7214 5.45825ZM14.25 12C14.25 13.2426 13.2426 14.25 12 14.25V15.75C14.0711 15.75 15.75 14.0711 15.75 12H14.25ZM12 14.25C10.7574 14.25 9.75001 13.2426 9.75001 12H8.25001C8.25001 14.0711 9.92894 15.75 12 15.75V14.25ZM9.75001 12C9.75001 10.7574 10.7574 9.75 12 9.75V8.25C9.92894 8.25 8.25001 9.92893 8.25001 12H9.75001ZM12 9.75C13.2426 9.75 14.25 10.7574 14.25 12H15.75C15.75 9.92893 14.0711 8.25 12 8.25V9.75Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <!-- Header Nav -->
                                                </div>
                                                <!-- End Header Option Group-->

                                                @php
                                                    $auth_admin = Auth::guard('admin')->user();
                                                @endphp

                                                <!-- Header Author -->
                                                <div class="crancy-header__single">
                                                    <a href="{{ route('admin.edit-profile') }}">
                                                        <div class="crancy-header__author-img">
                                                            @if ($auth_admin->image)
                                                                <img src="{{ asset($auth_admin->image) }}"
                                                                    alt="#">
                                                            @else
                                                                <img src="{{ asset($general_setting->default_avatar) }}"
                                                                    alt="#">
                                                            @endif
                                                        </div>
                                                    </a>
                                                    <!-- crancy Profile Hover -->

                                                    <!-- Dropdown List -->
                                                    <div class="crancy-dropdown crancy-dropdown--acount">
                                                        <div class="crancy-dropdown__hover--inner">
                                                            <ul class="crancy-dmenu">
                                                                <li>
                                                                    <a href="{{ route('admin.edit-profile') }}">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M12.1202 12.78C12.0502 12.77 11.9602 12.77 11.8802 12.78C10.1202 12.72 8.72021 11.28 8.72021 9.50998C8.72021 7.69998 10.1802 6.22998 12.0002 6.22998C13.8102 6.22998 15.2802 7.69998 15.2802 9.50998C15.2702 11.28 13.8802 12.72 12.1202 12.78Z"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M18.7398 19.3801C16.9598 21.0101 14.5998 22.0001 11.9998 22.0001C9.39977 22.0001 7.03977 21.0101 5.25977 19.3801C5.35977 18.4401 5.95977 17.5201 7.02977 16.8001C9.76977 14.9801 14.2498 14.9801 16.9698 16.8001C18.0398 17.5201 18.6398 18.4401 18.7398 19.3801Z"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                            <path
                                                                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </svg>
                                                                        {{ __('My Profile') }}
                                                                    </a>
                                                                </li>


                                                                <li>
                                                                    <a href="{{ route('admin.logout') }}"
                                                                        onclick="event.preventDefault();
                                                                        document.getElementById('admin-logout-form').submit();">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none">
                                                                            <path
                                                                                d="M15 10L13.7071 11.2929C13.3166 11.6834 13.3166 12.3166 13.7071 12.7071L15 14M14 12L22 12M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                                                                stroke-width="1.5"
                                                                                stroke-linecap="round" />
                                                                        </svg>
                                                                        {{ __('Logout') }}
                                                                    </a>

                                                                    <form id="admin-logout-form"
                                                                        action="{{ route('admin.logout') }}"
                                                                        method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <!-- End Dropdown List -->
                                                </div>
                                                <!-- End Header Author -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Header -->

        @yield('body-content')

    </div>

    <!--  Scripts -->
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('global/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('global/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-migrate.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('backend/js/nice-select.min.js') }}"></script>

    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>


    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {

                const session_notify_message = @json(Session::get('message'));

                if (session_notify_message != null) {
                    const session_notify_type = @json(Session::get('alert-type', 'info'));
                    switch (session_notify_type) {
                        case 'info':
                            toastr.info(session_notify_message);
                            break;
                        case 'success':
                            toastr.success(session_notify_message);
                            break;
                        case 'warning':
                            toastr.warning(session_notify_message);
                            break;
                        case 'error':
                            toastr.error(session_notify_message);
                            break;
                    }
                }

                const validation_errors = @json($errors->all());

                if (validation_errors.length > 0) {
                    validation_errors.forEach(error => toastr.error(error));
                }


                $('#dataTable').DataTable();
            });
        })(jQuery);
    </script>


    @stack('js_section')

</body>

</html>
