@extends('front.layouts.master',['title'=>$job->title])


@push('css')
    <style>

    </style>

@endpush

@section('content')

    <section class="project__details pt-120 pb-120 sectionbg2">


        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="chatbot__developers">
                        <div class="chatbot__items chatbot__items__details round16 mb-24 shadow2 bgwhite">
                            <div class="attect__trntime border round16 mb-24">
                                <h4 class="title mb-24">
                                    {{$job->title}}
                                </h4>
                                <ul class="d-flex tranding__listbase bborderdash pb-20 mb-24 align-items-center justify-content-between">


                                        <li>
                                            <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                                {{$job->specialization?->title_en}}
                                            </span>


                                        </li>

                                    <li>
                           <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                              <i class="bi bi-clock-history base fz-18"></i>
                             {{$job->created_at->format('M d,Y')}}
                           </span>
                                    </li>

                                </ul>
                                <ul class="trending__timing__list d-flex align-items-cener">
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-patch-check d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Status</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">
                                              {{ statusName($job->status) }}</span>

                                        </div>
                                    </li>


                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-ticket d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span
                                                class="fz-12 fw-500 inter pra m-1 d-block">Applies </span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">  {{$job->applies->count() > 0 ? $job->applies->count() . ' Applies' : 'Add first offer'}}</span>
                                        </div>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-cash d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Salary</span>
                                            <span
                                                class="fz-16 fw-500 inter pra m-1 d-block">   ${{$job->sallary}}</span>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <h3 class="title mb-20">
                                Description
                            </h3>
                            <p class="inter fw-400 bborderdash pb-30 mb-30 fz-16 pra">
                                {{ strip_tags($job->description) }}
                            </p>

                            @if($job->job_requirements)

                                <h4 class="title mb-24">
                                    Job Requirements
                                </h4>

                                <p class="inter fw-400 bborderdash pb-30 mb-30 fz-16 pra">
                                    {{ strip_tags($job->job_requirements) }}
                                </p>

                            @endif

                            @if($job->skills)
                                <h4 class="title mb-24">
                                    Skills Required
                                </h4>
                                <div class="chatbot__tag mb-30 pb-30 bborderdash d-flex align-items-center">
                                    @php
                                        $skills = $job->skills;
                                        if (is_string($skills)) {
                                            $skills = json_decode($skills, true);
                                        }
                                        $skills = is_array($skills) ? $skills : [];
                                    @endphp

                                    <div class="chatbot__tag mb-24 d-flex align-items-center">
                                        @foreach(array_slice($skills, 0, 4) as $skill)
                                            <a href="#" class="learning round16 fz-14 fw-500 inter base">
                                                {{$skill['value']}}
                                            </a>

                                        @endforeach
                                    </div>
                                </div>
                            @endif




                         @include('front.pages.site.jobs.partials.send-proposal')


                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-4">
                    <div class="basic__skilled__wrapper">
                        <div class="basic__boxskill mb-24 round16 bgwhite">

                            <div class="profile__check ralt mt-3">
                                <img style="object-fit: cover;width: 80px; height: 80px"  src="{{$job->company->getPhoto()}}" alt="profile">
                            </div>
                            <div class="darrell__content mt-40 text-center">
                                <h4 class="title mb-16">
                                    {{$job->company->name}}
                                </h4>
                                <span class="fz-16 fw-400 inter title">
                                        Member since {{$job->company->created_at->format('M d, Y')}}
                                     </span>
                                <ul class="social justify-content-center pt-24 mb-40 pb-40 bborderdash d-flex align-items-center">
                                    <li>
                                        <a href="#0">
                                            <i class="bi bi-facebook base"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <i class="bi bi-instagram base"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <i class="bi bi-twitter base"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <i class="bi bi-pinterest base"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#0">
                                            <i class="bi bi-dribbble base"></i>
                                        </a>
                                    </li>
                                </ul>


                                <div class="binford__loca mb-40">
                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>
                                        <span class="fz-16 fw-400 inter pra">
                                                 {{trans('main.Employment_rate')}} <span class="base"> {{$employmentRate}}%</span>
                                           </span>
                                    </div>


                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base"> {{$job->company->Openjobs->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Jobs open
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$job->company->Impjobs->count()}}</span> <span
                                            class="fz-16 fw-400 inter pra">
                                             Jobs implemented
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$job->company->completejobs->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Jobs completed
                                           </span>
                                    </div>


                                </div>

                                <a href="{{route('companies.index',$job->company_id)}}" class="cmn--btn outline__btn d-block">
                                        <span>
                                           View Profile
                                        </span>
                                    <span>
                                           <i class="bi bi-arrow-up-right"></i>
                                        </span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@stop


