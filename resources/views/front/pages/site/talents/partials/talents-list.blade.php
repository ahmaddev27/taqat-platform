{{--@if($talents->count()>0 )--}}



    @foreach($talents as $talent)
    <div id="{{$talent->id}}" class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 talents">
        <div class="frelancer__item shadow2 round16 bgwhite">
            <div class="d-flex mb-24 align-items-center justify-content-between">
                <div class="d-flex gap-2 fz-16 fw-600 inter title">
                    <i class="bi bi-star-fill ratting"></i>
                    {{$talent->rate}}
                    <span class="fz-16 fw-400 inter pra">
{{--                              (34)--}}
                           </span>
                </div>
                <span class="success2 d-block fz-12 fw-600 inter">
                           {{$talent->specialization?->title_en}}
                        </span>
            </div>
            <a href="{{route('talents.index',$talent->slug)}}" class="thumbs m-auto">
                <img src="{{$talent->photo}}" class="rounded-circle"
                     style="width: 100%; border: 2px solid #fffefe; height: 100%; object-fit: cover;"
                     loading="lazy">
            </a>
            <h5 class="mt-24 text-center mb-20">
                <a href="{{route('talents.index',$talent->slug)}}" class="title">
                    {{$talent->name}}
                </a>
            </h5>
            <div class="d-flex bborderdash pb-20 align-items-center justify-content-center">
                {{--                                    <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">--}}
                {{--                                        <i class="bi bi-stopwatch"></i>--}}
                {{--                                        Full-Time--}}
                {{--                                    </div>--}}
                <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">
                    <i class="bi bi-bar-chart"></i>
                    {{$talent->total_experience_years}} Years
                </div>
            </div>
            <div class="d-flex align-items-center mt-20 justify-content-between">
                                            <span class="fz-18 fw-500 inter base">
                                            Projects
                                            </span>
                <div
                    class="cmn__ibox boxes1 round50 d-flex align-items-center justify-content-center text-dark">
                    {{--                                        <i class="bi bi-chat-right-text title fz-16"></i>--}}
                    {{$talent->projects->count()}}
                </div>
            </div>
        </div>
    </div>

@endforeach


{{--    <div class="pagination-container">--}}
{{--{{$talents->links('vendor.pagination.bootstrap-4')}}--}}

{{--    </div>--}}

{{--@else--}}

{{--    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">--}}
{{--        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-center">--}}
{{--            <h5 class="title text-center justify-content-center  fz-18 fw-500  inte">--}}
{{--                No Results--}}
{{--            </h5>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}
