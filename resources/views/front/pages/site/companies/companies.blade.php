@extends('front.layouts.master',['title'=>'Companies'])



@section('content')
    <!--service grid here-->
    <section class="service__grid pt-50 pb-120 sectionbg2">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-4 col-lg-4">
                    <div class="card__sidebar side__sticky round16">

                        <div class="card__common__item bgwhite round16">
                            <h4 class="head fw-600 bborderdash title pb-24 mb-24 d-flex align-items-center">
                                Filter
                                <span class="loader mx-5 justify-content-end"></span>

                            </h4>

                            <form class="d-flex mb-24 filter__search align-items-center justify-content-between"
                                  onsubmit="return false;">
                                <input type="text" placeholder="Search" value="{{request()->search}}">
                                <i class="bi bi-search"></i>
                            </form>

                            <a href="#"
                               class="reset__filter justify-content-center fw-600 inter fz-16 d-flex align-items-center gap-2 base">
                                <i class="bi bi-arrow-clockwise base fz-20"></i>
                                Reset Filters
                            </a>
                        </div>
                    </div>
                </div>


                <div class="col-xl-8 col-lg-8">
                    <div class="companies-container">
                        <div class="row g-4">
                            @include('front.pages.site.companies.partials.companies-list')
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--service grid end-->

    @push('js')

        <script>
            $('.loader').hide(); // Hide the loader initially

            $(document).on('change', '.filter__search input', function () {
                $('html, body').animate({scrollTop: 0}, 'fast');

                let filters = {
                    search: $('input[placeholder="Search"]').val(),
                };

                // Show preloader
                $('.loader').show();

                setTimeout(function () {
                    $.ajax({
                        url: '{{route('companies.all')}}',
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            // Inject the updated companies list HTML into the container
                            $('.companies-container').html(response.html);
                            $('.loader').hide();
                        },
                        error: function () {
                            $('.companies-container').html('<div class="error-message">Something went wrong. Please try again.</div>');
                            $('.loader').hide();
                        }
                    });
                }, 300);
            });

            // Reset filters
            $(document).on('click', '.reset__filter', function () {
                // Reset input fields and sliders
                $('.filter__search input').val('');
                $('html, body').animate({scrollTop: 0}, 'fast');

                // Show preloader
                $('.loader').show();

                let filters = {
                    search: '',
                };

                setTimeout(function () {
                    $.ajax({
                        url: '{{route('companies.all')}}',
                        method: 'GET',
                        data: filters,
                        success: function (response) {
                            // Inject the updated companies list HTML into the container
                            $('.companies-container').html(response.html);
                            $('.loader').hide();
                        },
                        error: function (error) {
                            console.error('Error fetching companies:', error);
                            $('.companies-container').html('<div class="error-message">Something went wrong. Please try again.</div>');
                        }
                    });
                }, 300);
            });

        </script>

    @endpush

@stop


