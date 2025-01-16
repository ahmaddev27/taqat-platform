@extends('front.layouts.master',['title'=>'Projects'])


@push('css')
    <style>

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
        }

        .slider-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        .form-range {
            width: 100%;
            margin: 1px;
        }

        .form-check-label {
            display: block;
            margin-bottom: 5px;
        }

        .slider-divider {
            border-left: 1px dashed #7395c94f;
            height: 100px; /* Adjust height to fit the sliders */
            margin: 0 10px;
        }

        /* Style for both sliders */
        input[type="range"] {
            -webkit-appearance: none;
            appearance: none;
            width: 100%;
            height: 10px;
            background: linear-gradient(to right, #0d47a1 0%, #0d47a1 0%, #d3d3d3 0%, #d3d3d3 100%);
            border-radius: 5px;
        }

        input[type="range"]:focus {
            outline: none;
        }

        /* Style for the slider thumb */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            background: #0a244d;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Firefox styles */
        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #0a244d;
            border-radius: 50%;
            cursor: pointer;
        }


        .loader {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 4px solid #c5c8cc
            border-right: 4px solid transparent;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }
        .loader::after {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 0;
            top: 0;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border-left: 4px solid #197dbb;
            border-bottom: 4px solid transparent;
            animation: rotation 0.5s linear infinite reverse;
        }
        @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>

@endpush

@section('content')

    <section class="service__grid pt-120 pb-120 sectionbg2">
        <div class="container">

            <div class="row g-4">

                <div class="col-xl-4 col-lg-4">
                    <div class="card__sidebar side__sticky round16">

                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24 d-flex align-items-center">
                                Filter
                                <span class="loader mx-5"></span>

                            </h4>

                            <form action="#0"
                                  class="d-flex mb-24 filter__search align-items-center justify-content-between">
                                <input type="text" placeholder="Search">
                                <i class="bi bi-search"></i>
                            </form>
                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Types of Categories
                                </h5>
                                @foreach($specializations as $specialization)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <!-- Set the checkbox value to be the specialization ID -->
                                            <input class="form-check-input" type="checkbox"
                                                   id="specialization{{$specialization->id}}"
                                                   value="{{$specialization->id}}">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="specialization{{$specialization->id}}">
                                                {{$specialization->title}}
                                            </label>
                                        </div>
                                        <span class="fw-500 inter fz-16 pra">
                                                {{$specialization->company_projects_count}}
                                            </span>
                                    </div>
                                @endforeach

                            </div>


                            <div class="pt-24 tborderdash bborderdash pb-24">
                                <h5 class="title mb-16">
                                    Pricing Scale
                                </h5>

                                <div class="slider-container">
                                    <!-- Min Slider -->
                                    <div class="text-center justify-content-center pra">
                                        <label for="customRangeMin"
                                               class="form-check-label fz-16 fw-400 ptext2 inter"></label>
                                        <input type="range" class="" id="customRangeMin" min="50" max="1000" step="50"
                                               value="25">
                                        <span class="form-check-label fz-16 fw-400 ptext2 inter" id="currentMinValue">Min: $25</span>
                                    </div>

                                    <!-- Divider with border -->
                                    <div class="slider-divider"></div>

                                    <!-- Max Slider -->
                                    <div class="text-center justify-content-center pra">
                                        <label for="customRangeMax"
                                               class="form-check-label fz-16 fw-400 ptext2 inter"></label>
                                        <input type="range" class=" " id="customRangeMax" min="1000" max="20000"
                                               step="1000" value="20000">
                                        <span class="form-check-label fz-16 fw-400 ptext2 inter" id="currentMaxValue">Max: $20000</span>
                                    </div>
                                </div>

                            </div>
                            <div class="bank__check__wrap pb-24 tborderdash">
                                <h5 class="title mb-16 pt-24">
                                    Deliver Time
                                </h5>


                                @foreach(delivery_time() as $key => $time)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <input class="form-check-input" name="delivery_time" type="checkbox"
                                                   id="delivery_time{{$key}}">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="delivery_time{{$key}}">
                                                {{$time}}
                                            </label>
                                        </div>

                                    </div>
                                @endforeach


                            </div>

                            <a href="#0"
                               class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                <i class="bi bi-arrow-clockwise base fz-20"></i>
                                Reset Filters
                            </a>

                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-8">
                    <div class="chatbot__developers text-center">
                        @include('front.pages.site.projects.partials.project_list')
                    </div>
                </div>
            </div>
        </div>

    </section>



    @push('js')
        <script>
            const minSlider = document.getElementById('customRangeMin');
            const maxSlider = document.getElementById('customRangeMax');
            const currentMinValue = document.getElementById('currentMinValue');
            const currentMaxValue = document.getElementById('currentMaxValue');

            // Function to update the slider background
            function updateSliderBackground(slider) {
                const value = (slider.value - slider.min) / (slider.max - slider.min) * 100;
                slider.style.background = `linear-gradient(to right, #0d47a1 ${value}%, #d3d3d3 ${value}%)`;
            }

            // Initialize background when the page loads
            updateSliderBackground(minSlider);
            updateSliderBackground(maxSlider);

            // Event listeners to update the background while sliding
            minSlider.addEventListener('input', function () {
                updateSliderBackground(minSlider);
                currentMinValue.textContent = `Min: $${minSlider.value}`;
            });

            maxSlider.addEventListener('input', function () {
                updateSliderBackground(maxSlider);
                currentMaxValue.textContent = `Max: $${maxSlider.value}`;
            });


            $(document).on('change', '.filter__search input, .bank__check__wrap input, #customRangeMin, #customRangeMax', function () {
                let filters = {
                    search: $('input[placeholder="Search"]').val(),
                    specializations: [],
                    expected_budget: {
                        min: $('#customRangeMin').val(),
                        max: $('#customRangeMax').val()
                    },
                    delivery_time: []
                };

                // Collect selected specializations
                $('.bank__check__wrap input[type="checkbox"]:checked').each(function () {
                    filters.specializations.push($(this).val().trim());
                });

                // Collect selected delivery times
                $('input[name="delivery_time"]:checked').each(function () {
                    filters.delivery_time.push($(this).val());
                });

                // Show preloader
                $('.loader-spinner-filter').show();

                // AJAX request
                $.ajax({
                    url: '{{route('projects.all')}}', // Adjust this URL to match your route
                    method: 'GET',
                    data: filters,
                    success: function (response) {
                        $('.chatbot__developers').html(response);
                        $('.loader-spinner-filter').hide(); // Hide preloader once data is loaded
                    },
                    error: function (error) {
                        $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        $('.loader-spinner-filter').hide(); // Hide preloader in case of error
                    }
                });
            });

            // Reset filters
            $(document).on('click', '.reset__filter', function () {
                // Reset input fields
                $('.filter__search input').val('');
                $('#customRangeMin').val(50);
                $('#customRangeMax').val(20000);
                $('input[type="checkbox"]').prop('checked', false);
                $('.loader-spinner-filter').show();

                // Reset filters object
                let filters = {
                    search: '',
                    specializations: [],
                    expected_budget: {
                        min: 50,
                        max: 20000
                    },
                    delivery_time: []
                };

                // Trigger AJAX request with reset filters
                $.ajax({
                    url: '{{route('projects.all')}}',
                    method: 'GET',
                    data: filters,
                    success: function (response) {
                        $('.loader-spinner-filter').hide();
                        $('.chatbot__developers').html(response);
                    },
                    error: function (error) {
                        console.error('Error fetching projects:', error);
                        $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                    }
                });
            });


        </script>
    @endpush

@stop


