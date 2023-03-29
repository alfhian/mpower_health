@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-3 p-0 pt-5">
        <div class="row m-0">
            <div class="col-lg-8 p-0">
                <div class="position-relative">
                    <img src="{{ asset('img/sign-in-page/image-1.png') }}" alt="sign-in" width="100%">
                    <div class="position-absolute sign-in-box">
                        <div class="w-75">
                            <img src="{{ asset('/img/sign-in-page/sign-in-box.png') }}" width="100%">
                            <div class="position-absolute w-75 sign-in-text">
                                <h3 class="redhat text-purple">
                                    <b>MPower yourself today.<br>
                                        Get recommendations.</b>
                                </h3>
                                <p class="redhat text-muted med-text">
                                    Elevate your health with MPower's expert guidance and personalized recommendations.
                                </p>
                            </div>
                        </div>
                        <!--<button class="btn bg-green shadow sato small-text text-white spacing-1 my-2 px-4"
                                    onclick="window.location = 'register'">Register Now</button>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex">
                <div class="w-75 mt-5 pt-5 ps-5">
                    @if (session('status'))
                        <div class="alert p-2 alert-success alert-dismissible fade show" id="message-alert" role="alert">
                            <strong class="redhat med-text">{{ session('status') }}</strong>
                            <button type="button" class="btn-close small-text" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert p-2 alert-danger alert-dismissible fade show" id="message-alert" role="alert">
                            <strong class="redhat med-text">{{ $message }}</strong>
                            <button type="button" class="btn-close small-text" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <h4 class="redhat text-purple spacing-1 mb-4"><b>Sign In</b></h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="redhat med-text">
                            <label for="email" class="form-label text-purple">E-mail</label>
                            <input id="email" class="form-control form-control-sm redhat input-gray mb-4" type="email"
                                name="email" required />

                            <label for="password" class="form-label text-purple">Password</label>
                            <input id="password" class="form-control form-control-sm redhat input-gray mb-3"
                                type="password" name="password" required autocomplete="current-password" />
                            <div class="my-2 d-flex justify-content-end">
                                <a href="forgot-password" class="small-text text-blue text-decoration-none"><b>Forgot
                                        Password?</b></a>
                            </div>
                            <!--
                                        <a href="forgot-password" class="sato small-text text-blue text-decoration-none spacing-1"><b>Forgot Password?</b></a>
                                        -->

                            <button class="btn w-100 bg-purple shadow redhat small-text text-white spacing-1 my-2"><b>SIGN
                                    IN</b></button>

                            <!--
                                        <span class="redhat small-text text-purple">Need an account?</span><a href="#" class="sato small-text text-blue text-decoration-none spacing-1 ps-1"><b>Sign Up</b></a>
                                        -->

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#verificationNotif').modal('show');
        });
    </script>
@endsection
