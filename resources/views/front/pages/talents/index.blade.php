@extends('front.layouts.master',['title'=>setting('welcome')])


@push('css')
    <style>
        .cate__items {
            padding: 32px 44px;
            transition: all 0.4s
        }

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
        }

    </style>

@endpush

@section('content')

{{--    <!-- Hero Sections Here -->--}}
{{--    <section class="banner__breadcumn  ralt">--}}

{{--        <div class="breadcumnd__wrapper">--}}
{{--            <div class="container">--}}
{{--                <div class="row align-items-center justify-content-between">--}}
{{--                    <div class="col-xxl-6 col-xl-6 col-lg-7 col-md-7 col-sm-7">--}}
{{--                        <div class="breadcumnd__content">--}}
{{--                  <span class="d4 mb-24">--}}
{{--                     Freelancer--}}
{{--                  </span>--}}
{{--                            <ul class="breadcun__list flex-wrap gap-1 d-flex align-items-center">--}}
{{--                                <li>--}}
{{--                                    <a href="index.html" class="fz-16 fw-400 inter text-white">--}}
{{--                                        Home--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="bi bi-chevron-right"></i>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="fz-16 fw-400 inter text-white">--}}
{{--                                        Find Talent--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="bi bi-chevron-right"></i>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#0" class="fz-16 fw-400 inter base2">--}}
{{--                                        {{$talent->name}}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-5 col-sm-5">--}}
{{--                        <div class="featured__card">--}}
{{--                            <img src="{{asset('front/assets/img/bn/bread-service.png')}}" class="w-100" alt="img">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </section>--}}
{{--    <!-- Hero Section End -->--}}

    <section class="freelancer__details pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="service__detailswrapper">
                        <div class="trending__based mb-40 bgwhite round16 shadow1">
                            <div class="based__content border round16 bgwhite">
                                <div class="freelancer__profile bborderdash pb-24 mb-24 align-items-center d-flex ">
                                    <div class="profile__check ralt">
                                        <img src="{{$talent->photo}}" alt="profile">
                                        <i class="bi bi-check"></i>
                                    </div>
                                    <div class="box__add">
                                        <h4 class="mb-10 title">
                                            {{$talent->name}}
                                        </h4>
                                        <span class="fz-16 mb-16 d-block fw-400 inter title">
                             {{@$talent->specialization->title_en}}
                           </span>
                                        <ul class="d-flex tranding__listbase align-items-center justify-content-between">
                                            <li>
                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                    <i class="bi bi-geo-alt base fz-18"></i>
                                   Japan
                                 </span>
                                            </li>
                                            <li class="d-flex gap-2 fz-16 fw-600 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{$talent->rate}}
                                                <span class="fz-16 fw-400 inter pra">

                                 </span>
                                            </li>
                                            <li>
                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                    Member:
                                    <span class="base">
                                       {{$talent->created_at->format('M d,Y')}}
                                    </span>
                                 </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="trending__timing__list d-flex align-items-cener justify-content-between">
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Delivery Time</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1-3 Days</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-stopwatch d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Response Times</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1 Hour</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-globe d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Level of English</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">Basic</span>
                                        </div>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-shield-check d-flex align-items-center justify-content-center"></i>
                                        <div class="box">
                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Order completion</span>
                                            <span class="fz-16 fw-400 inter pra m-1 d-block">100%</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="bborderdash pb-24 mt-30 mb-30" style="color:#222e48;!important;">
                                <h3 class="title mb-20">Description</h3>
                                <p class="fz-16 fw-400 inter">
                                    {!! $talent->bio!!}
                                </p>
                            </div>

                            @if($talent->skills)
                                <h4 class="title mb-24">
                                    My Skills :
                                </h4>

                                <div class="chatbot__tag mb-30 pb-30 bborderdash d-flex align-items-center row">


                                    @foreach(json_decode($talent->skills) as $skill)
                                        <div class="col-4">
                                            <a href="#0" class="learning round16 fz-14 fw-500 inter base">
                                                {{ $skill->value }}
                                            </a>
                                        </div>

                                    @endforeach


                                </div>

                            @endif

                            @if($talent->scientificCertificate->count()>0)
                                <div class="freelancer__education bborderdash pb-30 mb-30">
                                   <span class="fz-20 mb-24 d-block inter title fw-600">
                                    Educations
                                          </span>
                                    <div class="freelance__attach  ">
                                        @foreach($talent->scientificCertificate as $key=>$scientificCertificate)

                                            <div class="freelanc__inneredu mb-40 align-items-center d-flex">
                                                <div
                                                    class="edu__number round50 d-flex align-items-center justify-content-center">
                                                             <span
                                                                 class="round50 d-flex align-items-center justify-content-center">
                                                   {{$key+1}}
                                                                 </span>
                                                </div>
                                                <div class="content__box round16 w-100">
                                                        <span
                                                            class="base date fz-16 mb-16 fw-500 d-inline-block inter bgwhite round16">
                                                       {{$scientificCertificate->graduation_year }}
                                                   </span>
                                                    <span class="fz-20 fw-500 inter title d-block mb-16">
                                                                       {{$scientificCertificate->specialization}}
                                                                                      </span>
                                                    <span class="fz-16 mb-2 d-block fw-500 inter success2">
                                                                    {{$scientificCertificate->university}} - {{$scientificCertificate->college}}
                                                                        </span>

                                                    <p class="pra inter fz-14 fw-400">
                                                        {{$scientificCertificate->title}}
                                                    </p>

                                                    @if($scientificCertificate->photo)

                                                        @if($scientificCertificate->getFileType() == 'image')

                                                            <p class="pra inter fz-18 fw-400 float-end">

                                                                <a href="{{$scientificCertificate->getPhoto()}}" target="_blank">
                                                                    <i class="bi bi bi-file-image"></i>
                                                                </a>


                                                            </p>


                                                        @elseif($scientificCertificate->photo)


                                                            <p class="pra inter fz-18 fw-400 float-end">
                                                                <a href="{{$scientificCertificate->getPhoto()}}" target="_blank">
                                                                    <i class="bi bi bi-file-pdf"></i></a>
                                                            </p>

                                                        @endif

                                                    @endif



                                                </div>
                                            </div>
                                        @endforeach


                                    </div>
                                </div>
                            @endif


                            @if($talent->work_experiences->count()>0)

                            <div class="freelancer__education bborderdash pb-30 mb-30">


                     <span class="fz-20 mb-24 d-block inter title fw-600">

                        Work &amp; Experience

                     </span>
                                @foreach($talent->work_experiences as $key=>$experience)

                                <div class="freelance__attach ">
                                    <div class="freelanc__inneredu mb-40 align-items-center d-flex">
                                        <div
                                            class="edu__number round50 d-flex align-items-center justify-content-center">
                              <span class="round50 d-flex align-items-center justify-content-center">
                                 {{$key+1}}
                              </span>
                                        </div>
                                        <div class="content__box round16 w-100" >
                              <span class="base date fz-16 mb-16 fw-500 d-inline-block inter bgwhite round16">
                                {{$experience->start_date}} - {{ $experience->end_date }}
                              </span>
                                            <span class="fz-20 fw-500 inter title d-block mb-16">
                               {{$experience->job}}
                              </span>
                                            <span class="fz-16 mb-2 d-block fw-500 inter success2">
                               {{$experience->company_name}}
                              </span>
                                            <p class="pra inter fz-14 fw-400">
                                                {!! $experience->job !!}
                                            </p>


                                            @if($experience->photo)

                                                @if($experience->getFileType() == 'image')

                                                    <p class="pra inter fz-18 fw-400 float-end">

                                                        <a href="{{$experience->getPhoto()}}" target="_blank">
                                                            <i class="bi bi bi-file-image"></i>
                                                        </a>


                                                    </p>


                                                @elseif($experience->photo)


                                                    <p class="pra inter fz-18 fw-400 float-end">
                                                        <a href="{{$experience->getPhoto()}}" target="_blank">
                                                            <i class="bi bi bi-file-pdf"></i></a>
                                                    </p>

                                                @endif

                                            @endif


                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                            @endif



                        </div>

                        @if($talent->khadmats->count()>0)
                        <div class="trending__based mb-40 bgwhite round16 shadow1">
                            <h3 class="title pb-24 bborderdash mb-24">
                                Featured Services
                            </h3>





                            <div class="row g-4 justify-content-center">
                                @foreach($talent->khadmats as $k)
                                    <div class="col-xxl-6  col-xl-6  col-lg-6  col-md-6 col-sm-6">
                                        <div class="service__item shadow2 round16 p-8 bgwhite" style="height: 525px">
                                            <a href="#" class="thumb round16 w-100">
                                                <img  class="round16 w-100" src="{{url($k->getPhoto())}}" alt="{{$k->title}}" style="width: 100%; height: 250px; object-fit: cover;">

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
                                                            class="fz-18 fw-600 base inter">{{$k->price}}</span>
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>


                        </div>

                        @endif

                        <div class="comment__details__wrapper round16 mb-40 bgwhite">
                            <div class="average__review bborderdash pb-30 mb-30">
                                <h4 class="title pb-30 mb-30 bborderdash">
                                    Average Reviews
                                </h4>
                                <div class="aver__item mb-15 d-flex align-items-center">
                        <span class="d-flex align-items-center gap-1 fz-16 fw-400 inter title">
                           5
                           <i class="bi bi-star title"></i>
                        </span>
                                    <div class="aver__bars">
                                        <div class="bars" style="width: 90%;"></div>
                                    </div>
                                    <span class="fw-16 fw-400 inter title">
                           90%
                        </span>
                                </div>
                                <div class="aver__item mb-15 d-flex align-items-center">
                        <span class="d-flex align-items-center gap-1 fz-16 fw-400 inter title">
                           4
                           <i class="bi bi-star title"></i>
                        </span>
                                    <div class="aver__bars">
                                        <div class="bars" style="width: 75%;"></div>
                                    </div>
                                    <span class="fw-16 fw-400 inter title">
                           75%
                        </span>
                                </div>
                                <div class="aver__item mb-15 d-flex align-items-center">
                        <span class="d-flex align-items-center gap-1 fz-16 fw-400 inter title">
                           3
                           <i class="bi bi-star title"></i>
                        </span>
                                    <div class="aver__bars">
                                        <div class="bars" style="width: 67%;"></div>
                                    </div>
                                    <span class="fw-16 fw-400 inter title">
                           67%
                        </span>
                                </div>
                                <div class="aver__item mb-15 d-flex align-items-center">
                        <span class="d-flex align-items-center gap-1 fz-16 fw-400 inter title">
                           2
                           <i class="bi bi-star title"></i>
                        </span>
                                    <div class="aver__bars">
                                        <div class="bars" style="width: 44%;"></div>
                                    </div>
                                    <span class="fw-16 fw-400 inter title">
                           44%
                        </span>
                                </div>
                                <div class="aver__item d-flex align-items-center">
                        <span class="d-flex align-items-center gap-1 fz-16 fw-400 inter title">
                           1
                           <i class="bi bi-star title"></i>
                        </span>
                                    <div class="aver__bars">
                                        <div class="bars" style="width: 21%;"></div>
                                    </div>
                                    <span class="fw-16 fw-400 inter title">
                           21%
                        </span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-30 flex-wrap justify-content-between">
                                <h5 class="inter title fz-20 fw-600">
                                    4.6 (66 reviews)
                                </h5>
                                <div class="sort__latest d-flex align-items-center gap-3">
                        <span class="fz-16 fw-400 inter ptext2">
                           Sort By:
                        </span>
                                    <select name="lsort" style="display: none;">
                                        <option value="1">
                                            New
                                        </option>
                                        <option value="1">
                                            V2
                                        </option>
                                        <option value="1">
                                            V3
                                        </option>
                                    </select>
                                    <div class="nice-select" tabindex="0"><span class="current">
                              V3
                           </span>
                                        <ul class="list">
                                            <li data-value="1" class="option">
                                                New
                                            </li>
                                            <li data-value="1" class="option">
                                                V2
                                            </li>
                                            <li data-value="1" class="option selected">
                                                V3
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review__commentbox mb-30">
                     <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-cener fw-400 ptext2 inter">
                        Mar 03, 2023
                        <span class="dotactive ralt fz-16 ptext2 inter d-block">
                           09:01 am
                        </span>
                     </span>
                                <div class="pt-24 bborderdash pb-24">
                                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fz-16 fw-400 inter title">
                                        I have been using the AI Freelancer Marketplace for my project needs, and I must
                                        say it has been an exceptional experience. The platform's advanced AI algorithms
                                        and intelligent matching system have connected me with top-notch AI freelancers
                                        who possess the skills
                                    </p>
                                    <div class="d-flex pt-24 gap-3 align-items-center">
                                        <img src="assets/img/testimonial/review3.png" class="round50" alt="re-img">
                                        <div class="name__content">
                                            <h5 class="title">
                                                Darrell Steward
                                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                    Software engineer
                                 </span>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="cmn__replaybox pt-24 pb-24">
                                    <div class="replays d-flex align-items-center">
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-hand-thumbs-up base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 178
                              </span>
                                        </a>
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-chat-left-text base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 Reply
                              </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="discussion d-flex align-items-center ">
                                    <img src="assets/img/testimonial/review1.png" alt="review" class="round50">
                                    <input type="text" placeholder="Join the discussion...">
                                </div>
                            </div>
                            <div class="review__commentbox mb-40">
                     <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-cener fw-400 ptext2 inter">
                        Mar 03, 2023
                        <span class="dotactive ralt fz-16 ptext2 inter d-block">
                           09:01 am
                        </span>
                     </span>
                                <div class="pt-24 bborderdash pb-24">
                                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fz-16 fw-400 inter title">
                                        I have been using the AI Freelancer Marketplace for my project needs, and I must
                                        say it has been an exceptional experience. The platform's advanced AI algorithms
                                        and intelligent matching system have connected me with top-notch AI freelancers
                                        who possess the skills
                                    </p>
                                </div>
                                <div class="d-flex pt-24 gap-3 align-items-center">
                                    <img src="assets/img/testimonial/review2.png" class="round50" alt="re-img">
                                    <div class="name__content">
                                        <h5 class="title">
                                            Albert Flores
                                            <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                 Customer success
                              </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="cmn__replaybox pt-24">
                                    <div class="replays d-flex align-items-center">
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-hand-thumbs-up base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 178
                              </span>
                                        </a>
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-chat-left-text base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 Reply
                              </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="review__commentbox mb-40">
                     <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-cener fw-400 ptext2 inter">
                        Mar 03, 2023
                        <span class="dotactive ralt fz-16 ptext2 inter d-block">
                           09:01 am
                        </span>
                     </span>
                                <div class="pt-24 bborderdash pb-24">
                                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <p class="fz-16 fw-400 inter title">
                                        I have been using the AI Freelancer Marketplace for my project needs, and I must
                                        say it has been an exceptional experience. The platform's advanced AI algorithms
                                        and intelligent matching system have connected me with top-notch AI freelancers
                                        who possess the skills
                                    </p>
                                </div>
                                <div class="d-flex pt-24 gap-3 align-items-center">
                                    <img src="assets/img/testimonial/review3.png" class="round50" alt="re-img">
                                    <div class="name__content">
                                        <h5 class="title">
                                            Annette Black
                                            <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                 Personal assistant
                              </span>
                                        </h5>
                                    </div>
                                </div>
                                <div class="cmn__replaybox pt-24">
                                    <div class="replays d-flex align-items-center">
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-hand-thumbs-up base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 178
                              </span>
                                        </a>
                                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                                            <i class="bi bi-chat-left-text base fz-20"></i>
                                            <span class="fz-18 fw-400 inter base">
                                 Reply
                              </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="cmn--btn d-flex align-items-center gap-2">
                     <span>
                        See All Reviews
                     </span>
                                <span>
                        <i class="bi bi-arrow-up-right"></i>
                     </span>
                            </button>
                        </div>
                        <div class="trending__based bgwhite round16 shadow1">
                            <h4 class="pb-24 title bborderdash mb-24">
                                Write a review
                            </h4>
                            <form action="#0" class="writing__review">
                                <div class="wrigt__grp">
                                    <label for="name">Name <span class="base">*</span></label>
                                    <input type="text" id="name" placeholder="Enter Name...">
                                </div>
                                <div class="wrigt__grp">
                                    <label for="email">Email <span class="base">*</span></label>
                                    <input type="text" id="email" placeholder="Enter Email...">
                                </div>
                                <div class="wrigt__grp">
                                    <label>Ratting <span class="base">*</span></label>
                                    <div class="ratting__grp d-flex gap-2">
                                        <a href="#0">
                                            <i class="bi bi-star ratting fz-16"></i>
                                        </a>
                                        <a href="#0">
                                            <i class="bi bi-star ratting fz-16"></i>
                                        </a>
                                        <a href="#0">
                                            <i class="bi bi-star ratting fz-16"></i>
                                        </a>
                                        <a href="#0">
                                            <i class="bi bi-star ratting fz-16"></i>
                                        </a>
                                        <a href="#0">
                                            <i class="bi bi-star ratting fz-16"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="wrigt__grp">
                                    <label for="name">Review <span class="base">*</span></label>
                                    <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                </div>
                                <button class="cmn--btn mt-16">
                        <span>
                           Submit Reviews
                        </span>
                                    <span>
                           <i class="bi bi-arrow-up-right"></i>
                        </span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="basic__skilled__wrapper">
                        <div class="basic__boxskill mb-24 round16 bgwhite">
                  <span class="fz-18 d-block fw-500 title inter mb-10">
                     Budget
                  </span>
                            <div class="form__price pb-24 d-flex align-items-center bborderdash">
                                <i class="bi bi-tags tags__icon"></i>
                                <span class="fz-16 d-flex align-items-center gap-2 fw-400 inter title">
                        From
                        <span class="fssizing d-flex align-items-start gap-1">
                           $399
                           <i class="bi bi-info-circle infocircle"></i>
                        </span>
                     </span>
                            </div>
                            <div class="d-flex mb-16 mt-24 align-items-center justify-content-between">
                     <span class="fz-18 fw-500 inter pra">
                        Per Pages
                     </span>
                                <h3 class="base fz-18 fw-500">
                                    $29
                                </h3>
                            </div>
                            <div class="bank__check__wrap mb-30">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank11t20" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank11t20">
                                            Prompt writing
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank22" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank22">
                                            Generated image examples
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank44t8" checked="">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank44t8">
                                            Unlimited Revisions
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bank__checkitem mb-8 d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="bank33t12">
                                        <label class="form-check-label fz-16 fw-400 ptext2 inter" for="bank33t12">
                                            Image upscaling
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <a href="#0" class="cmn--btn d-flex justify-content-center d-block">
                     <span>
                        Send Proposal
                     </span>
                                <span>
                        <i class="bi bi-arrow-up-right"></i>
                     </span>
                            </a>
                        </div>
                        <div class="basic__boxskill round16 bgwhite">
                            <h4 class="title pb-24 bborderdash mb-24">
                                Linked Accounts
                            </h4>
                            <ul class="social flex-wrap d-flex align-items-center">
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-skype"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-github"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="bi bi-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    @push('js')
        <script>
            $(document).ready(function () {
                // // Remove the classes
                // $('#banner').removeClass('banner__section bg__img1 ralt overhid');
                // // Add the classes
                // $('#banner').addClass('banner__breadcumn  ralt');
                //
                //
                // $('#header-nav').removeClass('header-section animated slideInUp');
                // // Add the classes
                // $('#header-nav').addClass('header-section menubordert header__section__two menuborderb animated slideInUp');
                //
                // // $('header a').addClass('text-white mdnone inter fw-400');
                // // $('haderbar__top a').addClass('text-white mdnone inter fw-400');


            });
        </script>
    @endpush

@stop


