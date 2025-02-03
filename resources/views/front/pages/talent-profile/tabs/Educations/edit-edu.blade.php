<div class="modal fade" id="edit-edu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">Edit Education</h4>
                        <form id="edit-edu-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="" name="id" id="edu-id">
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Title</span>
                                    <input type="text" class="addquestion" placeholder="Enter Title" id="title"
                                           name="title">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Specialization</span>
                                    <input type="text" class="addquestion" placeholder="Enter Specialization"
                                           id="specialization" name="specialization">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">College</span>
                                    <input type="text" class="addquestion " placeholder="Enter College"
                                           id="college" name="college">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">University</span>
                                    <input type="text" class="addquestion" placeholder="Enter University"
                                           id="university" name="university">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Country</span>
                                    <input type="text" class="addquestion " placeholder="Enter Country"
                                           id="country" name="country">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Graduation year</span>
                                    <input type="number" class="addquestion " placeholder="Enter Graduation Year"
                                           id="graduation_year" name="graduation_year" step="1">
                                </div>
                            </div>

                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Certificate</span>
                                    <input type="file" name="file" id="imageUpload-edu-edit" class="d-none"
                                           accept="image/*,.pdf,.doc,.docx">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-edu-edit" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>

                                    <a target="_blank" href="" id="image-id">
                                        <img id="imagePreview-edu-edit" height="500px" style="object-fit: cover;"
                                             src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                    </a>
                                </div>
                            </div>


                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer" style="border: none">
                                <button type="submit" class="cmn--btn" id="edu-submit-edit">
                                    <span id="spinner-edu-edit" class="spinner-grow spinner-grow-sm d-none"
                                          role="status" aria-hidden="true"></span>
                                    <span id="save-change-edit">Save</span>
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
    {{--fetch--}}
    <script>
        $(document).ready(function () {
            var appLocale = "{{ app()->getLocale() }}";
            $('.edu-edit').on('click', function () {

                var id = $(this).data('id');
                $.ajax({
                    url: '{{route('edu.edit','')}}/' + id,
                    method: 'GET',
                    success: function (response) {
                        $('#edu-id').val(response.id);
                        $('#title').val(response.title[appLocale]);
                        $('#specialization').val(response.specialization[appLocale]);
                        $('#college').val(response.college[appLocale]);
                        $('#university').val(response.university[appLocale]);
                        $('#country').val(response.country[appLocale]);
                        $('#graduation_year').val(response.graduation_year);

                        $('#image-id').attr('href', response.photo_url);
                        if (response.photo_url) {
                            var fileExtension = response.photo_url.split('.').pop().toLowerCase();

                            // Check if the file is an image
                            if (['png', 'jpg', 'jpeg', 'gif'].includes(fileExtension)) {
                                // Display the image preview if it's a valid image type
                                $('#imagePreview-edu-edit').attr('src', response.photo_url);
                            }
                            // Check if the file is a PDF
                            else if (fileExtension === 'pdf') {
                                // Display PDF icon (replace with your icon URL)
                                $('#imagePreview-edu-edit').attr('src', '{{url('pdf.png')}}');
                            }
                            // Check if the file is a Word document
                            else if (['doc', 'docx'].includes(fileExtension)) {
                                // Display Word icon (replace with your icon URL)
                                $('#imagePreview-edu-edit').attr('src', '{{url('word.png')}}');
                            } else {
                                // Display a default icon for unsupported file types
                                $('#imagePreview-edu-edit').attr('src', '{{setting('icon')}}');
                            }
                        }

                    },
                    error: function (xhr, status, error) {
                        toastr.error(error);
                    }
                });
            });

        });

    </script>

    {{--update--}}
    <script>
        $(document).ready(function () {
            const filePreview = $("#imagePreview-edu-edit");
            const defaultIcon = "{{url(setting('icon'))}}";
            const pdfIcon = "{{asset('pdf.png')}}";
            const wordIcon = "{{asset('word.png')}}";

            // File validation and preview
            const updateFilePreview = (file) => {
                if (file) {
                    const fileType = file.type;

                    if (fileType.startsWith("image/")) {
                        const reader = new FileReader();
                        reader.onload = e => filePreview.attr("src", e.target.result);
                        reader.readAsDataURL(file);
                    } else if (fileType === "application/pdf") {
                        filePreview.attr("src", pdfIcon);
                    } else if (
                        fileType === "application/msword" ||
                        fileType === "application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                    ) {
                        filePreview.attr("src", wordIcon);
                    } else {
                        filePreview.attr("src", defaultIcon);
                    }
                }
            };

            $("#imageUpload-edu-edit").on("change", function (event) {
                updateFilePreview(event.target.files[0]);
            });

            // Form Validation and Submission
            $("#edit-edu-form").validate({
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
                    },
                    file: {
                        extension: "jpeg|png|jpg|gif|pdf|doc|docx",
                        maxsize: 2097152 // 2 MB in bytes
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
                    const spinner = $("#spinner-edu-edit");
                    const saveButtonText = $("#save-change-edit");
                    const submitButton = $("#edu-submit-edit");

                    spinner.removeClass("d-none");
                    saveButtonText.text("Saving...");
                    submitButton.prop("disabled", true);

                    let formData = new FormData(form);

                    // AJAX Request
                    $.ajax({
                        url: "{{route('edu.update')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            spinner.addClass("d-none");
                            saveButtonText.text("Save Change");

                            if (response.success) {
                                toastr.success('Education Updated successfully!');
                                location.reload(true);
                            } else {
                                toastr.error('Something went wrong.');
                            }
                        },
                        error: function (xhr) {
                            spinner.addClass("d-none");
                            saveButtonText.text("Save Change");
                            submitButton.prop("disabled", false);

                            if (xhr.status === 422 && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (field, errors) {
                                    errors.forEach(function (error) {
                                        toastr.error(error); // Display each validation error
                                    });
                                });
                            } else if (xhr.responseJSON && xhr.responseJSON.error) {
                                // Handle other errors with a specific error message
                                toastr.error(xhr.responseJSON.error);
                            } else {
                                // Handle unexpected errors
                                toastr.error('An unexpected error occurred. Please try again.');
                            }
                        },
                        complete: function () {
                            spinner.addClass("d-none");
                            saveButtonText.text("Save Change");
                            submitButton.prop("disabled", false);
                        }
                    });
                }
            });
        });
    </script>
@endpush
