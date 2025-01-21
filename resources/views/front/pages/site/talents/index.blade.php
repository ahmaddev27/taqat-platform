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


        .nav-lg {
            margin: 0 3rem !important;
        }

        @media (min-width: 992px) {
            /* Targets large screens (lg) and above */
            .nav-lg {
                margin: 0 12rem !important;
            }
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
    {{--                                        {{$talent->name}}--}}
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

    <section class="freelancer__details pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="service__detailswrapper">
                        <div class="trending__based mb-40 bgwhite round16 shadow1">
                            <div class="based__content border round16 bgwhite">
                                <div class="freelancer__profile bborderdash pb-24 mb-24 align-items-center d-flex ">
                                    <div class="profile__check ralt">
                                        <img src="{{$talent->photo}}" alt="profile">
                                        {{--                                        <i class="bi bi-check"></i>--}}
                                    </div>
                                    <div class="box__add">
                                        <h4 class="mb-10 title">
                                            {{$talent->name}}
                                        </h4>
                                        <span class="fz-16 mb-16 d-block fw-400 inter title">
                             {{@$talent->specialization->title_en}}
                           </span>
                                        <ul class="d-flex tranding__listbase align-items-center justify-content-between">
                                            {{--                                            <li>--}}
                                            {{--                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">--}}
                                            {{--                                    <i class="bi bi-geo-alt base fz-18"></i>--}}
                                            {{--                                   Japan--}}
                                            {{--                                 </span>--}}
                                            {{--                                            </li>--}}
                                            <li class="d-flex gap-2 fz-16 fw-600 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{$talent->rate}}
                                                <span class="fz-16 fw-400 inter pra">

                                 </span>
                                            </li>
                                            <li>
                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                    Member:
                                    <span class="base">
                                       {{$talent->created_at->format('M d,Y')}}
                                    </span>
                                 </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="trending__timing__list d-flex align-items-cener justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Delivery Time</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1-3 Days</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-stopwatch d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Response Times</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1 Hour</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-globe d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Level of English</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">Basic</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-shield-check d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Order completion</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">100%</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                            <div class="bborderdash pb-24 mt-30 mb-30" style="color:#222e48;!important;">
                                <h3 class="title mb-20">BIO</h3>
                                <p class="fz-16 fw-400 inter">
                                    {!! $talent->bio!!}
                                </p>
                            </div>

                            @if($talent->skills)
                                <h4 class="title mb-24">
                                    My Skills:
                                </h4>

                                <div class="chatbot__tag mb-30 pb-30 bborderdash d-flex flex-wrap align-items-center">

                                    @foreach(json_decode($talent->skills) as $skill)
                                        <div class="skill-tag m-2">
                                            <a href="#0"
                                               class="learning round16 fz-12 fw-500 inter base text-center d-inline-block">
                                                {{ $skill->value }}
                                            </a>
                                        </div>
                                    @endforeach

                                </div>
                            @endif


                            <div class="about__three__content ">
                                <!-- Nav Tabs -->
                                <ul class="nav-lg nav mt-30 mb-16 d-flex align-items-center nav-tabs" id="talentTabs">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="educations-tab" data-bs-toggle="tab"
                                                data-bs-target="#educations" type="button" role="tab"
                                                aria-controls="educations" aria-selected="true">
                                            Educations
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="experience-tab" data-bs-toggle="tab"
                                                data-bs-target="#experience" type="button" role="tab"
                                                aria-controls="experience" aria-selected="false">
                                            Experience
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="services-tab" data-bs-toggle="tab"
                                                data-bs-target="#services" type="button" role="tab"
                                                aria-controls="services" aria-selected="false">
                                            Services
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="projects-tab" data-bs-toggle="tab"
                                                data-bs-target="#projects" type="button" role="tab"
                                                aria-controls="projects" aria-selected="false">
                                            Projects

                                        </button>
                                    </li>
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content mt-3" id="talentTabsContent">
                                    <div class="tab-pane fade show active" id="educations" role="tabpanel"
                                         aria-labelledby="educations-tab">
                                        @include('front.pages.site.talents.partials.educations-tab')
                                    </div>
                                    <div class="tab-pane fade" id="experience" role="tabpanel"
                                         aria-labelledby="experience-tab">
                                        @include('front.pages.site.talents.partials.experience-tab')
                                    </div>
                                    <div class="tab-pane fade" id="services" role="tabpanel"
                                         aria-labelledby="services-tab">
                                        @include('front.pages.site.talents.partials.services-tab')
                                    </div>

                                    <div class="tab-pane fade" id="projects" role="tabpanel"
                                         aria-labelledby="projects-tab">
                                        @include('front.pages.site.talents.partials.projects-tab')
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="basic__skilled__wrapper">
                        <div class="basic__boxskill mb-24 round16 bgwhite">
                  <span class="fz-18 d-block fw-500 title inter mb-10">
                     Budget
                  </span>
                            <div class="form__price pb-24 d-flex align-items-center bborderdash">
                                <i class="bi bi-tags tags__icon"></i>
                                <span class="fz-16 d-flex align-items-center gap-2 fw-400 inter title">
                        From
                        <span class="fssizing d-flex align-items-start gap-1">
                           $399
                           <i class="bi bi-info-circle infocircle"></i>
                        </span>
                     </span>
                            </div>
                            <div class="d-flex mb-16 mt-24 align-items-center justify-content-between">
                     <span class="fz-18 fw-500 inter pra">
                        Per Pages
                     </span>
                                <h3 class="base fz-18 fw-500">
                                    $29
                                </h3>
                            </div>
                            <div class="bank__check__wrap mb-30">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank11t20" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank11t20">
                                            Prompt writing
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank22" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank22">
                                            Generated image examples
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank44t8" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank44t8">
                                            Unlimited Revisions
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank33t12">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank33t12">
                                            Image upscaling
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#0" class="cmn--btn d-flex justify-content-center d-block">
                     <span>
                        Send Proposal
                     </span>
                                <span>
                        <i class="bi bi-arrow-up-right"></i>
                     </span>
                            </a>
                        </div>
                        <div class="basic__boxskill round16 bgwhite">
                            <h4 class="title pb-24 bborderdash mb-24">
                                Linked Accounts
                            </h4>
                            <ul class="social flex-wrap d-flex align-items-center">
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-skype"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-github"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('js')
        <script>
            $(document).ready(function () {
                // // Remove the classes
                // $('#banner').removeClass('banner__section bg__img1 ralt overhid');
                // // Add the classes
                // $('#banner').addClass('banner__breadcumn  ralt');
                //
                //
                // $('#header-nav').removeClass('header-section animated slideInUp');
                // // Add the classes
                // $('#header-nav').addClass('header-section menubordert header__section__two menuborderb animated slideInUp');
                //
                // // $('header a').addClass('text-white mdnone inter fw-400');
                // // $('haderbar__top a').addClass('text-white mdnone inter fw-400');


            });
        </script>
    @endpush

@stop


