@if($companies->count()>0 )

<div class="companies-container">
    <div class="row g-4">
        @foreach($companies as $company)
            <div id="{{$company->id}}" class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                <div class="frelancer__item shadow2 round16 bgwhite">
                    <a href="{{route('companies.index', $company->id)}}" class="thumbs m-auto">
                        <img src="{{$company->getPhoto()}}" class="rounded-circle"
                             style="width: 100%; border: 2px solid #fffefe; height: 100%; object-fit: cover;"
                             loading="lazy">
                    </a>
                    <h5 class="mt-24 text-center mb-20">
                        <a href="{{route('companies.index', $company->id)}}" class="title">
                            {{$company->name}}
                        </a>
                    </h5>
                </div>
            </div>
        @endforeach
    </div>
</div>



{{$companies->appends(request()->query())->links('vendor.pagination.bootstrap-4')}}

@else
    <div class="chatbot__items round16 mb-24 shadow2 bgwhite">
        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-center">
            <h5 class="title text-center justify-content-center  fz-18 fw-500  inte">
                No Results
            </h5>

        </div>
    </div>
@endif


