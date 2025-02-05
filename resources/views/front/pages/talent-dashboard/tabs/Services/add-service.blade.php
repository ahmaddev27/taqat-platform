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
                                        <option disabled selected>Select Service Category</option>
                                        @foreach(\App\Models\Taqat2\KhadmaCategory::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                    <textarea rows="10" class="form-control round16" placeholder="Enter Description"
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
                                        <span id="spinner-service" class="spinner-grow spinner-grow-sm d-none"
                                              role="status"
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
                    title: "Please enter a title.",
                    category: "Please select a category.",
                    description: "Please enter a description.",
                    image: "Please upload an image.",
                    price: {
                        required: "Please enter a price.",
                        number: "Price must be a number.",
                        min: "Price cannot be under 5.",
                    }
                },

                submitHandler: function (form) {
                    // Show spinner and change button text
                    $("#spinner-service").removeClass("d-none");
                    $("#save-change").text("Saving...");
                    $("#service-submit").prop("disabled", true);

                    // Create FormData object
                    let formData = new FormData(form);

                    // Append file if available
                    const fileInput = document.getElementById("imageUpload-service");
                    if (fileInput && fileInput.files[0]) {
                        formData.append("image", fileInput.files[0]);
                    }

                    // AJAX request
                    $.ajax({
                        url: "{{route('service.store')}}", // Server endpoint
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            setTimeout(function () {
                                $("#spinner-service").addClass("d-none");
                                $("#save-change").text("Save Change");

                                if (response.success) {
                                    toastr.success('Service added successfully!');
                                    location.reload(true); // Reload the page
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000); // Delay before hiding spinner
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
                            // Ensure spinner and button are reset even if request fails
                            $("#spinner-service").addClass("d-none");
                            $("#save-change").text("Save");
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
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.attr("src", e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

    </script>
@endpush
