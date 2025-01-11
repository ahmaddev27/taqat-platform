<div class="modal fade" id="add-project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="overview__gitwrapper bgwhite round16">
                        <h4 class="pb-40 bborderdash mb-40 title">
                            Add new Project
                        </h4>

                        <form id="add-project-form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Title</span>
                                    <input type="text" class="addquestion" placeholder="Enter Title"
                                           name="title">
                                </div>

                                <div class="col-6 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Project Type</span>
                                    <select class="addquestion" name="project_type">
                                        <option disabled selected >Select project type</option>
                                        @foreach(\App\Models\Taqat2\Project_type::all() as $type)
                                            <option value="{{$type->id}}" >{{$type->title}}</option>
                                        @endforeach
                                    </select>

                                </div>



                                <div class="col-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Url</span>
                                    <input type="text" class=" addquestion"  name="url"
                                           placeholder="Enter url">
                                </div>



                                <div class="col-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Description</span>
                                    <textarea rows="10" class="addquestion" placeholder="Enter Description"
                                              name="description"></textarea>
                                </div>



                                </div>


                            <div class="row">
                                <!-- Upload button and hidden input -->
                                <div class="col-lg-6 justify-content-end text-center mt-auto mb-auto">
                                    <!-- Hidden file input -->
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Main Image</span>
                                    <input type="file" name="photo" id="imageUpload-project" class="d-none"
                                           accept="image/*">
                                    <!-- File input and clickable area -->
                                    <label for="imageUpload-project" class="cmn--btn outline__btn w-75">
                                        <span>Browse</span>
                                    </label>
                                </div>

                                <!-- Preview area -->
                                <div class="col-lg-3 justify-content-start text-start">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Preview</span>
                                    <img id="imagePreview-project" height="500px" style="object-fit: cover;"
                                         src="{{url(setting('icon'))}}" class="mb-3" alt="Preview Image">
                                </div>




                                <div class="col-lg-12 mb-30">
                                    <span class="fz-18 fw-500 title inter mb-10 d-block">Upload Project Images</span>
                                    <input multiple id="images-project" name="images[]" type="file" accept="image/*">
                                </div>


                            </div>




                            <div class="btn__grp d-flex align-items-end flex-wrap modal-footer"
                                 style="border: none">
                                <button type="submit" class="cmn--btn" id="project-submit">
                                        <span id="spinner-project" class="spinner-grow spinner-grow-sm d-none" role="status"
                                              aria-hidden="true"></span>
                                    <span id="save-change-project">Save</span>
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





    {{-- add-project--}}

<script>
    $(document).ready(function () {
        // Initialize FileInput for additional images
        $("#images-project").fileinput({
            theme: 'fas',
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'webp'],
            maxFileSize: 2048,
            maxFileCount: 10,
            showUpload: false,
            browseOnZoneClick: true,
            browseLabel:'',
            removeLabel:'',
            initialPreviewAsData: true,
            dropZoneTitle: 'Drag & drop images or click to browse',
            removeTitle: 'Remove selected file',
            overwriteInitial: false,
            fileActionSettings: {
                showRemove: true,
                showUpload: false,
            },
        });

        // Preview for the main image
        $("#imageUpload-project").on("change", function (event) {
            const file = event.target.files[0];
            const preview = $("#imagePreview-project");

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.attr("src", e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        // Submit form
        $("#add-project-form").validate({
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
            },
            submitHandler: function (form) {
                $("#spinner-project").removeClass("d-none");
                $("#save-change-project").text("Saving...");
                $("#project-submit").prop("disabled", true);

                const formData = new FormData(form);

                $.ajax({
                    url: "{{route('project.store')}}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.success) {
                            toastr.success('Project added successfully!');
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
                        $("#spinner-project").addClass("d-none");
                        $("#save-change-project").text("Save");
                        $("#project-submit").prop("disabled", false);
                    },
                });
            },
        });
    });

</script>
@endpush
