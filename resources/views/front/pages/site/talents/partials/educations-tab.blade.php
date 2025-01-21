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
                                                            class="base  fz-16 mb-16 fw-500 d-inline-block inter bgwhite round16 p-2">
                                                       {{$scientificCertificate->graduation_year }}
                                                   </span>
                        <span class="fz-20 fw-500 inter title d-block mb-16">
                                                                      {{$scientificCertificate->title}}
                                                                                      </span>
                        <span class="fz-16 mb-2 d-block fw-500 inter success2">
                                                                 {{$scientificCertificate->specialization}}
                                                                        </span>

                        <p class="pra inter fz-14 fw-400">
                            {{$scientificCertificate->college}} - {{$scientificCertificate->university}}
                        </p>

{{--                        @if($scientificCertificate->photo)--}}

{{--                            @if($scientificCertificate->getFileType() == 'image')--}}

{{--                                <p class="pra inter fz-18 fw-400 float-end">--}}

{{--                                    <a href="{{$scientificCertificate->getPhoto()}}" target="_blank">--}}
{{--                                        <i class="bi bi bi-file-image"></i>--}}
{{--                                    </a>--}}


{{--                                </p>--}}


{{--                            @elseif($scientificCertificate->photo)--}}


{{--                                <p class="pra inter fz-18 fw-400 float-end">--}}
{{--                                    <a href="{{$scientificCertificate->getPhoto()}}" target="_blank">--}}
{{--                                        <i class="bi bi bi-file-pdf"></i></a>--}}
{{--                                </p>--}}

{{--                            @endif--}}

{{--                        @endif--}}



                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endif
