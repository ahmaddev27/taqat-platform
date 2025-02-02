@extends('front.layouts.master',['title'=>'Services'])


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
            border-top: 4px solid #c5c8cc;
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
                                <span class="loader mx-5 justify-content-end"></span>

                            </h4>

                            <form class="d-flex mb-24 filter__search align-items-center justify-content-between"  onsubmit="return false;">
                                <input type="text" placeholder="Search" >
                                <i class="bi bi-search"></i>
                            </form>
                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Types of Categories
                                </h5>
                                @foreach($categories as $category)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <!-- Set the checkbox name to "specializations[]" to match the jQuery selector -->
                                            <input name="categories[]" class="form-check-input specializations"
                                                   type="checkbox"
                                                   id="specialization{{$category->id}}"
                                                   value="{{$category->id}}">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="specialization{{$category->id}}">
                                                {{$category->name}}
                                            </label>
                                        </div>
                                        <span class="fw-500 inter fz-16 pra">
                                        {{$category->khadmats_count}}
                                    </span>
                                    </div>
                                @endforeach

                            </div>


                            <div class="pt-24 tborderdash bborderdash pb-24">
                                <h5 class="title mb-16">
                                    Salary Scale
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

                            <a href="#"
                               class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                <i class="bi bi-arrow-clockwise base fz-20"></i>
                                Reset Filters
                            </a>

                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-8" id="list">
                    <div class="chatbot__developers text-center">
                        @include('front.pages.site.services.partials.services_list')
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


            $(document).on('change', '.filter__search input, .specializations, #customRangeMin, #customRangeMax', function () {
                $('html, body').animate({scrollTop: 0}, 'fast');

                let filters = {
                    search: $('input[placeholder="Search"]').val(),
                    categories: [],
                    expected_budget: {
                        min: $('#customRangeMin').val(),
                        max: $('#customRangeMax').val()
                    },
                };

                // Collect selected specializations
                $('input[name="categories[]"]:checked').each(function () {
                    filters.categories.push($(this).val().trim());
                });


                // Show preloader
                $('.loader').show();

                // AJAX request
                setTimeout(function () {
                    $.ajax({
                        url: '{{route('services.all')}}', // Adjust this URL to match your route
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            $('#list').html(response);
                            $('.loader').hide();
                        },
                        error: function (error) {
                            $('#list').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                }, 300);
            });

            // Reset filters
            $(document).on('click', '.reset__filter', function () {
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
                    categories: [],
                    expected_budget: {
                        min: 50,
                        max: 20000
                    },
                };

                setTimeout(function () {

                    // Trigger AJAX request with reset filters
                    $.ajax({
                        url: '{{route('services.all')}}',
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            $('.loader').hide();
                            $('#list').html(response);
                        },
                        error: function (error) {
                            console.error('Error fetching jobs:', error);
                            $('#list').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        }
                    });
                }, 300);
            });


        </script>
    @endpush

@stop


