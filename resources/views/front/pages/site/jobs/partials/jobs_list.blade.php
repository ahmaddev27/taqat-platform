@if($jobs->count()>0)
    @foreach($jobs as $job)
        <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
            <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                <a href="{{route('jobs.index',$job->slug)}}"><h5 class="title text-start">
                        {{$job->title}}
                    </h5>
                </a>
                <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                Salary: <span class="base inter fw-500">${{$job->sallary}}</span>
            </span>
            </div>

            @php
                $skills = $job->skills;
                if (is_string($skills)) {
                    $skills = json_decode($skills, true);
                }
                $skills = is_array($skills) ? $skills : [];
            @endphp

            <div class="chatbot__tag mb-24 d-flex align-items-center">
                @foreach(array_slice($skills, 0, 4) as $skill)
                    <a href="#" class="learning round16 fz-14 fw-500 inter base">
                        {{$skill['value']}}
                    </a>
                @endforeach
            </div>

            <div class="text-dark  fw-400 mb-24 pra inter text-start">
                {{str_limit( strip_tags($job->description),150)}}
            </div>

            <div class="lavel__tag bborderdash pb-24 d-flex align-items-center ">
            <span class="lavel__item ralt fz-16 fw-400 inter pra"
                  title="{{$job->created_at->format('M d,Y H:i')}}">
                <span><i class="bi bi-clock"></i></span>
                <span class="title fw-600 inter">{{$job->created_at->diffforhumans()}}</span>
            </span>
                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span><i class="bi bi-ticket"></i></span>
                <span class="title fw-600 inter">
                    {{$job->applies->count() > 0 ? $job->applies->count() . ' Applies' : 'Add first offer'}}
                </span>
            </span>
                @if($job->delivery_time)
                    <span class="lavel__item ralt fz-16 fw-400 inter pra">
                    <span><i class="bi bi-calendar-week"></i></span>
                    <span class="title fw-600 inter">{{ delivery_time($job->delivery_time) }}</span>
                </span>
                @endif
                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span class="title fw-600 inter">
                    <span class="round16 badge badge bg-{{ status($job->status) }}">
                        {{ statusJobName($job->status) }}
                    </span>
                </span>
            </span>
            </div>

            <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
                <div class="abstergo__left d-flex align-items-center">
                    <div class="abster ralt">
                        <img src="{{$job->company->getPhoto()}}" alt="img">
                    </div>
                    <span class="fz-16 fw-400 inter pra">
                    {{$job->company->name}}
                </span>
                </div>
                <div class="abstr__heart d-flex align-items-center">
                    @if($job->status == 1 && ! auth()->guard('company')->check() )
                        <a href="{{route('jobs.index',$job->slug)}}" class="cmn--btn outline__btn">
                            <span>Send Proposal</span>
                            <span><i class="bi bi-arrow-up-right"></i></span>
                        </a>
                    @else
                        <a href="{{route('jobs.index',$job->slug)}}" class="cmn--btn outline__btn">
                            <span>View</span>
                            <span><i class="bi bi-eye-fill"></i></span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach

    <div class="pagination-links">
    {{$jobs->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}
    </div>
@else
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-center">
            <h5 class="title text-center justify-content-center  fz-18 fw-500  inte">
                No Results
            </h5>

        </div>
    </div>
@endif


