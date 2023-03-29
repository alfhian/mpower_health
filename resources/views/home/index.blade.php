@extends('layouts.main')

@section('content')
    <div class="container-fluid mt-5 p-0 pt-3">
        <div class="row m-0 position-relative">
            <div class="col-lg-6 p-0">
                <div class="w-100">
                    <img src="{{ asset('/img/landing-page/section-1/image-1.png') }}" alt="" width="100%"
                        style="margin-top: -4rem">
                </div>
            </div>
            <div class="col-lg-6 p-0 d-flex align-items-center justify-content-center text-center">
                <div>
                    <span class="display-4 roboto-black text-purple">
                        Take Charge of Your<br>Health
                    </span>
                    <p class="redhat mt-3">
                        No more late-night symptom searches or dead-end diagnoses.<br>
                        MPower Health doctors go beyond symptoms to treat the root<br>
                        cause of your illness and deliver long-term healing.
                    </p>
                    <button class="btn mt-3 py-2 px-4 bg-purple text-white redhat shadow" onclick="window.location = '{{ route('register') }}'"><b>Empower Now</b></button>
                    <div class="mt-5">
                        <img src="{{ asset('/img/landing-page/section-1/arrow.png') }}" alt="arrow" width="5%">
                    </div>
                </div>
            </div>
            <!--
                                            <div class="position-absolute w-100 h-25 bottom-0 text-center">
                                                <img src="{{ asset('/img/landing-page/white-dots-3x3.png') }}" alt="" width="3%"><br>
                                                <img src="{{ asset('/img/landing-page/purple-dots-3x3.png') }}" alt="" width="3%"
                                                    class="mt-2"><br>
                                                <img src="{{ asset('/img/landing-page/purple-dots-3x3.png') }}" alt="" width="3%" class="mt-2"
                                                    style="margin-left: 6rem">
                                            </div>
                                            -->
        </div>
        <div class="row m-0 ps-5">
            <div class="col bg-purple bg-section-2">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center justify-content-center text-center">
                        <div>
                            <span class="display-4 heebo text-white">
                                Take Charge of Your<br>Health
                            </span>
                            <p class="redhat text-white mt-3">
                                No more late-night symptom searches or dead-end diagnoses.<br>
                                MPower Health doctors go beyond symptoms to treat the root<br>
                                cause of your illness and deliver long-term healing.
                            </p>
                            <button class="btn mt-3 py-2 px-4 bg-white text-purple redhat shadow" onclick="window.location = '{{ route('register') }}'"><b>Empower
                                    Now</b></button>
                            <div class="mt-5">
                                <img src="{{ asset('/img/landing-page/section-2/arrow.png') }}" alt="arrow"
                                    width="5%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 d-flex justify-content-end">
                        <div class="w-100">
                            <img src="{{ asset('/img/landing-page/section-2/image-2.png') }}" alt="MPower Health 2"
                                width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0 mt-3">
            <div class="col p-0 position-relative">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('/img/landing-page/section-3/dots.png') }}" width="8%">
                </div>
                <div class="slider-container mt-5">
                    <div class="slider" id="slider">
                        <div class="slide">
                            <img src="{{ asset('/img/landing-page/section-3/image-1.png') }}">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('/img/landing-page/section-3/image-2.png') }}">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('/img/landing-page/section-3/image-3.png') }}">
                        </div>
                        <div class="slide">
                            <img src="{{ asset('/img/landing-page/section-3/image-4.png') }}">
                        </div>
                        <div class="position-absolute start-0">
                            <div class="left-slider" id="slide-left">
                            </div>
                        </div>
                        <div class="position-absolute start-0 top-50 translate-middle-y" style="cursor: pointer" id="left-slider-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#aa206b"
                                class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                <path
                                    d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg>
                        </div>
                        <div class="position-absolute end-0">
                            <div class="right-slider" id="slide-right">
                            </div>
                        </div>
                        <div class="position-absolute end-0 top-50 translate-middle-y" style="cursor: pointer" id="right-slider-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#aa206b"
                                class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                <path
                                    d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="section-2-information">
                        <div class="row">
                            <div class="col-6 px-4 redhat">
                                <h4><b>Biomarkers</b></h4>
                                <p class="med-text">
                                    Using biomarkers, we can detect disease, monitor or predict response to therapy, and personalize your health care. By tracking changes in biomarkers over time, we help our clients make better decisions to improve their health.
                                </p>
                            </div>
                            <div class="col-6 px-4 redhat">
                                <h4><b>Information 2</b></h4>
                                <p class="med-text">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In id leo vitae magna ultricies
                                    porta eget quis mi. Sed mollis feugiat libero ut vulputate. Vivamus efficitur nisl in
                                    nisi mollis, ut malesuada lorem iaculis. Morbi lacus sem, pharetra sed magna et,
                                    efficitur eleifend enim. Fusce tempor odio eu velit varius, vitae dictum lacus rutrum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0 pt-5 overflow-hidden">
            <div class="col-md-6 mt-5 d-flex justify-content-center align-items-center" style="z-index: 101">
                <div class="ps-5 text-center">
                    <span class="display-4 roboto-black text-purple">
                        Take Charge of Your<br>Health
                    </span>
                    <p class="redhat mt-3">
                        No more late-night symptom searches or dead-end diagnoses.<br>
                        MPower Health doctors go beyond symptoms to treat the root<br>
                        cause of your illness and deliver long-term healing.
                    </p>
                    <div class="d-flex justify-content-center">
                        <div class="mx-3">
                            <input type="text" class="form-control py-2" placeholder="Get Newsletter">
                        </div>
                        <div class="mx-3">
                            <button class="btn py-2 px-4 bg-purple text-white redhat shadow" onclick="window.location = '{{ route('register') }}'"><b>Empower Now</b></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="z-index: 100">
                <div class="w-100">
                    <img src="{{ asset('/img/landing-page/section-4/image-4.png') }}" alt="" width="130%"
                        style="margin-left: -12rem">
                </div>
            </div>
        </div>
        <div class="row m-0">
            <div class="col-lg-6 position-relative d-flex justify-content-center">
                <div class="w-75">
                    <img src="{{ asset('/img/landing-page/section-5/image-5.png') }}" alt="" width="110%"
                        class="section-5-container">
                </div>
                <!--
                <div class="position-absolute bottom-0 end-0">
                    <div class="w-100">
                        <img src="{{ asset('/img/landing-page/section-5/testimoni-photo.png') }}" alt=""
                            width="60%">
                    </div>
                </div>
                -->
            </div>
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="w-75 text-center redhat med-text">
                    <p class="line-height-2">
                        <span class="fs-3"><b><i>" </i></b></span> Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Curabitur pharetra luctus pretium. Sed sit amet turpis urna. Fusce facilisis bibendum justo at
                        sollicitudin. Nam a rhoncus massa.<span class="fs-3"><b><i>"</i></b></span> <b>- Jane, 32</b>
                    </p>
                    <div class="d-flex justify-content-center mb-4">
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                        <span class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" fill="#8dc63f"
                                class="bi bi-circle-fill loading" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                        </span>
                    </div>
                    <p class="line-height-2">
                        <span class="fs-3"><b><i>" </i></b></span> Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Curabitur pharetra luctus pretium.<span class="fs-3"><b><i>"</i></b></span> <b>- Mary,
                            28</b>
                    </p>
                </div>
            </div>
        </div>
        <div class="row m-0 mt-5 mb-5">
            <div class="col d-flex justify-content-center">
                <div class="section-6-container">
                    <img src="{{ asset('/img/landing-page/section-6/image-6.png') }}" alt="" width="100%">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#fff"
                            class="bi bi-play-fill" viewBox="0 0 16 16">
                            <path
                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        slider = 1

        $('#slide-left, #left-slider-icon').click(function() {
            img = $('.slide img').first().attr('src')
            $('.slide').first().animate({
                'width': 'toggle'
            }, 'slow')
            $('.slide').first().remove()
            $('#slider').append('<div class="slide"><img src="' + img + '"></div>')
        })

        $('#slide-right, #right-slider-icon').click(function() {
            img = $('.slide img').last().attr('src')
            $('.slide').last().animate({
                'width': 'toggle'
            }, 'slow')
            $('.slide').last().remove()
            $('#slider').prepend('<div class="slide"><img src="' + img + '"></div>')
        })
    </script>
@endsection
