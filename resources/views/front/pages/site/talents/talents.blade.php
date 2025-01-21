@extends('front.layouts.master',['title'=>'Talents'])


@push('css')
    <style>
        .cate__items {
            padding: 32px 44px;
            transition: all 0.4s
        }

        /* No Borders Class */
        .no-border {
            border: none !important;
            box-shadow: none;
        }

    </style>

@endpush

@section('content')

    <!--service grid here-->
    <section class="service__grid pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-4">
                    <div class="card__sidebar side__sticky round16">
                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24">
                                Filter
                                <span class="loader mx-5 justify-content-end"></span>

                            </h4>

                            <form id="search" method="GET" onsubmit="return false;" action="#">
                                <input id="searchInput" type="search" class="p-2 form-control filter__search"
                                       name="search"
                                       value="{{ request()->search }}" placeholder="Search" onsubmit="return false;">
                                <i class="bi bi-search"></i>

                                <div class="bank__check__wrap tborderdash pb-24">
                                    <h5 class="title mb-16 pt-20">
                                        Types of Categories
                                    </h5>
                                    @foreach($specializations as $specialization)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="bank__checkitem mb-8 d-flex align-items-center">
                                                <input name="specializations[]" class="form-check-input specializations"
                                                       type="checkbox" id="specialization{{$specialization->id}}"
                                                       value="{{$specialization->id}}">
                                                <label class="form-check-label fz-16 fw-400 ptext2 inter"
                                                       for="specialization{{$specialization->id}}">
                                                    {{$specialization->title}}
                                                </label>
                                            </div>
                                            <span class="fw-500 inter fz-16 pra">
                                        {{$specialization->talents_count}}
                                    </span>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="bank__check__wrap bborderdash pb-24 mb-24 tborderdash">
                                    <h5 class="title mb-16 pt-24">Star Category</h5>
                                    @foreach([5, 4, 3, 2, 1, 0] as $star)
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="bank__checkitem mb-8 d-flex align-items-center">
                                                <input class="form-check-input stars" type="checkbox"
                                                       id="star{{ $star }}" name="stars[]"
                                                       value="{{ $star }}" {{ in_array($star, request()->get('stars', [])) ? 'checked' : '' }}>
                                                <label
                                                    class="form-check-label d-flex align-items-center gap-2 fz-16 fw-400 ptext2 inter"
                                                    for="star{{ $star }}">
                                                    <i class="bi bi-star-fill ratting"></i>
                                                    {{ $star }} Star
                                                </label>
                                            </div>
                                            <span class="fw-500 inter fz-16 pra">
                    {{ $talents->where('rate', '>=', $star)->count() }}
                </span>
                                        </div>
                                    @endforeach
                                </div>

                                <a href="#"
                                   class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                    <i class="bi bi-arrow-clockwise base fz-20"></i>
                                    Reset Filters
                                </a>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-8">
                    <div class="row g-4 talents">

                        @include('front.pages.site.talents.partials.talents-list')

                    </div>


                </div>
            </div>
        </div>
    </section>
    <!--service grid end-->


    @push('js')
        <script>
            // Initially hide the loader
            $('.loader').hide();

            // Event listener for any filter change (search input, checkboxes)
            $(document).on('change', '#searchInput, .specializations, .stars', function () {
                $('html, body').animate({scrollTop: 0}, 'fast'); // Scroll to top

                // Prepare the filters object
                let filters = {
                    search: $('#searchInput').val(), // Get search input value
                    specializations: [], // Store selected specializations
                    stars: [] // Store selected stars
                };

                // Collect selected specializations
                $('input[name="specializations[]"]:checked').each(function () {
                    filters.specializations.push($(this).val().trim());
                });

                // Collect selected star ratings
                $('input[name="stars[]"]:checked').each(function () {
                    filters.stars.push($(this).val().trim());
                });

                // Show loader
                $('.loader').show();

                // Send AJAX request
                $.ajax({
                    url: '{{ route('talents.all') }}', // Adjust to the actual route
                    method: 'GET',
                    data: filters, // Send the filters as query parameters
                    success: function (response) {
                        // Update the talent list with the response
                        $('.talents').html(response.html);
                        $('.loader').hide(); // Hide loader after response
                    },
                    error: function (error) {
                        console.error('Error fetching talents:', error);
                        $('.talents').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        $('.loader').hide();
                    }
                });
            });


            // Reset filters when the reset button is clicked
            $(document).on('click', '.reset__filter', function () {
                // Reset filter inputs and sliders
                $('#searchInput').val('');
                $('input[type="checkbox"]').prop('checked', false);

                // Reset filter values
                let filters = {
                    search: '',
                    specializations: [],
                    stars: []
                };

                // Show loader and send AJAX request with reset filters
                $('.loader').show();
                setTimeout(function () {
                    $.ajax({
                        url: '{{ route('talents.all') }}', // Adjust to the actual route
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            $('.loader').hide();
                            $('.talents').html(response.html);
                        },
                        error: function (error) {
                            console.error('Error fetching talents:', error);
                            $('.talents').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        }
                    });
                }, 300);
            });
        </script>
    @endpush

@stop


