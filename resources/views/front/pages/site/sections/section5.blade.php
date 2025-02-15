<!-- Categoris section Here -->
<section class="service__section pt-120 pb-120  bg__tblr">
    <div class="container">

        <div class="basic__boxskill" style="box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.0);">


            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="services-tab">

                    <div class="row justify-content-center mt-30">
                        <div class="col-xxl-6 col-xl-8 col-lg-8">
                            <div class="section__title text-center mb-60">
                                <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                                    Services
                                </h4>
                                <h2 class="title mb-24 wow fadeInUp" data-wow-duration="1.2s">
                                    Popular FreeLancers Services
                                </h2>
                                <p class="ptext2 fz-16 fw-400 inter wow fadeInUp" data-wow-duration="1.4s">
                                    Discover the hottest and most sought-after services that are currently trending on
                                    our AI
                                    Freelancer Marketplace. Stay ahead of the curve
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="row justify-content-center g-4">
                        @foreach(khadmats() as $k)
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="service__item shadow2 round16 p-8 bgwhite" style="height: 525px">
                                    <a href="#" class="thumb round16 w-100">
                                        <img class="round16 w-100" src="{{ url($k->getPhoto()) }}" alt="{{ $k->title }}"
                                             style="width: 100%; height: 250px; object-fit: cover;">
                                    </a>
                                    <div class="service__content">
                                        <div class="d-flex mb-16 align-items-center justify-content-between">
                                            <a href="javascript:void(0)"
                                               class="learning round16 fz-12 fw-600 inter base">
                                                {{ $k->category?->name }}
                                            </a>
                                        </div>
                                        <h6 class="mb-16 fz-14">
                                            <a href="#" class="title">{{ $k->title }}</a>
                                        </h6>
                                        <div
                                            class="d-flex bborder pb-20 mb-20 align-items-center justify-content-between">
                                            <div class="d-flex gap-2 fz-16 fw-600 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{ number_format($k->average_review, 1) }} <!-- Use preloaded average_review -->
                                                <span class="fz-16 fw-400 inter pra">({{ $k->total_reviews??0 }})</span>
                                                <!-- Use preloaded total_reviews -->
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <img src="{{ $k->user->photo }}" style="width: 50px"
                                                     class="small__thumb" alt="user">
                                                <span class="fz-16 fw-500 pra inter">{{ $k->user->name }}</span>
                                            </div>
                                            <span class="fz-16 fw-400 inter pra">
                                                <i class="fa fa-dollar-sign"></i>
                                                <span class="fz-18 fw-600 base inter">$ {{ $k->price }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="text-center mt-40">
                            <a href="#" class="cmn--btn outline__btn">
                                <span>See All</span>
                                <span class="ps-1">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>


            </div>


        </div>

    </div>

</section>
<!-- Categoris section End -->
