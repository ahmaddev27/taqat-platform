<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{setting('name')}} - {{@$title}}</title>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Tag (Dynamic and SEO-friendly) -->

    <!-- Meta Description (Dynamic or Default Fallback) -->
    <meta name="description"  content="{{ setting('welcome') }}">

    <!-- Meta Keywords (Optional) -->
    <meta name="keywords" content="{{ @$keywords ?? 'default, keywords, for, SEO' }}">

    <!-- Meta Robots (Crawling Instructions) -->
    <meta name="robots" content="index, follow">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ @$canonical ?? url()->current() }}">

    <!-- Open Graph Meta Tags (For Social Media) -->
    <meta property="og:title" content="{{setting('name')}}">
    <meta property="og:description"  content="{{ setting('welcome') }}">
    <meta property="og:image" content="{{url(setting('icon')) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ setting('name') }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{setting('name')}}">
    <meta name="twitter:description" content="{{ setting('welcome') }}">
    <meta name="twitter:image" content="{{url(setting('icon')) }}">
    <meta name="twitter:site" content="@YourTwitterHandle">




    @include('front.layouts.css')
</head>

<body>

<!-- Preloader Start Here -->
<div class="preloader__wrap">
    <div class="preloader__box">
        <div class="recharge">
            <img src="{{url(setting('icon'))}}" alt="rechage">
        </div>
        <span class="pretext d-block">
        {{setting('name')}}
      </span>
    </div>
</div>
<!-- Preloader End Here -->



<!-- first section header with sction one -->
<section class="banner__section bg__img1 ralt overhid ">
    <div class="header__section__attachment">
        <div class="aihire__headertop">
            <div class="container">
                <div class="haderbar__top d-flex align-items-center  justify-content-between">
                    <div class="logo__left d-flex align-items-center">
                        <a href="{{route('home')}}" class="top__logo">
                            <img src="{{url(setting('logo'))}}" style="max-width: 200px" alt="logo">
                        </a>
                        <a href="how-work.html" class="pra mdnone inter fw-400">
                            How It Works
                        </a>
                        <a href="about.html" class="pra mdnone inter fw-400">
                            Why AIHire
                        </a>
                    </div>

                    {{--                <div class="header__topsearch d-flex align-items-center">--}}
                    {{--                    <button type="button" id="searchBtn" class="d-lg-none">--}}
                    {{--                        <i class="bi bi-search"></i>--}}
                    {{--                    </button>--}}
                    {{--                    <form action="#0" class="search__form d-flex align-items-center">--}}
                    {{--                        <i class="bi bi-search"></i>--}}
                    {{--                        <input type="text" placeholder="Search">--}}
                    {{--                        <select name="talent">--}}
                    {{--                            <option value="1">--}}
                    {{--                                Talent--}}
                    {{--                            </option>--}}
                    {{--                            <option value="1">--}}
                    {{--                                Hire Me--}}
                    {{--                            </option>--}}
                    {{--                            <option value="1">--}}
                    {{--                                Professional--}}
                    {{--                            </option>--}}
                    {{--                        </select>--}}
                    {{--                    </form>--}}
                    {{--                    <a href="project.html" class="cmn--btn">--}}
                    {{--                     <span>--}}
                    {{--                        Post a Project--}}
                    {{--                     </span>--}}
                    {{--                    </a>--}}
                    {{--                </div>--}}
                </div>
            </div>
        </div>
        <header class="header-section">
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
                            <a href="#">
                                Contact
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
                            <a href="javascript:void(0)">
                                Find Talent
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li class="subtwohober">
                                    <a href="freelancer.html">Freelancer</a>
                                </li>
                                <li>
                                    <a href="freelancer-details.html">Freelancer Details</a>
                                </li>
                            </ul>
                        </li>
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
                        <div class="menu__components d-flex align-items-center">
                            <div class="dropdown">
                                <a href="#" class="link glose__icon d-flex align-items-center" data-bs-toggle="dropdown" data-bs-offset="0,14" aria-expanded="true">
                                    <i class="bi bi-globe"></i>
                                </a>
                                <div class="dropdown-menu dropdown-start" data-popper-placement="bottom-start">
                                    <ul class="list">
                                        <li>
                                            <a href="#" class="link d-inline-block dropdown-item">
                                                <span class="d-block bborder pb-1"> English </span>
                                                <span class="d-block bborder pb-1"> United States </span>
                                                <span class="d-block bborder pb-1"> Spanish </span>
                                                <span class="d-block "> Spain </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>



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

                        <div class="header-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>

    <div class="container">
        <div class="banner__content__wrapper pt-50 pb-50">

            @if(request()->routeIs('home'))
                @include('front.sections.section1')
            @endif


        </div>
    </div>

    <!--Elements-->
    <img src="{{asset('front/assets/img/bn/aiman.png')}}" class="element__man" alt="element">
    <img src="{{asset('front/assets/img/bn/dhaedh-single.png')}}" class="element__single" alt="element">
    <img src="{{asset('front/assets/img/bn/aibrain.png')}}" class="element__brain" alt="element">
    <img src="{{asset('front/assets/img/bn/dashed-dobble.png')}}" class="element__doubble" alt="element">
    <img src="{{asset('front/assets/img/bn/line-dash.png')}}" class="element__dash" alt="element">
    <img src="{{asset('front/assets/img/bn/airound.png')}}" class="element__round" alt="element">
    <!--Elements-->
</section>
<!-- first section  End -->

@yield('content')


<!--Footer Section-->
@include('front.layouts.footer')
<!--Footer Section-->


@include('front.layouts.js')
</body>

</html>
