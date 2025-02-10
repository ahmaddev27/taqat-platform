@extends('front.layouts.master', ['title' => 'Register'])
@section('content')

    @push('css')
        <style>
            .error {
                color: red;
                font-size: 14px;
                margin-top: 4px;
            }

            .is-invalid {
                border-color: red;
            }

            .password-toggle {
                position: relative;
            }

            .password-toggle .toggle-icon {
                position: absolute;
                right: 10px;
                top: 55%;
                transform: translateY(-50%);
                cursor: pointer;
            }

            .switch {
                position: relative;
                display: inline-block;
                width: 50px;
                height: 30px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                transition: .4s;
                border-radius: 16px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 20px;
                width: 20px;
                left: 8px;
                bottom: 4px;
                background-color: white;
                transition: .4s;
                border-radius: 16px;
            }

            input:checked + .slider {
                background-color: #2196F3;
            }

            input:checked + .slider:before {
                transform: translateX(16px);
            }
        </style>
    @endpush

    <section class="signup__section ralt bg__all pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="signup__boxes round16 border">
                        <h3 class="title mb-16">Create an Account</h3>
                        <p class="fz-16 title fw-400 inter mb-40"> Please enter your details to register </p>

                        <div class="text-start mb-3 frm__grp">
                            <span id="registerText" class="base fz-14 inter mt-2">Company Register?</span>
                            <label class="switch">
                                <input type="checkbox" id="registerSwitch" {{request()->company?'checked':''}}>
                                <span class="slider"></span>
                            </label>
                        </div>

                        <form id="registerForm" class="write__review" method="post" action="{{ route('register') }}">
                            @csrf

                            <input type="hidden" id="register_type" name="register_type" value="talent">

                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label class="fz-18 fw-500 inter title mb-16">Full Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Your Name..." class="@error('name') is-invalid @enderror">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label class="fz-18 fw-500 inter title mb-16">Email</label>
                                        <input type="email" id="email" name="email" placeholder="Enter Your Email..." class="@error('email') is-invalid @enderror">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="frm__grp password-toggle">
                                        <label class="fz-18 fw-500 inter title mb-16">Password</label>
                                        <input id="password" type="password" name="password" placeholder="Enter Your Password..." class="@error('password') is-invalid @enderror">
                                        <span class="toggle-icon text-dark mt-3" onclick="togglePassword('password')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="frm__grp password-toggle">
                                        <label class="fz-18 fw-500 inter title mb-16">Confirm Password</label>
                                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Your Password...">
                                        <span class="toggle-icon text-dark mt-3" onclick="togglePassword('password_confirmation')">
                                            <i class="bi bi-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="frm__grp">
                                        <button type="submit" class="cmn--btn basebor outline__btn">
                                            <span id="spinner" class="spinner-border spinner-border-sm" style="display: none"></span>
                                            <span id="registerButtonText">Sign Up</span>
                                        </button>

                                        <a href="{{route('auth.google')}}" title="Sign as talent with google">
                                            <button type="button" class="cmn--btn basebor outline__btn ">
                                                <span><i class="bi bi-google"></i></span>
                                                <span>Google</span>
                                            </button>
                                        </a>
                                    </div>


                                </div>

                                <p class="fz-16 fw-400 title inter">
                                    Already have an account? <a href="{{route('login')}}" class="base">Login</a>
                                </p>



                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="signup__thumb">
                        <img src="{{ asset('front/assets/img/faq/signup.png') }}" class="w-100" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            $('#registerSwitch').change(function () {
                $('#register_type').val(this.checked ? 'company' : 'talent');
            });


            $(document).ready(function () {
                $('#registerForm').submit(function (e) {
                    e.preventDefault();
                    var form = $(this);
                    var registerType = $('#registerSwitch').is(':checked') ? 'company' : 'talent';
                    var formData = form.serialize() + '&register_type=' + registerType;

                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();
                    $('#spinner').show();

                    $.ajax({
                        url: form.attr('action'),
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            toastr.success('Signup successful. Redirecting...');
                            window.location.href = response.redirect;
                        },
                        error: function (xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $.each(errors, function (field, messages) {
                                    var input = $('[name="' + field + '"]');
                                    input.addClass('is-invalid');
                                    input.after('<span class="invalid-feedback" role="alert"><strong>' + messages[0] + '</strong></span>');
                                });
                            } else {
                                toastr.error(xhr.responseJSON.message || 'Signup failed. Please try again.');
                            }
                        },
                        complete: function() {
                            $('#spinner').hide();
                            $('#registerButtonText').text('Sign Up');
                        }
                    });
                });
            });


            function togglePassword(id) {
                var input = document.getElementById(id);
                var icon = input.nextElementSibling.querySelector("i");
                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.replace("bi-eye", "bi-eye-slash");
                } else {
                    input.type = "password";
                    icon.classList.replace("bi-eye-slash", "bi-eye");
                }
            }


        </script>
    @endpush
@stop
