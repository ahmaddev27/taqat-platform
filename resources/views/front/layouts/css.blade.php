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

</style>

@stack('css')
