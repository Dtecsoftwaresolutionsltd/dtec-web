@extends('inner_layout')

@section('title')
<title>{{ __('User Orders') }}</title>
@endsection
@section('frontend_content')

<main>
    <!-- breadcrumb -->
    <x-breadcrumb name="{{ __('Wishlist') }}" />
    <!-- breadcrumb-ends -->

    <!-- dashboard-starts -->
    <section class="dashboard py-20">
      <div class="theme-container mx-auto">
        <div class="flex flex-col xl:flex-row gap-30">
          <!-- dashboard-sidebar -->
         @include('user.sidebar')

          <!-- dashboard-main -->

          @if($wishlists->isEmpty())
                 @include('wishlist::not_found')
              @else
                  @include('user._product')
              @endif

        </div>
      </div>
    </section>
    <!-- dashboard-end -->
  </main>

@endsection

@push('script_section')
    <script>
        "use strict";
        function changePerPage(value) {
            let currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('per_page', value);
            window.location.href = currentUrl.toString();
        }
    </script>
@endpush
