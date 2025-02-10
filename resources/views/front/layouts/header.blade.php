<header id="header-nav" class="header-section">
    <div class="container">
        <div class="header-wrapper">
            <div class="logo-menu d-xl-none">
                <a href="{{route('home')}}" class="small__logo">
                    <img src="{{url(setting('icon'))}}" alt="logo">
                </a>
            </div>
            <ul class="main-menu">
                {{--                    <li>--}}
                {{--                        <a href="javascript:void(0)" class="fz-24">--}}
                {{--                            Home--}}
                {{--                            <i class="bi bi-chevron-down"></i>--}}
                {{--                        </a>--}}
                {{--                        <ul class="sub-menu">--}}
                {{--                            <li>--}}
                {{--                                <a href="index.html">Home [1]</a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="index-2.html">Home [2]</a>--}}
                {{--                            </li>--}}
                {{--                            <li>--}}
                {{--                                <a href="index-3.html">Home [3]</a>--}}
                {{--                            </li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}

                <li>
                    <a href="{{route('home')}}">
                        Home
                    </a>
                </li>

                <li>
                    <a href="{{route('projects.all')}}">
                        Projects
                    </a>
                </li>

                <li>
                    <a href="{{route('jobs.all')}}">
                        Jobs
                    </a>
                </li>


                <li>
                    <a href="{{route('services.all')}}">
                        Services
                    </a>
                </li>

                <li>
                    <a href="{{route('companies.all')}}">
                        Companies
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        Browse Job
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                Service Grid
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Service Details
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Project
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Project Details
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Featured Job
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Featured Details
                            </a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="{{route('talents.all')}}">Freelancers</a>


                </li>

                @if(auth()->guard('company')->check())
                    <li>
                        <a href="{{route('company.projects.add')}}">New Project</a>
                    </li>
                    <li>
                        <a href="{{route('company.jobs.add')}}">New Job</a>
                    </li>
                @endif
                {{--                    <li>--}}
                {{--                        <a href="javascript:void(0)">--}}
                {{--                            Pages--}}
                {{--                            <i class="bi bi-chevron-down"></i>--}}
                {{--                        </a>--}}
                {{--                        <ul class="sub-menu">--}}
                {{--                            <li class="subtwohober">--}}
                {{--                                <a href="about.html">About</a>--}}
                {{--                            </li>--}}
                {{--                            <li><a href="employer.html">Employer</a></li>--}}
                {{--                            <li><a href="employer-details.html">Employer Details</a></li>--}}
                {{--                            <li><a href="faqs.html">FAQs</a></li>--}}
                {{--                            <li><a href="help-support.html">Help & Support</a></li>--}}
                {{--                            <li><a href="singin.html">Sign In</a></li>--}}
                {{--                            <li><a href="signup.html">Sign Up</a></li>--}}
                {{--                            <li><a href="blog.html">Blog</a></li>--}}
                {{--                            <li><a href="blog-details.html">Blog Details</a></li>--}}
                {{--                            <li><a href="contact.html">Contact</a></li>--}}
                {{--                            <li><a href="error.html">Error</a></li>--}}
                {{--                        </ul>--}}
                {{--                    </li>--}}
                <li class="subtwohober">
                    <a href="blog.html">Blog</a>
                </li>

                <li>
                    <a href="contact.html">
                        Contact
                    </a>
                </li>


            </ul>

            <div class="menu__right__components d-flex align-items-center">

                <ul class="d-inline-flex">
                    <li class="mx-2">

                        @if (Auth::guard('talent')->check())
                            <a href="{{route('profile.index')}}">
                                <i class="bi bi-person" style="font-size: 1.7rem;"></i>
                                {{auth('talent')->user()->name??''}}

                            </a>

                        @elseif (Auth::guard('company')->check())

                            <a href="{{route('company.profile.index')}}">
                                <i class="bi bi-person" style="font-size: 1.7rem;"></i>
                                {{auth('company')->user()->name??''}}

                            </a>
                        @else

                            <a href="{{route('login')}}">
                                <i class="bi bi-person" style="font-size: 1.7rem;"></i>
                            </a>

                        @endif

                    </li>


                    @if (Auth::guard('talent')->check() || Auth::guard('company')->check())
                        {{--                    <li>--}}

                        {{--                        <a href="--}}
                        {{--                                {{url('https://team.taqat-gaza.com/chats/view/')}}--}}
                        {{--                                                                    ">--}}
                        {{--                            <div class="notification">--}}
                        {{--                                <i class="fa-solid fa-message"></i>--}}
                        {{--                                <span class="badge" id="badge">{{countNewMas()}}</span>--}}
                        {{--                            </div>--}}
                        {{--                        </a>--}}
                        {{--                    </li>--}}

                        <li class="mx-2">
                            <a href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"
                                   style="font-size: 1.5rem;"></i> {{ trans('main.logout') }}

                            </a>
                        </li>

                        <form id="logout-form" action="{{ route('logout-Clients') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    @endif

                    <div class="menu__components d-flex align-items-center">
                        {{--                    <div class="dropdown">--}}
                        {{--                        <a href="#" class="link glose__icon d-flex align-items-center" data-bs-toggle="dropdown" data-bs-offset="0,14" aria-expanded="true">--}}
                        {{--                            <i class="bi bi-globe"></i>--}}
                        {{--                        </a>--}}
                        {{--                        <div class="dropdown-menu dropdown-start" data-popper-placement="bottom-start">--}}
                        {{--                            <ul class="list">--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#" class="link d-inline-block dropdown-item">--}}
                        {{--                                        <span class="d-block bborder pb-1"> English </span>--}}
                        {{--                                        <span class="d-block bborder pb-1"> United States </span>--}}
                        {{--                                        <span class="d-block bborder pb-1"> Spanish </span>--}}
                        {{--                                        <span class="d-block "> Spain </span>--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}


                        {{--                        </div>--}}
                        {{--                    </div>--}}



                        {{--                        <div class="dropdown notification__dropdown">--}}
                        {{--                            <a href="#" class="link glose__icon globe__active" data-bs-toggle="dropdown" data-bs-offset="0,16" aria-expanded="true">--}}
                        {{--                                <i class="bi bi-chat-text"></i>--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-end " data-popper-placement="bottom-end">--}}
                        {{--                                <ul class="list">--}}
                        {{--                                    <li class="mb-16">--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f10.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                 <span class="fz-16 d-block fw-600 title inter">Alex Sandro</span>--}}
                        {{--                                 <span class="fz-14 message d-block fw-500 pra inter">Meetup Started</span>--}}
                        {{--                                 <span class="fz-10 fw-400 pra inter">6:25 am</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="mb-16">--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f9.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Haaland Jr</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Meetup Started</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">11:25 am</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="mb-16">--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f8.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Courtney Jr</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Meetup Started</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">4:45 pm</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f7.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Paquate Shaw</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Meetup Started</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">8:35 pm</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="dropdown notification__dropdown">--}}
                        {{--                            <a href="#" class="link glose__icon globe__active" data-bs-toggle="dropdown" data-bs-offset="0,14" aria-expanded="true">--}}
                        {{--                                <i class="bi bi-bell"></i>--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-end " data-popper-placement="bottom-end">--}}
                        {{--                                <ul class="list">--}}
                        {{--                                    <li class="mb-16">--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f1.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Jenny95</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Message alert!</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">10 Min ago</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li class="mb-16">--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f2.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Arle MCcoy</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Message alert!</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">1 days ago</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#" class="link d-flex dropdown-item">--}}
                        {{--                                            <img src="assets/img/frelancer/f3.png" class="notification__thumb" alt="img">--}}
                        {{--                                            <span class="notify__content">--}}
                        {{--                                    <span class="fz-16 d-block fw-600 title inter">Courtney Jr</span>--}}
                        {{--                                    <span class="fz-14 message d-block fw-500 pra inter">Message alert!</span>--}}
                        {{--                                    <span class="fz-10 fw-400 pra inter">2 Month ago</span>--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="dropdown profie__dropdown">--}}
                        {{--                            <a href="#" class="link user__active" data-bs-toggle="dropdown" data-bs-offset="0,16" aria-expanded="true">--}}
                        {{--                                <img src="assets/img/bn/profile.jpg" alt="image" class="img-fluid rounded-circle objec-fit-cover">--}}
                        {{--                            </a>--}}
                        {{--                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">--}}
                        {{--                                <div class="p-6">--}}
                        {{--                                    <div class="d-flex align-items-center gap-3 max-width">--}}
                        {{--                                        <div class="jerny__uer ralt">--}}
                        {{--                                            <img src="assets/img/bn/profile.jpg" alt="image" class="img-fluid jenny rounded-circle object-fit-cover flex-shrink-0">--}}
                        {{--                                            <i class="bi bi-check checks d-flex align-items-center justify-content-center"></i>--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="flex-grow-1">--}}
                        {{--                                            <h5 class="fz-20 fw-600 title inter mb-0">Jenny95</h5>--}}
                        {{--                                            <span class="d-block fw-400 inter pra fz-16">Info95@mail.com</span>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="switch text-center mt-4 bborderdash pb-24 mb-24">--}}
                        {{--                                        <a href="singin.html" class="cmn--btn outline__btn">--}}
                        {{--                                 <span>--}}
                        {{--                                    Switch to Buying--}}
                        {{--                                 </span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </div>--}}
                        {{--                                    <span class="fz-12 pra d-block fw-400 inter mb-16">--}}
                        {{--                              Account--}}
                        {{--                           </span>--}}
                        {{--                                    <ul class="list">--}}
                        {{--                                        <li class="mb-16">--}}
                        {{--                                            <a href="profile.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-person-check fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Profile </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="mb-16">--}}
                        {{--                                            <a href="post-request.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-file-earmark-plus fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Post a Request </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="mb-16">--}}
                        {{--                                            <a href="notification.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-bell fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Notification </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="mb-16">--}}
                        {{--                                            <a href="chat-us.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-chat-text fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Chat </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li class="mb-24">--}}
                        {{--                                            <a href="refer-friend.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-sliders2 fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Refer a Friend </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                    </ul>--}}
                        {{--                                    <span class="fz-12 pra d-block fw-400 inter mb-16">--}}
                        {{--                              Billing--}}
                        {{--                           </span>--}}
                        {{--                                    <ul class="list">--}}
                        {{--                                        <li class="mb-16">--}}
                        {{--                                            <a href="setting.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-gear fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Settings </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                        <li>--}}
                        {{--                                            <a href="payment.html" class="link d-flex align-items-center gap-2 dropdown-item">--}}
                        {{--                                                <i class="bi bi-credit-card-2-back fz-20"></i>--}}
                        {{--                                                <span class="d-block fz-16 pra fw-500 inter"> Payments </span>--}}
                        {{--                                            </a>--}}
                        {{--                                        </li>--}}
                        {{--                                    </ul>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                    </div>
                </ul>
            </div>

            <div class="header-bar d-lg-none">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    </div>


</header><!-- Header Here -->


<!-- Header End -->



