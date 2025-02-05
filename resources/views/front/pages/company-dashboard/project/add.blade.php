@extends('front.layouts.master',['title'=>'Add New Project'])
@section('content')

    @push('css')

        <style>
            .ql-container {
                height: 30%;
            }

            .drop-zone {
                text-align: start;
                border: 2px dashed #ccc;
                border-radius: 16px;
                padding: 10px;
                background: #f8f9fa;
                cursor: pointer;
            }

            .drop-zone:hover {
                background: #e9ecef;
            }

            .file-item {
                background: #958e8e0a;
                padding: 10px;
                margin-top: 10px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-radius: 16px;

            }

            .file-preview {
                width: 50px;
                height: 50px;
                object-fit: cover;
                border-radius: 5px;
                margin-right: 10px;
            }

            .progress {
                width: 100%;
                background-color: #fbfbfb !important;

            }

            .progress-bar {
                width: 0%;
                height: 10px;
                background: repeating-linear-gradient(45deg, #0f5ad0, #0f5ad0 10px, #0f5ad0 10px, #0f5ad0 20px);
                transition: width 0.6s ease-in-out;
            }

            .delete-btn {
                background: #d9534f;
                border: none;
                color: white;
                padding: 5px 10px;
                border-radius: 3px;
                cursor: pointer;
            }

        </style>

    @endpush

    <section class="postrequest__section pt-120 pb-120">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-8">
                    <div class="overview__gitwrapper  round16  shadow2">
{{--                                                <h4 class="pb-40  mb-40 title">--}}
{{--                                                    Add New project--}}
{{--                                                </h4>--}}
                        <span class="fz-12 ralt aiquestion__text text-center d-block fw-400 mb-40 inter pra">
                  <span class="aiquestion">
                     About the project
                  </span>
               </span>
                        <span class="fz-20 fw-500 title inter mb-10 d-block">
                            Give your project brief a title
                        </span>
                        <p class="fz-14 title mb-24 inter">
                            Keep it short and simple - this will help us match you to the right category.
                        </p>
                        <input name="title" type="text" class="addquestion mb-30" placeholder="Enter Title">
                        <span class="fz-20 fw-500 title inter mb-10 d-block">
                            What are you looking to get done?
                        </span>
                        <p class="fz-14 title mb-24 inter">
                            This will help get your brief to the right talent.
                        </p>
                        <div class="write__bios round16 mb-10 border">
                            <div class="write__bisofooter">
                                 <textarea rows="10" class="form-control round16" placeholder="Enter Description"
                                           name="description"></textarea>
                            </div>
                        </div>

                        <span class="fz-12 ralt aiquestion__text text-center d-block fw-400 mt-40 mb-30 inter pra">
                            <span class="aiquestion">
                                  Timeline and budget
                              </span>
                            </span>

                        <div class="row">
                            <div class="title__add mt-24 col-6">
                                    <span class="fz-20 fw-500 title inter mb-10 d-block">
                                    Expected time in days
                                     </span>
                                <input type="number" name="delivery_time" placeholder="Delivery time (Days)">
                            </div>

                            <div class="title__add mt-24 col-6">
                                      <span class="fz-20 fw-500 title inter mb-10 d-block">
                                     Projected budget in dollars
                                     </span>
                                <input type="number" name="budget" placeholder="Expected Budget ($)">
                            </div>
                        </div>


                        <span class="fz-12 ralt aiquestion__text text-center d-block fw-400 mt-40 mb-30 inter pra">
                            <span class="aiquestion">Received required && Examples</span>
                        </span>


                        <div class="row">

                            <div class="col-12">
                                    <span class="fz-20 fw-500 title inter mb-10 d-block">
                        What is required to be implemented and received clearly?
                        </span>
                                <div class="write__bios round16 mb-10 border">
                                    <div class="write__bisofooter">
                                 <textarea rows="5" class="form-control round16" placeholder="Received required"
                                           name="received_required"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="title__add mt-24">

                     <span class="fz-20 fw-500 title inter mb-10 d-block">
                         Example of what needs to be done, if any
                        </span>
                                    <input type="text" name="similar_example" placeholder="Similar Example">
                                </div>
                            </div>
                        </div>


                        <span class="fz-12 ralt aiquestion__text text-center d-block fw-400 mt-40 mb-40 inter pra">
                  <span class="aiquestion">
                     Choose Any Skills and Specializations
                  </span>
               </span>

                        <div class="row">

                            <div class="col-12">
                                    <span class="fz-20 fw-500 title inter mb-10 d-block">
                                  What is skills required to complete the project?
                              </span>
                                <div class="write__bios round16 mb-10 border">
                                    <div class="write__bisofooter">
                                        <input class="form-control round16" name="skills"
                                               placeholder="select skills"
                                               id="kt_tagify_5">

                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="title__add mt-24">
                                    <span class="fz-20 fw-500 title inter mb-10 d-block">
                                        Specializations required to complete the project
                                    </span>


                                    <div class="natural__language round16 border">

                                        <div class="row">
                                            @foreach(specializations() as $sp)
                                                <div class="col-4">


                                                    <div
                                                        class="bank__checkitem  d-flex align-items-center">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="specializations[]" id="{{$sp->id}}"
                                                               style="border-radius: 16px">
                                                        <label class="form-check-label" for="spa{{$sp->id}}">
                                                            <span class="fz-16 fw-600 mb-10 d-block inter pra">
                                                                {{$sp->title}}
                                                            </span>

                                                        </label>
                                                    </div>


                                                </div>
                                            @endforeach
                                        </div>


                                    </div>


                                </div>
                            </div>
                        </div>


                        <div class="container mt-4 text-dark">
                          <span class="fz-12 ralt aiquestion__text text-center d-block fw-400 mt-40 mb-30 inter pra">
                            <span class="aiquestion">Attachments files</span>
                          </span>
                            <div id="dropZone" class="drop-zone shadow2 p-3"
                                 style="border: 2px dashed #ccc; cursor: pointer;">
                                <div class="row">
                                    <div class="col-2 text-end">
                                        <i class="bi bi-cloud-upload-fill fs-2"></i>
                                    </div>
                                    <div class="col-10 text-start">
                                        <p class="fz-14">Drag and drop files here</p>
                                        <p class="text-muted fz-14">or click to select files</p>
                                    </div>
                                </div>
                            </div>
                            <input type="file" id="fileInput" class="d-none" multiple accept="image/*,.pdf,.doc,.docx"/>
                            <div id="fileList" class="mt-3"></div>
                        </div>
                    </div>


                    <div class="btn__grp d-flex align-items-center gap-4 flex-wrap mt-24">
                        <a href="post-preferences.html" class="cmn--btn">
                                <span>
                                    Save &amp; Continue
                     </span>
                        </a>

                    </div>

                </div>
                <div class="col-md-4 d-none d-md-block text-dark ">

                    <div class="project-advantages bg-light2 text-dark p-3 rounded shadow-sm">
                        <div class="copy">
                            <h5 class="text-dark fz-16">Start Your Project</h5>
                            <p class="fz-14">
                                You can complete your project the way you want through Taqat. Enter the project details, budget, and expected duration for review and free publication.
                                Freelancers will then see it on the projects page and submit their proposals, allowing you to choose the best offer and start the project.
                            </p>
                            <hr>
                            <h5 class="text-dark fz-16">Taqat Ensures Your Rights</h5>
                            <p class="fz-14">
                                Taqat acts as an intermediary between you and the freelancer you hire. The payment is only transferred to the freelancer's account after they successfully complete the project.
                            </p>
                            <hr>
                            <h5 class="text-dark fz-16">Tips for a Successful Project</h5>
                            <ul class="list-unstyled ps-3 fz-14">
                                <li>&bull; Clearly define all details and tasks to be completed.</li>
                                <li>&bull; Fill in all fields and provide examples of what you want to achieve.</li>
                                <li>&bull; Break down the project and large tasks into smaller phases.</li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    @push('js')

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#specializations-select').select2();
            });
        </script>

        <script>
            const dropZone = document.getElementById("dropZone");
            const fileInput = document.getElementById("fileInput");
            const fileList = document.getElementById("fileList");
            let uploadedFiles = 0;
            const maxFiles = 5;
            const maxFileSize = 10 * 1024 * 1024; // 10 MB per file

            dropZone.addEventListener("click", () => fileInput.click());
            dropZone.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZone.classList.add("bg-light");
            });
            dropZone.addEventListener("dragleave", () => dropZone.classList.remove("bg-light"));
            dropZone.addEventListener("drop", (e) => {
                e.preventDefault();
                dropZone.classList.remove("bg-light");
                handleFiles(e.dataTransfer.files);
            });
            fileInput.addEventListener("change", () => handleFiles(fileInput.files));

            // Modified simulateProgress accepts a callback to execute when complete.
            function simulateProgress(progressBar, callback) {
                let width = 0;
                let interval = setInterval(() => {
                    if (width >= 100) {
                        clearInterval(interval);
                        if (callback) callback();
                    } else {
                        width += 10;
                        progressBar.style.width = width + "%";
                    }
                }, 200);
            }

            function handleFiles(files) {
                // Check if adding these files exceeds the maximum allowed count.
                if (uploadedFiles + files.length > maxFiles) {
                    toastr.error("You can only upload a maximum of " + maxFiles + " files");
                    return;
                }

                Array.from(files).forEach((file) => {
                    // Check file size before processing. Skip file if too large.
                    if (file.size > maxFileSize) {
                        toastr.error(`File "${file.name}" is too large. Maximum allowed size is 10 MB.`);
                        return; // Skip processing this file.
                    }

                    if (uploadedFiles >= maxFiles) return;
                    uploadedFiles++;

                    // Create file item container with an extra div for the upload status (check icon and text).
                    const fileItem = document.createElement("div");
                    fileItem.classList.add("file-item");
                    fileItem.innerHTML = `
        <div class="d-flex align-items-center" style="width: 100%">
          <img src="" class="file-preview me-2" alt="Preview" style="width:60px; height:60px; object-fit:cover;">
          <div style="width:85%">
            <p class="m-0">${file.name}</p>
            <p class="text-muted small">File size: ${(file.size / 1024 / 1024).toFixed(1)} MB</p>
 <div class="upload-status " style="text-align:start;"></div>
            <div class="progress mt-2" style="height: 5px;">
              <div class="progress-bar" style="width: 0%;"></div>
            </div>
          </div>

        </div>
        <button class="delete-btn btn btn-outline-danger mt-2"><i class="bi bi-x-circle-fill"></i></button>
      `;

                    fileList.appendChild(fileItem);

                    const filePreview = fileItem.querySelector(".file-preview");
                    const progressBar = fileItem.querySelector(".progress-bar");
                    const uploadStatus = fileItem.querySelector(".upload-status");

                    // Start simulating the progress.
                    simulateProgress(progressBar, () => {
                        // Remove the progress container.
                        const progressContainer = progressBar.parentElement;
                        progressContainer.remove();

                        // Once progress completes, display a green check icon and success text.
                        uploadStatus.innerHTML = '<i class="bi bi-check-circle-fill text-success fs-4 mx-1"></i><span class="text-success fz-12 my-1 fw-400">Image Uploaded successfully</span>';
                    });

                    // Read the file data for preview (if applicable).
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        filePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Attach delete button event.
                    fileItem.querySelector(".delete-btn").addEventListener("click", () => {
                        fileItem.remove();
                        uploadedFiles--;
                    });
                });
            }
        </script>


        {{--  tags--}}
        <script>
            // The DOM elements you wish to replace with Tagify
            var input = document.querySelector("#kt_tagify_5");

            // Initialize Tagify script on the above inputs
            new Tagify(input, {

                whitelist: [
                    "Software Engineering",
                    "Web Development",
                    "Front-End Development",
                    "Back-End Development",
                    "Full-Stack Development",
                    "Mobile App Development",
                    "Game Development",
                    "Embedded Systems Programming",
                    "Graphic Design",
                    "UI/UX Design",
                    "Interaction Design",
                    "Product Design",
                    "Motion Graphics",
                    "Video Editing",
                    "3D Animation",
                    "2D Animation",
                    "VFX (Visual Effects)",
                    "Typography",
                    "Branding",
                    "Illustration",
                    "Photography",
                    "Print Design",
                    "Ada",
                    "Adenine",
                    "Agda",
                    "Agilent VEE",
                    "Python",
                    "JavaScript",
                    "TypeScript",
                    "C++",
                    "C#",
                    "Java",
                    "Ruby",
                    "PHP",
                    "Swift",
                    "Kotlin",
                    "R",
                    "MATLAB",
                    "HTML",
                    "CSS",
                    "Sass",
                    "Less",
                    "React",
                    "Angular",
                    "Vue.js",
                    "Ember.js",
                    "Backbone.js",
                    "jQuery",
                    "Bootstrap",
                    "Tailwind CSS",
                    "Node.js",
                    "Express.js",
                    "Django",
                    "Flask",
                    "Spring",
                    "ASP.NET",
                    "Ruby on Rails",
                    "Laravel",
                    "Symfony",
                    "Golang",
                    "Rust",
                    "Scala",
                    "Perl",
                    "Elixir",
                    "GraphQL",
                    "SQL",
                    "NoSQL",
                    "MongoDB",
                    "Firebase",
                    "PostgreSQL",
                    "MySQL",
                    "SQLite",
                    "Oracle Database",
                    "Redis",
                    "Apache Kafka",
                    "Docker",
                    "Kubernetes",
                    "Adobe Photoshop",
                    "Adobe Illustrator",
                    "Adobe After Effects",
                    "Adobe Premiere Pro",
                    "Final Cut Pro",
                    "Blender",
                    "Cinema 4D",
                    "Figma",
                    "Sketch",
                    "InVision",
                    "Adobe XD",
                    "Microsoft Word",
                    "Microsoft Excel",
                    "Microsoft PowerPoint",
                    "Google Docs",
                    "Google Sheets",
                    "Google Slides",
                    "PDF Editing",
                    "Document Management",
                    "Office Administration",
                    "Business Communication",
                    "Project Management",
                    "Agile Methodologies",
                    "Scrum",
                    "Kanban",
                    "Software Testing",
                    "Quality Assurance",
                    "Systems Analysis",
                    "Network Engineering",
                    "Database Administration",
                    "Artificial Intelligence",
                    "Machine Learning",
                    "Deep Learning",
                    "Data Science",
                    "Big Data",
                    "Computer Vision",
                    "Natural Language Processing",
                    "Robotics",
                    "Automation",
                    "Technological Entrepreneurship",
                    "Startup Development",
                    "IT Management",
                    "Cybersecurity",
                    "Blockchain",
                    "Cloud Computing",
                    "Internet of Things (IoT)",
                    "Augmented Reality (AR)",
                    "Virtual Reality (VR)",
                    "DevOps",
                    "Digital Marketing",
                    "E-commerce",
                    "Product Management",
                    "Business Intelligence",
                    "js"
                ],
                maxTags: 10,
                dropdown: {
                    maxItems: 24, // <- mixumum allowed rendered suggestions
                    classname: "tagify_inline_suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });
        </script>
    @endpush
@stop
