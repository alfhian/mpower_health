@extends('layouts.main')

@section('content')
    <div class="container my-5 py-5">
        <div class="row">
            <div class="col text-center">
                <h5 class="redhat text-purple spacing-1"><b>FORGOT PASSWORD</b></h5>
                <p class="med-text text-muted mb-4">
                    Enter your email address and to receive a password reset link
                </p>
                <div class="mb-4">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="100"
                        width="100" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: #8DC63F;
                            }
                        </style>
                        <path class="st0"
                            d="M12,0C9.2,0,7,2.2,7,5v2H5.8C4.8,7,4,7.8,4,8.8v11.5c0,1,0.8,1.8,1.8,1.8h12.5c1,0,1.8-0.8,1.8-1.8V8.8
	c0-1-0.8-1.8-1.8-1.8H17V5C17,2.2,14.8,0,12,0z M12,1.5c1.9,0,3.5,1.6,3.5,3.5v2h-7V5C8.5,3.1,10.1,1.5,12,1.5z M12,10
	c0.2,0,0.3,0,0.5,0.1c0.9,0.2,1.7,0.9,1.9,1.9c0.3,1.2-0.3,2.3-1.4,2.8c-0.2,0.1-0.3,0.3-0.3,0.5c0,0.4-0.3,0.8-0.8,0.8
	s-0.8-0.3-0.8-0.8c0-0.8,0.5-1.5,1.2-1.8c0.3-0.2,0.7-0.6,0.5-1.2c-0.1-0.4-0.4-0.7-0.7-0.7c-0.3-0.1-0.6,0-0.8,0.1
	c-0.2,0.2-0.4,0.4-0.4,0.7c-0.1,0.4-0.4,0.7-0.9,0.6c-0.4-0.1-0.7-0.4-0.6-0.9c0.1-0.7,0.5-1.3,1.1-1.7C11,10.1,11.5,10,12,10z
	 M12,17c0.6,0,1,0.5,1,1s-0.4,1-1,1s-1-0.5-1-1S11.4,17,12,17z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center mb-4 redhat">
            <div class="col text-center med-text text-muted">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <x-jet-validation-errors class="mb-4" />
            </div>
        </div>

        <form method="POST" action="/forgot-password">
            @csrf
            <div class="row d-flex justify-content-center mb-4 redhat">
                <div class="col-sm-2 med-text">
                    <label for="email" class="form-label text-purple"><b>Your Email</b></label>
                </div>
                <div class="col-sm-4 redhat">
                    <input id="email" class="form-control form-control-sm input-gray" type="email" name="email"
                        :value="old('email')" required autofocus />
                </div>
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <button type="button" class="btn redhat w-100 bg-purple text-white mb-2" id="submit-forgot-password" onclick="submitForgotPassword('forgot_password_attempt')">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
