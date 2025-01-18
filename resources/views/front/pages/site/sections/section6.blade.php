<!-- Perfoming section Here -->
<section class="perfoming__section bgwhite overhid pt-120 pb-120">
    <div class="container">
        <div class="row g-4">
            <div class="col-xxl-6 col-xl-6 col-lg-10">
                <div class="perfoming__content">
                    <div class="section__title mb-40">
                        <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                            Target Groups
                        </h4>
                        <h2 class="title mb-24 wow fadeInUp" data-wow-duration="1.2s">
                            {{$targetSection->title}}

                        </h2>
                        <p class="ptext2 fz-16 fw-400 inter wow fadeInUp" data-wow-duration="1.4s">
                            {{$targetSection->description}}
                        </p>
                    </div>
                    <div class="row g-4">
                        @foreach(target() as $t)

                            <div class="col-lg-6 wow fadeInDown">
                                <div class="perfoming__item d-flex">
                                    <div
                                        class="cmn__ibox transition d-flex align-items-center justify-content-center boxes1 round50">
                                        <img src="{{url($t->icon)}}" style="width:38px">
                                    </div>
                                    <div class="content">
                                        <h5 class="title mb-10">
                                            {{$t->title}}
                                        </h5>
                                        <p class="fz-14 fw-400 inter pra">
                                            {{$t->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5">
                <div class="perfoming__thumb">
                    <img src="{{asset('front/assets/img/choose/pefoming-thumb.png')}}" alt="perfoming">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Perfoming section End -->

