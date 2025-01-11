<div class="modal fade" id="edit-exp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Edit Experience
                        </h4>

                        <form id="edit-exp-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Form fields as you have in your original code... -->
                                <input type="hidden" id="exp-id" name="id">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Company</span>
                                    <input type="text" class="addquestion" placeholder="Enter Company" id="company_name"
                                           name="company_name">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Location</span>
                                    <input type="text" class="addquestion" placeholder="Enter Location" id="location"
                                           name="location">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Start Date</span>
                                    <input type="text" class="date start_at addquestion" name="start_date"
                                           id="start_date-edit" placeholder="pick date">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">End Date</span>
                                    <input type="text" class="date start_at addquestion" id="end_date-edit"
                                           name="end_date" placeholder="pick date">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Job title</span>
                                    <input type="text" class="addquestion" placeholder="Enter job title" id="job"
                                           name="job">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Tasks details</span>
                                    <textarea id="task-edit" name="tasks" class="addquestion" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Attachment</span>
                                    <input type="file" name="file" id="imageUpload-exp-edit" class="d-none"
                                           accept="image/*,.pdf,.doc,.docx">
                                    <label for="imageUpload-exp-edit" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>

                                    <a id="image-id-exp-edit" href="" target="_blank">
                                        <img id="imagePreview-exp-edit" height="500px" style="object-fit: cover;"
                                             src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                    </a>
                                </div>
                            </div>

                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer" style="border: none">
                                <button type="submit" class="cmn--btn" id="exp-submit-edit">
                                    <span id="spinner-exp-edit" class="spinner-grow spinner-grow-sm d-none"
                                          role="status" aria-hidden="true"></span>
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

    {{--fetch && update--}}
    <script>


        $(document).ready(function () {
            function stripHtmlTags(str) {
                if (!str) return ""; // Handle null or undefined
                return str.replace(/<\/?[^>]+(>|$)/g, ""); // Regex to remove HTML tags
            }

            var appLocale = "{{ app()->getLocale() }}";

            // Handle edit button click
            $('.exp-edit').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{route('exp.edit','')}}/' + id,
                    method: 'GET',
                    success: function (response) {
                        // Populate the form with fetched data
                        $('#exp-id').val(response.id);
                        $('#company_name').val(response.company_name[appLocale]);
                        $('#location').val(response.location[appLocale]);
                        $('#job').val(response.job[appLocale]);
                        $('#task-edit').val(stripHtmlTags(response.tasks[appLocale]));
                        $('#start_date-edit').val(response.start_date);
                        $('#end_date-edit').val(response.end_date);  // Adjusted to match response attribute
                        $('#image-id-exp-edit').attr('href', response.photo_url);

                        // Handle file preview based on the file type
                        if (response.photo_url) {
                            var fileExtension = response.photo_url.split('.').pop().toLowerCase();

                            // Check if the file is an image
                            if (['png', 'jpg', 'jpeg', 'gif'].includes(fileExtension)) {
                                $('#imagePreview-exp-edit').attr('src', response.photo_url);
                            }
                            // Check if the file is a PDF
                            else if (fileExtension === 'pdf') {
                                $('#imagePreview-exp-edit').attr('src', '{{url('pdf.png')}}');
                            }
                            // Check if the file is a Word document
                            else if (['doc', 'docx'].includes(fileExtension)) {
                                $('#imagePreview-exp-edit').attr('src', '{{url('word.png')}}');
                            } else {
                                $('#imagePreview-exp-edit').attr('src', '{{setting('icon')}}');
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error(error);
                    }
                });
            });

            // Set default preview icon
            const defaultIcon = "{{url(setting('icon'))}}";
            const pdfIcon = "{{asset('pdf.png')}}";
            const wordIcon = "{{asset('word.png')}}";

            // Function to handle file input preview
            function updateFilePreview(file) {
                const filePreview = $("#imagePreview-exp-edit");
                const reader = new FileReader();

                if (file) {
                    const fileType = file.type;
                    if (fileType.startsWith("image/")) {
                        reader.onload = function (e) {
                            filePreview.attr("src", e.target.result);
                        };
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
            }

            // Event listener for file input change
            $("#imageUpload-exp-edit").on("change", function (event) {
                updateFilePreview(event.target.files[0]);
            });
            // Form validation and submission
            $("#edit-exp-form").validate({
                rules: {
                    company_name: {required: true},
                    location: {required: true},
                    start_date: {required: true, date: true},
                    end_date: {
                        // required: true,
                        date: true,
                    },
                    job: {required: true},
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
                    const spinner = $("#spinner-exp-edit");
                    const saveButtonText = $("#save-change-edit");
                    const submitButton = $("#exp-submit-edit");

                    spinner.removeClass("d-none");
                    saveButtonText.text("Saving...");
                    submitButton.prop("disabled", true);

                    // Collect the form data
                    let formData = new FormData(form);

                    // AJAX Request for form submission
                    $.ajax({
                        url: "{{route('exp.update')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            spinner.addClass("d-none");
                            saveButtonText.text("Save Change");

                            if (response.success) {
                                toastr.success('Experiences Updated successfully!');
                                location.reload(true);
                            } else {
                                toastr.error('Something went wrong.');
                            }
                        },
                        error: function (xhr) {
                            spinner.addClass("d-none");
                            saveButtonText.text("Save Change");
                            submitButton.prop("disabled", false);

                            // Show validation errors
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
        });
    </script>

@endpush
