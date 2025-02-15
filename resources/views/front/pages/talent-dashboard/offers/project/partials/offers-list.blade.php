@if($offers->count()>0)
    @foreach($offers as $offer)
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
            <a href="{{route('projects.index',$offer->project->slug)}}"><h5 class="title">
                    {{$offer->project->title}}
                </h5>
            </a>
            <span class="fz-20 d-flex align-items-center gap-1 fw-400 inter title">
                Budget: <span class="base inter fw-500">${{$offer->project->budget}}</span>
            </span>
        </div>

        @php
            $skills = $offer->project->skills;
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

        <div class="text-dark  fw-400 mb-24 pra inter">
            {{str_limit( strip_tags($offer->project->description),150)}}

        </div>

        <div class="lavel__tag bborderdash pb-24 d-flex align-items-center ">
            <span class="lavel__item ralt fz-16 fw-400 inter pra"
                  title="{{$offer->created_at->format('M d,Y H:i')}}">
                <span><i class="bi bi-clock"></i></span>
                <span class="title fw-600 inter">{{$offer->created_at->diffforhumans()}}</span>
            </span>
            <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span><i class="bi bi-ticket"></i></span>
                <span class="title fw-600 inter">
                    {{$offer->project->offers->count() > 0 ? $offer->project->offers->count() . ' proposals' : 'Add first offer'}}
                </span>
            </span>
            @if($offer->project->delivery_time)
                <span class="lavel__item ralt fz-16 fw-400 inter pra">
                    <span><i class="bi bi-calendar-week"></i></span>
                    <span class="title fw-600 inter">{{ delivery_time($offer->project->delivery_time) }}</span>
                </span>
            @endif
            <span class="lavel__item ralt fz-16 fw-400 inter pra">
                <span class="title fw-600 inter">
                    <span class="round16 badge badge bg-{{ statusOffers($offer->status) }}">
                        {{ statusOfferName($offer->status) }}
                    </span>
                </span>
            </span>
        </div>

        <div class="d-flex pt-24 flex-wrap gap-2 align-items-center justify-content-between">
            <div class="abstergo__left d-flex align-items-center">
                <div class="abster ralt">
                    <img src="{{$offer->project->company->getPhoto()}}" alt="img">
                </div>
                <span class="fz-16 fw-400 inter pra">
                    {{$offer->project->company->name}}
                </span>
            </div>
            <div class="abstr__heart d-flex align-items-center">

                    <a href="{{route('projects.index',$offer->project->slug)}}" class="cmn--btn outline__btn">
                        <span>View</span>
                        <span><i class="bi bi-eye-fill"></i></span>
                    </a>
            </div>
        </div>
    </div>
    @endforeach



@else
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-center">
            <h5 class="title text-center justify-content-center  fz-18 fw-500  inte">
                No Results
            </h5>

        </div>
    </div>
@endif


