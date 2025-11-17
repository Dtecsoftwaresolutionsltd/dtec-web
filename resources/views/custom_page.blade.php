@extends('inner_layout')
@section('title')
<title>{{$custom_page?->page_name }}</title>
<meta name="title" content="{{ $custom_page?->page_name }}">
<meta name="description" content="{{ $custom_page?->page_name }}">
@endsection
@section('frontend_content')
<main>

    <!-- breadcrumb -->
    <x-breadcrumb name="{{ $custom_page?->page_name }}" />

    <section id="h4-pricing" class="relative w-full overflow-hidden">
        <div class="w-full h4-pricing-wrapper pb-6 md:pb-12 pt-16 md:pt-[130px] pricing_section_bg">
            <div class="theme-container mx-auto">
                <div class="w-full">
                    <div class="render-nodes">
                        {!! clean($custom_page?->description) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
