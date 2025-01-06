@push('css')
    <style>
        #imagePreview-edu {
            max-width: 100%;
            max-height: 250px;
            display: block;
            margin: 0 auto;
        }

        .error {
            color: red;
            /*font-size: 12px;*/
            margin-top: 2px;
        }


    </style>

@endpush

<div class="tab-pane base fade" id="nav-edu" role="tabpanel"
     aria-labelledby="nav-profile-tab">
    <div class="row justify-content-center g-4">


        <div class="d-flex align-items-center justify-content-center mb-2 ">
            <a href="#" class="cmn--btn outline__btn" data-toggle="modal" data-target="#add-edu">
                <span class="fz-14 pra"> <i class="bi bi-plus"></i> Add new Education</span>
            </a>
        </div>


        @foreach($talent->scientificCertificate as $e)

            <div class="col-xxl-12">
                <div class="service__item shadow-sm round16 bg-light">
                    {{--                    <a href="#" class="thumb round16">--}}
                    {{--                        <img src="assets/img/service/s1.jpg" class="round16" alt="service">--}}
                    {{--                    </a>--}}
                    <div class="service__content">
                        <div class="d-flex mb-16 align-items-center justify-content-between">
                            <a href="javascript:void(0)" class=" learning round16 fz-16 fw-600 inter base">
                                {{$e->title}}
                            </a>
                            <span class="success2 d-block fz-16 fw-600 inter">
                                       {{$e->graduation_year}}
                                       </span>
                        </div>

                        <h5 class="mb-16">
                            <a href="service-details.html" class="title">
                                {{$e->specialization}}
                            </a>
                        </h5>

                        <div class="d-flex  pb-20 mb-20 align-items-center justify-content-between">
                            <div class="d-flex gap-2 fz-16 fw-600 inter title">

                                <span class="fz-16 fw-400 inter pra">
                        {{$e->college}} -  {{$e->university}}

                                </span>
                            </div>

                            @if($e->photo)
                                <p class="pra inter fz-18 fw-400 float-end">
                                    <a href="{{url($e->getPhoto())}}" target="_blank">
                                        <i class="bi bi-paperclip"></i>
                                    </a>
                                    @endif


                                </p>

                        </div>


                    </div>
                </div>
            </div>

        @endforeach


    </div>


    <div class="modal fade" id="add-edu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="overview__gitwrapper bgwhite round16">
                            <h3 class="pb-40 bborderdash mb-40 title">
                                Add new Education
                            </h3>

                            <form id="add-edu-form" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Title</span>
                                        <input type="text" class="addquestion" placeholder="Enter Title" name="title">
                                    </div>

                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Specialization</span>
                                        <input type="text" class="addquestion" placeholder="Enter Specialization"
                                               name="specialization">
                                    </div>

                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">College</span>
                                        <input type="text" class="addquestion " placeholder="Enter College"
                                               name="college">
                                    </div>

                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">University</span>
                                        <input type="text" class="addquestion" placeholder="Enter University"
                                               name="university">
                                    </div>

                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Country</span>
                                        <input type="text" class="addquestion " placeholder="Enter Country"
                                               name="country">
                                    </div>

                                    <div class="col-6 mb-30">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Graduation year</span>
                                        <input type="number" class="addquestion " placeholder="Enter Graduation Year"
                                               name="graduation_year" step="1">
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Upload button and hidden input -->
                                    <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                        <!-- Hidden file input -->
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Upload Certificate</span>
                                        <input type="file" name="file" id="imageUpload-edu" class="d-none"
                                               accept="image/*,.pdf,.doc,.docx">
                                        <!-- File input and clickable area -->
                                        <label for="imageUpload-edu" class="cmn--btn outline__btn w-75">
                                            <span>Browse</span>
                                        </label>
                                    </div>

                                    <!-- Preview area -->
                                    <div class="col-lg-3 justify-content-start text-start">
                                        <span class="fz-20 fw-500 title inter mb-10 d-block">Preview</span>
                                        <img id="imagePreview-edu" height="500px" style="object-fit: cover;"
                                             src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                    </div>
                                </div>

                                <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                     style="border: none">
                                    <button type="submit" class="cmn--btn" id="edu-submit">
                                        <span id="spinner-edu" class="spinner-grow spinner-grow-sm d-none" role="status"
                                              aria-hidden="true"></span>
                                        <span id="save-change">Save</span>
                                    </button>

                                    <a data-dismiss="modal" href="javascript:void(0)" class="cmn--btn outline__btn">
                                        <span>Cancel</span>
                                    </a>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>






@push('js')
    <!-- jQuery CDN -->

    <!-- jQuery Validate CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <!-- Optional: jQuery Validate Additional Methods CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validation/1.19.5/additional-methods.min.js"></script>


{{-- add-edu--}}
    <script>
        $(document).ready(function () {
            // Validate form
            $("#add-edu-form").validate({
                rules: {
                    title: {required: true},
                    specialization: {required: true},
                    college: {required: true},
                    university: {required: true},
                    country: {required: true},
                    graduation_year: {
                        required: true,
                        number: true,
                        min: 1900,
                        max: 2099
                    }
                },
                messages: {
                    title: "Please enter a title.",
                    specialization: "Please enter your specialization.",
                    college: "Please enter a college name.",
                    university: "Please enter a university name.",
                    country: "Please enter a country name.",
                    graduation_year: {
                        required: "Please enter a graduation year.",
                        number: "Graduation year must be a number.",
                        min: "Graduation year cannot be before 1900.",
                        max: "Graduation year cannot be after 2099."
                    }
                },
                submitHandler: function (form) {
                    // Show spinner and change button text
                    $("#spinner-edu").removeClass("d-none"); // Show the spinner
                    $("#save-change").text("Saving..."); // Change button text
                    $("#edu-submit").prop("disabled", true); // Disable the button

                    // Create FormData object
                    let formData = new FormData(form);

                    // Append file if available
                    const fileInput = document.getElementById("imageUpload-edu");
                    if (fileInput && fileInput.files[0]) {
                        formData.append("certificate", fileInput.files[0]);
                    }

                    // AJAX request
                    $.ajax({
                        url: "{{route('edu.store')}}", // Replace with your server endpoint
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide the spinner and reset button text after a slight delay
                            setTimeout(function () {
                                $("#spinner-edu").addClass("d-none"); // Hide the spinner
                                $("#save-change").text("Save Change"); // Restore button text

                                // Check if the response indicates success
                                if (response.success) {
                                    toastr.success('Profile updated successfully!');

                                    // Update profile image dynamically if provided in response
                                    if (response.photo) {
                                        $('#profileImage').attr('src', response.photo); // Dynamically update the profile image
                                    }

                                    // Optionally reload or update specific parts of the page
                                    location.reload(); // Reload the page once after successful update
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000); // 1-second delay before hiding spinner and reloading
                        },
                        error: function (xhr) {
                            // Hide spinner and restore button text
                            $("#spinner-edu").addClass("d-none");
                            $("#save-change").text("Save Change");

                            // Handle error and display validation errors
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, error) {
                                    toastr.error(error[0]); // Display validation errors
                                });
                            } else {
                                toastr.error('An error occurred.');
                            }
                        },
                        complete: function () {
                            // Ensure that spinner and button are reset even if request fails
                            $("#spinner-edu").addClass("d-none"); // Hide the spinner
                            $("#save-change").text("Save"); // Restore the original button text
                            $("#edu-submit").prop("disabled", false); // Enable the button
                        }
                    });
                }
            });


            // File preview
            $("#imageUpload-edu").on("change", function (event) {
                const file = event.target.files[0];
                const imagePreview = $("#imagePreview-edu");

                if (file) {
                    const fileType = file.type;

                    if (fileType.startsWith("image/")) {
                        // If the file is an image, show the image preview
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.attr("src", e.target.result);
                        };
                        reader.readAsDataURL(file);
                    } else if (fileType === "application/pdf") {
                        // If the file is a PDF, display a PDF icon
                        imagePreview.attr("src", "{{asset('pdf.png')}}");
                    } else if (
                        fileType === "application/msword" ||
                        fileType === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    ) {
                        // If the file is a Word document, display a Word icon
                        imagePreview.attr("src", "{{asset('word.png')}}");
                    } else {
                        // For other files, display a generic file icon
                        imagePreview.attr("src", "{{asset('word.png')}}");
                    }
                }
            });
        });

    </script>
@endpush
