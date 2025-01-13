<div class="modal fade" id="add-exp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Add new Experience
                        </h4>

                        <form id="add-exp-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Company</span>
                                    <input type="text" class="addquestion" placeholder="Enter Company"
                                           name="company_name">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Location</span>
                                    <input type="text" class="addquestion" placeholder="Enter Location"
                                           name="location">
                                </div>


                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Start Date</span>
                                    <input type="text" class="date start_at addquestion" id="#start_date" name="start_date"
                                           placeholder="pick date">
                                </div>


                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">End Date</span>
                                    <input type="text" class="date start_at addquestion" id="#end_date" name="end_date"
                                           placeholder="pick date">
                                </div>


                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Job title</span>
                                    <input type="text" class="addquestion" placeholder="Enter job title"
                                           name="job">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Tasks details</span>
                                    <textarea id="task" name="tasks" class="form-control" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Attachment</span>
                                    <input type="file" name="file" id="imageUpload-exp" class="d-none"
                                           accept="image/*,.pdf,.doc,.docx">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-exp" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>
                                    <img id="imagePreview-exp" height="500px" style="object-fit: cover;"
                                         src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                </div>
                            </div>

                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                 style="border: none">
                                <button type="submit" class="cmn--btn" id="exp-submit">
                                        <span id="spinner-exp" class="spinner-grow spinner-grow-sm d-none" role="status"
                                              aria-hidden="true"></span>
                                    <span id="save-change-exp">Save</span>
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
    {{-- add-exp--}}
    <script>
        $(document).ready(function () {
                    // Validate form
            $("#add-exp-form").validate({
                rules: {
                    company_name: { required: true },
                    location: { required: true },
                    start_date: { required: true, date: true },
                    end_date: {
                        // required: true,
                        date: true,
                    },
                    job: { required: true },
                    file: {
                        extension: "jpg|jpeg|png|pdf|doc|docx", // Allow only certain file types
                        filesize: 2097152 // Max file size in bytes (2MB)
                    }
                },
                messages: {
                    company_name: "Please enter a company name.",
                    location: "Please enter location.",
                    job: "Please enter a job title.",
                    start_date: {
                        required: "Please pick a start date.",
                        date: "Please enter a valid start date."
                    },
                    end_date: {
                        // required: "Please pick an end date.",
                        date: "Please enter a valid end date.",
                    },
                    file: {
                        extension: "Only images, PDF, and Word files are allowed.",
                        filesize: "File size must be less than 2MB."
                    }
                },
                errorPlacement: function (error, element) {
                        toastr.error(error.text()); // For fields
                },
                submitHandler: function (form) {
                    // Show spinner and change button text
                    $("#spinner-exp").removeClass("d-none"); // Show the spinner
                    $("#save-change-exp").text("Saving..."); // Change button text
                    $("#exp-submit").prop("disabled", true); // Disable the button

                    // Create FormData object
                    let formData = new FormData(form);

                    // Append file if available
                    const fileInput = document.getElementById("imageUpload-exp");
                    if (fileInput && fileInput.files[0]) {
                        formData.append("certificate", fileInput.files[0]);
                    }

                    // AJAX request
                    $.ajax({
                        url: "{{route('exp.store')}}", // Replace with your server endpoint
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide the spinner and reset button text after a slight delay
                            setTimeout(function () {
                                $("#spinner-exp").addClass("d-none"); // Hide the spinner
                                $("#save-change-exp").text("Save Change"); // Restore button text

                                // Check if the response indicates success
                                if (response.success) {
                                    toastr.success('Experience Added successfully!');
                                    // Optionally reload or update specific parts of the page
                                    location.reload(); // Reload the page once after successful update
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000); // 1-second delay before hiding spinner and reloading
                        },
                        error: function (xhr) {
                            // Check if the response contains the expected structure
                            if (xhr.responseJSON) {
                                if (xhr.responseJSON.error) {
                                    // Display the specific error
                                    toastr.error(xhr.responseJSON.error);
                                } else if (xhr.responseJSON.errors) {
                                    // Loop through the validation errors if they exist
                                    $.each(xhr.responseJSON.errors, function (key, error) {
                                        toastr.error(error[0]);
                                    });
                                } else if (xhr.responseJSON.message) {
                                    // Fallback to a general message
                                    toastr.error(xhr.responseJSON.message);
                                }
                            } else {
                                // Default error message if the response is not as expected
                                toastr.error('An unexpected error occurred.');
                            }
                        },
                        complete: function () {
                            // Ensure that spinner and button are reset even if request fails
                            $("#spinner-exp").addClass("d-none"); // Hide the spinner
                            $("#save-change-exp").text("Save"); // Restore the original button text
                            $("#exp-submit").prop("disabled", false); // Enable the button
                        }
                    });
                }
            });

            // File preview
            $("#imageUpload-exp").on("change", function (event) {
                const file = event.target.files[0];
                const imagePreview = $("#imagePreview-exp");

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
