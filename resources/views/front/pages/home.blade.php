@extends('front.layouts.master',['title'=>setting('welcome')])


@push('css')
    <style>
        .cate__items {
            padding: 32px 44px;
            transition: all 0.4s
        }

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
        }

    </style>

@endpush

@section('content')

    {{--section2 sponsers--}}
    {{--@if(section('partners')->status)--}}
    {{--    @include('front.sections.section2')--}}
    {{--@endif--}}

    {{--Join--}}
    @include('front.pages.site.sections.section8')

    {{--section3 categories of freelancers services--}}
    @include('front.pages.site.sections.section4')



    {{--section3 about--}}
    @include('front.pages.site.sections.section3')

    @if(section('Target')->status)
        {{--section3 target--}}
        @include('front.pages.site.sections.section6')

    @endif


    {{--section3 khadmat freelancers services tabs --}}
    @include('front.pages.site.sections.section5')


    {{--TopFreelancers--}}
    @include('front.pages.site.sections.section7')

    {{--TopFreelancers Not had jobs--}}
    @include('front.pages.site.sections.section10')



    {{--testimonials--}}
    @include('front.pages.site.sections.section9')

@stop


