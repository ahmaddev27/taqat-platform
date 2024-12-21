<!-- testimonial two Here -->
<section class="testimonial__section ralt pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section__title ralt text-center mb-60">
                    <h4 class="sub2 d-inline ralt base wow fadeInDown">
                        Testimonial
                    </h4>
                    <h2 class="title mt-16 mb-24 wow fadeInUp">
                        Popular Trending Services
                    </h2>
                    <p class="pra pfz-16 fw-400 inter wow fadeInDown">
                        Discover the hottest and most sought-after services that are currently trending on our AI Freelancer Marketplace. Stay ahead of the curve
                    </p>
                </div>
            </div>
        </div>

        <div class="testimonial__wraptwo owl-theme owl-carousel">

            @foreach(testimonials() as $tes )
                <div class="testimonial__items test__space shadow1 bgwhite round16">
                    <div class="quote round50 m-auto d-flex align-items-center justify-content-center">
                        <i class="bi bi-quote pra"></i>
                    </div>
{{--                    <div class="ratting mb-16 mt-24 justify-content-center d-flex align-items-center gap-2">--}}
{{--                        <i class="bi bi-star-fill ratting"></i>--}}
{{--                        <i class="bi bi-star-fill ratting"></i>--}}
{{--                        <i class="bi bi-star-fill ratting"></i>--}}
{{--                        <i class="bi bi-star-fill ratting"></i>--}}
{{--                        <i class="bi bi-star-fill ratting"></i>--}}
{{--                    </div>--}}
                    <p class="ptext3 inter fz-18 text-center fw-400 " style="height: 220px">
                        {{$tes->text}}
                    </p>
                    <div class="d-flex justify-content-center align-items-center gap-3">
                        <div class="thumb">
                            <img style="width: 60px;height: 60px" src="{{url($tes->image)}}" alt="annette">
                        </div>
                        <div class="cont">
                  <span class="fz-20 fw-600 inter ptext">
                   {{$tes->name}}
                  </span>
                            <span class="fz-16 d-block ptext fw-400 inter">
                  {{$tes->job}}
                  </span>
                        </div>
                    </div>
                </div>

            @endforeach


        </div>
    </div>
</section>
<!-- testimonial two End -->
