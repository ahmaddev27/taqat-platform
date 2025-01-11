<div class="modal fade" id="edit-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Edit Project
                        </h4>

                        <form id="edit-project-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Title</span>
                                    <input type="text" class="addquestion" placeholder="Enter Title"
                                           id="project-title" name="title">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Project Type</span>
                                    <select id="project-project_type" class="addquestion" name="project_type">
                                        <option disabled selected>Select project type</option>
                                        @foreach(\App\Models\Taqat2\Project_type::all() as $type)
                                            <option value="{{$type->id}}">{{$type->title}}</option>
                                        @endforeach
                                    </select>

                                </div>


                                <div class="col-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Url</span>
                                    <input type="text" class=" addquestion" name="url"
                                           id="edit-project-url" placeholder="Enter url">
                                </div>


                                <div class="col-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Description</span>
                                    <textarea rows="10" class="addquestion" placeholder="Enter Description"
                                              id="edit-project-description" name="description"></textarea>
                                </div>


                            </div>


                            <input id="project-id" name="id" type="hidden">

                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Main Image</span>
                                    <input type="file" name="photo" id="imageUpload-project-edit" class="d-none"
                                           accept="image/*">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-project-edit" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>
                                    <a target="_blank" href="#" id="image-id-project-edit">
                                        <img id="imagePreview-project-edit" height="500px" style="object-fit: cover;"
                                             src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                    </a>
                                </div>


                                <div class="col-lg-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Project Images</span>
                                    <input multiple id="images-project-edit" name="images[]" type="file"
                                           accept="image/*">
                                </div>


                            </div>


                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                 style="border: none">
                                <button type="submit" class="cmn--btn" id="project-submit-edit">
                                        <span id="spinner-project-edit" class="spinner-grow spinner-grow-sm d-none"
                                              role="status"
                                              aria-hidden="true"></span>
                                    <span id="save-change-project-edit">Save</span>
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

            // Handling the click event for editing a project
            $('.project-edit').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{route('project.edit','')}}/' + id,
                    method: 'GET',
                    success: function (response) {
                        // Populate form fields with project data
                        $('#project-id').val(response.id);
                        $('#project-title').val(response.title[appLocale]);
                        $('#edit-project-url').val(response.url);
                        $('#edit-project-description').val(response.description);
                        $('#image-id-project-edit').attr('href', response.photo_url);

                        if (response.photo_url) {
                            $('#imagePreview-project-edit').attr('src', response.photo_url);
                        }

                        // Handle the images array (which now contains id and url)
                        var images = response.images;

                        // Check if images array is valid and not empty
                        if (!Array.isArray(images) || images.length === 0) {
                            console.error("No images found or invalid image array");
                            return;
                        }


                        // Initialize file input with image previews and remove options
                        $("#images-project-edit").fileinput('destroy').fileinput({
                            theme: 'fas',
                            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'webp'],
                            maxFileSize: 2048,
                            maxFileCount: 10,
                            showUpload: false,
                            browseOnZoneClick: true,
                            initialPreviewAsData: true,
                            initialPreview: initialPreview,  // Set the fetched image URLs
                            browseLabel: '',
                            removeLabel: '',
                            dropZoneTitle: 'Drag & drop images or click to browse',
                            removeTitle: 'Remove selected file',
                            overwriteInitial: false,
                            fileActionSettings: {
                                showRemove: true,
                                showUpload: false,
                            },
                        });
                    },
                    error: function (xhr, status, error) {
                        toastr.error(error);
                    }
                });
            });

        });



    </script>



    {{-- edit-project--}}

    <script>
        $(document).ready(function () {

            // Preview for the main image
            $("#imageUpload-project-edit").on("change", function (event) {
                const file = event.target.files[0];
                const preview = $("#imagePreview-project-edit");

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.attr("src", e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Submit form
            $("#edit-project-form").validate({
                rules: {
                    title: {required: true},
                    project_type: {required: true},
                    url: {url: true},
                    description: {required: true},
                },
                messages: {
                    title: "Please enter the title for the project.",
                    project_type: "Please select a project type.",
                    description: "Please enter a description.",
                    url: "Enter a valid URL.",
                },
                errorPlacement: function (error) {
                    toastr.error(error.text());
                },
                submitHandler: function (form) {
                    $("#spinner-project-edit").removeClass("d-none");
                    $("#save-change-project-edit").text("Saving...");
                    $("#project-submit-edit").prop("disabled", true);

                    const formData = new FormData(form);

                    $.ajax({
                        url: "{{route('project.update')}}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (response.success) {
                                toastr.success('Project Updated successfully!');
                                setTimeout(() => location.reload(true), 1000);
                            } else {
                                toastr.error('Something went wrong.');
                            }
                        },
                        error: function (xhr) {
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, error) {
                                    toastr.error(error[0]);
                                });
                            } else {
                                toastr.error('An error occurred.');
                            }
                        },
                        complete: function () {
                            $("#spinner-project-edit").addClass("d-none");
                            $("#save-change-project-edit").text("Save");
                            $("#project-submit-edit").prop("disabled", false);
                        },
                    });
                },
            });
        });

    </script>



@endpush
