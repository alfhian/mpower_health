<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="refresh" content="{{ config('session.lifetime') * 60 + 1 }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <title>MPower Health</title>

</head>

<body>
    @include('layouts.navbar')
    <!-- Modal -->
    <!-- Sing in modal -->
    <div class="modal fade" id="signInModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="sato text-purple text-center mb-4"><b>Sign In</b></h5>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if ($errors->any())
                            @if (property_exists(json_decode($errors), 'email'))
                                @if (json_decode($errors)->email[0] != 'The email field is required.' && json_decode($errors)->email[0] != 'The email must be a valid email address.' && json_decode($errors)->email[0] != 'The email has already been taken.' && json_decode($errors)->email[0] != "We can't find a user with that email address.")
                                    <div class="redhat text-danger small-text mb-2 spacing-1 text-center">
                                        <span>{{ json_decode($errors)->email[0] }}</span>
                                    </div>
                                @endif
                            @endif
                        @endif
                        <div class="mb-2">
                            <label for="email-login" class="form-label redhat small-text text-purple"
                                style="margin-left: 10px;"><b>E-mail</b></label>
                            <input type="email" class="form-control form-control-sm input-gray  "
                                style="margin-top: -15px;" id="email-login" name="email" required>
                        </div>
                        <div>
                            <label for="password-login" class="form-label redhat small-text text-purple"
                                style="margin-left: 10px;"><b>Password</b></label>
                            <input type="password" class="form-control form-control-sm input-gray" id="password-login"
                                name="password" style="margin-top: -15px;"required>
                        </div>
                        <div class="my-2 d-flex justify-content-end">
                            <a href="{{ route('password.request') }}"
                                class="sato small-text text-blue text-decoration-none spacing-1"><b>Forgot
                                    Password?</b></a>
                        </div>
                        <div class="w-100 my-2">
                            <button class="btn w-100 bg-purple sato small-text text-white spacing-1">SIGN IN</button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <span class="redhat xsmall-text text-purple">Need an account?</span><a href="/register"
                                class="sato small-text text-blue text-decoration-none spacing-1 ps-1"><b>Sign
                                    Up</b></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Sign out modal -->
    <div class="modal fade" id="signOutModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ url('/logout') }}" method="post" id="sign_out_form">
                        @csrf
                        <div class="w-100 text-center">
                            <span class="redhat med-text text-purple soacing-1"><b>Are you sure to sign out?</b></span>
                            <br>
                            <div class="redhat mt-3">
                                <button class="btn btn-sm bg-purple med-text text-white shadow px-5 me-4">Yes</button>
                                <button type="button" class="btn btn-sm bg-white med-text text-purple shadow px-5"
                                    data-bs-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning modal -->
    <div class="modal fade" id="warningModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="WarningModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 py-3">
                        <p class="redhat text-center" id="warning-description">

                        </p>
                        <div class="d-flex justify-content-center">
                            <a type="button" class="w-50 btn btn-sm bg-purple shadow redhat small-text text-white me-2 py-2"
                                data-bs-toggle="modal" id="close-warning" href="">
                                <b>CLOSE</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option modal -->
    <div class="modal fade" id="optionModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="w-100 text-center">
                        <span class="redhat med-text text-purple soacing-1"><b>Are you sure you want to <span
                                    id="action-text"></span> this data?</b></span>
                        <br>
                        <div class="redhat mt-3">
                            <button class="btn btn-sm bg-purple med-text text-white shadow px-5 me-4"
                                id="option-yes">Yes</button>
                            <button type="button" class="btn btn-sm bg-white med-text text-purple shadow px-5"
                                data-bs-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Terms modal -->
    <div class="modal fade" id="termsModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="TermsAndAgreements" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 py-3">
                        <h6 class="redhat text-purple mb-3"><b>TERMS OF SERVICE</b></h6>
                        <div class="redhat med-text">
                            <p>
                                TERMS OF SERVICE
                            </p>
                            <p>
                                Last updated January 01, 2023
                            </p>
                            <p>
                                This privacy notice for Company Name ("Company," "we," "us," or "our"), describes how
                                and
                                why we might collect, store, use, and/or share ("process") your information when you use
                                our
                                services ("Services"), such as when you:
                                Visit our website, or any website of ours that links to this privacy notice
                                Engage with us in other related ways, including any sales, marketing, or events
                                Questions or concerns? Reading this privacy notice will help you understand your privacy
                                rights and choices. If you do not agree with our policies and practices, please do not
                                use
                                our Services. If you still have any questions or concerns, please contact us at
                                __________.
                            </p>
                            <p>
                                SUMMARY OF KEY POINTS
                                This summary provides key points from our privacy notice, but you can find out more
                                details
                                about any of these topics by clicking the link following each key point or by using our
                                table of contents below to find the section you are looking for. You can also click here
                                to
                                go directly to our table of contents.
                                What personal information do we process?
                                When you visit, use, or navigate our Services, we may process personal information
                                depending
                                on how you interact with Company Name and the Services, the choices you make, and the
                                products and features you use. Click here to learn more.
                                Do we process any sensitive personal information?
                                We may process sensitive personal information when necessary with your consent or as
                                otherwise permitted by applicable law. Click here to learn more.
                            </p>
                            <p>
                                Do we receive any information from third parties?
                                We do not receive any information from third parties.
                            </p>
                            <p>
                                How do we process your information?
                                We process your information to provide, improve, and administer our Services,
                                communicate
                                with you, for security and fraud prevention, and to comply with law. We may also process
                                your information for other purposes with your consent. We process your information only
                                when
                                we have a valid legal reason to do so. Click here to learn more.
                            </p>
                            <p>
                                In what situations and with which parties do we share personal information?
                                We may share information in specific situations and with specific third parties. Click
                                here
                                to learn more.
                            </p>
                            <p>
                                How do we keep your information safe?
                                We have organizational and technical processes and procedures in place to protect your
                                personal information. However, no electronic transmission over the internet or
                                information
                                storage technology can be guaranteed to be 100% secure, so we cannot promise or
                                guarantee
                                that hackers, cybercriminals, or other unauthorized third parties will not be able to
                                defeat
                                our security and improperly collect, access, steal, or modify your information. Click
                                here
                                to learn more.
                            </p>
                            <p>
                                What are your rights?
                                Depending on where you are located geographically, the applicable privacy law may mean
                                you
                                have certain rights regarding your personal information. Click here to learn more.
                            </p>
                            <p>
                                How do you exercise your rights?
                                The easiest way to exercise your rights is by filling out our data subject request form
                                available here: __________, or by contacting us. We will consider and act upon any
                                request
                                in accordance with applicable data protection laws.
                                Want to learn more about what Company Name does with any information we collect? Click
                                here
                                to review the notice in full.
                            </p>
                        </div>
                        @if (Request::is('lab_result') || Request::is('dashboard'))
                            <a class="w-100 btn btn-sm bg-purple shadow redhat small-text text-white me-2 py-2"
                                id="terms-check" data-bs-toggle="modal" href="#uploadLabResultModal"><b>OK</b></a>
                        @else
                            <button class="w-100 btn btn-sm bg-purple shadow redhat small-text text-white me-2 py-2"
                                id="terms-check" data-bs-dismiss="modal">
                                <b>OK</b>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Policy modal -->
    <div class="modal fade" id="ppModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="PrivacyPolicy"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 py-3">
                        <h6 class="redhat text-purple mb-3"><b>END USER LICENCE AGREEMENT</b></h6>
                        <div class="redhat med-text">
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been
                                the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley
                                of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries,
                                but also the leap into electronic typesetting, remaining essentially unchanged. It was
                                popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                passages,
                                and more recently with desktop publishing software like Aldus PageMaker including
                                versions
                                of
                                Lorem Ipsum.
                            </p>
                            <p>
                                It is a long established fact that a reader will be distracted by the readable content
                                of a
                                page
                                when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
                                normal
                                distribution of letters, as opposed to using 'Content here, content here', making it
                                look
                                like
                                readable English. Many desktop publishing packages and web page editors now use Lorem
                                Ipsum
                                as
                                their default model text, and a search for 'lorem ipsum' will uncover many web sites
                                still
                                in
                                their infancy. Various versions have evolved over the years, sometimes by accident,
                                sometimes on
                                purpose (injected humour and the like).
                            </p>
                        </div>
                        @if (Request::is('lab_result') || Request::is('dashboard'))
                            <a class="w-100 btn btn-sm bg-purple shadow redhat small-text text-white me-2 py-2"
                                id="pp-check" data-bs-toggle="modal" href="#uploadLabResultModal"><b>OK</b></a>
                        @else
                            <button class="w-100 btn btn-sm bg-purple shadow redhat small-text text-white me-2 py-2"
                                id="pp-check" data-bs-dismiss="modal">
                                <b>OK</b>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    @yield('content')
    
    @include('layouts.footer')

    <script src="{{ asset('js/libs.js') }}"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @if (!Auth()->check())
        @if (Request::is('/') || Request::is('admin'))
            <script src="{{ asset('js/home.js') }}"></script>
        @elseif (Request::segment(1) == 'reset-password')
            <script src="{{ asset('js/client/' . Request::segment(1) . '.js') }}"></script>
        @else
            <script src="{{ asset('js/client/' . Request::path() . '.js') }}"></script>
        @endif
    @else
        @if (Auth::user()->role_id == 1)
            <script src="{{ asset('js/client/' . Request::path() . '.js') }}"></script>
        @else
            <script src="{{ asset('js/admin/' . Request::path() . '.js') }}"></script>
        @endif
    @endif

    @if ($errors->any())
        @if (property_exists(json_decode($errors), 'email'))
            @if (json_decode($errors)->email[0] != 'The email field is required.' && json_decode($errors)->email[0] != 'The email must be a valid email address.' && json_decode($errors)->email[0] != 'The email has already been taken.' && json_decode($errors)->email[0] != "We can't find a user with that email address.")
                <script type="text/javascript">
                    $(window).on('load', function() {
                        $('#signInModal').modal('show');
                    });
                </script>
            @endif
        @endif
    @endif

</body>

</html>
