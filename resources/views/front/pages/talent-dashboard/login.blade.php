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

                        <form class="write__review" method="post" action="{{route('talent.login')}}">
                            @csrf

                            <div class="row g-4 ">
                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label for="enamee" class="fz-18 fw-500 inter title mb-16">Enter Your Email
                                            ID</label>
                                        <input type="email" id="email"
                                               class="@error('email') is-invalid @email @enderror"
                                               name="email" autocomplete="off" placeholder="Enter Your Email...">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="frm__grp">
                                        <label for="pas" class="fz-18 fw-500 inter title mb-16">Enter Your
                                            Password</label>
                                        <input id="password" type="password" name="password"
                                               class="@error('password') is-invalid @enderror"
                                               placeholder="Enter Your Password...">


                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                             </span>
                                        @enderror

                                        <a href="#" class="base fz-14 inter d-flex justify-content-end mt-2">Forget
                                            password</a>
                                    </div>
                                </div>
                                <p class="fz-16 fw-400 title inter">
                                    Do you have an account? <a href="signup.html" class="base">Signup</a>
                                </p>

                                <div class="col-lg-6">
                                    <div class="frm__grp">
                                        <button type="submit" class="cmn--btn basebor outline__btn">
                                            <span>
                                                Sign In
                                            </span>
                                            <span>
                                                <i class="bi bi-arrow-up-right"></i>
                                            </span>

                                        </button>


                                        <button type="submit" class="cmn--btn basebor outline__btn" >

                                            <span>
                                                <i class="bi bi-google"></i>
                                            </span>

                                            <span>
                                                Google
                                            </span>

                                        </button>
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
    <script>
            $(document).ready(function () {
            $(".write__review").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address.",
                        email: "Please enter a valid email address."
                    },
                    password: {
                        required: "Please enter your password.",
                        minlength: "Your password must be at least 6 characters long."
                    }
                },
                errorElement: "span",
                errorClass: "error",
                highlight: function (element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    $(element).removeClass("is-invalid");
                },
                invalidHandler: function (event, validator) {
                    // Check if any errors exist
                    if (validator.errorList.length) {
                        toastr.error('Please correct the errors before submitting the form.');
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>

@endpush
@stop
