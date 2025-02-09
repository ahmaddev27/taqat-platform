@extends('front.layouts.master',['title'=>$company->name])
@section('content')

    @push('css')

        <style>
            .ql-container {
                height: 30%;
            }

        </style>

    @endpush

    <!-- profile section Here -->
    <section class="profile__section sectionbg pb-120" style="margin-top: 200px">


        <div class="container">

            <div class="profile__customize">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="darrell__profile bg-white round16 shadow2">
                            <div class="row g-0">
                                <!-- Column for Total Balance -->
                                <div class="col-12 col-sm-4 text-center py-3 border-sm-end">
                                    <h5 class="font-md-1 font-small mb-0" style="color: #2c2b2b">Balance</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>

                                <!-- Column for Withdrawable Balance -->
                                <div class="col-12 col-sm-4 text-center py-3">
                                    <h5 class="mb-0" style="color: #2c2b2b">Can withdraw</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>
                                <!-- Column for Balance View Button -->
                                <div class="col-12 col-sm-4 round16" style="background-color: #0d47a1;">
                                    <a href="#" class="d-block text-center text-white p-3">
                                        <h4 class="mb-0 mt-2" title="view">
                                            <i class="bi bi-wallet2"
                                               style="font-size: 30px; display: block; line-height: 1;"></i>
                                            <span style="display: block; margin-top: 10px; font-size: 20px;">View</span>
                                        </h4>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="container py-5">
                <div class="row g-3">

                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="main__profile__sidebar">


                                <div class="nav mb-24 round16 d-flex align-items-center row">

                                    <div class="col-4 mb-2">
                                        <a href="{{route('company.projects.all')}}"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Projects</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="{{route('company.jobs.all')}}"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Jobs</span>
                                        </a>
                                    </div>

                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">
                                            <i class="bi bi-chat" style="font-size: 25px"></i>
                                            <span class="text-center">Chats</span>
                                        </a>
                                    </div>





{{--                                    <div class="col-4 mb-2">--}}
{{--                                        <a href="#"--}}
{{--                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2 shadow2">--}}
{{--                                            <i class="bi bi-list-ul" style="font-size: 25px"></i>--}}
{{--                                            <span class="text-center">Services</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}

                                </div>


                                <div class="darrell__profile round16 mb-24 bgwhite shadow2">
                                    <div class="profile__check ralt">
                                        <img src="{{$company->getPhoto()}}" alt="profile">
                                        {{-- <i class="bi bi-check"></i> --}}
                                    </div>

                                    <div class="darrell__content mt-40 text-center">
                                        <h4 class="title mb-16">
                                            {{$company->name}}
                                        </h4>
                                        <span class="fz-16 fw-400 inter title">
                                        {{$company->location}}
                                    </span>

                                        <ul class="d-flex mt-24 justify-content-center employer__listbase flex-wrap tranding__listbase align-items-center">
                                            {{--                                            <li>--}}
                                            {{--                                            <span class="fz-16 fw-400 inter pra">--}}
                                            {{--                                                salary--}}
                                            {{--                                                {{$company->sallary}}--}}
                                            {{--                                            </span>--}}
                                            {{--                                            </li>--}}
                                            <li class="d-flex gap-2 fz-16 fw-500 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{$company->rate}}
                                                {{--
                                              <span class="pra fz-14">(114)</span>--}}
                                            </li>
                                            <li>
                              <span class="fz-16 fw-400 inter pra">
                                 Member: <span class="base">{{$company->created_at->format('M d,Y')}}</span>
                              </span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="all__editbar round16 bgwhite shadow2 ">
                                    <div class="description__edit ralt pb-24 bborderdash commn__spacenone">
                                        <ul class="nav" role="tablist">
                                            <li class="nav-item w-100 mb-16 d-flex align-items-center justify-content-between"
                                                role="presentation">
                                             <span class="fz-24 fw-600 inter title">
                                                         BIO
                                                      </span>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fz-16 fw-400 inter title base fade show active"
                                                 id="home"
                                                 role="tabpanel">

                                                {!! $company->description!!}
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="create__gigpublist round16 bgwhite">


                                <div class="nav mb-40  round16 d-flex align-items-center nav-tabs" role="tablist">
                                    {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"--}}
                                    {{--                                        id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"--}}
                                    {{--                                        role="tab" aria-controls="nav-home" aria-selected="true">--}}
                                    {{--                                    <i class="bi bi-file-earmark-plus"></i>--}}
                                    {{--                                    New Gig--}}
                                    {{--                                </button>--}}

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"
                                            id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                            type="button" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">
                                        <i class="bi bi-pencil-square" style="font-size: 25px"></i>
                                        Profile
                                    </button>


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-password"
                                            type="button" role="tab" aria-controls="nav-password"
                                            aria-selected="false">
                                        <i class="bi bi-key" style="font-size: 25px"></i>
                                        Password
                                    </button>

                                </div>

                                <div class="tab-content">


                                    @include('front.pages.company-dashboard.tabs.profile-tab')
                                    @include('front.pages.company-dashboard.tabs.password-tab')


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- profile section End -->f

    @push('js')

        {{-- edit profile submit--}}
        <script>
            $(document).ready(function () {

                // Image Preview Function
                window.previewImage = function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Validate file size (max 2MB)
                        if (file.size > 2 * 1024 * 1024) {
                            toastr.error("Image size must be less than 2MB.");
                            return;
                        }

                        // Display preview
                        const reader = new FileReader();
                        reader.onload = function () {
                            $('#profileImage').attr('src', reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                };

                // jQuery Validation
                $('#updateProfileForm').validate({
                    rules: {
                        name: {required: true},
                        email: {required: true, email: true},
                        whatsapp: {required: true, digits: true},
                        location: {required: true},
                        bio: {required: true},
                    },
                    messages: {
                        name: "Please enter your full name.",
                        email: "Please enter a valid email address.",
                        whatsapp: "Please enter a valid phone number.",
                        bio: "Please enter bio.",
                        location: "Please enter a location.",
                    },

                    submitHandler: function (form) {
                        submitForm();
                    }
                });


                // AJAX Form Submission
                function submitForm() {
                    const formData = new FormData($('#updateProfileForm')[0]);

                    $.ajax({
                        url: '{{route('company.profile.update')}}', // Replace with your actual backend URL
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#spinner').removeClass('d-none');
                            $('#save-change').text('Saving...');
                        },
                        success: function (response) {
                            setTimeout(() => {
                                $('#spinner').addClass('d-none');
                                $('#save-change').text('Save Change');

                                if (response.success) {
                                    toastr.success('Profile updated successfully!');
                                    if (response.photo) {
                                        $('#profileImage').attr('src', response.photo);
                                    }
                                    location.reload(); // Reload the page
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000);
                        },
                        error: function (xhr) {
                            $('#spinner').addClass('d-none');
                            $('#save-change').text('Save Change');

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, error) {
                                    toastr.error(error[0]);
                                });
                            } else {
                                toastr.error('An error occurred.');
                            }
                        }
                    });
                }
            });

        </script>

    @endpush
@stop
