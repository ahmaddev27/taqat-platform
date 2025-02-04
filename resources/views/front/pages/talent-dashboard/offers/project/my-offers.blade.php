@extends('front.layouts.master',['title'=>'Projects Offers'])


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
                    <div class="card__sidebar side__sticky round16">

                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24 d-flex align-items-center">
                                Filter
                                <span class="loader mx-5 justify-content-end"></span>

                            </h4>

                            <form class="d-flex mb-24 filter__search align-items-center justify-content-between">
                                <input type="text" placeholder="Search">
                                <i class="bi bi-search"></i>
                            </form>
                            <div class="bank__check__wrap tborderdash pb-24">
                                <h5 class="title mb-16 pt-20">
                                    Offers Status
                                </h5>

                                @for($i = 1; $i <= 4; $i++)

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="bank__checkitem mb-8 d-flex align-items-center">
                                            <!-- Set the checkbox name to "status[]" to match the jQuery selector -->
                                            <input name="status[]" class="form-check-input status"
                                                   type="checkbox"
                                                   id="status{{$i}}"
                                                   value="{{$i}}">
                                            <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                   for="status{{$i}}">
                                                {{statusOfferName($i)}}
                                            </label>
                                        </div>

                                    </div>
                                @endfor

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
                        @include('front.pages.talent-dashboard.offers.project.partials.offers-list')
                    </div>
                </div>
            </div>
        </div>

    </section>




        @push('js')
            <script>
                $('.loader').hide();

                $(document).on('change', '.status', function () {
                    $('html, body').animate({scrollTop: 0}, 'fast');

                    let filters = {
                        status: [],
                    };

                    // Collect selected specializations
                    $('input[name="status[]"]:checked').each(function () {
                        filters.status.push($(this).val().trim());
                    });

                    // Show preloader
                    $('.loader').show();

                    // AJAX request
                    setTimeout(function () {
                        $.ajax({
                            url: '{{ route('proposals.index') }}', // Adjust this URL to match your route
                            method: 'GET',
                            data: filters,
                            success: function (response) {
                                $('.chatbot__developers').html(response.html); // Adjusting to insert HTML from response
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
                    // Reset input fields
                    $('input[type="checkbox"]').prop('checked', false);
                    $('html, body').animate({scrollTop: 0}, 'fast');
                    $('.loader').show();

                    // Reset filters object
                    let filters = {
                        search: '',
                        status: [],
                    };

                    setTimeout(function () {
                        // Trigger AJAX request with reset filters
                        $.ajax({
                            url: '{{ route('proposals.index') }}',
                            method: 'GET',
                            data: filters,
                            success: function (response) {
                                $('.loader').hide();
                                $('.chatbot__developers').html(response.html); // Adjusting to insert HTML from response
                            },
                            error: function (error) {
                                console.error('Error fetching projects:', error);
                                $('.chatbot__developers').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            }
                        });
                    }, 300);
                });
            </script>
        @endpush

@stop


