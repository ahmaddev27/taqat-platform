<!-- Categoris section Here -->
@if(talents()->count()>0)
<section class="freelancer__section ralt pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-8 col-lg-8">
                <div class="section__title ralt mb-40">
                    <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                        Top-Rated Freelancers
                    </h4>
                    <h2 class="title wow fadeInUp" data-wow-duration="1.2s">
                        Unleash the Power of the Best
                    </h2>
                </div>
            </div>
        </div>
        <div class="freelancer__wrapper owl-theme owl-carousel">
            @foreach(talents() as $talent)
                <div class="frelancer__item shadow2 round16 bgwhite" style="height: 380px">
                    <div class="d-flex mb-24 align-items-center justify-content-between">
                        <div class="d-flex gap-2 fz-16 fw-600 inter title">
                            <i class="bi bi-star-fill ratting"></i>
                            {{$talent->rate}}
                            <span class="fz-16 fw-400 inter pra">

                  </span>
                        </div>
                        {{--                    <span class="success2 d-block fz-16 fw-600 inter">--}}
                        {{--                  Level 1--}}
                        {{--               </span>--}}
                    </div>
                    <a href="#" class="thumbs m-auto">
                        <img src="{{$talent->photo}}" style="width: 140px; height: 140px" alt="service">
                    </a>
                    <h6 class="mt-24 mb-20">
                        <a href="#" class="title">
                            {{$talent->name}}
                        </a>
                    </h6>
                    <div class="d-flex bborderdash pb-20 align-items-center justify-content-center">
                        <div class="d-flex fz-14 fw-400 gap-2 inter pra align-items-center">
                            <i class="bi bi-tag"></i>
                            {{$talent->specialization->title_en}}
                        </div>
                        <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">
                            <i class="bi bi-bar-chart"></i>
                            {{$talent->total_experience_years}} Years
                        </div>
                    </div>
{{--                    <div class="d-flex align-items-center mt-20 justify-content-between">--}}
{{--<span class="fz-18 fw-600 inter base">--}}
{{--$32 /hr--}}
{{--</span>--}}
{{--                        <div class="cmn__ibox boxes1 round50 d-flex align-items-center justify-content-center">--}}
{{--                            <i class="bi bi-chat-right-text title fz-16"></i>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Categoris section End -->
@endif
<!-- App Here -->
