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


        .loading-placeholder {
            background: #e0e0e0; /* Light gray to mimic skeleton loading */
            animation: pulse 1.5s infinite ease-in-out;
        }

        @keyframes pulse {
            0% {
                background-color: #f0f0f0;
            }
            50% {
                background-color: #e0e0e0;
            }
            100% {
                background-color: #f0f0f0;
            }
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
                                <span class="loader mx-5 justify-content-end" style="display: none"></span>

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
                    <div class="row g-4 talents" id="talentsList">
                        <!-- Skeleton loader as placeholder -->

                        @include('front.pages.site.talents.partials.talents-list')


                    </div>




                </div>
            </div>
        </div>
    </section>
    <!--service grid end-->


    @push('js')
        <script>
            $(document).ready(function () {

                let page = 1;  // Start at page 1
                let isLoading = false;  // Prevent multiple AJAX calls
                const loadersCount = 6;  // Number of skeleton loaders to show at a time

                // Function to load talents based on current filters and pagination
                function loadTalents() {
                    if (isLoading) return;  // Prevent multiple requests while one is in progress

                    isLoading = true;
                    // Show the main loader only when data is being fetched
                    if (page === 1) {
                        $('.loader').show();  // Show loader on the first page load
                    }

                    // Show skeleton loaders as placeholders before data is loaded
                    for (let i = 0; i < loadersCount; i++) {
                        $('#talentsList').append(`
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 skeleton-loader">
    <div class="frelancer__item shadow2 round16 bgwhite loading">
        <div class="d-flex mb-24 align-items-center justify-content-between">
            <div class="d-flex gap-2 fz-16 fw-600 inter title">
                <div class="loading-placeholder" style="width: 16px; height: 16px; border-radius: 50%;"></div>
                <div class="loading-placeholder" style="width: 40px; height: 16px;"></div>
                <span class="loading-placeholder" style="width: 80px; height: 16px;"></span>
            </div>
            <div class="loading-placeholder" style="width: 100px; height: 16px;"></div>
        </div>
        <a href="#" class="thumbs m-auto">
            <div class="loading-placeholder" style="width: 100%; height: 120px; border-radius: 50%; background-color: #e0e0e0;"></div>
        </a>
        <h5 class="mt-24 text-center mb-20">
            <div class="loading-placeholder" style="width: 60%; height: 20px;"></div>
        </h5>
        <div class="d-flex bborderdash pb-20 align-items-center justify-content-center">
            <div class="d-flex fz-16 fw-400 gap-2 inter pra align-items-center">
                <div class="loading-placeholder" style="width: 16px; height: 16px; border-radius: 50%;"></div>
                <div class="loading-placeholder" style="width: 50px; height: 16px;"></div>
            </div>
        </div>
        <div class="d-flex align-items-center mt-20 justify-content-between">
            <span class="fz-18 fw-500 inter base">
                                <div class="loading-placeholder" style="width: 50px; height: 16px;"></div>

            </span>
            <div class="cmn__ibox boxes1 round50 d-flex align-items-center justify-content-center text-dark">
                <div class="loading-placeholder" style="width: 30px; height: 30px; border-radius: 50%;"></div>
            </div>
        </div>
    </div>
</div>

            `);
                    }

                    // Collect current filter data
                    let filters = {
                        search: $('#searchInput').val(),
                        specializations: [],
                        stars: []
                    };

                    // Collect selected specializations
                    $('input[name="specializations[]"]:checked').each(function () {
                        filters.specializations.push($(this).val().trim());
                    });

                    // Collect selected star ratings
                    $('input[name="stars[]"]:checked').each(function () {
                        filters.stars.push($(this).val().trim());
                    });

                    // Send AJAX request to fetch filtered data with pagination
                    $.ajax({
                        url: '{{ route('talents.all') }}',  // Ensure this is the correct route
                        method: 'GET',
                        data: {
                            ...filters,
                            page: page  // Send the current page number for pagination
                        },
                        success: function (response) {
                            // Append the new data to the existing list
                            if (page === 1) {
                                $('#talentsList').html(response.html);  // Replace on first page load
                            } else {
                                $('#talentsList').append(response.html);  // Append for subsequent pages
                            }

                            // Hide the loader once data is loaded
                            isLoading = false;
                            $('.loader').hide();

                            // Remove skeleton loaders after data is loaded
                            $('#talentsList .skeleton-loader').remove();
                        },
                        error: function () {
                            console.error('Error loading talents');
                            isLoading = false;
                            $('.loader').hide();
                            // Remove skeleton loaders in case of an error
                            $('#talentsList .skeleton-loader').remove();
                        }
                    });
                }

                // Event listener for filter form submit (when user presses Enter or changes the filter)
                $('#searchInput').on('input', function () {
                    page = 1;  // Reset to page 1 when search term is changed
                    loadTalents();  // Load talents with updated filters
                });

                // Event listener for specialization checkboxes
                $('input[name="specializations[]"]').on('change', function () {
                    page = 1;  // Reset to page 1 when specialization filters change
                    loadTalents();  // Load talents with updated filters
                });

                // Event listener for star checkboxes
                $('input[name="stars[]"]').on('change', function () {
                    page = 1;  // Reset to page 1 when star filters change
                    loadTalents();  // Load talents with updated filters
                });

                // Event listener for Reset Filters button
                $('.reset__filter').on('click', function () {
                    // Reset all filter inputs
                    $('#searchInput').val('');
                    $('.loader').show();  // Show loader during reset
                    $('input[name="specializations[]"]').prop('checked', false);
                    $('input[name="stars[]"]').prop('checked', false);

                    // Reset the page and load talents with no filters applied
                    page = 1;
                    loadTalents();
                });

                // Scroll-based pagination
                $(window).on('scroll', function () {
                    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                        if (!isLoading) {
                            page++;  // Increment page number when scrolling to the bottom
                            loadTalents();  // Load more talents
                        }
                    }
                });

                // Initial load of talents with existing filters (if any)
                $('.loader').hide();  // Hide loader initially
                loadTalents();
            });



        </script>
    @endpush

@stop


