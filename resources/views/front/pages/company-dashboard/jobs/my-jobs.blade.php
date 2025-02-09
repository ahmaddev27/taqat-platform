@extends('front.layouts.master',['title'=>'My Jobs'])


@push('css')
    <style>

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
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
                    <div class="card__sidebar side__sticky round16 shadow2">

                        <div class="card__common__item bgwhite round16 ">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24 d-flex align-items-center">
                                Filter
                                <span class="loader mx-5 justify-content-end"></span>
                            </h4>


                            <form class="d-flex mb-24 filter__search align-items-center justify-content-between"
                                  onsubmit="return false;">
                                <input type="text" placeholder="Search">
                                <i class="bi bi-search"></i>
                            </form>

                            <select class="sort__time mb-24" aria-label="Sort by time">
                                <option value="desc">Newest First</option>
                                <option value="asc">Oldest First</option>
                            </select>

                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Project Status
                                </h5>

                                @for($i = 1; $i <= 4; $i++)
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <!-- Checkbox for status filter -->
                                            <input name="status[]" class="form-check-input status"
                                                   type="checkbox"
                                                   id="status{{$i}}"
                                                   value="{{$i}}">


                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="status{{$i}}">
                                                {{ statusJobName($i) }}

                                            </label>
                                        </div>
                                        <!-- Display the project count next to the status name -->
                                        @if(isset($jobsCounts[$i]) && $jobsCounts[$i] > 0)
                                            <span class="fw-500 inter fz-16 pra">
                                        {{$jobsCounts[$i]}}
                                    </span>

                                        @else
                                            <span class="fw-500 inter fz-16 pra"> 0</span>
                                        @endif




                                    </div>
                                @endfor


                            </div>


                            <a href="#"
                               class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                <i class="bi bi-arrow-clockwise base fz-20"></i>
                                Reset Filters
                            </a>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">
                    <div class="row g-4">


                        <div class="col-12 text-end m-2">
                            <!-- Column for Total Balance -->
                            <a href="{{route('company.jobs.add')}}" class="cmn--btn basebor outline__btn no-border ">
                                <span><i class="bi bi-plus"></i></span>
                                <span>New Job</span>
                            </a>
                        </div>
                    </div>


                    <div class="chatbot__developers text-center">

                        @include('front.pages.company-dashboard.jobs.partials.jobs-list')
                    </div>
                </div>
            </div>
        </div>

    </section>



    @push('js')

        <script>
            $(document).ready(function () {
                // Hide loader initially
                $('.loader').hide();

                // Event handler for filtering when the search input, status checkboxes, or sort option are changed
                $(document).on('change', '.status, .filter__search input, .sort__time', function () {
                    // Scroll to the top
                    $('html, body').animate({scrollTop: 0}, 'fast');

                    // Prepare the filters object
                    let filters = {
                        search: $('.filter__search input').val(), // Get the value from the search input
                        status: [],
                        sort_time: $('.sort__time').val(), // Get the sort order (asc or desc)
                    };

                    // Collect selected status values
                    $('input[name="status[]"]:checked').each(function () {
                        filters.status.push($(this).val().trim());
                    });

                    // Show the loader while fetching the filtered data
                    $('.loader').show();

                    // Perform the AJAX request to get the filtered jobs
                    $.ajax({
                        url: '{{ route('company.jobs.all') }}', // Adjust this URL to match your route
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            // Update the project list with the returned HTML
                            $('.chatbot__developers').html(response.html);
                            $('.loader').hide();
                        },
                        error: function () {
                            // Display error message if the request fails
                            $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                });

                // Reset the filters when the reset button is clicked
                $(document).on('click', '.reset__filter', function () {
                    // Reset the checkbox states, search input, and sort option
                    $('input[type="checkbox"]').prop('checked', false);
                    $('.filter__search input').val('');
                    $('.sort__time').val('desc'); // Reset to default sorting (Newest First)

                    // Scroll to the top
                    $('html, body').animate({scrollTop: 0}, 'fast');

                    // Show the loader while fetching the unfiltered data
                    $('.loader').show();

                    // Reset filters object
                    let filters = {
                        status: [],
                        search: '', // Clear the search term
                        sort_time: 'desc', // Default sorting
                    };

                    // Perform the AJAX request to get the full list of jobs
                    $.ajax({
                        url: '{{ route('company.jobs.all') }}',
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            // Update the project list with the full unfiltered project list
                            $('.chatbot__developers').html(response.html);
                            $('.loader').hide();
                        },
                        error: function () {
                            // Display error message if the request fails
                            $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                });

                // Pagination via AJAX when pagination links are clicked
                $(document).on('click', '.pagination a', function (e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    var filters = {
                        search: $('.filter__search input').val(), // Include search term in pagination
                        status: [],
                        sort_time: $('.sort__time').val(), // Include selected sort option in pagination
                    };

                    // Collect selected status values
                    $('input[name="status[]"]:checked').each(function () {
                        filters.status.push($(this).val().trim());
                    });

                    // Show the loader while fetching the next page of results
                    $('.loader').show();

                    $.ajax({
                        url: url, // The URL of the page from pagination
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            // Update the project list with paginated data
                            $('.chatbot__developers').html(response.html);
                            $('.loader').hide();
                        },
                        error: function () {
                            // Display error message if the request fails
                            console.error('Error fetching jobs:', error);
                            $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                });
            });


        </script>

    @endpush

@stop


