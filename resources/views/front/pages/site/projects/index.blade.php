@extends('front.layouts.master',['title'=>$project->title])


@section('content')

    <section class="project__details pt-120 pb-120 sectionbg2">

        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="chatbot__developers">
                        <div class="chatbot__items chatbot__items__details round16 mb-24 shadow2 bgwhite">
                            <div class="attect__trntime border round16 mb-24">
                                <h4 class="title mb-24">
                                    {{$project->title}}
                                </h4>
                                <ul class="d-flex tranding__listbase bborderdash pb-20 mb-24 align-items-center justify-content-between">

                                    @foreach($project->specializations->take(3) as $s)
                                        <li>
                                            <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                                {{$s->specialization->title_en}}
                                            </span>


                                        </li>
                                    @endforeach
                                    <li>
                           <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                              <i class="bi bi-clock-history base fz-18"></i>
                             {{$project->created_at->format('M d,Y')}}
                           </span>
                                    </li>

                                </ul>
                                <ul class="trending__timing__list d-flex align-items-cener">
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-patch-check d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Status</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">
                                              {{ statusName($project->status) }}</span>

                                        </div>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-ticket d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span
                                                class="fz-12 fw-500 inter pra m-1 d-block">Proposals </span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">  {{$project->offers->count() > 0 ? $project->offers->count() . ' proposals' : 'Add first offer'}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-cash d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Average Proposals</span>
                                            <span
                                                class="fz-16 fw-400 inter pra m-1 d-block">  ${{  number_format( $project->average_cost,0)}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-tags d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Budget</span>
                                            <span
                                                class="fz-16 fw-500 inter pra m-1 d-block">   ${{$project->budget}}</span>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                            <h3 class="title mb-20">
                                Description
                            </h3>
                            <p class="inter fw-400 bborderdash pb-30 mb-30 fz-16 pra">
                                {{ strip_tags($project->description) }}
                            </p>

                            @if($project->received_required)

                                <h4 class="title mb-24">
                                    Required Required
                                </h4>

                                <p class="inter fw-400 bborderdash pb-30 mb-30 fz-16 pra">
                                    {{ strip_tags($project->received_required) }}
                                </p>

                            @endif

                            @if($project->skills)
                                <h4 class="title mb-24">
                                    Skills Required
                                </h4>
                                <div class="chatbot__tag mb-30 pb-30 bborderdash d-flex align-items-center">
                                    @php
                                        $skills = $project->skills;
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


                            @if($project->attachments->count()>0)

                                <div class="attachment__file mb-30 pb-30 bborderdash">
                                    <h6 class="title mb-24 fz-16">
                                        Attachments File
                                    </h6>
                                    <div class="row g-4 justify-content-center">

                                        @foreach($project->attachments as $attachment)
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <a href="{{ url($attachment->getFile()) }}" target="_blank"
                                                   class="attachment__filitem round16 d-flex align-items-center">
                                                    <i class="bi bi-file-earmark-{{ $attachment->getFileType() }} base pdf__icon"></i>
                                                    <span class="fz-20 fw-500 inter title">
                                                  {{ $attachment->getFileType() }}
                                                    </span>
                                                    <i class="bi bi-download fz-20 pra downloads bgwhite round50 d-flex align-items-center justify-content-center"></i>
                                                </a>
                                            </div>
                                        @endforeach





                                    </div>
                                </div>

                            @endif


                            @include('front.pages.site.projects.partials.send-proposal')


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="basic__skilled__wrapper">
                        <div class="basic__boxskill mb-24 round16 bgwhite">

                            <div class="profile__check ralt mt-3">
                                <img src="{{$project->company->getPhoto()}}" alt="profile">
                            </div>
                            <div class="darrell__content mt-40 text-center">
                                <h4 class="title mb-16">
                                    {{$project->company->name}}
                                </h4>
                                <span class="fz-16 fw-400 inter title">
                                        Member since {{$project->company->created_at->format('M d, Y')}}
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
                                                 {{trans('main.Employment_rate')}} <span class="base">  {{$employmentRate}}%</span>
                                           </span>
                                    </div>


                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$project->company->Openprojects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects open
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$project->company->Impprojects->count()}}</span> <span
                                            class="fz-16 fw-400 inter pra">
                                             Projects implemented
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$project->company->completeProjects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects completed
                                           </span>
                                    </div>


                                </div>
                                <a href="{{route('companies.index',$project->company->id)}}" class="cmn--btn outline__btn d-block">
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


