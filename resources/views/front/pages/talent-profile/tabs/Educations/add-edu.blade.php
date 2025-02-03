<div class="modal fade" id="add-edu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Add new Education
                        </h4>

                        <form id="add-edu-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Title</span>
                                    <input type="text" class="addquestion" placeholder="Enter Title" name="title">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Specialization</span>
                                    <input type="text" class="addquestion" placeholder="Enter Specialization"
                                           name="specialization">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">College</span>
                                    <input type="text" class="addquestion " placeholder="Enter College"
                                           name="college">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">University</span>
                                    <input type="text" class="addquestion" placeholder="Enter University"
                                           name="university">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Country</span>
                                    <input type="text" class="addquestion " placeholder="Enter Country"
                                           name="country">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Graduation year</span>
                                    <input type="number" class="addquestion " placeholder="Enter Graduation Year"
                                           name="graduation_year" step="1">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Certificate</span>
                                    <input type="file" name="file" id="imageUpload-edu" class="d-none"
                                           accept="image/*,.pdf,.doc,.docx">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-edu" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>
                                    <img id="imagePreview-edu" height="500px" style="object-fit: cover;"
                                         src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                </div>
                            </div>

                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                 style="border: none">
                                <button type="submit" class="cmn--btn" id="edu-submit">
                                        <span id="spinner-edu" class="spinner-grow spinner-grow-sm d-none" role="status"
                                              aria-hidden="true"></span>
                                    <span id="save-change-edu">Save</span>
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
@push('js')
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
                    file: {
                        extension: "jpeg|png|jpg|gif|pdf|doc|docx",
                        maxsize: 2097152 // 2 MB in bytes
                    },
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
                    },
                    file: {
                        required: "Please upload a file.",
                        extension: "Allowed file types: jpeg, png, jpg, gif, pdf, doc, docx.",
                        maxsize: "The file size must not exceed 2 MB."
                    }
                },

                submitHandler: function (form) {
                    // Show spinner and change button text
                    $("#spinner-edu").removeClass("d-none"); // Show the spinner
                    $("#save-change-edu").text("Saving..."); // Change button text
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
                        beforeSend: function () {
                            $("#spinner-edu").removeClass("d-none");
                            $("#save-change-edu").text("Saving...");
                            $("#edu-submit").prop("disabled", true);
                        },
                        success: function (response) {
                            setTimeout(function () {
                                $("#spinner-edu").addClass("d-none");
                                $("#save-change-edu").text("Save Change");

                                if (response.success) {
                                    toastr.success(response.message || 'Education added successfully!');
                                    location.reload(); // Reload the page
                                } else {
                                    toastr.error(response.message || 'Something went wrong. Please try again.');
                                }
                            }, 1000); // 1-second delay
                        },
                        error: function (xhr) {
                            $("#spinner-edu").addClass("d-none");
                            $("#save-change-edu").text("Save Change");

                            if (xhr.status === 422 && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (field, errors) {
                                    errors.forEach(function (error) {
                                        toastr.error(error); // Display each validation error
                                    });
                                });
                            } else if (xhr.responseJSON && xhr.responseJSON.error) {
                                toastr.error(xhr.responseJSON.error);
                            } else {
                                toastr.error('An unexpected error occurred. Please try again.');
                            }
                        },
                        complete: function () {
                            $("#spinner-edu").addClass("d-none");
                            $("#save-change-edu").text("Save");
                            $("#edu-submit").prop("disabled", false);
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

                if (file && file.size > 2097152) {
                    toastr.error("File size must not exceed 2 MB.");
                    this.value = ""; // Reset the input value
                }
            });
        });

    </script>
@endpush
