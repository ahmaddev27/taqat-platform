<div class="tab-pane base fade" id="nav-services" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">

        <div class="d-flex align-items-center justify-content-end mb-2 ">
            <a class="cmn--btn outline__btn">
                <span class="fz-14 pra"> <i class="bi bi-plus"></i> New Service</span>
            </a>

        </div>

        @foreach($services as $k)

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="service__item shadow2 round16 p-8 bgwhite" style="height: 525px">
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
                                <img src="{{$k->user->photo}}" style="width: 50px" class="small__thumb"
                                     alt="user">
                                <span class="fz-16 fw-500 pra inter">{{$k->user->name}}</span>
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
