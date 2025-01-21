@push('css')

    <!-- Krajee FileInput CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">

    <style>
        #imagePreview-project {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }

        #imagePreview-project-edit {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }
    </style>

@endpush

<div class="tab-pane base fade" id="nav-projects" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">

        <div class="d-flex align-items-center justify-content-center mb-2 ">
            <a href="#" class="cmn--btn outline__btn" data-toggle="modal" data-target="#add-project">
                <span class="fz-14 pra"> <i class="bi bi-plus"></i> New Projects</span>
            </a>
        </div>


        @foreach($talent->projects as $project)

            <div class="col-xxl-12 col-xl-12 col-lg-6 col-md-6 col-sm-12">
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

                        <h6 class="">
                            <a href="#" class="title">{{$project->title}}</a>
                        </h6>

                        <div class="row justify-content-end mt-10">
                            <div class="col-auto d-flex  gap-2 ">

                                <a href="#" class="learning base round16 project-edit border-0" data-toggle="modal"
                                   data-target="#edit-project" data-id="{{$project->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="#" class="learning base round16 border-0" id="delete" data-reload="true"
                                   data-id="{{$project->id}}" data-route="{{route('project.delete')}}">
                        <span id="spinner-delete" class="spinner-grow spinner-grow-sm d-none" role="status"
                              aria-hidden="true"></span>
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach


    </div>
</div>


@push('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-fileinput/js/fileinput.min.js"></script>

@endpush

@include('front.pages.talent-dashboard.tabs.Project.details')
@include('front.pages.talent-dashboard.tabs.Project.add-project')
@include('front.pages.talent-dashboard.tabs.Project.edit-project')
