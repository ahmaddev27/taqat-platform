<!-- Choose Here -->
<section class="choose__section bg__blr ralt pb-120 pt-120">
    <div class="container">
        <div class="row g-4 flex-row-reverse justify-content-between align-items-center">
            <div class="col-xl-6 col-lg-6">
                <div class="choose__content">
                    <div class="section__title mb-40">
                        <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                            About
                        </h4>
                        @php
                            $aboutSection = section('About');
                        @endphp


                        <h2 class="title mb-24 wow fadeInUp" data-wow-duration="1.2s">
                            {{$aboutSection->title}}

                        </h2>
                        <p class="ptext2 fz-16 fw-400 inter wow fadeInUp" data-wow-duration="1.4s">
                            {{$aboutSection->description}}
                        </p>
                    </div>
                    <ul class="choose__listwrap">
                        @foreach(about()->take(3) as $key=>$about)
                            <li class="d-flex mb-24 wow fadeInUp" data-wow-duration="1.{{$key}}s">
                                <img src="{{url($about->icon)}}" alt="icon"
                                     class="choose__icon fshadow bgwhite round50">
                                <span class="contentbox">
                            <span class="fz-20 d-block mb-1 fw-600 inter title">
                           {{$about->title}}
                            </span>
                            <span class="pra fz-14 fw-400 inter">
                                 {{$about->description}}
                            </span>
                            </span>
                            </li>

                        @endforeach
                    </ul>

                    <a href="#" class="cmn--btn">
                                    <span>
                            View services
                            </span>
                        <span class="ps-1">
                                    <i class="bi bi-arrow-up-right"></i>
                                    </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5">
                <div class="choose__thumb ralt">
                    {{--                    <img src="{{url(section('About')->image)}}" alt="" />--}}
                    <img src="{{asset('front/assets/img/choose/choose1.png')}}" alt="card" class="choose__mthumb">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Choose End -->
