<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{setting('name')}} - {{@$title}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
<section id="banner" class="banner__section bg__img1 ralt">
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

{{--                                    <div class="header__topsearch d-flex align-items-center">--}}
{{--                                        <button type="button" id="searchBtn" class="d-lg-none">--}}
{{--                                            <i class="bi bi-search"></i>--}}
{{--                                        </button>--}}
{{--                                        <form action="#0" class="search__form d-flex align-items-center">--}}
{{--                                            <i class="bi bi-search"></i>--}}
{{--                                            <input type="text" placeholder="Search">--}}
{{--                                            <select name="talent">--}}
{{--                                                <option value="1">--}}
{{--                                                    Talent--}}
{{--                                                </option>--}}
{{--                                                <option value="1">--}}
{{--                                                    Hire Me--}}
{{--                                                </option>--}}
{{--                                                <option value="1">--}}
{{--                                                    Professional--}}
{{--                                                </option>--}}
{{--                                            </select>--}}
{{--                                        </form>--}}
{{--                                        <a href="project.html" class="cmn--btn">--}}
{{--                                         <span>--}}
{{--                                            Post a Project--}}
{{--                                         </span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                </div>
            </div>
        </div>



       @include('front.layouts.header')

    </div>
    @if(request()->routeIs('home'))
    <div class="container">
        <div  class="banner__content__wrapper pt-50 pb-50">


                {{--section1--}}
                @include('front.sections.section1')



        </div>
    </div>

    @endif

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
