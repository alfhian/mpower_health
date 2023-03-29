@extends('layouts.main')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="slider-container overflow-hidden rounded">
                    <div id="carousel-banner" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000" data-bs-pause="false">
                                <img src="{{ asset('img/home/home-slider-1C.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000" data-bs-pause="false">
                                <img src="{{ asset('img/home/home-slider-2C.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="5000" data-pause="false">
                                <img src="{{ asset('img/home/home-slider-3C.jpg') }}" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev ms-4" type="button" data-bs-target="#carousel-banner"
                            data-bs-slide="prev">
                            <span class="bg-green text-white rounded-circle p-2" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                </svg>
                            </span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next me-4" type="button" data-bs-target="#carousel-banner"
                            data-bs-slide="next">
                            <span class="bg-green text-white rounded-circle p-2" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                </svg>
                            </span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="overflow-hidden rounded mt-5">
                    <div id="carousel-banner-text" class="carousel slide carousel-fade" data-bs-ride="carousel"
                        data-bs-pause="false">
                        <div class="carousel-inner sato">
                            <div class="carousel-item carousel-text active" data-bs-interval="5000" data-pause="false">
                                <span class="redhat text-blue spacing-1"><b>START HERE TODAY</b></span>
                                <h1 class="py-3 display-4 text-purple">
                                    Get Your Lab Results and Empower Your Health
                                </h1>
                                <p class="w-75 redhat small text-secondary line-height-1">
                                    Start your journey to health today with our unique functional and lifestyle
                                    recommendation based on your lab result interpretation.
                                </p>
                                <button type="button" class="btn btn-sm bg-purple xsmall-text text-white me-2 py-2"
                                    onclick="window.location='{{ route('register') }}'">
                                    <div class="d-flex justify-content-center align-item-center">
                                        <div class="pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="pe-4 sato spacing-1">
                                            <b>CHECK MY LAB RESULTS</b>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="carousel-item carousel-text" data-bs-interval="5000" data-pause="false">
                                <span class="redhat text-blue spacing-1"><b>MAKE A CHANGE TODAY</b></span>
                                <h1 class="py-3 display-4 text-purple">
                                    Premium Lab Results Recommendations
                                </h1>
                                <p class="w-75 redhat small text-secondary line-height-1">
                                    Premium recommendations for everyone who want to empower themselves with an in depth FAQ
                                    to answer all doubts.
                                </p>
                                <button type="button" class="btn btn-sm bg-purple xsmall-text text-white me-2 py-2"
                                    onclick="window.location='{{ route('register') }}'">
                                    <div class="d-flex justify-content-center align-item-center">
                                        <div class="pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="pe-4 sato spacing-1">
                                            <b>CHECK MY LAB RESULTS</b>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="carousel-item carousel-text" data-bs-interval="5000" data-pause="false">
                                <span class="redhat text-blue spacing-1"><b>MAKE A CHANGE TODAY</b></span>
                                <h1 class="py-3 display-4 text-purple">
                                    Transforming lives - nutrition, lifestyle & wellness.
                                </h1>
                                <p class="w-75 redhat small-text text-secondary line-height-1">
                                    Empower yourself and make change of your lives forever.
                                </p>
                                <button type="button" class="btn btn-sm bg-purple xsmall-text text-white me-2 py-2"
                                    onclick="window.location='{{ route('register') }}'">
                                    <div class="d-flex justify-content-center align-item-center">
                                        <div class="pe-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </div>
                                        <div class="pe-4 sato spacing-1">
                                            CHECK MY LAB RESULTS
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="diagonal-box">
        <div class="content">
            <div class="container mt-5 p-0">
                <div class="row">
                    <div class="col-lg-4">
                        <h3 class="sato text-white text-center">20,000+</h3>
                        <div class="redhat xsmall-text text-white text-center">PATIENTS</div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="sato text-white text-center">16 YEARS</h3>
                        <div class="redhat xsmall-text text-white text-center">EXPERIENCE</div>
                    </div>
                    <div class="col-lg-4">
                        <h3 class="sato text-white text-center">100</h3>
                        <div class="redhat xsmall-text text-white text-center">BIOMARKERS</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="w-75 mt-5">
                    <h1 class="display-4 sato text-purple text-center">
                        The journey to a healthier body starts right now
                    </h1>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white me-2 mt-4 py-2"
                            onclick="window.location='{{ route('register') }}'">
                            <div class="d-flex justify-content-center align-item-center">
                                <div class="pe-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                </div>
                                <div class="pe-4 sato spacing-1">
                                    CHECK MY LAB RESULTS NOW
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <div class="row py-4">
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-1.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h5 class="text-center sato text-purple mt-4">Hormonal Health</h5>
                    <p class="mt-4 text-center small-text text-secondary">
                        Hormones influence most of our bodily functions. Even a small imbalance can cause symptoms like
                        weight gain, fatigue, low libido, cycle problems and much more. We help you identify and rebalance
                        them with advanced testing and personalized plans.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-6.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h4 class="text-center sato text-purple mt-4">Understand how to do excercises properly</h4>
                    <p class="mt-4 text-center small-text text-secondary">
                        Thousands of people suffer with low moods, depression and brain fog, which are connected to a lot of
                        issues in the body. The conventional fix is to medicate for symptoms while at NuWave we test
                        different aspects like neurotransmitters, deficiencies and sensitivities to address the cause and
                        correct them to help you feel like yourself again.
                    </p>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-7.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h4 class="text-center sato text-purple mt-4">Musculoskeletal</h4>
                    <p class="mt-4 text-center small-text text-secondary">
                        From headaches, neck pain, low back pain to muscle soreness and injuries from sports or sitting at a
                        computer for many hours. We use a multi-prong approach to treat these using Chiropractic,
                        kinesio-taping and acupuncture to help you get back into action faster.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-3.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h4 class="text-center sato text-purple mt-4">Autoimmune & Inflammation</h4>
                    <p class="mt-4 text-center small-text text-secondary">
                        Everyone is different, and we know it. That's why all of our clients get a programme specific just
                        for their lifestyle and body tipe. This give the best possible results.
                    </p>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-4.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h4 class="text-center sato text-purple mt-4">Digestive Issue</h4>
                    <p class="mt-4 text-center small-text text-secondary">
                        Digestive symptoms like abdominal pain, weight changes, constipation are obvious, but your gut is
                        your second brain and can also lead to other issues like anxiety and depression. We address the
                        cause of all these issues by testing and diagnosing IBS, SIBO, food sensitivities and much more.
                    </p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-center">
                <div class="w-50">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('img/home/home-small-5.jpg') }}" alt="" class="rounded"
                            width="250px" height="250px">
                    </div>
                    <h4 class="text-center sato text-purple mt-4">Biomarkers</h4>
                    <p class="mt-4 text-center small-text text-secondary">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="diagonal-box mb-5">
        <div class="content">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg">
                        <h3 class="sato text-white text-center">EMPOWER YOURSELF NOW</h3>
                        <div class="redhat text-white text-center small">CHECK YOUR LAB RESULTS AND GET RECOMMENDATIONS
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 pt-5 mb-3">
        <div class="row">
            <div class="col-lg-6 d-flex justify-content-center ps-5 py-5">
                <div class="w-75">
                    <h1 class="display-4 sato text-blue">
                        Who can benefit from a lab result health and nutrition plan?
                    </h1>
                    <p class="mt-3 small text-secondary line-height-1">
                        Literally everyone. I’m currently helping people from 12 to 60+ years old. Everyone can be
                        empowered.
                    </p>
                    <button type="button" class="btn btn-sm bg-purple xsmall-text text-white me-2 mt-3 py-2"
                        onclick="window.location='{{ route('register') }}'">
                        <div class="d-flex justify-content-center align-item-center">
                            <div class="pe-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                    fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                            <div class="pe-4 sato spacing-1">
                                EMPOWER ME
                            </div>
                        </div>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 pe-0 pb-5">
                <div class="d-flex justify-content-center">
                    <!--
                            <div class="bg-purple home-bg-purple">
                                <div class="home-line-svg">
                                    <svg width="630" height="auto" viewBox="0 0 695 431" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.5">
                                            <path
                                                d="M695 8.58996C664.11 -7.79443 582.338 -11.9929 502.365 102.288C402.4 245.14 142.635 235.923 54.3438 286.613C-16.2889 327.164 -44.649 399.767 -50 431"
                                                stroke="#CFDDEE" />
                                            <path
                                                d="M695 172.199C670.716 162.161 606.432 159.589 543.562 229.606C464.976 317.128 260.764 311.481 191.355 342.537C135.828 367.382 113.533 411.864 109.327 431"
                                                stroke="#CFDDEE" />
                                            <path
                                                d="M695 300.112C677.078 295.036 629.634 293.735 583.234 329.146C525.234 373.409 374.519 370.554 323.293 386.26C282.312 398.825 265.857 421.322 262.752 431"
                                                stroke="#CFDDEE" />
                                            <path
                                                d="M695 97.8315C667.536 84.9086 594.831 81.5971 523.727 171.734C434.846 284.406 203.887 277.137 125.387 317.117C62.5866 349.101 37.3714 406.366 32.6138 431"
                                                stroke="#CFDDEE" />
                                            <path
                                                d="M695 225.744C673.408 217.783 616.248 215.743 560.346 271.274C490.469 340.688 308.891 336.209 247.175 360.84C197.802 380.544 177.978 415.823 174.238 431"
                                                stroke="#CFDDEE" />
                                            <path
                                                d="M695 365.556C681.543 363.018 645.919 362.367 611.08 380.073C567.531 402.205 454.366 400.777 415.902 408.63C385.132 414.913 372.777 426.161 370.446 431"
                                                stroke="#CFDDEE" />
                                        </g>
                                    </svg>
                                </div>
                            </div>
                            -->
                    <img src="{{ asset('img/home/bottom_image.png') }}" alt="" class="rounded"
                        style="width: 95%; max-width: 700px">
                </div>
            </div>
        </div>
    </div>

    <script>
        var carouselA = document.getElementById('carousel-banner')
        var carouselB = document.getElementById('carousel-banner-text')

        carouselA.addEventListener('slide.bs.carousel', function(e) {
            var bsCarouselB = bootstrap.Carousel.getInstance(carouselB)
            bsCarouselB.to(e.to)
        })
    </script>
@endsection
