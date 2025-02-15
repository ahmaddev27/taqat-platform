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
                                <span class="loader mx-5 justify-content-end"></span>

                            </h4>

                            <form class="d-flex mb-24 filter__search align-items-center justify-content-between" onsubmit="return false;">
                                <input type="text" placeholder="Search" >
                                <i class="bi bi-search"></i>
                            </form>
                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Types of Categories
                                </h5>
                                @foreach($specializations as $specialization)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <!-- Set the checkbox name to "specializations[]" to match the jQuery selector -->
                                            <input name="specializations[]" class="form-check-input specializations"
                                                   type="checkbox"
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
                                        <input type="range" class="" id="customRangeMin" min="25" max="1000" step="50"
                                               name="min" value="25">
                                        <span class="form-check-label fz-16 fw-400 ptext2 inter" id="currentMinValue">Min: $25</span>
                                    </div>

                                    <!-- Divider with border -->
                                    <div class="slider-divider"></div>

                                    <!-- Max Slider -->
                                    <div class="text-center justify-content-center pra">
                                        <label for="customRangeMax"
                                               class="form-check-label fz-16 fw-400 ptext2 inter"></label>
                                        <input type="range" id="customRangeMax" min="1000" max="20000"
                                               name="max" step="1000" value="20000">
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
                                            <input value="{{$key}}" class="form-check-input delivery_time"
                                                   name="delivery_time[]" type="checkbox" id="delivery_time{{$key}}">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="delivery_time{{$key}}">
                                                {{$time}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <a  href="#" class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
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
            $('.loader').hide();
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


            $(document).on('change', '.filter__search input, .specializations, #customRangeMin, #customRangeMax,.delivery_time', function () {
                $('html, body').animate({scrollTop: 0}, 'fast');
                $('.chatbot__items').addClass('fade-my');


                let filters = {
                    search: $('input[placeholder="Search"]').val(),
                    specializations: [],
                    expected_budget: {
                        min: $('#customRangeMin').val(),
                        max: $('#customRangeMax').val()
                    },
                    delivery_time: [] // Start with an empty array
                };

                // Collect selected specializations
                $('input[name="specializations[]"]:checked').each(function () {
                    filters.specializations.push($(this).val().trim());
                });

                // Collect selected delivery times
                $('input[name="delivery_time[]"]:checked').each(function () {
                    filters.delivery_time.push($(this).val());
                });

                // Show preloader
                $('.loader').show();

                // AJAX request
                setTimeout(function () {
                    $.ajax({
                        url: '{{route('projects.all')}}', // Adjust this URL to match your route
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            $('.chatbot__developers').html(response);
                            $('.loader').hide();
                        },
                        error: function (error) {
                            $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                }, 300);
            });

            // Reset filters
            $(document).on('click', '.reset__filter', function () {
                $('.chatbot__items').addClass('fade-my');

                // Reset input fields
                $('.filter__search input').val('');
                $('#customRangeMin').val(50);
                $('#customRangeMax').val(20000);
                $('input[type="checkbox"]').prop('checked', false);
                $('html, body').animate({scrollTop: 0}, 'fast');
                $('.loader').show();

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

                setTimeout(function () {

                    // Trigger AJAX request with reset filters
                    $.ajax({
                        url: '{{route('projects.all')}}',
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            $('.loader').hide();
                            $('.chatbot__developers').html(response);
                        },
                        error: function (error) {
                            console.error('Error fetching projects:', error);
                            $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        }
                    });
                }, 300);
            });


            $(document).on('click', '.pagination-links a', function (event) {
                event.preventDefault(); // Prevent default pagination action
                $('html, body').animate({scrollTop: 0}, 'fast');
                $('.chatbot__items').addClass('fade-my');
                let pageUrl = $(this).attr('href'); // Get the pagination link URL

                if (pageUrl) {
                    $('.loader').show(); // Show preloader

                    $.ajax({
                        url: pageUrl, // Request new paginated data
                        type: 'GET',
                        success: function (response) {
                            $('.chatbot__developers').html(response); // Update the project list
                            $('.loader').hide();
                        },
                        error: function () {
                            $('.chatbot__developers').html('<div class="error-message">Failed to load projects. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                }
            });

        </script>
    @endpush

@stop


