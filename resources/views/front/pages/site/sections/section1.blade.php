<div class="row justify-content-between align-items-center">
    <div class="col-xl-6 col-lg-7">
        <div class="banner__content banner__onespace ralt">

            @php
                $sliderSection = sliders()[0];
            @endphp


            <h4 class="base mb-16 wow fadeInDown">
                {{$sliderSection->title}}
            </h4>
            <span class="d3 title mb-24 fw-600 wow fadeInUp">


                     <span class="hover">{{setting('name')}}</span> Made <span class="hover">Smart</span> Freelancing Easy
                 </span>
            <p class="fz-20 fw-400 pra inter mb-40 wow fadeInDown">
                {{$sliderSection->details}}
            </p>
            <form id="searchForm" action="/talents"
                  method="GET"
                  class="search__component mb-24 d-flex align-items-center justify-content-between wow fadeInUp">

                <input required type="text" name="search" placeholder="What you're looking for?" />

                <div class="nice-select mx-1" tabindex="0" id="searchTypeSelector">
                    <span class="current">Talent</span>
                    <ul class="list">
                        <li data-value="talents" class="option selected">Talent</li>
                        <li data-value="companies" class="option">Companies</li>
                        <li data-value="teams" class="option">Teams</li>
                    </ul>
                </div>

                <button type="submit" class="cmn--btn d-flex align-items-center">
                    <span><i class="bi bi-search fz-12"></i></span>
                </button>
            </form>

            {{--                                    <div class="banner__aitag d-flex align-items-center wow fadeInDown">--}}
            {{--                                 <span class="aitag__text fz-16 fw-400 inter pra">--}}
            {{--                                    Popular Searches--}}
            {{--                                 </span>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            Machine Learning--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            NLP Specialists--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            Data Scientists--}}
            {{--                                        </a>--}}
            {{--                                        <a href="javascript:void(0)" class="cmnborder round100 fz-12 fw-400 inter title">--}}
            {{--                                            AI--}}
            {{--                                        </a>--}}
            {{--                                    </div>--}}
        </div>
    </div>
    <div class="col-xl-5 col-lg-5">
        <div class="banner__thumb1 ralt">
            {{--            <img src="{{sliders()[0]->image}}" class="w-100" alt="thumb">--}}
            <img src="{{asset('front/assets/img/bn/bannerthumb1.png')}}" class="w-100" alt="thumb">
            <img src="{{asset('front/assets/img/bn/vec1.png')}}" alt="vector" class="thumb__vector1">
            <img src="{{asset('front/assets/img/bn/vec2.png')}}" alt="vector" class="thumb__vector2">
        </div>
    </div>
</div>


@push('js')
    <script>
        // JavaScript to dynamically change the form action
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('searchForm');
            const selector = document.getElementById('searchTypeSelector');
            const options = selector.querySelectorAll('.option');

            options.forEach(option => {
                option.addEventListener('click', () => {
                    const selectedValue = option.getAttribute('data-value');
                    const actionMap = {
                        talents: '/talents',
                        companies: '/companies',
                        teams: '/teams'
                    };

                    // Update the form's action based on the selected value
                    form.setAttribute('action', actionMap[selectedValue] || '#');
                });
            });
        });
    </script>
@endpush

