@if($talent->khadmats->count()>0)
    <div class="trending__based mb-40 bgwhite round16 ">
        <h3 class="title pb-24  mb-24">
             Services
        </h3>


        <div class="row g-4 justify-content-center">
            @foreach($talent->khadmats as $k)
                <div class="col-xxl-6  col-xl-6  col-lg-6  col-md-6 col-sm-6">
                    <div class="service__item  round16 p-8 bg-light"
                         style="height: 525px">
                        <a href="#" class="thumb round16 w-100">
                            <img class="round16 w-100" src="{{url($k->getPhoto())}}"
                                 alt="{{$k->title}}"
                                 style="width: 100%; height: 250px; object-fit: cover;">

                        </a>
                        <div class="service__content">
                            <div
                                class="d-flex mb-16 align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                   class="learning round16 fz-12 fw-600 inter base">
                                    {{$k->category?->name}}
                                </a>
                            </div>
                            <h5 class="mb-16">
                                <a href="#" class="title">{{$k->title}}</a>
                            </h5>
                            <div
                                class="d-flex bborder pb-20 mb-20 align-items-center justify-content-between">
                                <div class="d-flex gap-2 fz-16 fw-600 inter title">
                                    <i class="bi bi-star-fill ratting"></i>
                                    {{ $rating = $k->averageReview() }}
                                    <span class="fz-16 fw-400 inter pra">({{$k->reviews->count()}})</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{$k->user->photo}}" style="width: 50px"
                                         class="small__thumb"
                                         alt="user">
                                    <span
                                        class="fz-16 fw-500 pra inter">{{$k->user->name}}</span>
                                </div>
                                <span class="fz-16 fw-400 inter pra">
                                            <i class="fa fa-dollar-sign"></i> <span
                                        class="fz-18 fw-600 base inter">${{$k->price}}</span>
                                        </span>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@else

        <div class="freelanc__inneredu mb-40 align-items-center d-flex">

            <div class="content__box round16 w-100">
                <span class="fz-20 fw-500 inter title d-block mb-16 text-center">No Services Found</span>

            </div>
        </div>
@endif
