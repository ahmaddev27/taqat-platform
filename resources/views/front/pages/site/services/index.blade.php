@extends('front.layouts.master',['title'=>$service->title])


@push('css')
    <style>

    </style>

@endpush

@section('content')

    <section class="project__details pt-120 pb-120 sectionbg2">


        <div class="container">
            <div class="row g-4">
                <div class="col-xl-8 col-lg-8">


                    <div class="chatbot__developers">
                        <div class="chatbot__items chatbot__items__details round16 mb-24 shadow2 bgwhite">

                            <div class="row g-4 justify-content-center">

                                <div class="  mb-24  bborderdash">
                                    <h5 class=" title mb-24 ">
                                        {{$service->title}}
                                    </h5>

                                    <h5 class="mb-24">
                                        <a href="javascript:void(0)"
                                           class="learning round16 fz-12 fw-600 inter base ">
                                            {{$service->category?->name}}
                                        </a>

                                    </h5>
                                </div>

                                <div class="col-xl-12 col-lg-12">

                                    <div class=" mb-40 bg-light round16 shadow-sm" style="margin: auto;width: 100%">
                                        <div class="" style="height: 500px">
                                            <img src="{{$service->getPhoto()}}" alt="img"
                                                 style="width: 100%; height: 500px; object-fit: cover;">
                                        </div>
                                    </div>

                                </div>

                                <p class="inter fw-400 pb-30 mb-30 fz-16 pra">
                                    {{ strip_tags($service->description) }}
                                </p>
                                <!-- Gallery Two Block -->
                            </div>


                            @foreach( $service->reviews as $review )
                                <div class="review__commentbox mb-24">
                                    <span
                                        class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-cener fw-400 ptext2 inter">
                                        {{$review->created_at->format('M d, Y')}}
                                        <span class="dotactive ralt fz-16 ptext2 inter d-block">
                                            {{$review->created_at->diffForHumans()}}
                                        </span>
                                    </span>
                                    <div class="d-flex pt-20 gap-3 align-items-center">
                                        <img src="{{  $review->user->getPhoto()}}"
                                             style="width: 60px; height :60px; object-fit: cover" class="round50"
                                             alt="re-img" loading="lazy">
                                        <div class="name__content">
                                            <h5 class="title">{{ $review->user->name}}
                                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                                    {{ $review->user->job_title ?? 'Job Title' }}
                                                </span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="pt-20  pb-20">
                                        <div class="ratting mb-8 d-flex align-items-center gap-2">
                                            @php
                                                // Fill the stars based on the review rating (1-5 scale)
                                                $fullStars = floor($review->review);
                                                $emptyStars = 5 - $fullStars;
                                            @endphp
                                            @for ($i = 0; $i < $fullStars; $i++)
                                                <i class="bi bi-star-fill"></i>  <!-- Filled star -->
                                            @endfor
                                            @for ($i = 0; $i < $emptyStars; $i++)
                                                <i class="bi bi-star"></i>  <!-- Empty star -->
                                            @endfor
                                        </div>

                                        <p class="fz-16 fw-400 inter title">
                                            {{ $review->comment ?? 'No Comment Provided' }}  <!-- Use actual review comment -->
                                        </p>

                                    </div>
                                </div>
                            @endforeach

                            @include('front.pages.site.services.partials.send-proposal')

                        </div>
                    </div>
                </div>




                    <div class="col-xl-4 col-lg-4">
                        <div class="basic__skilled__wrapper">
                            <div class="basic__boxskill mb-24 round16 bgwhite">

                                <div class="profile__check ralt mt-3">
                                    <img src="{{$service->user->getPhoto()}}" alt="profile">
                                </div>
                                <div class="darrell__content mt-40 text-center">
                                    <h4 class="title mb-16">
                                        {{$service->user->name}}
                                    </h4>
                                    <span class="fz-16 fw-400 inter title">
                                        Member since {{$service->user->created_at->format('M d, Y')}}
                                     </span>
                                    <ul class="social justify-content-center pt-24 mb-40 pb-40 bborderdash d-flex align-items-center">
                                        <li>
                                            <a href="#0">
                                                <i class="bi bi-facebook base"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="bi bi-instagram base"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="bi bi-twitter base"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="bi bi-pinterest base"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#0">
                                                <i class="bi bi-dribbble base"></i>
                                            </a>
                                        </li>
                                    </ul>


                                    <div class="binford__loca mb-40">
                                        <div class="d-flex mb-8 align-items-center gap-1">
                                            <i class="bi bi-check2-circle base"></i>
                                            <span class="fz-16 fw-400 inter pra">
                                             Price <span class="base">${{$service->price}}</span>
                                           </span>
                                        </div>


                                        <div class="d-flex mb-8 align-items-center gap-1">
                                            <i class="bi bi-check2-circle base"></i>

                                            <span class="base"> {{$service->orders_count}}</span>
                                            <span class="fz-16 fw-400 inter pra">
                                              Orders
                                           </span>
                                        </div>

                                        <div class="d-flex align-items-center gap-2 fz-16 fw-600 inter title">
                                            <i class="bi bi-star-fill ratting"></i>
                                            {{ $averageReview }}
                                            <span class="fz-16 fw-400 inter pra">({{ $totalReviews }})</span>
                                        </div>


                                    </div>

                                    <a href="{{route('talents.index',$service->user->slug)}}"
                                       class="cmn--btn outline__btn d-block">
                                        <span>
                                           View Profile
                                        </span>
                                        <span>
                                           <i class="bi bi-arrow-up-right"></i>
                                        </span>
                                    </a>
                                </div>


                            </div>

                            @if(auth('talent')->id() != $service->user_id)
                            <div class="basic__boxskill mb-24 round16 bgwhite justify-content-center text-center">

                                <a href="#"
                                   class="cmn--btn outline__btn d-block">
                                    <span>Buy Service</span>
                                    <span><i class="bi bi-bag"></i></span>
                                </a>
                            </div>

                            @endif


                        </div>

                    </div>




            </div>
        </div>
    </section>

@stop


