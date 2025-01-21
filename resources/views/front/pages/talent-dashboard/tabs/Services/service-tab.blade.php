@push('css')

    <style>
        #imagePreview-service {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }

        #imagePreview-service-edit {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }
    </style>


@endpush

<div class="tab-pane base fade" id="nav-services" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">


            <div class="d-flex align-items-center justify-content-center mb-2 ">


                <a href="#" class="cmn--btn outline__btn" data-toggle="modal" data-target="#add-service">
                    <span class="fz-14 pra"> <i class="bi bi-plus"></i> Add new Service</span>
                </a>
            </div>


            @foreach($services as $k)

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="service__item shadow-sm round16 p-8 bg-light" style="height: 420px">
                        <a href="#" class="thumb round16 w-100">
                            <img class="round16 w-100" src="{{url($k->getPhoto())}}" alt="{{$k->title}}"
                                 style="width: 100%; height: 250px; object-fit: cover;">

                        </a>
                        <div class="service__content">
                            <div class="d-flex mb-16 align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                   class="learning round16 fz-12 fw-600 inter base">
                                    {{$k->category?->name}}
                                </a>
                            </div>
                            <h6 class="mb-16">
                                <a href="#" class="title">{{$k->title}}</a>
                            </h6>
                            <div
                                class="d-flex  pb-20 mb-20 align-items-center justify-content-between">
                                <div class="d-flex gap-2 fz-16 fw-600 inter title">
                                    <i class="bi bi-star-fill ratting"></i>
                                    {{ $rating = $k->averageReview() }}
                                    <span class="fz-16 fw-400 inter pra">${{$k->price}}</span>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-auto d-flex gap-2">

                                        <a href="#" class="learning base round16 service-edit" data-toggle="modal" data-target="#edit-service" data-id="{{$k->id}}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <a href="#" class="learning base round16" id="delete" data-reload="true" data-id="{{$k->id}}" data-route="{{route('service.delete')}}">
                                            <span id="spinner-delete" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>






                        </div>
                    </div>
                </div>

            @endforeach





    </div>


    @include('front.pages.talent-dashboard.tabs.Services.add-service')
    @include('front.pages.talent-dashboard.tabs.Services.edit-service')
</div>
