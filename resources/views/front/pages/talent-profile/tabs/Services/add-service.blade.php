<div class="modal fade" id="add-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Add new Service
                        </h4>

                        <form id="add-service-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Title</span>
                                    <input type="text" class="addquestion" placeholder="Enter Title" name="title">
                                </div>

                                <div class="col-4 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Category</span>
                                    <select class="addquestion" name="category">
                                        <option value="" disabled  selected >Select Service Category</option>
                                        @foreach(\App\Models\Taqat2\KhadmaCategory::all() as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-4 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Price</span>
                                    <input type="number" class="addquestion" placeholder="Enter Price" name="price">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-7 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Description</span>
                                    <textarea rows="10" class="form-control round16"  placeholder="Enter Description"
                                              name="description"></textarea>
                                </div>

                                <!-- Upload button and hidden input -->
                                <div class="col-lg-2 justify-content-end  mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Image</span>
                                    <input type="file" name="image" id="imageUpload-service" class="d-none"
                                           accept="image/*">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-service" class="cmn--btn outline__btn w-75 text-center">
                                        <span>Browse</span>
                                    </label>

                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <img id="imagePreview-service" height="500px" style="object-fit: cover;"
                                         src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                </div>



                            </div>

                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                 style="border: none">
                                <button type="submit" class="cmn--btn" id="service-submit">
                                        <span id="spinner-service" class="spinner-grow spinner-grow-sm d-none" role="status"
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

@push('js')
    {{-- add-service--}}
    <script>
        $(document).ready(function () {
            // Validate form
            $("#add-service-form").validate({
                rules: {
                    title: {required: true},
                    category: {required: true},
                    description: {required: true},
                    image: {required: true},
                    price: {
                        required: true,
                        number: true,
                        min: 5,
                    }
                },
                messages: {
                    title: "Please enter title",
                    image: "Please add image",
                    specialization: "Please select category",
                    description: "Please enter  description",

                    price: {
                        required: "Please enter a price",
                        number: "price  must be a number",
                        min: "price  cannot be under 5",
                    }
                },
                errorPlacement: function (error, element) {
                    toastr.error(error.text());
                },
                submitHandler: function (form) {
                    // Show spinner and change button text
                    $("#spinner-service").removeClass("d-none"); // Show the spinner
                    $("#save-change").text("Saving..."); // Change button text
                    $("#service-submit").prop("disabled", true); // Disable the button

                    // Create FormData object
                    let formData = new FormData(form);

                    // Append file if available
                    const fileInput = document.getElementById("imageUpload-service");
                    if (fileInput && fileInput.files[0]) {
                        formData.append("certificate", fileInput.files[0]);
                    }

                    // AJAX request
                    $.ajax({
                        url: "{{route('service.store')}}", // Replace with your server endpoint
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            // Hide the spinner and reset button text after a slight delay
                            setTimeout(function () {
                                $("#spinner-service").addClass("d-none"); // Hide the spinner
                                $("#save-change").text("Save Change"); // Restore button text

                                // Check if the response indicates success
                                if (response.success) {
                                    toastr.success('Service  Added successfully!');
                                    // Optionally reload or update specific parts of the page
                                    location.reload(true); // Reload the page once after successful update
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000); // 1-second delay before hiding spinner and reloading
                        },
                        error: function (xhr) {
                            // Hide spinner and restore button text
                            $("#spinner-service").addClass("d-none");
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
                            $("#spinner-service").addClass("d-none"); // Hide the spinner
                            $("#save-change").text("Save"); // Restore the original button text
                            $("#service-submit").prop("disabled", false); // Enable the button
                        }
                    });
                }
            });


            // File preview
            $("#imageUpload-service").on("change", function (event) {
                const file = event.target.files[0];
                const imagePreview = $("#imagePreview-service");

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
