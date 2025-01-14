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
                                    <span id="spinner-exp" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
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
            $("#add-exp-form").validate({
                rules: {
                    company_name: { required: true },
                    location: { required: true },
                    start_date: { required: true, date: true },
                    end_date: { date: true },
                    job: { required: true },
                    file: {
                        extension: "jpeg|png|jpg|gif|pdf|doc|docx",
                        maxsize: 2097152, // 2 MB in bytes
                    },
                },
                messages: {
                    company_name: "Please enter a company name.",
                    location: "Please enter location.",
                    start_date: "Please pick a valid start date.",
                    end_date: "Please pick a valid end date.",
                    job: "Please enter a job title.",
                    file: {
                        extension: "Only images, PDF, and Word files are allowed.",
                        maxsize: "File size must not exceed 2 MB.",
                    },
                },

                submitHandler: function (form) {
                    let formData = new FormData(form);

                    // Show spinner and disable the submit button
                    $("#spinner-exp").removeClass('d-none');
                    $("#exp-submit").prop('disabled', true);

                    $.ajax({
                        url: "{{route('exp.store')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide spinner and enable the submit button
                            $("#spinner-exp").addClass('d-none');
                            $("#exp-submit").prop('disabled', false);

                            if (response.success) {
                                toastr.success('Experience Added successfully!');
                                location.reload();
                            } else {
                                toastr.error('Something went wrong.');
                            }
                        },
                        error: function (xhr) {
                            // Hide spinner and enable the submit button
                            $("#spinner-exp").addClass('d-none');
                            $("#exp-submit").prop('disabled', false);

                            if (xhr.status === 422) {
                                // Display validation errors
                                $.each(xhr.responseJSON.errors, function (field, errors) {
                                    errors.forEach(function (error) {
                                        toastr.error(error);  // Display each error in toastr
                                    });
                                });
                            } else if (xhr.status === 500) {
                                // Handle server error response
                                toastr.error(xhr.responseJSON.error || 'An unexpected error occurred.');
                            } else {
                                toastr.error('An unexpected error occurred.');
                            }
                        },
                    });
                },
            });

            // File size validation before form submission
            $("#imageUpload-exp").on("change", function () {
                const file = this.files[0];
                if (file && file.size > 2097152) {
                    toastr.error("File size must not exceed 2 MB.");
                    this.value = ""; // Reset the input value
                }
            });
        });


    </script>

@endpush
