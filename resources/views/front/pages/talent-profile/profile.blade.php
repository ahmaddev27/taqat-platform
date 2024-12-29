@extends('front.layouts.master',['title'=>$talent->name])
@section('content')

    @push('css')


        <script src="https://cdn.tiny.cloud/1/YOUR_API_KEY/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @endpush

    <!-- profile section Here -->
    <section class="profile__section sectionbg pb-120" style="margin-top: 200px">
        <div class="container">
            <div class="profile__customize">
                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="main__profile__sidebar">
                            <div class="darrell__profile round16 mb-24 border bgwhite">
                                <div class="profile__check ralt">
                                    <img src="{{$talent->photo}}" alt="profile">
                                    {{--                                    <i class="bi bi-check"></i>--}}
                                </div>
                                <div class="darrell__content mt-40 text-center">
                                    <h4 class="title mb-16">
                                        {{$talent->name}}
                                    </h4>
                                    <span class="fz-16 fw-400 inter title">
                        {{$talent->specialization->title_en}}
                        </span>
                                    <ul class="d-flex mt-24 justify-content-center employer__listbase flex-wrap tranding__listbase align-items-center">
                                        <li>
                                                                          <span class="fz-16 fw-400 inter pra">
                                                                        salary
                                                                            {{$talent->sallary}}
                                                                          </span>
                                        </li>
                                        <li class="d-flex gap-2 fz-16 fw-500 inter title">
                                            <i class="bi bi-star-fill ratting"></i>
                                            {{$talent->rate}}
                                            {{--                                            <span class="pra fz-14">(114)</span>--}}
                                        </li>
                                        <li>
                              <span class="fz-16 fw-400 inter pra">
                                 Member: <span class="base">{{$talent->created_at->format('M d,Y')}}</span>
                              </span>
                                        </li>
                                    </ul>
                                    {{--                                    <ul class="social justify-content-center mt-30 mb-40 d-flex align-items-center">--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="javascript:void(0)">--}}
                                    {{--                                                <i class="bi bi-facebook base"></i>--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="javascript:void(0)">--}}
                                    {{--                                                <i class="bi bi-instagram base"></i>--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="javascript:void(0)">--}}
                                    {{--                                                <i class="bi bi-twitter base"></i>--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="javascript:void(0)">--}}
                                    {{--                                                <i class="bi bi-pinterest base"></i>--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                        <li>--}}
                                    {{--                                            <a href="javascript:void(0)">--}}
                                    {{--                                                <i class="bi bi-dribbble base"></i>--}}
                                    {{--                                            </a>--}}
                                    {{--                                        </li>--}}
                                    {{--                                    </ul>--}}
                                    {{--                                    <a href="profile.html" class="cmn--btn outline__btn">--}}
                                    {{--                           <span>--}}
                                    {{--                              View Profile--}}
                                    {{--                           </span>--}}
                                    {{--                                        <span>--}}
                                    {{--                              <i class="bi bi-arrow-up-right"></i>--}}
                                    {{--                           </span>--}}
                                    {{--                                    </a>--}}
                                </div>
                            </div>

                            <div class="all__editbar round16 bgwhite border">
                                <div class="description__edit ralt pb-24 bborderdash commn__spacenone">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item w-100 mb-16 d-flex align-items-center justify-content-between"
                                            role="presentation">
                              <span class="fz-24 fw-600 inter title">
                                 BIO
                              </span>

                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fz-16 fw-400 inter title base fade show active" id="home"
                                             role="tabpanel">

                                            {!! $talent->bio!!}
                                        </div>

                                    </div>
                                </div>


                                <div class="description__edit pt-24 ralt pb-24 bborderdash commn__spacenone">
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item w-100 mb-16 d-flex align-items-center justify-content-between"
                                            role="presentation">
                              <span class="fz-24 fw-600 inter title">
                                 Skills
                              </span>

                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="skew" role="tabpanel">
                                            <div class="skill__tag d-flex flex-wrap">

                                                @foreach(json_decode($talent->skills) as $skill)

                                                    <a href="javascript:void(0)" class="border round100 fz-14 pra">
                                                        {{ $skill->value }}
                                                    </a>
                                                @endforeach


                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">
                        <div class="create__gigpublist border round16 bgwhite">
                            <div class="nav mb-40 border round16 d-flex align-items-center nav-tabs" role="tablist">
                                {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"--}}
                                {{--                                        id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"--}}
                                {{--                                        role="tab" aria-controls="nav-home" aria-selected="true">--}}
                                {{--                                    <i class="bi bi-file-earmark-plus"></i>--}}
                                {{--                                    New Gig--}}
                                {{--                                </button>--}}

                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"
                                        id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                                    <i class="bi bi-pencil-square"></i>
                                    Profile
                                </button>

                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                        id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-services"
                                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <i class="bi bi-list-ul"></i>

                                    Services
                                </button>

                            </div>

                            <div class="tab-content">
                                {{--                                <div class="tab-pane base fade show active" id="nav-home" role="tabpanel"--}}
                                {{--                                     aria-labelledby="nav-home-tab">--}}
                                {{--                                    <a href="overview.html" class="gig__box d-block border text-center round16 bgwhite">--}}
                                {{--                           <span class="icon round100 d-flex align-items-center justify-content-center">--}}
                                {{--                              <i class="bi bi-plus-lg"></i>--}}
                                {{--                           </span>--}}
                                {{--                                        <span class="fz-24 fw-600 inter pra">--}}
                                {{--                              Create a new Gig--}}
                                {{--                           </span>--}}
                                {{--                                    </a>--}}
                                {{--                                </div>--}}


                                <div class="tab-pane base fade  show active" id="nav-contact" role="tabpanel"
                                     aria-labelledby="nav-contact-tab">
                                    <div class="accordion profile__gigedit" id="accordionExample">
                                        <div class="accordion-item mb-40">
                                         <span class="accordion-header" id="headingOne">
                                                   <button class="accordion-button collapsed bborder" type="button"
                                                           data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                           aria-expanded="true" aria-controls="collapseOne">
                                                        Basic Info
                                                   </button>
                                                 </span>
                                            <div id="collapseOne" class="accordion-collapse collapse show"
                                                 aria-labelledby="headingOne">
                                                <div class="accordion-body">

                                                    <form id="updateProfileForm" class="row g-4"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="basic__infos mb-24">
                                                            <div
                                                                class="d-flex flex-wrap basic__proadded align-items-center">
                                                                <div class="pro__andthumb d-flex align-items-center">
                                                        <span class="fz-20 fw-500 inter title">
                                                            Profile Photo
                                                        </span>
                                                                    <div class="pro__photo">
                                                                        <img id="profileImage"
                                                                             style="height: 160px;width: 150px"
                                                                             src="{{$talent->photo}}" alt="freelance"/>
                                                                    </div>
                                                                </div>

                                                                <div class="update__btn d-flex align-items-center">
                                                                    <a href="javascript:void(0)" class="cmn--btn"
                                                                       onclick="document.getElementById('imageInput').click()">
                                                                            <span>
                                                                                  Edit Photo
                                                                            </span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <!-- Hidden file input -->
                                                            <input type="file" id="imageInput" name="photo"
                                                                   style="display: none;"
                                                                   accept="image/*" onchange="previewImage(event)"/>
                                                        </div>
                                                        <div class="col-lg-6 basig__grpinput">
                                                            <label for="name" class="fz-20 fw-500 inter mb-16 title">Full
                                                                name</label>
                                                            <input type="text" value="{{$talent->name}}" name="name"
                                                                   id="name"
                                                                   placeholder="Enter name">
                                                        </div>

                                                        <div class="col-lg-6 basig__grpinput">
                                                            <label for="email1s" class="fz-20 fw-500 inter mb-16 title">Email</label>
                                                            <input name="email" type="text" value="{{$talent->email}}"
                                                                   id="email1s"
                                                                   placeholder="Enter email">
                                                        </div>

                                                        <div class="col-lg-6 basig__grpinput">
                                                            <label for="numbr" class="fz-20 fw-500 inter mb-16 title">Phone
                                                                <span class="pra">(whatsapp)</span></label>
                                                            <input name="whatsapp" value="{{$talent->whatsapp}}"
                                                                   type="text" id="numbr"
                                                                   placeholder="Enter number">
                                                        </div>


                                                        <div class="col-lg-6 basig__grpinput">
                                                            <label for="specialization_id"
                                                                   class="fz-20 fw-500 inter mb-16 title">Specialization</label>

                                                            <select name="specialization_id" required
                                                                    class="form-select nice-select ">
                                                                @foreach(\App\Models\Taqat2\Specialization::all() as $s)
                                                                    <option
                                                                        value="{{$s->id}}" {{$s->id ==$talent->specialization_id?'selected':''}}>{{$s->title_en}}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>


                                                        <div class="col-lg-12 basig__grpinput">
                                                            <label for="numbr" class="fz-20 fw-500 inter mb-16 title">Salary
                                                                <span class="pra">($)</span></label>
                                                            <input value="{{$talent->sallary}}" name="sallary"
                                                                   type="number" id="sallary"
                                                                   placeholder="Enter number">
                                                        </div>


                                                        <div class="col-lg-12 ">
                                                               <span class="fz-20 fw-500 inter title mb-16 d-block">
                                                                  BIO:
                                                               </span>

                                                            <div id="editor"></div>

                                                            <div class="col-lg-12 mt-2">

                                                                 <span class="fz-20 fw-500 inter title mb-16 d-block">
                                                                  Skills:
                                                               </span>
                                                                <input style="border-radius:16px;" name="skills"
                                                                       value="{{ $talent->skills }}"
                                                                       id="kt_tagify_5">
                                                            </div>


                                                            <div
                                                                class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">


                                                                <button type="submit" class="cmn--btn">
                                                                    <span id="spinner"
                                                                          class="spinner-grow spinner-grow-sm d-none"
                                                                          role="status" aria-hidden="true"></span>
                                                                    <span id="save-change">Save Change</span>
                                                                </button>


                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                               @include('front.pages.talent-profile.service-tab')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- profile section End -->

    @push('js')
        <script src="{{url('tinymce.bundle.js')}}"></script>


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
                maxTags: 100,
                dropdown: {
                    maxItems: 24, // <- mixumum allowed rendered suggestions
                    classname: "tagify_inline_suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });
        </script>

        {{--  submit--}}
        <script>
            $(document).ready(function () {

                toastr.options = {
                    "closeButton": true,                // Show close button
                    "debug": false,                     // Debug mode
                    "newestOnTop": true,                // New notifications appear on top
                    "progressBar": true,                // Show progress bar
                    "positionClass": "toast-top-right", // Position
                    "preventDuplicates": true,          // Prevent duplicate messages
                    "onclick": null,                    // Add custom click handler
                    "showDuration": "300",              // Animation duration
                    "hideDuration": "1000",
                    "timeOut": "5000",                  // Duration before auto-dismiss
                    "extendedTimeOut": "1000",          // Time before dismissal on hover
                    "showEasing": "swing",              // Show easing animation
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",             // Show method
                    "hideMethod": "fadeOut"             // Hide method
                };


                // Initialize TinyMCE
                tinymce.init({
                    license_key: '2muw0w0ikspoiy57lvyl3p9shq7epfz86vwzr6lyidl543pt',

                    selector: "#editor",
                    menubar: false,
                    toolbar: [
                        "styleselect fontselect fontsizeselect forecolor backcolor",
                        "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
                        "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview | code", "table"
                    ],
                    plugins: "advlist autolink link image lists charmap print preview code textcolor table",
                    content_style: "body { border: none; }",
                    height: '400px',
                    setup: function (editor) {
                        editor.on('init', function () {
                            editor.setContent('{!! $talent->bio !!}'); // Load existing bio
                        });
                    }
                });


                // AJAX Form Submission
                $('#updateProfileForm').on('submit', function (e) {
                    e.preventDefault();

                    let formData = new FormData(this);
                    formData.append('bio', tinymce.get('editor').getContent()); // Append TinyMCE content

                    $.ajax({
                        url: '{{route('profile.update')}}', // Replace with your actual backend URL
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#spinner').removeClass('d-none'); // Show spinner
                            $('#save-change').text('Saving...');
                        },

                        success: function (response) {
                            // Hide the spinner and reset button text after a slight delay
                            setTimeout(function () {
                                $('#spinner').addClass('d-none'); // Hide spinner
                                $('#save-change').text('Save Change');

                                // Reload the page after success
                                if (response.success) {
                                    toastr.success('Profile updated successfully!');

                                    // Update profile image dynamically if provided in response
                                    if (response.photo) {
                                        $('#profileImage').attr('src', response.photo);
                                    }

                                    // Reload the page after success
                                    location.reload();  // Reload the page once after successful update
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000); // 1-second delay before hiding spinner and reloading
                        },
                        error: function (xhr) {
                            $('#spinner').addClass('d-none'); // Hide spinner
                            $('#save-change').text('Save Change');

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function (key, error) {
                                    toastr.error(error[0]); // Display validation errors
                                });
                            } else {
                                toastr.error('An error occurred.');
                            }
                        }
                    });
                });


                // Preview Image Function
                window.previewImage = function (event) {
                    var reader = new FileReader();
                    reader.onload = function () {
                        var output = document.getElementById('profileImage');
                        output.src = reader.result; // Display image preview
                    };
                    reader.readAsDataURL(event.target.files[0]);
                };
            });

        </script>
    @endpush
@stop
