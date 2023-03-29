@extends('layouts.main')

@section('content')
    <div class="container content-body my-5 py-5">
        <div class="row">

            <div class="col">
                <div class="text-center">
                    <h5 class="redhat text-purple spacing-1 mb-4"><b>CHANGE PASSWORD</b></h5>
                </div>

                <form method="POST" action="{{ route('password.update') }}" id="reset-password-form">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="row d-flex justify-content-center mb-4 redhat">
                        <div class="col-sm-2 med-text">
                            <label for="email" class="form-label text-purple"><b>Email</b></label>
                        </div>
                        <div class="col-sm-4 redhat">
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $request->email)" required autofocus />
                            @error('email')
                                <div class="redhat text-danger small-text mt-1 spacing-1">
                                    <span>{{ json_decode($errors)->email[0] }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mb-4 redhat">
                        <div class="col-sm-2 med-text">
                            <label for="password" class="form-label text-purple"><b>Password</b></label>
                        </div>
                        <div class="col-sm-4 redhat">
                            <div class="d-flex align-items-center">
                                <div class="input-group pe-2">
                                    <input id="password" class="form-control form-control-sm input-gray" type="password"
                                        name="password" required autocomplete="new-password" />
                                    <button class="btn btn-sm input-gray" type="button" id="button-visible1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                            fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                            <path
                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="px-1 py-0 bg-transparent border-0" id="psw-tooltip"
                                    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-trigger="manual"
                                    data-bs-html="true"
                                    data-bs-title="<b></b>Password must:<ul><li>Be a minimun 8 characters</li><li>Include at least one lowercase letter (a-z)</li><li>Include at least one uppercase letter (A-Z)</li><li>Include at least one number (0-9)</li><li>Include at least one special character</li></ul>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-question-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z" />
                                    </svg>
                                </button>
                            </div>
                            @error('email')
                                <div class="redhat text-danger small-text mt-1 spacing-1">
                                    <span>{{ json_decode($errors)->email[0] }}</span>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="row d-flex justify-content-center mb-4 redhat">
                        <div class="col-sm-2 med-text">
                            <label for="password_confirmation" class="form-label text-purple"><b>Confirm
                                    Password</b></label>
                        </div>
                        <div class="col-sm-4 redhat">
                            <div class="input-group">
                                <input id="password_confirmation" class="form-control form-control-sm input-gray"
                                    type="password" name="password_confirmation" required autocomplete="new-password" />
                                <button class="btn btn-sm input-gray" type="button" id="button-visible2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path
                                            d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg>
                                </button>
                            </div>
                            <div id="pswconfirm_message" class="redhat small-text text-danger mt-2 spacing-half"
                                style="display: none">
                                <span>Password do not match</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn redhat bg-purple text-white mb-2">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
