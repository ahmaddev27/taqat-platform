<div class="tab-pane base fade" id="nav-exp" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">




            <div class="d-flex align-items-center justify-content-center mb-2 ">
                <a class="cmn--btn outline__btn">
                    <span class="fz-14 pra"> <i class="bi bi-plus"></i> Add new Experience</span>
                </a>

            </div>
            @foreach($talent->work_experiences as $w)

                <div class="col-xxl-12">
                    <div class="service__item shadow-sm round16 bg-light">
                        {{--                    <a href="#" class="thumb round16">--}}
                        {{--                        <img src="assets/img/service/s1.jpg" class="round16" alt="service">--}}
                        {{--                    </a>--}}
                        <div class="service__content">
                            <div class="d-flex mb-16 align-items-center justify-content-between">
                                <a href="javascript:void(0)" class=" learning round16 fz-16 fw-600 inter base">
                                    {{$w->job}}
                                </a>
                                <span class="success2 d-block fz-16 fw-600 inter">
                                       {{$w->start_date->format('Y / m')}} -    {{$w->end_date->format('Y / m')}}
                                       </span>


                            </div>

                            <h5 class="mb-16">
                                <a href="service-details.html" class="title">

                                </a>
                            </h5>

                            <div class="d-flex  pb-20 mb-20 align-items-center justify-content-between">
                                <div class="d-flex gap-2 fz-16 fw-600 inter title">

                                <span class="fz-16 fw-400 inter pra">
                            {{$w->company_name}} -  {{$w->location}}

                                </span>
                                </div>

                                @if($w->photo)
                                    <p class="pra inter fz-18 fw-400 float-end">
                                        <a href="{{$w->getPhoto()}}" target="_blank">
                                            <i class="bi bi-paperclip"></i>
                                        </a>
                                        @endif

                                    </p>
                            </div>


                        </div>
                    </div>
                </div>

            @endforeach







    </div>

</div>