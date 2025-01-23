
@if($talent->projects->count()>0)
<div class="row">

@foreach($talent->projects as $project)

    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2">
        <div class="service__item shadow-sm round16 p-8 bg-light" style="height: 100%">
            <a href="#" class="thumb round16 w-100"
               data-toggle="modal" data-target="#exampleModal"
               data-title="{{ $project->title }}"
               data-description="{!!  htmlspecialchars( $project->description)   !!}"
               data-url="{{$project->url ? url($project->url):'' }}"
               data-images="{{ $project->images->map(fn($image) => $image->getPhoto())->toJson() }}">
                <img loading="lazy" class="round16 w-100" src="{{url($project->getPhoto())}}"
                     alt="{{$project->title}}"
                     style="width: 100%; height: 250px; object-fit: cover;">
            </a>
            <div class="service__content">
                <div class="d-flex mb-16 align-items-center justify-content-between">
                    <a href="javascript:void(0)"
                       class="learning round16 fz-12 fw-600 inter base">
                        {{$project->project_type_relation?->title}}
                    </a>
                </div>

                <h6 class="fz-12">
                    <a href="#" class="title">{{$project->title}}</a>
                </h6>

            </div>
        </div>
    </div>

@endforeach


</div>
@include('front.pages.talent-dashboard.tabs.Project.details')

@else

        <div class="freelanc__inneredu mb-40 align-items-center d-flex">

            <div class="content__box round16 w-100">
                <span class="fz-20 fw-500 inter title d-block mb-16 text-center">No Projects Found</span>

            </div>
        </div>
        @endif
