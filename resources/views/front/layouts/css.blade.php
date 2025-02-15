<!--Favicon img-->
<link rel="shortcut icon" href="{{url(setting('icon'))}}">
<!--Bootstarp min css-->
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">
<!--Bootstarp icon min css-->
<link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.css.map')}}">
<!--main css-->
<link rel="stylesheet" href="{{asset('front/assets/css/main.css')}}">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet"/>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css">
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>


<style>

    .fade-my{
        opacity: 0.3;
    }

    .preloader__wrap .preloader__box .recharge {
        width: 100px;
    }


    .preloader__wrap .preloader__box .pretext {
        font-size: 25px;
        margin-top: 129px;

    }

    .shadow2 {
        box-shadow:0 .125rem .25rem rgba(0,0,0,.075)!important
    }
    .error {
        color: red;
        /*font-size: 12px;*/
        margin-top: 2px;
    }

    .bg-light2{
        background-color: #f8f9fc !important;
    }
    .loader {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: inline-block;
        border-top: 4px solid #c5c8cc;
        border-right: 4px solid transparent;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
    }

    .loader::after {
        content: '';
        box-sizing: border-box;
        position: absolute;
        left: 0;
        top: 0;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        border-left: 4px solid #197dbb;
        border-bottom: 4px solid transparent;
        animation: rotation 0.5s linear infinite reverse;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .cate__items {
        padding: 32px 44px;
        transition: all 0.4s
    }

    /* No Borders Class */
    .no-border {
        border: none !important;
        box-shadow: none;
    }

    .profile__check img {
              padding: 0px;
    }
    .overview__showcasewrap {
        transform: translateY(0px);
    }
    .modal-content{
        border-radius: 16px;
    }

    .swal2-confirm,
    .swal2-cancel ,.swal2-popup{
        border-radius: 100px !important;
    }

   .swal2-popup{
        border-radius: 50px !important;
    }
    .base0 {
        color: var(--base);
    }

    .base1 {
        color: var(--base);
    }

    .btn-outline-danger, .btn-outline-primary {
        border-color: floralwhite;
    }


    .swal2-show {
        animation: swal2-show 0.7s;
    }

    /* Background color for success */
    .toast-success {
        background-color: #0d47a1 !important;
        color: #fff;
    }

    /* Background color for error */
    .toast-error {
        background-color: #dc3545 !important;
        color: #fff;
    }

    /* Background color for warning */
    .toast-warning {
        background-color: #f88448 !important;
        color: #212529;
    }

    /* Background color for info */
    .toast-info {
        background-color: #407179 !important;
        color: #fff;
    }

    /* Customize the title text */
    .toast-title {
        font-weight: bold;
        font-size: 16px;
    }

    /* Customize the message text */
    .toast-message {
        font-size: 14px;
    }

    /* Add custom border-radius */
    .toast {
        border-radius: 8px !important;
    }

    /* Add box-shadow */
    .toast {
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1) !important;
    }


    .loading-placeholder {
        display: flex;
        flex-wrap: wrap;
    }

    .frelancer__item.loading {
        background-color: #f0f0f0; /* Light grey to indicate loading */
    }

    .placeholder-avatar, .placeholder-text, .placeholder-box, .placeholder-placeholder {
        background-color: #ddd;
        animation: shimmer 1.5s infinite linear;
        border-radius: 4px;
    }

    .placeholder-avatar {
        width: 100px;
        height: 100px;
        margin: 0 auto;
    }

    .placeholder-text {
        width: 60%;
        height: 20px;
        margin: 10px auto;
    }

    .placeholder-box {
        width: 50px;
        height: 30px;
        margin: 0 auto;
    }

    @keyframes shimmer {
        0% {
            background-color: #e0e0e0;
        }
        50% {
            background-color: #f7f7f7;
        }
        100% {
            background-color: #e0e0e0;
        }
    }


</style>

@stack('css')
