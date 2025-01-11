<!-- Categoris section Here -->
<section class="categoris__section pt-120 pb-120  bgwhite">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-8 col-lg-8">
                <div class="section__title text-center mb-60">
                    <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                        {{section('services')->title}}
                    </h4>
                    <h2 class="title mb-24 wow fadeInUp" data-wow-duration="1.2s">

                        Popular Trending Services
                    </h2>
                    <p class="ptext2 fz-16 fw-400 inter wow fadeInUp" data-wow-duration="1.4s">

                        {{section('services')->description}}
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center g-0">

            @foreach(Khadmat_categories() as $key=>$service)
            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="cate__items bgwhite bright bborder  bgwhite">
                    <div class="icon m-auto d-flex align-items-center justify-content-center boxes1 round50">
                        <img  src="{{url($service->image)}}" alt="machine">
                    </div>
                    <div class="content text-center mt-30">
                        <h6 class="mb-10 transition">
                            <a href="service-grid.html" class="title">
                                {{$service->name}}
                            </a>
                        </h6>

{{--                        <a href="service-grid.html" class="arrow m-auto boxes1 round50 d-flex align-items-center justify-content-center">--}}
{{--                            <i class="bi bi-chevron-right"></i>--}}
{{--                        </a>--}}
                    </div>
                </div>
            </div>
            @endforeach

        </div>
{{--        <div class="text-center mt-40">--}}
{{--            <a href="service-grid.html" class="cmn--btn outline__btn">--}}
{{--            <span>--}}
{{--               See All Services--}}
{{--            </span>--}}
{{--                <span class="ps-1">--}}
{{--               <i class="bi bi-arrow-up-right"></i>--}}
{{--            </span>--}}
{{--            </a>--}}
{{--        </div>--}}
    </div>
</section>
<!-- Categoris section End -->
