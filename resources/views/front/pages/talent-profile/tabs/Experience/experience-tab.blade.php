@push('css')
    <style>
        #imagePreview-exp {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }

        #imagePreview-exp-edit {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }
    </style>
@endpush


<div class="tab-pane base fade" id="nav-exp" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">
        <div class="d-flex align-items-center justify-content-center mb-2 ">
            <a href="#" class="cmn--btn outline__btn" data-toggle="modal" data-target="#add-exp">
                <span class="fz-14 pra"> <i class="bi bi-plus"></i> Add new Experience</span>
            </a>
        </div>


        @foreach($talent->work_experiences as $w)
            <div class="col-xxl-12">
                <div class="service__item shadow-sm round16 bg-light">

                    <div class="service__content">
                        <div class="d-flex mb-16 align-items-center justify-content-between">
                            <a href="javascript:void(0)" class=" learning round16 fz-16 fw-600 inter base">
                                {{$w->job}}
                            </a>
                            <span class="success2 d-block fz-16 fw-600 inter">
                                       {{$w->start_date->format('Y / m')}}   {{ $w->end_date?'-':'- Present '}}    {{ $w->end_date?->format('Y / m') }}
                                       </span>
                        </div>


                        <div class="d-flex  pb-20 mb-20 align-items-center justify-content-between">
                            <div class="d-flex gap-2 fz-16 fw-600 inter title">

                                <span class="fz-16 fw-400 inter pra">
                            {{$w->company_name}} -  {{$w->location}}

                                </span>
                            </div>

                            @if($w->photo)
                                <p class="pra inter fz-18 fw-400 float-end">
                                    <a href="{{$w->getPhoto()}}" target="_blank">
                                        <i class="bi bi-paperclip"></i>
                                    </a>
                                    @endif

                                </p>
                        </div>

                        <div class="row justify-content-end">
                            <div class="col-auto d-flex gap-2">

                                <a href="#" class="btn btn-outline-primary round16 exp-edit" data-toggle="modal"
                                   data-target="#edit-exp" data-id="{{$w->id}}">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <a href="#" class="btn btn-outline-danger round16" id="delete" data-reload="true"
                                   data-id="{{$w->id}}" data-route="{{route('exp.delete')}}">
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


{{--Add Exp--}}
@include('front.pages.talent-profile.tabs.Experience.add-experience')
{{--Edit Exp--}}
@include('front.pages.talent-profile.tabs.Experience.edit-experience')

