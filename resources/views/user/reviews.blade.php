@extends('inner_layout')

@section('title')
<title>{{ __('User Reviews') }}</title>
@endsection
@section('frontend_content')

<main>
    <!-- breadcrumb -->
   <x-breadcrumb name="{{ __('Reviews') }}" />
    <!-- breadcrumb-ends -->

    <!-- dashboard-starts -->
    <section class="dashboard py-20">
      <div class="theme-container mx-auto">
        <div class="flex flex-col xl:flex-row gap-30">
          <!-- dashboard-sidebar -->
         @include('user.sidebar')

         <!-- dashboard-main -->

         @if($reviews->isEmpty())
              @include('user._no_reviews')
          @else
              @include('user._with_reviews')
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
