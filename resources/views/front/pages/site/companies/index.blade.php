@extends('front.layouts.master',['title'=>$company->name])
@section('content')
    @push('css')
        <style>
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

    <section class="freelancer__details pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="service__detailswrapper">
                        <div class="trending__based mb-40 bgwhite round16 shadow1">
                            <div class="based__content border round16 bgwhite mb-5  ">
                                <div class="freelancer__profile bborderdash pb-24 mb-24 align-items-center d-flex ">
                                    <div class="profile__check ralt">
                                        <img src="{{$company->getPhoto()}}" class="rounded-circle"
                                             style="width: 100%; border: 2px solid #fffefe; height: 100%; object-fit: cover;"
                                             loading="lazy">

                                    </div>
                                    <div class="box__add">
                                        <h4 class="mb-10 title">
                                            {{$company->name}}
                                        </h4>
                                        <span class="fz-16 mb-16 d-block fw-400 inter title">
                                              <i class="bi bi-envelope base fz-18"></i>
                                             {{$company->email}}
                                           </span>
                                        <ul class="d-flex tranding__listbase align-items-center justify-content-between">
                                            <li>
                                             <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                                <i class="bi bi-phone    base fz-18"></i>
                                             {{$company->mobile}}
                                             </span>
                                            </li>
                                            {{--                                            <li class="d-flex gap-2 fz-16 fw-600 inter title">--}}
                                            {{--                                                <i class="bi bi-star-fill ratting"></i>--}}
                                            {{--                                                {{$company->rate}}--}}
                                            {{--                                                <span class="fz-16 fw-400 inter pra">--}}

                                            {{--                                 </span>--}}
                                            {{--                                            </li>--}}
                                            <li>
                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                    Member:
                                    <span class="base">
                                       {{$company->created_at->format('M d,Y')}}
                                        </span>
                                     </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="trending__timing__list d-flex align-items-cener justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-list d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Projects</span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">{{$company->projects->count()}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-list-nested d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Jobs</span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">{{$company->jobs->count()}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Location</span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">{{$company->location}}</span>
                                        </div>
                                    </li>
                                    {{--                                    <li class="d-flex align-items-center">--}}
                                    {{--                                        <i class="bi bi-shield-check d-flex align-items-center justify-content-center"></i>--}}
                                    {{--                                        <div class="box">--}}
                                    {{--                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Order completion</span>--}}
                                    {{--                                            <span class="fz-16 fw-400 inter pra m-1 d-block">100%</span>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </li>--}}
                                </ul>
                            </div>

                            @if($company->description)
                                <div class="bborderdash pb-24 mt-30 mb-30" style="color:#222e48;!important;">
                                    <h3 class="title mb-20">BIO</h3>
                                    <p class="fz-16 fw-400 inter">
                                        {!! $company->description!!}
                                    </p>
                                </div>

                            @endif

                            <div class="about__three__content ">

                                <ul class="nav-lg nav mt-30 mb-16 d-flex align-items-center nav-tabs" id="myTab"
                                    role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="projects-tab" data-bs-toggle="tab"
                                                data-bs-target="#projects" type="button" role="tab"
                                                aria-controls="projects"
                                                aria-selected="false">
                                            Projects
                                        </button>
                                    </li>

                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link " id="Jobs-tab" data-bs-toggle="tab"
                                                data-bs-target="#Jobs" type="button" role="tab"
                                                aria-controls="Jobs" aria-selected="true">
                                            Jobs
                                        </button>
                                    </li>
                                </ul>


                                <div class="tab-content" id="myTabContent">

                                    @include('front.pages.site.companies.partials.projects-tab')
                                    @include('front.pages.site.companies.partials.jobs-tab')

                                </div>

                            </div>
                        </div>


                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="basic__skilled__wrapper">
                        <div class="basic__boxskill mb-24 round16 bgwhite">


                            <div class="binford__loca mb-40">
                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>
                                    <span class="fz-16 fw-400 inter pra">
                                            Jobs    {{trans('main.Employment_rate')}} <span class="base"> {{$employmentRate_jobs}}%</span>
                                           </span>
                                </div>


                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base"> {{$company->Openjobs->count()}}</span>
                                    <span class="fz-16 fw-400 inter pra">
                                              Jobs open
                                           </span>
                                </div>

                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base">   {{$company->Impjobs->count()}}</span> <span
                                        class="fz-16 fw-400 inter pra">
                                             Jobs implemented
                                           </span>
                                </div>

                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base">   {{$company->completejobs->count()}}</span>
                                    <span class="fz-16 fw-400 inter pra">
                                              Jobs completed
                                           </span>
                                </div>


                                <div class="binford__loca mb-40">
                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>
                                        <span class="fz-16 fw-400 inter pra">
                                           Projects  Employment Rate <span
                                                class="base">  {{$employmentRate_projects}}%</span>
                                           </span>
                                    </div>


                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->Openprojects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects open
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->Impprojects->count()}}</span> <span
                                            class="fz-16 fw-400 inter pra">
                                             Projects implemented
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->completeProjects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects completed
                                           </span>
                                    </div>


                                </div>


                            </div>

                            <div class=" round16 ">
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

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop


