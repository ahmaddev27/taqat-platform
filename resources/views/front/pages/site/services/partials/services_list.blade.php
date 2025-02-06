@if($services->count()>0)

    <div class="row">
        @foreach($services as $service)
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 p-2">
                <div class="service__item shadow2 round16 p-8 bgwhite" style="height: 525px">
                    <a href="{{route('services.index',$service->slug)}}" class="thumb round16 w-100">
                        <img class="round16 w-100" src="{{ url($service->getPhoto()) }}" alt="{{ $service->title }}"
                             style="width: 100%; height: 250px; object-fit: cover;">
                    </a>

                    <div class="service__content">
                        <div class="d-flex mb-16 align-items-center justify-content-between">
                            <a href="javascript:void(0)" class=" learning round16 fz-10 fw-600 inter base">
                                {{ $service->category?->name }}
                            </a>
                            <span class="success2 d-block fz-12 fw-600 inter">
                                     {{$service->orders_count??0}} Orders
                            </span>
                        </div>


                        <h5 class="mb-16">
                            <a href="{{route('services.index',$service->slug)}}" class="title fz-12">
                                {!! $service->title !!}
                            </a>
                        </h5>
                        <div class="d-flex align-items-center justify-content-between bborder pb-20 mb-20">

                            <div class="d-flex align-items-center gap-2 fz-16 fw-600 inter title">
                                <i class="bi bi-star-fill ratting"></i>
                                {{ $service->average_review }}
                                <span class="fz-16 fw-400 inter pra">({{ $service->total_reviews }})</span>
                            </div>


                        </div>


                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $service->user->photo }}" class="small__thumb" style="width: 50px"
                                     alt="user">
                                <span class="fz-16 fw-500 pra inter">{{ $service->user->name }}</span>
                            </div>
                            <div class="d-flex align-items-center gap-1">
                                <i class="fa fa-dollar-sign"></i>
                                <span class="fz-16 fw-600 base inter">$ {{ $service->price }}</span>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination-links">
    {{$services->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}
    </div>
@else
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-center">
            <h5 class="title text-center justify-content-center  fz-18 fw-500  inte">
                No Results
            </h5>

        </div>
    </div>
@endif
