<div class="modal fade" id="edit-service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                          Edit Service
                        </h4>

                        <form id="edit-service-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-4 mb-30">
                                    <label for="title-service" class="fz-18 fw-500 title inter mb-10 d-block">Title</label>
                                    <input type="text" class="addquestion" placeholder="Enter Title" id="title-service" name="title" required>
                                </div>

                                <input type="hidden" name="id" id="service-id">

                                <div class="col-4 mb-30">
                                    <label for="category_id-service" class="fz-18 fw-500 title inter mb-10 d-block">Category</label>
                                    <select id="category_id-service" name="category" required>
                                        <option value="" disabled selected>Select Service Category</option>
                                        @foreach(App\Models\Taqat2\KhadmaCategory::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4 mb-30">
                                    <label for="price-service" class="fz-18 fw-500 title inter mb-10 d-block">Price</label>
                                    <input type="number" class="addquestion" id="price-service" placeholder="Enter Price" name="price" required min="5">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-7">
                                    <label for="description-service" class="fz-18 fw-500 title inter mb-10 d-block">Description</label>
                                    <textarea rows="10" class="form-control round16" id="description-service" placeholder="Enter Description" name="description" required></textarea>
                                </div>

                                <div class="col-lg-2 mt-auto mb-auto">
                                    <label for="imageUpload-service-edit" class="fz-18 fw-500 title inter mb-10 d-block">Upload Image</label>
                                    <input type="file" name="image" id="imageUpload-service-edit" class="d-none" accept="image/*">
                                    <label for="imageUpload-service-edit" class="cmn--btn outline__btn w-75 text-center">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <div class="col-lg-3">
                                    <a id="image-id-service" href="#">
                                        <img id="imagePreview-service-edit" height="500px" style="object-fit: cover;" src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                    </a>
                                </div>
                            </div>

                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer" style="border: none">
                                <button type="submit" class="cmn--btn" id="service-submit-edit">
                                    <span id="spinner-service-edit" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                    <span id="save-change-edit">Save</span>
                                </button>
                                <a data-dismiss="modal" href="javascript:void(0)" class="cmn--btn outline__btn">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')


    {{--fetch update-service--}}
    <script>
        function stripHtmlTags(str) {
            return str ? str.replace(/<\/?[^>]+(>|$)/g, "") : "";
        }

        $(document).ready(function () {
            const appLocale = "{{ app()->getLocale() }}";

            // Edit service handler
            $('.service-edit').on('click', function () {
                const id = $(this).data('id');

                $.ajax({
                    url: `{{route('service.edit', '')}}/${id}`,
                    method: 'GET',
                    success: function (response) {
                        $('#service-id').val(response.id);
                        $('#title-service').val(response.title[appLocale]);
                        $('#price-service').val(response.price);
                        $('#category_id-service').val(response.category_id);
                        $('#description-service').val(stripHtmlTags(response.description['ar']));
                        $('#image-id-service').attr('href', response.photo_url);

                        if (response.photo_url) {
                            $('#imagePreview-service-edit').attr('src', response.photo_url);
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Failed to fetch service details.');
                    }
                });
            });

            // File preview
            $('#imageUpload-service-edit').on('change', function (event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview-service-edit').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Form validation and submission
            $('#edit-service-form').validate({
                rules: {
                    title: { required: true },
                    category: { required: true },
                    description: { required: true },
                    price: { required: true, number: true, min: 5 },
                    image: { required: false } // Image is optional during edit
                },
                messages: {
                    title: "Please enter a title",
                    category: "Please select a category",
                    description: "Please enter a description",
                    price: {
                        required: "Please enter a price",
                        number: "Price must be a valid number",
                        min: "Price cannot be less than 5"
                    }
                },
                submitHandler: function (form) {
                    const formData = new FormData(form);
                    const fileInput = document.getElementById('imageUpload-service-edit');
                    if (fileInput.files[0]) formData.append('image', fileInput.files[0]);

                    $('#spinner-service-edit').removeClass('d-none');
                    $('#save-change-edit').text('Saving...');
                    $('#service-submit-edit').prop('disabled', true);

                    $.ajax({
                        url: "{{route('service.update')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                toastr.success('Service updated successfully!');
                                location.reload();
                            } else {
                                toastr.error('Failed to update service.');
                            }
                        },
                        error: function (xhr) {
                            toastr.error('An error occurred.');

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                Object.values(xhr.responseJSON.errors).forEach(error => toastr.error(error));
                            }
                        },
                        complete: function () {
                            $('#spinner-service-edit').addClass('d-none');
                            $('#save-change-edit').text('Save');
                            $('#service-submit-edit').prop('disabled', false);
                        }
                    });
                }
            });
        });
    </script>
@endpush
