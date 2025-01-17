@extends('front.layouts.master',['title'=>$talent->name])
@section('content')

    @push('css')

        <style>
            .ql-container {
                height: 30%;
            }

        </style>

    @endpush

    <!-- profile section Here -->
    <section class="profile__section sectionbg pb-120" style="margin-top: 200px">


        <div class="container">

            <div class="profile__customize">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="darrell__profile bg-white round16">
                            <div class="row g-0">
                                <!-- Column for Total Balance -->
                                <div class="col-12 col-sm-4 text-center py-5 border-sm-end">
                                    <h5 class="font-md-1 font-small mb-0" style="color: #2c2b2b">Balance</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>

                                <!-- Column for Withdrawable Balance -->
                                <div class="col-12 col-sm-4 text-center py-5">
                                    <h5 class="mb-0" style="color: #2c2b2b">Can withdraw</h5>
                                    <h2 class="text-center mb-2 mt-1 font-2 font-lg-5" style="color: #3F3F3F;">
                                        0.00 <span style="line-height: 1;">$</span>
                                    </h2>
                                </div>
                                <!-- Column for Balance View Button -->
                                <div class="col-12 col-sm-4 round16" style="background-color: #0d47a1;">
                                    <a href="#" class="d-block text-center text-white p-5">
                                        <h4 class="mb-0" title="view">
                                            <i class="bi bi-wallet2"
                                               style="font-size: 30px; display: block; line-height: 1;"></i>
                                            <span style="display: block; margin-top: 10px; font-size: 20px;">View</span>
                                        </h4>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="container py-5">
                <div class="row g-3">

                    <div class="row g-4">


                        <div class="col-lg-4">
                            <div class="main__profile__sidebar">


                                <div class="nav mb-24 round16 d-flex align-items-center row">
                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-people" style="font-size: 25px"></i>
                                            <span class="text-center">Teams</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Teams Offers</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-chat" style="font-size: 25px"></i>
                                            <span class="text-center">Chats</span>
                                        </a>
                                    </div>
                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Job Offers</span>
                                        </a>
                                    </div>


                                    <div class="col-4 mb-2">
                                        <a href="{{route('proposals.index')}}"
                                           class="fz-14 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-tags" style="font-size: 25px"></i>
                                            <span class="text-center">Offers</span>
                                        </a>
                                    </div>

                                    <div class="col-4 mb-2">
                                        <a href="#"
                                           class="fz-16 fw-500  d-flex flex-column align-items-center gap-1 round16 bgwhtie p-2">
                                            <i class="bi bi-list-ul" style="font-size: 25px"></i>
                                            <span class="text-center">Services</span>
                                        </a>
                                    </div>

                                </div>


                                <div class="darrell__profile round16 mb-24 bgwhite">
                                    <div class="profile__check ralt">
                                        <img src="{{$talent->photo}}" alt="profile">
                                        {{-- <i class="bi bi-check"></i> --}}
                                    </div>

                                    <div class="darrell__content mt-40 text-center">
                                        <h4 class="title mb-16">
                                            {{$talent->name}}
                                        </h4>
                                        <span class="fz-16 fw-400 inter title">
                                        {{$talent->specialization->title_en}}
                                    </span>

                                        <ul class="d-flex mt-24 justify-content-center employer__listbase flex-wrap tranding__listbase align-items-center">
                                            {{--                                            <li>--}}
                                            {{--                                            <span class="fz-16 fw-400 inter pra">--}}
                                            {{--                                                salary--}}
                                            {{--                                                {{$talent->sallary}}--}}
                                            {{--                                            </span>--}}
                                            {{--                                            </li>--}}
                                            <li class="d-flex gap-2 fz-16 fw-500 inter title">
                                                <i class="bi bi-star-fill ratting"></i>
                                                {{$talent->rate}}
                                                {{--
                                              <span class="pra fz-14">(114)</span>--}}
                                            </li>
                                            <li>
                              <span class="fz-16 fw-400 inter pra">
                                 Member: <span class="base">{{$talent->created_at->format('M d,Y')}}</span>
                              </span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>


                                <div class="all__editbar round16 bgwhite ">
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
                                            <div class="tab-pane fz-16 fw-400 inter title base fade show active"
                                                 id="home"
                                                 role="tabpanel">

                                                {!! $talent->bio!!}
                                            </div>

                                        </div>
                                    </div>

                                    @if($talent->skills)
                                        <div
                                            class="description__edit pt-24 ralt pb-24 bborderdash commn__spacenone">
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

                                                            <a href="javascript:void(0)"
                                                               class="round100 fz-14 pra">
                                                                {{ $skill->value }}
                                                            </a>
                                                        @endforeach


                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    @endif'

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="create__gigpublist round16 bgwhite">


                                <div class="nav mb-40  round16 d-flex align-items-center nav-tabs" role="tablist">
                                    {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"--}}
                                    {{--                                        id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"--}}
                                    {{--                                        role="tab" aria-controls="nav-home" aria-selected="true">--}}
                                    {{--                                    <i class="bi bi-file-earmark-plus"></i>--}}
                                    {{--                                    New Gig--}}
                                    {{--                                </button>--}}

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1 active"
                                            id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                                            type="button" role="tab" aria-controls="nav-contact"
                                            aria-selected="false">
                                        <i class="bi bi-pencil-square" style="font-size: 25px"></i>
                                        Profile
                                    </button>

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-edu"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-mortarboard" style="font-size: 25px"></i>

                                        Education
                                    </button>

                                    {{--                                <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"--}}
                                    {{--                                        id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-edu"--}}
                                    {{--                                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">--}}
                                    {{--                                    <i class="bi bi-patch-check"></i>--}}
                                    {{--                                    Courses--}}
                                    {{--                                </button>--}}


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-exp"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-list-stars" style="font-size: 25px"></i>

                                        Experiences
                                    </button>

                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-projects"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-briefcase" style="font-size: 25px"></i>
                                        Projects
                                    </button>


                                    <button class="nav-link fz-16 fw-500 pra d-flex align-items-center gap-1"
                                            id="nav-service-tab" data-bs-toggle="tab" data-bs-target="#nav-services"
                                            type="button" role="tab" aria-controls="nav-profile"
                                            aria-selected="false">
                                        <i class="bi bi-list-ul" style="font-size: 25px"></i>

                                        Services
                                    </button>

                                </div>


                                <div class="tab-content">


                                    <div class="tab-pane base fade  show active" id="nav-contact" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        <div class="accordion profile__gigedit" id="accordionExample">
                                            <div class="accordion-item mb-40">


                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                     aria-labelledby="headingOne">
                                                    <div class="accordion-body">

                                                        <form id="updateProfileForm" class="row g-4"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="basic__infos mb-24">
                                                                <div
                                                                    class="d-flex flex-wrap basic__proadded align-items-center justify-content-center">
                                                                    <div
                                                                        class="pro__andthumb d-flex align-items-center">

                                                                        <div class="pro__photo">
                                                                            <img id="profileImage"
                                                                                 style="height: 160px;width: 150px"
                                                                                 class="img-fluid"
                                                                                 src="{{$talent->photo}}"
                                                                                 alt="freelance"/>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="update__btn d-flex align-items-center m-2">
                                                                        <a href="javascript:void(0)"
                                                                           class="cmn--btn"
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
                                                                       accept="image/*"
                                                                       onchange="previewImage(event)"/>
                                                            </div>
                                                            <div class="col-lg-6 basig__grpinput">
                                                                <label for="name"
                                                                       class="fz-20 fw-500 inter mb-16 title">Full
                                                                    name</label>
                                                                <input class="addquestion" type="text"
                                                                       value="{{$talent->name}}" name="name"
                                                                       id="name"
                                                                       placeholder="Enter name">
                                                            </div>

                                                            <div class="col-lg-6 basig__grpinput">
                                                                <label for="email1s"
                                                                       class="fz-20 fw-500 inter mb-16 title">Email</label>
                                                                <input class="addquestion" name="email" type="text"
                                                                       value="{{$talent->email}}"
                                                                       id="email1s"
                                                                       placeholder="Enter email">
                                                            </div>

                                                            <div class="col-lg-6 basig__grpinput">
                                                                <label for="numbr"
                                                                       class="fz-20 fw-500 inter mb-16 title">Phone
                                                                    <span class="pra">(whatsapp)</span></label>
                                                                <input class="addquestion" name="whatsapp"
                                                                       value="{{$talent->whatsapp}}"
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


                                                            {{--                                                            <div class="col-lg-12 basig__grpinput">--}}
                                                            {{--                                                                <label for="numbr"--}}
                                                            {{--                                                                       class="fz-20 fw-500 inter mb-16 title">Salary--}}
                                                            {{--                                                                    <span class="pra">($)</span></label>--}}
                                                            {{--                                                                <input value="{{$talent->sallary}}"--}}
                                                            {{--                                                                       class="addquestion"--}}
                                                            {{--                                                                       name="sallary"--}}
                                                            {{--                                                                       type="number" id="sallary"--}}
                                                            {{--                                                                       placeholder="Enter number">--}}
                                                            {{--                                                            </div>--}}

                                                            <div class="col-lg-12  ">

                                                            <span class="fz-20 fw-500 inter title mb-16 d-block">
                                                                  BIO:
                                                               </span>

                                                                <div>
                                                                <textarea id="bio" name="bio" class="form-control round16"
                                                                          rows="10">{!! $talent->bio !!}</textarea>
                                                                    {{--                                                                <button id="ai-generate" type="button" class="btn btn-secondary">Write with AI</button>--}}
                                                                    {{--                                                                <p id="error-message" style="color: red; display: none;">Generated text must be at least 30 characters.</p>--}}
                                                                </div>


                                                                <div class="col-lg-12 mt-2">

                                                                 <span class="fz-20 fw-500 inter title mb-16 d-block">
                                                                  Skills:
                                                               </span>
                                                                    <input class="form-control" name="skills"
                                                                           value="{{ $talent->skills }}"
                                                                           id="kt_tagify_5">
                                                                </div>


                                                                <div
                                                                    class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                                                                    <button id="profile-update" type="submit"
                                                                            class="cmn--btn">
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

                                    @include('front.pages.talent-profile.tabs.Educations.edu-tab')
                                    {{--                                @include('front.pages.talent-profile.tabs.Courses.edu-tab')--}}
                                    @include('front.pages.talent-profile.tabs.Services.service-tab')
                                    @include('front.pages.talent-profile.tabs.Experience.experience-tab')
                                    @include('front.pages.talent-profile.tabs.Project.projects-tab')


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- profile section End -->f

    @push('js')

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

        {{-- edit profile submit--}}
        <script>
            $(document).ready(function () {

                // Image Preview Function
                window.previewImage = function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        // Validate file size (max 2MB)
                        if (file.size > 2 * 1024 * 1024) {
                            toastr.error("Image size must be less than 2MB.");
                            return;
                        }

                        // Display preview
                        const reader = new FileReader();
                        reader.onload = function () {
                            $('#profileImage').attr('src', reader.result);
                        };
                        reader.readAsDataURL(file);
                    }
                };

                // jQuery Validation
                $('#updateProfileForm').validate({
                    rules: {
                        name: {required: true},
                        email: {required: true, email: true},
                        whatsapp: {required: true, digits: true},
                        // sallary: {required: true, number: true},
                        specialization_id: {required: true},
                        bio: {required: true},
                    },
                    messages: {
                        name: "Please enter your full name.",
                        email: "Please enter a valid email address.",
                        whatsapp: "Please enter a valid phone number.",
                        sallary: "Please enter a valid salary.",
                        bio: "Please enter bio.",
                        specialization_id: "Please select a specialization.",
                    },

                    submitHandler: function (form) {
                        submitForm();
                    }
                });


                // AJAX Form Submission
                function submitForm() {
                    const formData = new FormData($('#updateProfileForm')[0]);

                    $.ajax({
                        url: '{{route('profile.update')}}', // Replace with your actual backend URL
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('#spinner').removeClass('d-none');
                            $('#save-change').text('Saving...');
                        },
                        success: function (response) {
                            setTimeout(() => {
                                $('#spinner').addClass('d-none');
                                $('#save-change').text('Save Change');

                                if (response.success) {
                                    toastr.success('Profile updated successfully!');
                                    if (response.photo) {
                                        $('#profileImage').attr('src', response.photo);
                                    }
                                    location.reload(); // Reload the page
                                } else {
                                    toastr.error('Something went wrong.');
                                }
                            }, 1000);
                        },
                        error: function (xhr) {
                            $('#spinner').addClass('d-none');
                            $('#save-change').text('Save Change');

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

        </script>

    @endpush
@stop
