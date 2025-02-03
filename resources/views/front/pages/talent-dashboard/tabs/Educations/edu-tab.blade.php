@push('css')
    <style>
        #imagePreview-edu {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }
        #imagePreview-edu-edit {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }

        .error {
            color: red;
            /*font-size: 12px;*/
            margin-top: 2px;
        }


    </style>

@endpush
{{--Edus--}}
<div class="tab-pane base fade" id="nav-edu" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">


        <div class="d-flex align-items-center justify-content-center mb-2 ">
            <a href="#" class="cmn--btn outline__btn" data-toggle="modal" data-target="#add-edu">
                <span class="fz-14 pra"> <i class="bi bi-plus"></i> Add new Education</span>
            </a>
        </div>


        @if($talent->scientificCertificate->count()>0)


        @foreach($talent->scientificCertificate as $e)

            <div class="col-12 col-md-6 col-lg-4 col-xxl-12">
                <div class="service__item shadow-sm round16 bg-light p-2">
                    <div class="service__content">
                        <div class="d-flex mb-16 align-items-center justify-content-between">
                            <a href="javascript:void(0)" class="learning round16 fz-16 fw-600 inter base">
                                {{$e->title}}
                            </a>
                            <span class="success2 d-block fz-16 fw-600 inter">
                    {{$e->graduation_year}}
                </span>
                        </div>

                        <h5 class="mb-16">
                            <a href="#l" class="title">
                                {{$e->specialization}}
                            </a>
                        </h5>

                        <div class="d-flex flex-column flex-sm-row pb-20 mb-20 align-items-start align-items-sm-center justify-content-between">
                            <div class="d-flex gap-2 fz-16 fw-600 inter title">
                    <span class="fz-16 fw-400 inter pra">
                        {{$e->college}} - {{$e->university}}
                    </span>
                            </div>

                            @if($e->photo)
                                <p class="pra inter fz-18 fw-400 mt-2 mt-sm-0">
                                    <a href="{{url($e->getPhoto())}}" class="learning base round16 d-flex align-items-center " target="_blank">
                                        <i class="bi bi-file-earmark-{{ $e->getFileType() }}"></i>
                                    </a>
                                </p>
                            @endif
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-auto d-flex gap-2">

                                <a href="#" class="learning base round16 edu-edit" data-toggle="modal" data-target="#edit-edu" data-id="{{$e->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="#" class="learning base round16" id="delete" data-reload="true" data-id="{{$e->id}}" data-route="{{route('edu.delete')}}">
                                    <span id="spinner-delete" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        @endif

    </div>


</div>


{{--Add Edu--}}
@include('front.pages.talent-dashboard.tabs.Educations.add-edu')
{{--Edit Edu--}}
@include('front.pages.talent-dashboard.tabs.Educations.edit-edu')


