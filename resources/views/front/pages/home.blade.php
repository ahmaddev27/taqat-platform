@extends('front.layouts.master',['title'=>setting('welcome')])


@push('css')
    <style>
        .cate__items {
            padding: 32px 44px;
            transition: all 0.4s
        }
    </style>
@endpush

@section('content')


{{--section2 sponsers--}}
@if(section('partners')->status)
    @include('front.sections.section2')
@endif

{{--section3 about--}}
@include('front.sections.section3')

{{--section3 services--}}
@include('front.sections.section4')

{{--section3 khadmat--}}

@include('front.sections.section5')



@if(section('Target')->status)
    {{--section3 target--}}
    @include('front.sections.section6')

@endif

{{--TopFreelancers--}}
@include('front.sections.section7')
{{--Join--}}
@include('front.sections.section8')

{{--testimonials--}}
@include('front.sections.section9')


@stop


