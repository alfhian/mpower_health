<section class="header w-100 bg-white fixed-top">
    <div class="container-fluid py-2 shadow-sm">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <a href="{{ url('/') }}"><img src="{{ asset('img/mpower_text_logo.png') }}" alt="MPower Logo"
                            class="ms-5" width="150"></a>
                    <div class="d-flex align-items-center med-text roboto text-purple">
                        @if (Auth::check())
                            @if (Request::path() != 'email/verify')
                                <span class="me-4"><a href="/"
                                        class="text-decoration-none text-reset"><b>Home</b></a></span>
                                @if (Request::path() == '/')
                                    <span class="me-4"><a href="{{ route('dashboard') }}"
                                            class="text-decoration-none text-reset"><b>Profile</b></a></span>
                                @endif
                                <button type="button"
                                    class="btn btn-sm bg-purple redhat small-text text-white shadow rounded-pill spacing-1 me-2 py-2 px-5"
                                    data-bs-toggle="modal" data-bs-target="#signOutModal">
                                            <b>SIGN OUT</b>
                                    </div>
                                </button>
                            @else
                                <span class="me-4"><a href="/"
                                        class="text-decoration-none text-reset"><b>Home</b></a></span>
                            @endif
                        @else
                            @if (request()->getHost() != 'admin.ghanimo.com')
                            <span class="me-4"><a href="/"
                                    class="text-decoration-none text-reset"><b>Home</b></a></span>
                            <!--<span class="me-4"><a href="#" class="text-decoration-none text-reset"><b>Lab Result</b></a></span>
                        <span class="me-4"><a href="#" class="text-decoration-none text-reset"><b>Subscribe</b></a></span>-->
                            <button class="btn btn-sm bg-purple redhat small-text text-white rounded-pill spacing-1 me-2 py-2 px-5" data-bs-toggle="modal"
                                data-bs-target="#signInModal">
                                <b>SIGN IN</b>
                            </button>
                            <button class="btn btn-sm bg-green redhat small-text text-dark rounded-pill spacing-1 py-2 px-5"
                                onclick="window.location='{{ route('register') }}'">
                                <b>SIGN UP</b>  
                            </button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
