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
                                    <select id="project-project_type-edit" class="addquestion" name="project_type">
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
                                    <textarea rows="10" class="form-control round16" placeholder="Enter Description"
                                              id="edit-project-description" name="description"></textarea>
                                </div>


                            </div>


                            <input id="project-id" name="id" type="hidden">

                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Main Image</span>
                                    <input type="file" name="photo" id="imageUpload-project-edit" class="d-none" accept="image/*">
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


    <script>
        // Handle the image file change and show preview
        $('#imageUpload-project-edit').change(function (event) {
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                // Set the preview image once the file is loaded
                reader.onload = function (e) {
                    $('#imagePreview-project-edit').attr('src', e.target.result);  // Set the new image source
                };

                reader.readAsDataURL(file);  // Read the selected file as a Data URL
            }
        });
    </script>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            // fetch

            var appLocale = "{{ app()->getLocale() }}";
            // Handling the click event for editing a project
            $('.project-edit').on('click', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '{{ route('project.edit', '') }}/' + id,
                    method: 'GET',
                    success: function (response) {
                        // Populate form fields with project data
                        $('#project-id').val(response.id);
                        $('#project-title').val(response.title[appLocale]);
                        $('#edit-project-url').val(response.url);
                        $('#edit-project-description').val(response.description);
                        $('#image-id-project-edit').attr('href', response.photo_url);
                        $('#project-project_type-edit').val(response.project_type_id); // Assuming the response includes project_type_id

                        if (response.photo_url) {
                            $('#imagePreview-project-edit').attr('src', response.photo_url);
                        }

                        // Handle the images array
                        var images = response.images; // Assuming each image has `id` and `url`
                        var initialPreview = [];
                        var initialPreviewConfig = [];

                        if (Array.isArray(images) && images.length > 0) {
                            initialPreview = images.map(image => image.url); // Set image URLs for preview
                            initialPreviewConfig = images.map(image => ({
                                caption: image.url.split('/').pop(),
                                size: image.size || 0, // Make sure you have the size attribute or set to 0
                                width: "120px",
                                url: '{{ route('project.deleteImage') }}',  // The URL where the file should be deleted
                                key: image.id,  // Unique identifier for the image
                                extra: {
                                    url: image.url,  // The file path (required for deletion)
                                    key: image.id,
                                    project_id: id // The unique file key
                                }
                            }));
                        }

                        // Initialize file input with custom configuration
                        $("#images-project-edit").fileinput('destroy').fileinput({
                            theme: 'fas',
                            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'webp'],
                            maxFileSize: 2048,
                            maxFileCount: 10,
                            showUpload: false,
                            browseOnZoneClick: true,
                            initialPreviewAsData: true,
                            initialPreview: initialPreview,  // Set the fetched image URLs
                            initialPreviewConfig: initialPreviewConfig,  // Config for each image preview
                            browseLabel: '',
                            removeLabel: '',
                            dropZoneTitle: 'Drag & drop images or click to browse',
                            removeTitle: 'Remove selected file',
                            overwriteInitial: false,
                            fileActionSettings: {
                                showRemove: true,  // Enable remove button
                                showUpload: false,  // Disable upload button
                            },
                        });

                        // Handle the filepredelete event for custom confirmation
                        $('#images-project-edit').on('filepredelete', function (jqXHR, data) {
                            var abort = true; // Initially set to abort

                            // Show SweetAlert confirmation before deletion
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'You won\'t be able to revert this!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    abort = false; // Proceed with the deletion
                                }
                            });

                            return abort; // If abort is true, prevent deletion, else proceed
                        });

                        // Event listener for custom removal and SweetAlert confirmation
                        // Event listener for custom removal and SweetAlert confirmation
                        $(document).on('click', '.kv-file-remove', function (e) {
                            e.preventDefault(); // Prevent the default action (image removal)

                            var $button = $(this);
                            var filePath = $button.data('url');  // The file path of the image
                            var fileKey = $button.data('key');   // The unique file key for the image

                            if (!fileKey) {
                                console.error('File key is missing or undefined.');
                                return;
                            }

                            // Show SweetAlert2 confirmation dialog
                            Swal.fire({
                                title: 'Are you sure?',
                                text: 'You won\'t be able to revert this!',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: 'rgba(232, 37, 37, 0.66)',
                                cancelButtonColor: 'rgb(43, 93, 140)',
                                confirmButtonText: 'Yes, delete it!',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // AJAX request to delete the image from storage
                                    $.ajax({
                                        url: '{{ route('project.deleteImage') }}',
                                        type: 'POST',
                                        data: {
                                            file_path: filePath,
                                            file_key: fileKey,  // Pass the file key for deletion
                                            project_id: id,  // Pass the project id for deletion
                                        },
                                        success: function (response) {
                                            if (response.success) {
                                                toastr.warning('Deleted successfully!');

                                                // Assuming the response contains the updated list of images
                                                var updatedImages = response.images;  // The updated images array from your server response

                                                // Prepare new initialPreview and initialPreviewConfig arrays from the updated images
                                                var newInitialPreview = [];
                                                var newInitialPreviewConfig = [];

                                                if (Array.isArray(updatedImages) && updatedImages.length > 0) {
                                                    newInitialPreview = updatedImages.map(function (image) {
                                                        return image.url;  // Assuming image.url is the image URL
                                                    });

                                                    newInitialPreviewConfig = updatedImages.map(function (image) {
                                                        return {
                                                            caption: image.url.split('/').pop(),
                                                            size: image.size || 0,
                                                            width: "120px",
                                                            url: '{{ route('project.deleteImage') }}',  // URL for image deletion
                                                            key: image.id,
                                                            extra: {
                                                                url: image.url,
                                                                key: image.id,
                                                                project_id: id  // Assuming 'id' is the project ID
                                                            }
                                                        };
                                                    });
                                                }

                                                // Reinitialize the file input with the updated preview and config
                                                $('#images-project-edit').fileinput('destroy').fileinput({
                                                    theme: 'fas',
                                                    allowedFileExtensions: ['jpg', 'jpeg', 'png', 'webp'],
                                                    maxFileSize: 2048,
                                                    maxFileCount: 10,
                                                    showUpload: false,
                                                    browseOnZoneClick: true,
                                                    initialPreviewAsData: true,
                                                    initialPreview: newInitialPreview,
                                                    initialPreviewConfig: newInitialPreviewConfig,
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
                                            } else {
                                                Swal.fire('Error!', 'There was an error deleting the image.', 'error');
                                            }
                                        },


                                        error: function (error) {
                                            console.log('Error with AJAX request:', error);
                                            Swal.fire('Error!', 'There was an error with the request.', 'error');
                                        }
                                    });
                                }
                            });
                        });

                    },
                    error: function (xhr, status, error) {
                        toastr.error(error);
                    },
                });
            });

            // Submit form with image comparison logic
            $("#edit-project-form").validate({
                rules: {
                    title: { required: true },
                    project_type: { required: true },
                    url: { url: true },
                    description: { required: true },
                },
                messages: {
                    title: "Please enter the title for the project.",
                    project_type: "Please select a project type.",
                    description: "Please enter a description.",
                    url: "Enter a valid URL.",
                },
                errorPlacement: function (error) {
                    toastr.error(error.text());
                    console.log('Validation error: ', error.text()); // Debugging line
                },
                submitHandler: function (form) {
                    $("#spinner-project-edit").removeClass("d-none");
                    $("#save-change-project-edit").text("Saving...");
                    $("#project-submit-edit").prop("disabled", true);

                    const formData = new FormData(form);

                    $.ajax({
                        url: "{{ route('project.update') }}",
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
