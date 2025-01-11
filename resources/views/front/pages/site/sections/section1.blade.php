<div class="row justify-content-between align-items-center">
    <div class="col-xl-6 col-lg-7">
        <div class="banner__content banner__onespace ralt">
            <h4 class="base mb-16 wow fadeInDown">
                {{sliders()[0]->title}}
            </h4>
            <span class="d3 title mb-24 fw-600 wow fadeInUp">


                     <span class="hover">{{setting('name')}}</span> Made <span class="hover">Smart</span> Freelancing Easy
                 </span>
            <p class="fz-20 fw-400 pra inter mb-40 wow fadeInDown">
                {{sliders()[0]->details}}
            </p>
            <form action="#"
                  class="search__component mb-24 d-flex align-items-center justify-content-between wow fadeInUp">
                <input type="text" placeholder="What you're looking for?">

                <div class="nice-select mx-1" tabindex="0">
                    <span class="current">
                           Talent
                        </span>

                    <ul class="list">
                        <li data-value="1" class="option selected">
                            Talent
                        </li>
                        <li data-value="1" class="option">
                            Companies
                        </li>
                        <li data-value="1" class="option">
                            Teams
                        </li>
                    </ul>
                </div>

                <button type="button" class="cmn--btn d-flex align-items-center">
                    <span><i class="bi bi-search fz-12"></i></span>
                </button>

            </form>
            {{--                                    <div class="banner__aitag d-flex align-items-center wow fadeInDown">--}}
            {{--                                 <span class="aitag__text fz-16 fw-400 inter pra">--}}
            {{--                                    Popular Searches--}}
            {{--                                 </span>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            Machine Learning--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            NLP Specialists--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            Data Scientists--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            AI--}}
            {{--                                        </a>--}}
            {{--                                    </div>--}}
        </div>
    </div>
    <div class="col-xl-5 col-lg-5">
        <div class="banner__thumb1 ralt">
            {{--            <img src="{{sliders()[0]->image}}" class="w-100" alt="thumb">--}}
            <img src="{{asset('front/assets/img/bn/bannerthumb1.png')}}" class="w-100" alt="thumb">
            <img src="{{asset('front/assets/img/bn/vec1.png')}}" alt="vector" class="thumb__vector1">
            <img src="{{asset('front/assets/img/bn/vec2.png')}}" alt="vector" class="thumb__vector2">
        </div>
    </div>
</div>


