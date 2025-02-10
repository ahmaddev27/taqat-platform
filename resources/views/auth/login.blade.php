@extends('front.layouts.master', ['title' => 'Login'])
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
                        <h3 class="title mb-16">
                            Welcome Back!
                        </h3>
                        <p class="fz-16 title fw-400 inter mb-40">
                            Sign in to your account and join us
                        </p>



                        <form id="loginForm" class="write__review" method="post" action="{{route('talent.login')}}">
                            @csrf

                            <div class="row g-4 ">
                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label for="enamee" class="fz-18 fw-500 inter title mb-16">Enter Your Email ID</label>
                                        <input type="email" id="email" name="email" autocomplete="off" placeholder="Enter Your Email..." class="@error('email') is-invalid @enderror">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label for="pas" class="fz-18 fw-500 inter title mb-16">Enter Your Password</label>
                                        <input id="password" type="password" name="password" placeholder="Enter Your Password..." class="@error('password') is-invalid @enderror">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                        <a href="#" class="base fz-14 inter d-flex justify-content-end mt-2">Forget password</a>
                                        <div class="text-start mb-3 frm__grp">
                                            <span id="loginText" class="base fz-14 inter mt-2">Company Login ?</span>
                                            <label class="switch">
                                                <input type="checkbox" id="loginSwitch">
                                                <span class="slider"></span>
                                            </label>
                                        </div>

                                    </div>


                                </div>
                                <p class="fz-16 fw-400 title inter">
                                    Do you have an account? <a href="{{route('register')}}" class="base">Signup</a>
                                </p>

                                <div class="col-lg-6">
                                    <div class="frm__grp">
                                        <button type="submit" id="loginButton" class="cmn--btn basebor outline__btn">
                                            <span id="spinner" class="spinner-border spinner-border-sm " style="display: none"></span>
                                            <span id="loginButtonText">Sign In</span>

{{--                                            <span><i class="bi bi-arrow-up-right"></i></span>--}}
                                        </button>

                                        <a href="{{route('auth.google')}}">
                                        <button type="button" class="cmn--btn basebor outline__btn ">
                                            <span><i class="bi bi-google"></i></span>
                                            <span>Google</span>
                                        </button>

                                        </a>
                                    </div>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="signup__thumb">
                        <img src="{{asset('front/assets/img/faq/signup.png')}}" class="w-100" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('js')

        @push('js')
            <script>
                $(document).ready(function () {
                    $("#loginSwitch").change(function () {
                        var loginRoute = this.checked ? "{{ route('company.login') }}" : "{{ route('talent.login') }}";
                        $("#loginForm").attr("action", loginRoute);
                        console.log("Login form action set to: " + loginRoute);
                    });

                    $("#loginForm").submit(function (e) {
                        e.preventDefault();
                        var form = $(this);

                        // Show spinner and change button text
                        $("#spinner").show();

                        $.ajax({
                            url: form.attr("action"),
                            type: "POST",
                            data: form.serialize(),
                            success: function (response) {
                                toastr.success("Login successful. Redirecting...");
                                window.location.href = response.redirect;
                            },
                            error: function (xhr) {
                                toastr.error(xhr.responseJSON.message || "Login failed. Please try again.");
                            },
                            complete: function() {
                                // Hide the spinner and reset the button text after completion
                                $("#spinner").hide();
                                $("#loginButtonText").text("Sign In");
                            }
                        });
                    });
                });
            </script>
        @endpush

    @endpush
@stop
