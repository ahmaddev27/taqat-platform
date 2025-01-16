
@if($projects->count()>0)

@foreach($projects as $project)
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
            <h5 class="title">
                {{$project->title}}
            </h5>
            <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                Budget: <span class="base inter fw-500">${{$project->expected_budget}}</span>
            </span>
        </div>

        @php
            $skills = $project->skills;
            if (is_string($skills)) {
                $skills = json_decode($skills, true);
            }
            $skills = is_array($skills) ? $skills : [];
        @endphp

        <div class="chatbot__tag mb-24 d-flex align-items-center">
            @foreach(array_slice($skills, 0, 4) as $skill)
                <a href="project-details.html" class="learning round16 fz-14 fw-500 inter base">
                    {{$skill['value']}}
                </a>
            @endforeach
        </div>

        <div class="text-dark  fw-400 mb-24 pra inter">
            {!! Str::limit($project->description, 150) !!}
        </div>

        <div class="lavel__tag bborderdash pb-24 d-flex align-items-center ">
            <span class="lavel__item ralt fz-16 fw-400 inter pra"
                  title="{{$project->created_at->format('d-m-Y H:i')}}">
                <span><i class="bi bi-clock"></i></span>
                <span class="title fw-600 inter">{{$project->created_at->diffforhumans()}}</span>
            </span>
            <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span><i class="bi bi-cash"></i></span>
                <span class="title fw-600 inter">
                    {{$project->offers->count() > 0 ? $project->offers->count() . ' proposals' : 'Add first offer'}}
                </span>
            </span>
            @if($project->delivery_time)
                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                    <span><i class="bi bi-calendar-week"></i></span>
                    <span class="title fw-600 inter">{{ delivery_time($project->delivery_time) }}</span>
                </span>
            @endif
            <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span class="title fw-600 inter">
                    <span class="round16 badge badge bg-{{ status($project->status) }}">
                        {{ statusName($project->status) }}
                    </span>
                </span>
            </span>
        </div>

        <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
            <div class="abstergo__left d-flex align-items-center">
                <div class="abster ralt">
                    <img src="{{$project->company->getPhoto()}}" alt="img">
                </div>
                <span class="fz-16 fw-400 inter pra">
                    {{$project->company->name}}
                </span>
            </div>
            <div class="abstr__heart d-flex align-items-center">
                @if($project->status == 1)
                    <a href="project-details.html" class="cmn--btn outline__btn">
                        <span>Send Proposal</span>
                        <span><i class="bi bi-arrow-up-right"></i></span>
                    </a>
                @else
                    <a href="project-details.html" class="cmn--btn outline__btn">
                        <span>View</span>
                        <span><i class="bi bi-eye-fill"></i></span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endforeach

{{$projects->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}

@else
    <span class="fz-16 fw-400 inter pra text-center justify-content-center">
                   No Results
                </span>
@endif

