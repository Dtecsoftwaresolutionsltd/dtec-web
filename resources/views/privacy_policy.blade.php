@extends('inner_layout')
@section('title')
    <title>{{ $seo_setting?->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting?->seo_title }}">
    <meta name="description" content="{{ $seo_setting?->seo_description }}">
@endsection
@section('frontend_content')
    <main>

        <!-- breadcrumb -->
        <x-breadcrumb name="{{ __('Privacy Policy') }}" />

        <section id="h4-pricing" class="relative w-full overflow-hidden py-16 md:py-20">
            <div class="w-full h4-pricing-wrapper">
                <div class="theme-container mx-auto">
                    <div class="w-full">
                        <div class="render-nodes">
                            {!! clean($privacy_policy?->description) !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
