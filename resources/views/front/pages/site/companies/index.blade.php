@extends('front.layouts.master',['title'=>$company->name])

@section('content')

    <section class="freelancer__details pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">
                    <div class="service__detailswrapper">
                        <div class="trending__based mb-40 bgwhite round16 shadow1">
                            <div class="based__content border round16 bgwhite">
                                <div class="freelancer__profile bborderdash pb-24 mb-24 align-items-center d-flex ">
                                    <div class="profile__check ralt">
                                        <img src="{{$company->getPhoto()}}" class="rounded-circle"
                                             style="width: 100%; border: 2px solid #fffefe; height: 100%; object-fit: cover;"
                                             loading="lazy">

                                    </div>
                                    <div class="box__add">
                                        <h4 class="mb-10 title">
                                            {{$company->name}}
                                        </h4>
                                        <span class="fz-16 mb-16 d-block fw-400 inter title">
                                              <i class="bi bi-envelope base fz-18"></i>
                                             {{$company->email}}
                                           </span>
                                        <ul class="d-flex tranding__listbase align-items-center justify-content-between">
                                            <li>
                                             <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                                <i class="bi bi-phone    base fz-18"></i>
                                             {{$company->mobile}}
                                             </span>
                                            </li>
                                            {{--                                            <li class="d-flex gap-2 fz-16 fw-600 inter title">--}}
                                            {{--                                                <i class="bi bi-star-fill ratting"></i>--}}
                                            {{--                                                {{$company->rate}}--}}
                                            {{--                                                <span class="fz-16 fw-400 inter pra">--}}

                                            {{--                                 </span>--}}
                                            {{--                                            </li>--}}
                                            <li>
                                 <span class="fz-16 d-flex align-items-cener gap-1 fw-400 inter pra">
                                    Member:
                                    <span class="base">
                                       {{$company->created_at->format('M d,Y')}}
                                        </span>
                                     </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                {{--                                <ul class="trending__timing__list d-flex align-items-cener justify-content-between">--}}
                                {{--                                    <li class="d-flex align-items-center">--}}
                                {{--                                        <i class="bi bi-clock d-flex align-items-center justify-content-center"></i>--}}
                                {{--                                        <div class="box">--}}
                                {{--                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Delivery Time</span>--}}
                                {{--                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1-3 Days</span>--}}
                                {{--                                        </div>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="d-flex align-items-center">--}}
                                {{--                                        <i class="bi bi-stopwatch d-flex align-items-center justify-content-center"></i>--}}
                                {{--                                        <div class="box">--}}
                                {{--                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Response Times</span>--}}
                                {{--                                            <span class="fz-16 fw-400 inter pra m-1 d-block">1 Hour</span>--}}
                                {{--                                        </div>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="d-flex align-items-center">--}}
                                {{--                                        <i class="bi bi-globe d-flex align-items-center justify-content-center"></i>--}}
                                {{--                                        <div class="box">--}}
                                {{--                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Level of English</span>--}}
                                {{--                                            <span class="fz-16 fw-400 inter pra m-1 d-block">Basic</span>--}}
                                {{--                                        </div>--}}
                                {{--                                    </li>--}}
                                {{--                                    <li class="d-flex align-items-center">--}}
                                {{--                                        <i class="bi bi-shield-check d-flex align-items-center justify-content-center"></i>--}}
                                {{--                                        <div class="box">--}}
                                {{--                                            <span class="fz-12 fw-500 inter pra m-1 d-block">Order completion</span>--}}
                                {{--                                            <span class="fz-16 fw-400 inter pra m-1 d-block">100%</span>--}}
                                {{--                                        </div>--}}
                                {{--                                    </li>--}}
                                {{--                                </ul>--}}
                            </div>

                            @if($company->description)
                                <div class="bborderdash pb-24 mt-30 mb-30" style="color:#222e48;!important;">
                                    <h3 class="title mb-20">BIO</h3>
                                    <p class="fz-16 fw-400 inter">
                                        {!! $company->description!!}
                                    </p>
                                </div>

                            @endif

                        </div>


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


                            <div class="binford__loca mb-40">
                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>
                                    <span class="fz-16 fw-400 inter pra">
                                            Jobs    {{trans('main.Employment_rate')}} <span class="base"> {{$employmentRate_jobs}}%</span>
                                           </span>
                                </div>


                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base"> {{$company->Openjobs->count()}}</span>
                                    <span class="fz-16 fw-400 inter pra">
                                              Jobs open
                                           </span>
                                </div>

                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base">   {{$company->Impjobs->count()}}</span> <span
                                        class="fz-16 fw-400 inter pra">
                                             Jobs implemented
                                           </span>
                                </div>

                                <div class="d-flex mb-8 align-items-center gap-1">
                                    <i class="bi bi-check2-circle base"></i>

                                    <span class="base">   {{$company->completejobs->count()}}</span>
                                    <span class="fz-16 fw-400 inter pra">
                                              Jobs completed
                                           </span>
                                </div>


                                <div class="binford__loca mb-40">
                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>
                                        <span class="fz-16 fw-400 inter pra">
                                           Projects  Employment Rate <span
                                                class="base">  {{$employmentRate_projects}}%</span>
                                           </span>
                                    </div>


                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->Openprojects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects open
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->Impprojects->count()}}</span> <span
                                            class="fz-16 fw-400 inter pra">
                                             Projects implemented
                                           </span>
                                    </div>

                                    <div class="d-flex mb-8 align-items-center gap-1">
                                        <i class="bi bi-check2-circle base"></i>

                                        <span class="base">   {{$company->completeProjects->count()}}</span>
                                        <span class="fz-16 fw-400 inter pra">
                                              Projects completed
                                           </span>
                                    </div>


                                </div>


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

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@stop


