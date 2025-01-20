@if(companies()->count() > 0)
    <section class="choose__section bg__blr ralt pb-120 pt-120">
        <div class="container">
            <!-- Section Title -->
            <div class="row">
                <div class="col-lg-6 col-md-10 mx-auto">
                    <div class="section__title ralt mb-40 justify-content-center ">
                        <h4 class="sub ralt base mb-16 wow fadeInUp" data-wow-duration="1.1s">
                            Top-Rated Companies Who Had Completed Jobs
                        </h4>
                        <h2 class="title wow fadeInUp" data-wow-duration="1.2s">
                            Unleash the Power of the Best
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Profiles Section -->
            <div class="row justify-content-center">
                @foreach(companies() as $company)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="darrell__profile round16 bgwhite m-2 p-3 text-center">
                            <div class="profile__check ralt position-relative">
                                <img src="{{$company->getPhoto()}}" style="object-fit: cover" alt="profile"
                                     class="img-fluid rounded-circle">
                            </div>
                            <div class="darrell__content mt-3">
                                <h4 class="title mb-2">
                                    {{$company->name}}
                                </h4>
                                {{-- Optional Member Since --}}
                                {{--
                                <span class="fz-16 fw-400 inter title">
                                    Member since December 31, 2020
                                </span>
                                --}}
                                {{-- Optional View Profile Button --}}
                                {{--
                                <a href="profile.html" class="cmn--btn outline__btn d-block mt-3">
                                    <span>View Profile</span>
                                    <span>
                                        <i class="bi bi-arrow-up-right"></i>
                                    </span>
                                </a>
                                --}}
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="text-center mt-40">
                    <a href="{{route('companies.all')}}" class="cmn--btn outline__btn">
                        <span>See All</span>
                        <span class="ps-1">
                                <i class="bi bi-arrow-up-right"></i>
                            </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
