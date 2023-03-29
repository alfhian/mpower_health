@extends('layouts.main')

@section('content')
    <div class="container-fluid sign-up-container mt-5 p-0">
        <div class="row m-0">
            <div class="col-8 d-flex justify-content-center py-5">
                <div>
                    <h4 class="sato text-purple text-center spacing-1 mb-3"><b>REGISTRATION</b></h4>
                    <form method="POST" action="{{ route('register') }}" id="register-form" class="needs-validation"
                        novalidate>
                        @csrf
                        <div class="container redhat med-text">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="firstname" class="form-label text-purple m-0"><b>First Name
                                            <sup>*</sup></b></label>
                                    <input id="firstname" class="form-control form-control-sm input-gray" type="text"
                                        name="firstname" :value="old('firstname')" required autocomplete="firstname" />
                                    <div id="firstname_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('firstname')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->firstname[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="lastname" class="form-label text-purple m-0"><b>Last Name
                                            <sup>*</sup></b></label>
                                    <input id="lastname" class="form-control form-control-sm input-gray" type="text"
                                        name="lastname" :value="old('lastname')" required />
                                    <div id="lastname_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('lastname')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->lastname[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email_registration" class="form-label text-purple m-0"><b>Email Address
                                            <sup>*</sup></b></label>
                                    <input id="email_registration" class="form-control form-control-sm input-gray"
                                        type="email" name="email" required />
                                    <div id="email_registration_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @if ($errors->any())
                                        @if (json_decode($errors)->email[0] == 'The email field is required.' ||
                                                json_decode($errors)->email[0] == 'The email must be a valid email address.' ||
                                                json_decode($errors)->email[0] == 'The email has already been taken.')
                                            <div class="redhat text-danger small-text mt-1 spacing-1" id="email-error">
                                                <span>{{ json_decode($errors)->email[0] }}</span>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="row position-relative mb-3">
                                <div class="col-6" style="z-index: 50">
                                    <label for="password" class="form-label text-purple m-0"><b>Password
                                            <sup>*</sup></b></label>
                                    <div class="d-flex align-items-center">
                                        <div class="input-group pe-2">
                                            <input id="password" class="form-control form-control-sm input-gray"
                                                type="password" name="password" aria-describedby="button-visible1"
                                                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                                                required />
                                            <button class="btn btn-sm input-gray" type="button" id="button-visible1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                    fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                    <path
                                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="password_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                </div>
                                <div class="col-6" style="z-index: 50">
                                    <label for="password_confirmation" class="form-label text-purple m-0"><b>Confirm
                                            Password
                                            <sup>*</sup></b></label>
                                    <div class="input-group">
                                        <input id="password_confirmation" class="form-control form-control-sm input-gray"
                                            type="password" name="password_confirmation" required />
                                        <button class="btn btn-sm input-gray" type="button" id="button-visible2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                <path
                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div id="pswconfirm_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span>Password do not match</span>
                                    </div>
                                </div>
                                <div class="position-absolute">
                                    <button type="button" class="px-1 py-0 float-end bg-transparent border-0" style="margin-right: -2rem; margin-top: 1.5rem;" id="psw-tooltip"
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
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="phone" class="form-label text-purple m-0"><b>Phone Number
                                            <sup>*</sup></b></label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text" id="phone-code-label">+1</span>
                                        <input id="phone_number" class="float-end form-control form-control-sm input-gray"
                                            type="text" name="phone_number" id="phone_number" size="15"
                                            required />
                                    </div>

                                    <div id="phone_number_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('phone_number')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->phone_number[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="birthdate" class="form-label text-purple m-0"><b>Date of Birth
                                            <sup>*</sup></b></label>
                                    <input id="birthdate" class="form-control form-control-sm input-gray" type="date"
                                        name="birthdate" required />
                                    <div id="birthdate_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('birthdate')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->birthdate[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg">
                                    <label for="street_address" class="form-label text-purple"><b>Street Address
                                            <sup>*</sup></b></label>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-lg">
                                    <input id="street_address" class="form-control form-control-sm input-gray"
                                        type="text" name="street_address" required />
                                    <div id="street_address_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('street_address')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->street_address[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg">
                                    <input id="street_address_2" class="form-control form-control-sm input-gray"
                                        type="text" name="street_address_2" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg-4">
                                    <label for="city" class="form-label text-purple"><b>City <sup>*</sup></b></label>
                                    <input id="city" class="form-control form-control-sm input-gray" type="text"
                                        name="city" required />
                                    <div id="city_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('city')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->city[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="state_province"
                                        class="form-label text-purple"><b>State/Province</b></label>
                                    <input id="state_province" class="form-control form-control-sm input-gray"
                                        type="text" name="state_province" />
                                </div>
                                <div class="col-lg-4">
                                    <label for="postal_code" class="form-label text-purple"><b>Zip/Postal Code
                                            <sup>*</sup></b></label>
                                    <input id="postal_code" class="form-control form-control-sm input-gray"
                                        type="text" name="postal_code" required />
                                    <div id="postal_code_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('postal_code')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->postal_code[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-lg">
                                    <label for="country" class="form-label text-purple"><b>Country
                                            <sup>*</sup></b></label><br>
                                    <select name="country" id="country"
                                        class="form-control form-control-sm select input-gray"
                                        style="background-color: #e9eef0;" required>
                                    </select>
                                    <div id="country_message" class="redhat small-text text-danger spacing-half"
                                        style="display: none">
                                        <span></span>
                                    </div>
                                    @error('country')
                                        <div class="redhat text-danger small-text mt-1 spacing-1">
                                            <span>{{ json_decode($errors)->country[0] }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <input type="checkbox" class="form-check-input me-2" name="read" id="policy-check">
                                <span class="redhat med-text">I've read the <span class="text-blue"
                                        style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#termsModal">Terms
                                        and Conditions</span> and <span class="text-blue" style="cursor: pointer"
                                        data-bs-toggle="modal" data-bs-target="#ppModal">Privacy
                                        Policy</span> and am willing to proceed.</span>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn bg-purple small-text text-white me-2 py-2">
                                    <div class="d-flex justify-content-center align-item-center">
                                        <div class="pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="pe-4 redhat spacing-1">
                                            <b>AGREE AND REGISTER</b>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-4 sign-up-background py-5">
                <div class="w-100">
                    <img src="{{ asset('/img/sign-up-page/green-dots.png') }}" width="12%"><br>
                    <img src="{{ asset('/img/sign-up-page/purple-dots.png') }}" width="12%" class="mt-2">
                </div>
            </div>
        </div>
    </div>
@endsection
