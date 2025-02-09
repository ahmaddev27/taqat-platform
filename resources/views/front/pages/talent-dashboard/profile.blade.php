@extends('front.layouts.master',['title'=>$talent->name])
@section('content')

    @push('css')

        <style>
            .ql-container {
                height: 30%;
            }

        </style>

    @endpush

    <!-- profile section Here -->
    <section class="profile__section sectionbg pb-120" style="margin-top: 200px">


        <div class="container">

            <div class="profile__customize">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="darrell__profile bg-white round16 shadow2">
                            <div class="row g-0">
                                <!-- Column for Total Balance -->
                                <div class="col-12 col-sm-4 text-center py-3 border-sm-end">
                                    <h5 class="font-md-1 font-small mb-0" style="color: #2c2b2b">Balance</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>

                                <!-- Column for Withdrawable Balance -->
                                <div class="col-12 col-sm-4 text-center py-3">
                                    <h5 class="mb-0" style="color: #2c2b2b">Can withdraw</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>
                                <!-- Column for Balance View Button -->
                                <div class="col-12 col-sm-4 round16" style="background-color: #0d47a1;">
                                    <a href="#" class="d-block text-center text-white p-3">
                                        <h4 class="mb-0 mt-2" title="view">
                                            <i class="bi bi-wallet2"
                                               style="font-size: 30px; display: block; line-height: 1;"></i>
                                            <span style="display: block; margin-top: 10px; font-size: 20px;">View</span>
                                        </h4>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="container py-5">
                <div class="row g-3">

                    <div class="row g-4">


                        <div class="col-lg-4">
                            <div class="main__profile__sidebar">


                                <div class="nav mb-24 round16 d-flex align-items-center row">
                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-people" style="font-size: 25px"></i>
                                            <span class="text-center">Teams</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Teams Offers</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-chat" style="font-size: 25px"></i>
                                            <span class="text-center">Chats</span>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <a href="{{route('applyJobs.index')}}"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Job Offers</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="{{route('proposals.index')}}"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Offers</span>
                                        </a>
                                    </div>

                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-list-ul" style="font-size: 25px"></i>
                                            <span class="text-center">Services</span>
                                        </a>
                                    </div>

                                </div>


                                <div class="darrell__profile round16 mb-24 bgwhite">
                                    <div class="profile__check ralt shadow2-sm">
                                        <img src="{{$talent->getPhoto()}}" alt="profile">
                                        {{-- <i class="bi bi-check"></i> --}}
                                    </div>

                                    <div class="darrell__content mt-40 text-center">
                                        <h4 class="title mb-16">
                                            {{$talent->name}}
                                        </h4>
                                        <span class="fz-16 fw-400 inter title">
                                        {{$talent->specialization?->title_en}}
                                    </span>

                                        <ul class="d-flex mt-24 justify-content-center employer__listbase flex-wrap tranding__listbase align-items-center">
                                            {{--                                            <li>--}}
                                            {{--                                            <span class="fz-16 fw-400 inter pra">--}}
                                            {{--                                                salary--}}
                                            {{--                                                {{$talent->sallary}}--}}
                                            {{--                                            </span>--}}
                                            {{--                                            </li>--}}
                                            <li class="d-flex gap-2 fz-16 fw-500 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{$talent->rate}}
                                                {{--
                                              <span class="pra fz-14">(114)</span>--}}
                                            </li>
                                            <li>
                              <span class="fz-16 fw-400 inter pra">
                                 Member: <span class="base">{{$talent->created_at->format('M d,Y')}}</span>
                              </span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="all__editbar round16 bgwhite ">
                                    <div class="description__edit ralt pb-24 bborderdash commn__spacenone">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item w-100 mb-16 d-flex align-items-center justify-content-between"
                                                role="presentation">
                                             <span class="fz-24 fw-600 inter title">
                                                         BIO
                                                      </span>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fz-16 fw-400 inter title base fade show active"
                                                 id="home"
                                                 role="tabpanel">

                                                {!! $talent->bio!!}
                                            </div>

                                        </div>
                                    </div>

                                    @if($talent->skills && is_array(json_decode($talent->skills)))

                                    <div
                                            class="description__edit pt-24 ralt pb-24  commn__spacenone">
                                            <ul class="nav" role="tablist">
                                                <li class="nav-item w-100 mb-16 d-flex align-items-center justify-content-between"
                                                    role="presentation">
                                                  <span class="fz-24 fw-600 inter title">
                                                     Skills
                                                  </span>

                                                </li>
                                            </ul>


                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="skew" role="tabpanel">



                                                            <div class="chatbot__tag mb-30 pb-30  d-flex flex-wrap align-items-center">

                                                                @foreach(json_decode($talent->skills) as $skill)
                                                                    <div class="skill-tag">
                                                                        <a href="#0"
                                                                           class="learning round16 fz-12 fw-500 inter base text-center d-inline-block">
                                                                            {{ $skill->value }}
                                                                        </a>
                                                                    </div>
                                                                @endforeach



                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="create__gigpublist round16 bgwhite shadow2">


                                <div class="nav mb-40  round16 d-flex align-items-center nav-tabs" role="tablist">
                                    {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"--}}
                                    {{--                                        id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"--}}
                                    {{--                                        role="tab" aria-controls="nav-home" aria-selected="true">--}}
                                    {{--                                    <i class="bi bi-file-earmark-plus"></i>--}}
                                    {{--                                    New Gig--}}
                                    {{--                                </button>--}}

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"
                                            id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                            type="button" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">
                                        <i class="bi bi-pencil-square" style="font-size: 25px"></i>
                                        Profile
                                    </button>


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-password"
                                            type="button" role="tab" aria-controls="nav-password"
                                            aria-selected="false">
                                        <i class="bi bi-key" style="font-size: 25px"></i>
                                        Password
                                    </button>

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-edu"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-mortarboard" style="font-size: 25px"></i>

                                        Education
                                    </button>

                                    {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"--}}
                                    {{--                                        id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-edu"--}}
                                    {{--                                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">--}}
                                    {{--                                    <i class="bi bi-patch-check"></i>--}}
                                    {{--                                    Courses--}}
                                    {{--                                </button>--}}


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-exp"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-list-stars" style="font-size: 25px"></i>

                                        Experiences
                                    </button>

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-projects"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-briefcase" style="font-size: 25px"></i>
                                        Projects
                                    </button>


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-services"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-list-ul" style="font-size: 25px"></i>

                                        Services

                                    </button>

                                </div>


                                <div class="tab-content">

                                    @include('front.pages.talent-dashboard.tabs.profile-tab')

                                    @include('front.pages.talent-dashboard.tabs.password-tab')


                                    @include('front.pages.talent-dashboard.tabs.Educations.edu-tab')
                                    {{--                                @include('front.pages.talent-profile.tabs.Courses.edu-tab')--}}
                                    @include('front.pages.talent-dashboard.tabs.Services.service-tab')
                                    @include('front.pages.talent-dashboard.tabs.Experience.experience-tab')
                                    @include('front.pages.talent-dashboard.tabs.Project.projects-tab')


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- profile section End -->f

@stop
