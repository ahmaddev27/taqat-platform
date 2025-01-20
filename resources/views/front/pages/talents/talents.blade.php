@extends('front.layouts.master',['title'=>'Talents'])


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

{{--    <!-- Hero Sections Here -->--}}
{{--    <section class="banner__breadcumn  ralt">--}}

{{--        <div class="breadcumnd__wrapper">--}}
{{--            <div class="container">--}}
{{--                <div class="row align-items-center justify-content-between">--}}
{{--                    <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-7 col-sm-7">--}}
{{--                        <div class="breadcumnd__content">--}}
{{--                  <span class="d4 mb-24">--}}
{{--                     Freelancer--}}
{{--                  </span>--}}
{{--                            <ul class="breadcun__list flex-wrap gap-1 d-flex align-items-center">--}}
{{--                                <li>--}}
{{--                                    <a href="index.html" class="fz-16 fw-400 inter text-white">--}}
{{--                                        Home--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="bi bi-chevron-right"></i>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="fz-16 fw-400 inter text-white">--}}
{{--                                        Find Talent--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="bi bi-chevron-right"></i>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="fz-16 fw-400 inter base2">--}}
{{--                                        Freelancer--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-5 col-sm-5">--}}
{{--                        <div class="featured__card">--}}
{{--                            <img src="{{asset('front/assets/img/bn/bread-service.png')}}" class="w-100" alt="img">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
{{--    <!-- Hero Section End -->--}}

    <!--service grid here-->
    <section class="service__grid pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-4">
                    <div class="card__sidebar side__sticky round16">
                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24">
                                Filter
                            </h4>

                            <form id="search" method="GET" action="">
                                <input id="searchInput" type="search" class="p-2 form-control filter__search"
                                       name="search" value="{{request()->search}}" placeholder="Search">
                                <i class="bi bi-search"></i>


                                <div class="bank__check__wrap tborderdash pb-24">
                                    <h5 class="title mb-16 pt-20">
                                        Types of Categories
                                    </h5>

                                    @foreach($specializations as $key => $label)
                                        @php
                                            $isChecked = (request()->has('specializations') && in_array($label->id, request()->specializations)) ? 'checked' : '';
                                        @endphp

                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="bank__checkitem mb-8 d-flex align-items-center">
                                                <input type="checkbox" class="form-check-input" id="{{ $key }}"
                                                       name="specializations[]"
                                                       value="{{ $label->id }}" {{ $isChecked }}>
                                                <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                       for="bank11t20">
                                                    {{ $label->title_en }}
                                                </label>
                                            </div>
                                            <span class="fw-500 inter fz-16 pra">
                        {{$label->talents_count }}
                        </span>
                                        </div>
                                    @endforeach

                                </div>

                                <div class="bank__check__wrap bborderdash pb-24 mb-24 tborderdash">
                                    <h5 class="title mb-16 pt-24">Star Category</h5>
                                    @foreach([5, 4, 3, 2, 1] as $star)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="bank__checkitem mb-8 d-flex align-items-center">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="star{{ $star }}"
                                                    name="stars[]"
                                                    value="{{ $star }}"
                                                    {{ in_array($star, request()->get('stars', [])) ? 'checked' : '' }}>
                                                <label
                                                    class="form-check-label d-flex align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                                    for="star{{ $star }}">
                                                    <i class="bi bi-star-fill ratting"></i>
                                                    {{ $star }} Star
                                                </label>
                                            </div>
                                            <span class="fw-500 inter fz-16 pra">
                {{ $talents->where('rate', '>=', $star)->count() }}
            </span>
                                        </div>
                                    @endforeach
                                </div>

                                <button style="border-radius: 100px;
  padding: 6px 144px 14px;
  text-align: center;" type="submit" id="submitBtn" href=""
                                        class="justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                    <i class="bi bi-check base fz-20"></i>
                                    Filter
                                </button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">


                    <div class="row g-4">

                        @foreach($talents as $talent)

                            <div id="{{$talent->id}}" class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <div class="frelancer__item shadow2 round16 bgwhite">
                                    <div class="d-flex mb-24 align-items-center justify-content-between">
                                        <div class="d-flex gap-2 fz-16 fw-600 inter title">
                                            <i class="bi bi-star-fill ratting"></i>
                                            {{$talent->rate}}
                                            <span class="fz-16 fw-400 inter pra">
{{--                              (34)--}}
                           </span>
                                        </div>
                                        <span class="success2 d-block fz-12 fw-600 inter">
                           {{$talent->specialization?->title_en}}
                        </span>
                                    </div>
                                    <a href="{{route('talents.index',$talent->slug)}}" class="thumbs m-auto">
                                        <img src="{{$talent->photo}}" class="rounded-circle"
                                             style="width: 100%; border: 2px solid #fffefe; height: 100%; object-fit: cover;"
                                             loading="lazy">

                                    </a>
                                    <h5 class="mt-24 text-center mb-20">
                                        <a href="{{route('talents.index',$talent->slug)}}" class="title">
                                            {{$talent->name}}
                                        </a>
                                    </h5>
                                    <div class="d-flex bborderdash pb-20 align-items-center justify-content-center">
                                        {{--                                    <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">--}}
                                        {{--                                        <i class="bi bi-stopwatch"></i>--}}
                                        {{--                                        Full-Time--}}
                                        {{--                                    </div>--}}
                                        <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">
                                            <i class="bi bi-bar-chart"></i>
                                            {{$talent->total_experience_years}} Years
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mt-20 justify-content-between">
                        <span class="fz-18 fw-500 inter base">
                        Projects
                        </span>
                                        <div
                                            class="cmn__ibox boxes1 round50 d-flex align-items-center justify-content-center text-dark">
                                            {{--                                        <i class="bi bi-chat-right-text title fz-16"></i>--}}
                                            {{$talent->projects->count()}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                    {{$talents->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}


                </div>
            </div>
        </div>
    </section>
    <!--service grid end-->


    @push('js')
        <script>
            $(document).ready(function () {
                // Remove the classes



            });
        </script>
    @endpush

@stop


