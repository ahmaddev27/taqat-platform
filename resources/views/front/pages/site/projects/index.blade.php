@extends('front.layouts.master',['title'=>'Projects'])


@push('css')
    <style>

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
        }

        .slider-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .form-range {
            width: 100%;
            margin: 1px;
        }

        .form-check-label {
            display: block;
            margin-bottom: 5px;
        }

        .slider-divider {
            border-left: 1px dashed #7395c94f;
            height: 100px; /* Adjust height to fit the sliders */
            margin: 0 10px;
        }

        /* Style for both sliders */
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 10px;
            background: linear-gradient(to right, #0d47a1 0%, #0d47a1 0%, #d3d3d3 0%, #d3d3d3 100%);
            border-radius: 5px;
        }

        input[type="range"]:focus {
            outline: none;
        }

        /* Style for the slider thumb */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #0a244d;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Firefox styles */
        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #0a244d;
            border-radius: 50%;
            cursor: pointer;
        }



    </style>

@endpush

@section('content')

    <section class="service__grid pt-120 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-4">
                    <div class="card__sidebar side__sticky round16">
                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24">
                                Filter
                            </h4>
                            <form action="#0"
                                  class="d-flex mb-24 filter__search align-items-center justify-content-between">
                                <input type="text" placeholder="Search">
                                <i class="bi bi-search"></i>
                            </form>
                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Types of Categories
                                </h5>
                                @foreach($specializations as $specialization)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" id="bank11t20">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank11t20">
                                                {{$specialization->title}}
                                            </label>
                                        </div>
                                        <span class="fw-500 inter fz-16 pra">
                {{$specialization->company_projects_count}}
            </span>
                                    </div>
                                @endforeach
                            </div>


                            <div class="pt-24 tborderdash bborderdash pb-24">
                                <h5 class="title mb-16">
                                    Pricing Scale
                                </h5>

                                <div class="slider-container">
                                    <!-- Min Slider -->
                                    <div class="text-center justify-content-center pra">
                                        <label for="customRangeMin" class="form-check-label fz-16 fw-400 ptext2 inter"></label>
                                        <input type="range" class="" id="customRangeMin" min="50" max="1000" step="50" value="25">
                                        <span class="form-check-label fz-16 fw-400 ptext2 inter" id="currentMinValue">Min: $25</span>
                                    </div>

                                    <!-- Divider with border -->
                                    <div class="slider-divider"></div>

                                    <!-- Max Slider -->
                                    <div class="text-center justify-content-center pra">
                                        <label for="customRangeMax" class="form-check-label fz-16 fw-400 ptext2 inter"></label>
                                        <input type="range" class=" " id="customRangeMax" min="1000" max="20000" step="1000" value="20000">
                                        <span class="form-check-label fz-16 fw-400 ptext2 inter" id="currentMaxValue">Max: $20000</span>
                                    </div>
                                </div>

                            </div>
                            <div class="bank__check__wrap pb-24 tborderdash">
                                <h5 class="title mb-16 pt-24">
                                    Deliver Time
                                </h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank121" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank121">
                                            1-3 Days
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           125
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank2t13" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank2t13">
                                            1 Week
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           152
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank3t29">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank3t29">
                                            1-3 Weeks
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           165
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank4t9" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank4t9">
                                            1 Month
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           265
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank5" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank5">
                                            2-3 Months
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           453
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="taone1" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="taone1">
                                            6-Month
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           324
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank5at1" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank5at1">
                                            Less then Year
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           286
                        </span>
                                </div>
                            </div>
                            <div class="bank__check__wrap pb-24 tborderdash">
                                <h5 class="title mb-16 pt-24">
                                    Response Time
                                </h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank1t22" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank1t22">
                                            1 Hour
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           06
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank2t15" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank2t15">
                                            2 Hours
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           03
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank3t30">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank3t30">
                                            1 Days
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           70
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank4t10" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank4t10">
                                            2 Days
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           12
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank5t31" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank5t31">
                                            3 Days
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           05
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="taone2" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="taone2">
                                            1 Weeks
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           17
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank5at2" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank5at2">
                                            1 Month
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           10
                        </span>
                                </div>
                            </div>
                            <div class="bank__check__wrap bborderdash pb-24 mb-24 tborderdash">
                                <h5 class="title mb-16 pt-24">
                                    Star Category
                                </h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank1at25" checked="">
                                        <label
                                            class="form-check-label align-items-center d-flex gap-2 fz-16 fw-400 ptext2 inter"
                                            for="bank1at25">
                                            <i class="bi bi-star-fill ratting"></i>
                                            5 Star
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           122
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank2at17" checked="">
                                        <label
                                            class="form-check-label d-flex align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                            for="bank2at17">
                                            <i class="bi bi-star-fill ratting"></i>
                                            4 Star
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           356
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank3at11">
                                        <label
                                            class="form-check-label d-flex align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                            for="bank3at11">
                                            <i class="bi bi-star-fill ratting"></i>
                                            3 Star
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           365
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank4at6" checked="">
                                        <label
                                            class="form-check-label d-flex align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                            for="bank4at6">
                                            <i class="bi bi-star-fill ratting"></i>
                                            2 Star
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           322
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank5at3" checked="">
                                        <label
                                            class="form-check-label align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                            for="bank5at3">
                                            <i class="bi bi-star-fill ratting"></i>
                                            1 Star
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           325
                        </span>
                                </div>
                            </div>
                            <div class="bank__check__wrap mb-24 pb-24 bborderdash">
                                <h5 class="title mb-16">
                                    Location
                                </h5>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls1" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls1">
                                            Australia
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           5456
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls2" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls2">
                                            Delhi
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           5844
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls3">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls3">
                                            Germany
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           475
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls4" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls4">
                                            Hamburg
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           9855
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls5" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls5">
                                            India
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           4457
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex mb-8 align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls6" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls6">
                                            Pakistan
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           663
                        </span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="ls7" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="ls7">
                                            UAE
                                        </label>
                                    </div>
                                    <span class="fw-500 inter fz-16 pra">
                           5884
                        </span>
                                </div>
                            </div>
                            <a href="#0"
                               class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                <i class="bi bi-arrow-clockwise base fz-20"></i>
                                Reset Filters
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="chatbot__developers">
                        <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
                            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                                <h4 class="title">
                                    AI-powered Chatbot Development
                                </h4>
                                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                        Fixed: <span class="base inter fw-500">$300</span>
                     </span>
                            </div>
                            <div class="chatbot__tag mb-24 d-flex align-items-center">
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    UI/UX Design
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Front End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Back End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Data Analytics
                                </a>
                            </div>
                            <p class="fz-16 fw-400 mb-24 pra inter">
                                Develop a conversational chatbot using natural language processing and machine learning
                                techniques to provide automated customer support and assistance.
                            </p>
                            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center">
                     <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Expire: <span class="title fw-600 inter">917 days left</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Location: <span class="title fw-600 inter">Remote</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Level: <span class="title fw-600 inter">Expensive</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Proposals: <span class="title fw-600 inter">76 Received</span>
                     </span>
                            </div>
                            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                                <div class="abstergo__left d-flex align-items-center">
                                    <div class="abster ralt">
                                        <img src="assets/img/details/worldarow.jpg" alt="img">
                                    </div>
                                    <span class="fz-16 fw-400 inter pra">
                           Abstergo Ltd.
                        </span>
                                </div>
                                <div class="abstr__heart d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                       class="heart__icon d-flex align-items-center justify-content-center">
                                        <i class="bi bi-heart base"></i>
                                    </a>
                                    <a href="project-details.html" class="cmn--btn outline__btn">
                           <span>
                              Send Proposal
                           </span>
                                        <span>
                              <i class="bi bi-arrow-up-right"></i>
                           </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
                            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                                <h4 class="title">
                                    Image Recognition &amp; Object Detection System
                                </h4>
                                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                        Fixed: <span class="base inter fw-500">$300</span>
                     </span>
                            </div>
                            <div class="chatbot__tag mb-24 d-flex align-items-center">
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    UI/UX Design
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Front End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Back End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Data Analytics
                                </a>
                            </div>
                            <p class="fz-16 fw-400 mb-24 pra inter">
                                Build an image recognition and object detection system that can accurately identify and
                                classify objects in images using deep learning algorithms.
                            </p>
                            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center">
                     <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Expire: <span class="title fw-600 inter">917 days left</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Location: <span class="title fw-600 inter">Remote</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Level: <span class="title fw-600 inter">Expensive</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Proposals: <span class="title fw-600 inter">76 Received</span>
                     </span>
                            </div>
                            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                                <div class="abstergo__left d-flex align-items-center">
                                    <div class="abster ralt">
                                        <img src="assets/img/details/binford.jpg" alt="img">
                                    </div>
                                    <span class="fz-16 fw-400 inter pra">
                           Binford Ltd.
                        </span>
                                </div>
                                <div class="abstr__heart d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                       class="heart__icon d-flex align-items-center justify-content-center">
                                        <i class="bi bi-heart base"></i>
                                    </a>
                                    <a href="project-details.html" class="cmn--btn outline__btn">
                           <span>
                              Send Proposal
                           </span>
                                        <span>
                              <i class="bi bi-arrow-up-right"></i>
                           </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
                            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                                <h4 class="title">
                                    Natural Language for Sentiment Analysis
                                </h4>
                                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                        Fixed: <span class="base inter fw-500">$300</span>
                     </span>
                            </div>
                            <div class="chatbot__tag mb-24 d-flex align-items-center">
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    UI/UX Design
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Front End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Back End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Data Analytics
                                </a>
                            </div>
                            <p class="fz-16 fw-400 mb-24 pra inter">
                                Implement a natural language processing system that can analyze text data and determine
                                the sentiment (positive, negative, or neutral) associated with it
                            </p>
                            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center">
                     <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Expire: <span class="title fw-600 inter">917 days left</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Location: <span class="title fw-600 inter">Remote</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Level: <span class="title fw-600 inter">Expensive</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Proposals: <span class="title fw-600 inter">76 Received</span>
                     </span>
                            </div>
                            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                                <div class="abstergo__left d-flex align-items-center">
                                    <div class="abster ralt">
                                        <img src="assets/img/details/acme.jpg" alt="img">
                                    </div>
                                    <span class="fz-16 fw-400 inter pra">
                           Acme Co.
                        </span>
                                </div>
                                <div class="abstr__heart d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                       class="heart__icon d-flex align-items-center justify-content-center">
                                        <i class="bi bi-heart base"></i>
                                    </a>
                                    <a href="project-details.html" class="cmn--btn outline__btn">
                           <span>
                              Send Proposal
                           </span>
                                        <span>
                              <i class="bi bi-arrow-up-right"></i>
                           </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
                            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                                <h4 class="title">
                                    Machine Learning Algorithm Optimization
                                </h4>
                                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                        Fixed: <span class="base inter fw-500">$300</span>
                     </span>
                            </div>
                            <div class="chatbot__tag mb-24 d-flex align-items-center">
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    UI/UX Design
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Front End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Back End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Data Analytics
                                </a>
                            </div>
                            <p class="fz-16 fw-400 mb-24 pra inter">
                                Optimize existing machine learning algorithms to enhance their performance, accuracy,
                                and efficiency, ensuring better predictive capabilities and model optimization.
                            </p>
                            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center">
                     <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Expire: <span class="title fw-600 inter">917 days left</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Location: <span class="title fw-600 inter">Remote</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Level: <span class="title fw-600 inter">Expensive</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Proposals: <span class="title fw-600 inter">76 Received</span>
                     </span>
                            </div>
                            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                                <div class="abstergo__left d-flex align-items-center">
                                    <div class="abster ralt">
                                        <img src="assets/img/details/biffco.jpg" alt="img">
                                    </div>
                                    <span class="fz-16 fw-400 inter pra">
                           Biffco Enterprises Ltd.
                        </span>
                                </div>
                                <div class="abstr__heart d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                       class="heart__icon d-flex align-items-center justify-content-center">
                                        <i class="bi bi-heart base"></i>
                                    </a>
                                    <a href="project-details.html" class="cmn--btn outline__btn">
                           <span>
                              Send Proposal
                           </span>
                                        <span>
                              <i class="bi bi-arrow-up-right"></i>
                           </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chatbot__items round16 shadow2 bgwhite">
                            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                                <h4 class="title">
                                    AI-based Recommender System
                                </h4>
                                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                        Fixed: <span class="base inter fw-500">$300</span>
                     </span>
                            </div>
                            <div class="chatbot__tag mb-24 d-flex align-items-center">
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    UI/UX Design
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Front End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Back End
                                </a>
                                <a href="project-details.html" class="learning round16 fz-16 fw-500 inter base">
                                    Data Analytics
                                </a>
                            </div>
                            <p class="fz-16 fw-400 mb-24 pra inter">
                                Create an AI-powered recommender system that can analyze user preferences and behavior
                                to provide personalized recommendations for products, services, or content.
                            </p>
                            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center">
                     <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Expire: <span class="title fw-600 inter">917 days left</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Location: <span class="title fw-600 inter">Remote</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Level: <span class="title fw-600 inter">Expensive</span>
                     </span>
                                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                        Proposals: <span class="title fw-600 inter">76 Received</span>
                     </span>
                            </div>
                            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                                <div class="abstergo__left d-flex align-items-center">
                                    <div class="abster ralt">
                                        <img src="assets/img/details/big.jpg" alt="img">
                                    </div>
                                    <span class="fz-16 fw-400 inter pra">
                           Big Kahuna Burger Ltd.
                        </span>
                                </div>
                                <div class="abstr__heart d-flex align-items-center">
                                    <a href="javascript:void(0)"
                                       class="heart__icon d-flex align-items-center justify-content-center">
                                        <i class="bi bi-heart base"></i>
                                    </a>
                                    <a href="project-details.html" class="cmn--btn outline__btn">
                           <span>
                              Send Proposal
                           </span>
                                        <span>
                              <i class="bi bi-arrow-up-right"></i>
                           </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="pagination justify-content-center mt-40">
                            <li>
                                <a href="#0">
                                    <i class="bi bi-chevron-left base"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    1
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    2
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    3
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    ...
                                </a>
                            </li>
                            <li>
                                <a href="#0">
                                    <i class="bi bi-chevron-right base"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('js')
        <script>
            const minSlider = document.getElementById('customRangeMin');
            const maxSlider = document.getElementById('customRangeMax');
            const currentMinValue = document.getElementById('currentMinValue');
            const currentMaxValue = document.getElementById('currentMaxValue');

            // Function to update the slider background
            function updateSliderBackground(slider) {
                const value = (slider.value - slider.min) / (slider.max - slider.min) * 100;
                slider.style.background = `linear-gradient(to right, #0d47a1 ${value}%, #d3d3d3 ${value}%)`;
            }

            // Initialize background when the page loads
            updateSliderBackground(minSlider);
            updateSliderBackground(maxSlider);

            // Event listeners to update the background while sliding
            minSlider.addEventListener('input', function() {
                updateSliderBackground(minSlider);
                currentMinValue.textContent = `Min: $${minSlider.value}`;
            });

            maxSlider.addEventListener('input', function() {
                updateSliderBackground(maxSlider);
                currentMaxValue.textContent = `Max: $${maxSlider.value}`;
            });

        </script>
    @endpush

@stop


