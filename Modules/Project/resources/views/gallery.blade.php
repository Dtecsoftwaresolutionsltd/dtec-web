@extends('admin.master_layout')
@section('title')
    <title>{{ __('Project Gallery') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('Project Gallery') }}</h3>
    <p class="crancy-header__text">{{ __('Manage Service') }} >> {{ __('Project Gallery') }}</p>
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
                                    <div class="crancy-product-card">
                                        <div class="create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Project') }} :
                                                {{ html_decode($project->translate->title) }} <span data-toggle="tooltip"
                                                    data-placement="top" class="fa fa-info-circle text--primary"
                                                    title="{{ __('Max 3 Files') }}"></span>
                                            </h4>
                                        </div>

                                        <div class="row mg-top-30">

                                            <form id="dropzoneForm" method="post"
                                                action="{{ route('admin.upload-project', $project->id) }}"
                                                enctype="multipart/form-data" class="dropzone">
                                                @csrf

                                            </form>
                                            <div class="text-center">

                                                <button id="submit-all" class="crancy-btn mg-top-25"
                                                    type="submit">{{ __('Upload Images') }}</button>
                                                </button>
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
                        <div class="crancy-dsinner">

                            <div class="crancy-table crancy-table--v3">

                                <div class="crancy-customer-filter">
                                    <div
                                        class="crancy-customer-filter__single crancy-customer-filter__single--csearch d-flex items-center justify-between create_new_btn_box">
                                        <div
                                            class="crancy-header__form crancy-header__form--customer create_new_btn_inline_box">
                                            <h4 class="crancy-product-card__title">{{ __('Gallery Images') }}</h4>
                                        </div>
                                    </div>
                                </div>


                                <div id="crancy-table__main_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                                    <div class="car-images-inner">
                                        <div class="gallery-img-item">
                                            @foreach ($galleries as $index => $gallery_image)
                                                <div class="gallery-img-item-thumb">
                                                    <img src="{{ asset($gallery_image->image) }}" alt="img">
                                                    <button onclick="itemDeleteConfrimation({{ $gallery_image->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        class="car-delet-btn" onclick="deleteGallery(25)">
                                                        <svg width="32" height="32" viewBox="0 0 32 32"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect x="0.601562" width="31.3984" height="32" rx="15.6992"
                                                                fill="#FF603D"></rect>
                                                            <path
                                                                d="M18.734 13.375C18.512 13.375 18.332 13.5584 18.332 13.7846V21.5266C18.332 21.7527 18.512 21.9362 18.734 21.9362C18.956 21.9362 19.1359 21.7527 19.1359 21.5266V13.7846C19.1359 13.5584 18.956 13.375 18.734 13.375Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M13.9957 13.375C13.7737 13.375 13.5938 13.5584 13.5938 13.7846V21.5266C13.5938 21.7527 13.7737 21.9362 13.9957 21.9362C14.2177 21.9362 14.3976 21.7527 14.3976 21.5266V13.7846C14.3976 13.5584 14.2177 13.375 13.9957 13.375Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M10.5361 12.2463V22.3387C10.5361 22.9352 10.7507 23.4954 11.1256 23.8974C11.4988 24.3004 12.0182 24.5292 12.5617 24.5302H20.1663C20.71 24.5292 21.2294 24.3004 21.6024 23.8974C21.9773 23.4954 22.1919 22.9352 22.1919 22.3387V12.2463C22.9372 12.0447 23.4202 11.3109 23.3205 10.5315C23.2206 9.75226 22.5692 9.16934 21.798 9.16918H19.7402V8.65714C19.7425 8.22655 19.5755 7.81309 19.2764 7.50891C18.9773 7.20489 18.571 7.0356 18.1485 7.03912H14.5795C14.157 7.0356 13.7507 7.20489 13.4516 7.50891C13.1525 7.81309 12.9855 8.22655 12.9878 8.65714V9.16918H10.93C10.1588 9.16934 9.50739 9.75226 9.40753 10.5315C9.30784 11.3109 9.79078 12.0447 10.5361 12.2463ZM20.1663 23.7109H12.5617C11.8745 23.7109 11.3399 23.1093 11.3399 22.3387V12.2823H21.3881V22.3387C21.3881 23.1093 20.8535 23.7109 20.1663 23.7109ZM13.7917 8.65714C13.789 8.44385 13.8713 8.23856 14.0198 8.08799C14.1682 7.93742 14.3701 7.85469 14.5795 7.85837H18.1485C18.3579 7.85469 18.5598 7.93742 18.7082 8.08799C18.8567 8.2384 18.939 8.44385 18.9363 8.65714V9.16918H13.7917V8.65714ZM10.93 9.98843H21.798C22.1976 9.98843 22.5215 10.3185 22.5215 10.7258C22.5215 11.133 22.1976 11.4631 21.798 11.4631H10.93C10.5304 11.4631 10.2065 11.133 10.2065 10.7258C10.2065 10.3185 10.5304 9.98843 10.93 9.98843Z"
                                                                fill="white"></path>
                                                            <path
                                                                d="M16.3668 13.377C16.1448 13.377 15.9648 13.5603 15.9648 13.7866V21.5285C15.9648 21.7546 16.1448 21.9382 16.3668 21.9382C16.5888 21.9382 16.7687 21.7546 16.7687 21.5285V13.7866C16.7687 13.5603 16.5888 13.377 16.3668 13.377Z"
                                                                fill="white"></path>
                                                        </svg>

                                                    </button>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <!-- End crancy Table -->
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->


    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Delete Confirmation') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('Are you realy want to delete this item?') }}</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="item_delect_confirmation" class="delet_modal_form" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Yes, Delete') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('style_section')
    <link rel="stylesheet" href="{{ asset('global/dropzone/dropzone.min.css') }}">
    <style>
        .dropzone {
            background: white;
            border-radius: 5px;
            border: 2px dashed rgb(0, 135, 247);
            border-image: none;
            max-width: 805px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
@endpush


@push('js_section')
    <script src="{{ asset('global/dropzone/dropzone.min.js') }}"></script>

    <script>
        "use strict"

        function itemDeleteConfrimation(id) {
            $("#item_delect_confirmation").attr("action", '{{ url('admin/delete-project-gallery/') }}' + "/" + id)
        }
    </script>

    <script>
        Dropzone.options.dropzoneForm = {
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            thumbnailHeight: 200,
            thumbnailWidth: 200,
            maxFilesize: 4,
            maxFiles: 4,
            filesizeBase: 1000,
            addRemoveLinks: true,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.webp",
            init: function() {
                myDropzone = this;
                $('#submit-all').on('click', function(e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                this.on("complete", function() {
                    if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                        var _this = this;
                        _this.removeAllFiles();
                    }
                });
            },
            success: function(file, response) {
                window.location.href = response.url;
                toastr.success(response.message);
            },
        };
    </script>
@endpush
