@extends('layouts.main')

@section('content')
    <div class="modal fade" id="warningModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="WarningModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 py-3">
                        <p class="redhat med-text text-center">
                            Please <span id="warning"></span> first.
                        </p>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="w-50 btn btn-sm bg-purple shadow small-text text-white me-2 py-2"
                                data-bs-dismiss="modal">
                                <b>Close</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid position-fixed mt-3 p-0" style="z-index: 1000;">
        <div class="progress rounded-0" style="height: 10px;">
            <div class="progress-bar bg-success" role="progressbar" aria-label="Basic example" style="width: 6.6%"
                aria-valuenow="6.6" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div class="container-fluid mt-5 py-5 profiling-container">
        <div class="row mb-4">
            <div class="col-lg d-flex justify-content-center">
                <div class="text-center">
                    <h4 class="sato text-purple spacing-1"><b>Hi {{ $firstname }},</b></h4>
                    <p class="redhat small-text text-secondary">
                        We have few questions to optimize the recommendations for you
                    </p>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="row">
                    <div class="col-sm-6 ps-5">
                        <form action="{{ url('profiling/submit') }}" id="profiling" method="post">
                            <div id="step1">
                                <div class="accordion accordion-flush redhat" id="accordionFlush1">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                <b>What is your birthdate</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="date" class="form-control form-control-sm border"
                                                    name="birthdate" id="birthdate" required
                                                    onblur="checkedInput('birthdate')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                aria-expanded="false" aria-controls="flush-collapseTwo">
                                                <b>What is your marital status?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="marital" id="marital" required>
                                                <button type="button" id="test" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('marital', 1)">Single</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('marital', 2)">Married</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('marital', 3)">Divorced</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('marital', 4)">Widowed</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 p-0"
                                                    onclick="selectButton('marital', 5)">Long-term relationship</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThree" aria-expanded="false"
                                                aria-controls="flush-collapseThree">
                                                <b>What is your genetic background?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="genetic" id="genetic" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 1)">African American</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 2)">Hispanic</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 3)">Asian</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 4)">Caucasian</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 5)">Mediterranian</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 6)">American Indian</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('genetic', 7)">Other</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 p-0"
                                                    onclick="selectButton('genetic', 8)">Prefer no to tell</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseFour" aria-expanded="false"
                                                aria-controls="flush-collapseFour">
                                                <b>What is your height?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="number" class="form-control form-control-sm border"
                                                    name="height" id="height" required
                                                    onblur="checkedInput('height')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingFive">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseFive" aria-expanded="false"
                                                aria-controls="flush-collapseFive">
                                                <b>What is your waist size?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseFive" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="number" class="form-control form-control-sm border"
                                                    name="waist" id="waist" required
                                                    onblur="checkedInput('waist')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingSix">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseSix" aria-expanded="false"
                                                aria-controls="flush-collapseSix">
                                                <b>What is your weight?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseSix" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="number" class="form-control form-control-sm border"
                                                    name="weight" id="weight" required
                                                    onblur="checkedInput('weight')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingSeven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseSeven" aria-expanded="false"
                                                aria-controls="flush-collapseSeven">
                                                <b>What is your employement status?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseSeven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="employement" id="employement" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('employement', 1)">Employed</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('employement', 2)">Unemployed</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-headingEight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseEight" aria-expanded="false"
                                                aria-controls="flush-collapseEight">
                                                <b>Do you love what you do at work?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapseEight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlush1">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="work" id="work" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('work', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('work', 'N')">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(2)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step2" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush2">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading2One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse2One" aria-expanded="false"
                                                aria-controls="flush-collapse2One">
                                                <b>Select your current health status (diagnosis - can be more than one)</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse2One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading2One" data-bs-parent="#accordionFlush2">
                                            <div class="accordion-body med-text">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="diagnosis1" name="diagnosis">
                                                    <label class="form-check-label" for="diagnosis1">
                                                        test
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading2Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse2Two" aria-expanded="false"
                                                aria-controls="flush-collapse2Two">
                                                <b>How long have you been living with these diagnosis?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse2Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading2Two" data-bs-parent="#accordionFlush2">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="living" id="living" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('living', 1)">1-3 years</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('living', 2)">4-8 years</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('living', 3)">8-12 years</button><br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('living', 3)">8-12 years</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('living', 4)">12+ years</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(1)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(3)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step3" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush3">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading3One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse3One" aria-expanded="false"
                                                aria-controls="flush-collapse3One">
                                                <b>What is your gender?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse3One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading3One" data-bs-parent="#accordionFlush3">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="gender" id="gender" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gender', 1)">Male</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gender', 2)">Female</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(2)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(4)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step4" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush4">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4One" aria-expanded="false"
                                                aria-controls="flush-collapse4One">
                                                <b>Tell us about your menstrual cycle?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4One" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="menstrual" id="menstrual" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('menstrual', 1)">Regular</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('menstrual', 2)">Irregular</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('menstrual', 3)">Don't have them
                                                    (Menopausal)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('menstrual', 4)">Don't have them
                                                    (Abnormal)</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Two" aria-expanded="false"
                                                aria-controls="flush-collapse4Two">
                                                <b>Even if you are not currently using conception, but have used hormonal
                                                    birth control in the past, please indicate which type and for how
                                                    long?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Two" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="conception" id="conception" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('conception', 1)">Birth contol pills (duration of
                                                    use)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('conception', 2)">Patch</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('conception', 3)">Nuva Ring</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('conception', 4)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Three" aria-expanded="false"
                                                aria-controls="flush-collapse4Three">
                                                <b>Are you taking hormone replacement?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4three" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="hormone" id="hormone" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 1)">Yes-Estrogen</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 2)">Ogen</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 3)">Estrace</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 4)">Premarin</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 5)">Progestron</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 6)">Provera</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 7)">BHRT (Bioidentical)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hormone', 8)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Four" aria-expanded="false"
                                                aria-controls="flush-collapse4Four">
                                                <b>What is your age at menopause?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Four" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="menopause" id="menopause" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('menopause', 1)">
                                                    < 35 years</button>
                                                        <br>
                                                        <button type="button" class="bg-white border-0 mb-3 p-0"
                                                            onclick="selectButton('menopause', 2)">
                                                            35-40 years</button>
                                                        <br>
                                                        <button type="button" class="bg-white border-0 mb-3 p-0"
                                                            onclick="selectButton('menopause', 3)">
                                                            41-50 years</button>
                                                        <br>
                                                        <button type="button" class="bg-white border-0 mb-3 p-0"
                                                            onclick="selectButton('menopause', 4)">
                                                            51-55 years</button>
                                                        <br>
                                                        <button type="button" class="bg-white border-0 mb-3 p-0"
                                                            onclick="selectButton('menopause', 5)">
                                                            > 55 years</button>
                                                        <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Five" aria-expanded="false"
                                                aria-controls="flush-collapse4Five">
                                                <b>Is there a family history of :</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Five" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="history" id="history" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('history', 1)">Breast Cancer</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('history', 2)">Ovarian Cancer</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('history', 3)">Uterin Cancer</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('history', 4)">Osteoporosis</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('history', 5)">Heart Disease</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Six" aria-expanded="false"
                                                aria-controls="flush-collapse4Six">
                                                <b>Do you have difficulty waking up in the morning?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Six" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="wakingup" id="wakingup" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('wakingup', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('wakingup', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('wakingup', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Seven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Seven" aria-expanded="false"
                                                aria-controls="flush-collapse4Seven">
                                                <b>Do you always feel tired or exhausted?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Seven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Seven" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="tired" id="tired" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('tired', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('tired', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('tired', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Eight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Eight" aria-expanded="false"
                                                aria-controls="flush-collapse4Eight">
                                                <b>Do you sleep poorly?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Eight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Eight" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="sleep" id="sleep" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading4Nine">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse4Nine" aria-expanded="false"
                                                aria-controls="flush-collapse4Nine">
                                                <b>Have you recently gained weight or do you have difficulty losing
                                                    weight?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse4Nine" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading4Nine" data-bs-parent="#accordionFlush4">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="gain_weight" id="gain_weight" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gain_weight', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gain_weight', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(3)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(5)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step5" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush5">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5One" aria-expanded="false"
                                                aria-controls="flush-collapse5One">
                                                <b>Are you frequently anxious, nervous or irritable?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5One" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="anxious" id="anxious" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anxious', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anxious', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Two" aria-expanded="false"
                                                aria-controls="flush-collapse5Two">
                                                <b>Do you suffer from short or long-term memory loss?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Two" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="memory" id="memory" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('memory', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('memory', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Three" aria-expanded="false"
                                                aria-controls="flush-collapse5Three">
                                                <b>Do you have trouble concentrating?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Three" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="concentrating" id="concentrating" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('concentrating', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('concentrating', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('concentrating', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Four" aria-expanded="false"
                                                aria-controls="flush-collapse5Four">
                                                <b>Do you lack sexual desire?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Four" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="sexual" id="sexual" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sexual', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sexual', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sexual', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Five" aria-expanded="false"
                                                aria-controls="flush-collapse5Five">
                                                <b>Have you lost your attraction toward your partner?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Five" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="lost_attraction" id="lost_attraction"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('lost_attraction', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('lost_attraction', 'N')">No</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('lost_attraction', 'S')">Sometimes</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Six" aria-expanded="false"
                                                aria-controls="flush-collapse5Six">
                                                <b>Are you currently experiencing vaginal dryness?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Six" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="dryness" id="dryness" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('dryness', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('dryness', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Seven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Seven" aria-expanded="false"
                                                aria-controls="flush-collapse5Seven">
                                                <b>Do you carry your weight in your mid-section?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Seven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Seven" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="mid_section" id="mid_section" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mid_section', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mid_section', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading5Eight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse5Eight" aria-expanded="false"
                                                aria-controls="flush-collapse5Eight">
                                                <b>Have you lost muscle mass, tone and/or strength?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse5Eight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading5Eight" data-bs-parent="#accordionFlush5">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="muscle" id="muscle" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('muscle', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('muscle', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(4)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(7)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step6" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush6">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading6One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse6One" aria-expanded="false"
                                                aria-controls="flush-collapse6One">
                                                <b>Have you been diagnose with one of the following :</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse6One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading6One" data-bs-parent="#accordionFlush6">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="male_diagnosed" id="male_diagnosed"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 1)">Low Testosterone</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 2)">Testicular Mass</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 3)">Prostate
                                                    enlargement/Cancer</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 4)">Prostate
                                                    infection</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 5)">Andropause</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 6)">Nocturia (Urination at
                                                    night)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 7)">STDs</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_diagnosed', 8)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading6Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse6Two" aria-expanded="false"
                                                aria-controls="flush-collapse6Two">
                                                <b>Are you currently experiencing the following :</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse6Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading6Two" data-bs-parent="#accordionFlush6">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="male_experience" id="male_experience"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 1)">Change in sex
                                                    drive</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 2)">Testicular pain</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 3)">Difficulty obtaining an
                                                    erection</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 4)">Difficulty maintaining an
                                                    erection</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 5)">Lost of control of
                                                    urine</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 6)">Urinary
                                                    urgency/hesitancy/change in stream</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 7)">Painful
                                                    urination</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 8)">Blood in urine</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 9)">Recurrent UTIs</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('male_experience', 10)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(5)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(7)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step7" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush7">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading7One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7One" aria-expanded="false"
                                                aria-controls="flush-collapse7One">
                                                <b>How many prescription meds are you taking?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7One" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="meds" id="meds" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('meds', 1)">1-3</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('meds', 2)">4-6</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('meds', 3)">6+</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading7Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Two" aria-expanded="false"
                                                aria-controls="flush-collapse7Two">
                                                <b>Do you take any suplements?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Two" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        name="suplement" id="suplement1">
                                                    <label class="form-check-label" for="suplement1">
                                                        Multivitamins
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                        name="suplement" id="suplement2">
                                                    <label class="form-check-label" for="suplement2">
                                                        Fish Oil/Flax seed oil
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3"
                                                        name="suplement" id="suplement3">
                                                    <label class="form-check-label" for="suplement3">
                                                        Vit C
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4"
                                                        name="suplement" id="suplement4">
                                                    <label class="form-check-label" for="suplement4">
                                                        Vit D
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="5"
                                                        name="suplement" id="suplement5">
                                                    <label class="form-check-label" for="suplement5">
                                                        Probiotic
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="6"
                                                        name="suplement" id="suplement6">
                                                    <label class="form-check-label" for="suplement6">
                                                        Vit B12
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="7"
                                                        name="suplement" id="suplement7">
                                                    <label class="form-check-label" for="suplement7">
                                                        Other
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading7Three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Three" aria-expanded="false"
                                                aria-controls="flush-collapse7Three">
                                                <b>How many hours/quality of sleep you have?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Three" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="sleep_quality" id="sleep_quality"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 1)">Less than 3 hours</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 2)">4-6 hours (rested)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 3)">4-6 hours (wake up
                                                    tired)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 4)">6-8 hours (rested)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 5)">6-8 hours (wake up
                                                    tired)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 2)">8+ hours (rested)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('sleep_quality', 2)">8+ hours (tired)</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading7Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Four" aria-expanded="false"
                                                aria-controls="flush-collapse7Four">
                                                <b>How fulfilled are you in life?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Four" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="fulfilled" id="fulfilled" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fulfilled', 1)">Loving Everyday</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fulfilled', 2)">Struggling to get
                                                    through</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fulfilled', 3)">Miserable</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm" id="excercise">
                                        <h2 class="accordion-header" id="flush-heading7Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Five" aria-expanded="false"
                                                aria-controls="flush-collapse7Five">
                                                <b>Do you exercise regularly?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Five" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="exercise" id="exercise" required>
                                                <button type="button"
                                                    class="bg-white border-0 mb-3 p-0 exercise-button"
                                                    onclick="selectButton('exercise', 'Y')">Yes</button>
                                                <br>
                                                <button type="button"
                                                    class="bg-white border-0 mb-3 p-0 exercise-button"
                                                    onclick="selectButton('exercise', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm" id="exercise_time"
                                        style="display: none">
                                        <h2 class="accordion-header" id="flush-heading7Seven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Seven" aria-expanded="false"
                                                aria-controls="flush-collapse7Seven">
                                                <b>How many days a week do you exercise?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Seven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Seven" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="exercise_days" id="exercise_days"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_days', 1)">1 or 2 days</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_days', 2)">3 or 4 days</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_days', 3)">5 days +</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm" id="exercise_type"
                                        style="display: none">
                                        <h2 class="accordion-header" id="flush-heading7Eight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Eight" aria-expanded="false"
                                                aria-controls="flush-collapse7Eight">
                                                <b>If yes, what is your prefered form of exercise?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Eight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Eight" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="exercise_form" id="exercise_form"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 1)">Walking</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 2)">Running
                                                    indoors/outdoors</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 3)">Weight Lifting</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 4)">Group exercises (Yoga,
                                                    Pilates, etc.)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 5)">Swimming/Water
                                                    aerobics</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exercise_form', 6)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading7Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse7Six" aria-expanded="false"
                                                aria-controls="flush-collapse7Six">
                                                <b>What is your diet (e.g. vegan, etc.)?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse7Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading7Six" data-bs-parent="#accordionFlush7">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="diet" id="diet" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 1)">Vegetarian</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 2)">Vegan</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 3)">Mediterranean Diet</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 3)">Kotogenic</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 4)">Paleo</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 5)">Elimination Diet</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 6)">Gluten Free</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 7)">Atkins</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('diet', 8)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(6)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(8)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step8" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush8">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading8One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse8One" aria-expanded="false"
                                                aria-controls="flush-collapse8One">
                                                <b>What is stopping you from taking charge of your health? We are here to
                                                    MPower you to take charge of that.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse8One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading8One" data-bs-parent="#accordionFlush8">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="stop_charge" id="stop_charge" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 1)">Time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 2)">Resources ($$)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 3)">Stress of taking care of
                                                    self</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 4)">Tried in past and
                                                    failed</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 5)">Don't know how to do</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 6)">Caring for others take up my
                                                    time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('stop_charge', 7)">Lack of motivation</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading8Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse8Two" aria-expanded="false"
                                                aria-controls="flush-collapse8Two">
                                                <b>What do you want to achieve through our app</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse8Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading8Two" data-bs-parent="#accordionFlush8">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="achieve" id="achieve" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 1)">Store and organize my lab
                                                    results</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 2)">Monitor my health but I'm not
                                                    sure how</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 3)">Understand what my lab results
                                                    mean</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 4)">Track the balance of vitamins and
                                                    minerals</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 5)">Start losing weight</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('achieve', 6)">Develop habits to better my
                                                    wellbeing, personalized to my health</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(7)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(9)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step9" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush9">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9One" aria-expanded="false"
                                                aria-controls="flush-collapse9One">
                                                <b>During last week, I felt energized and inspired.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9One" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="energized" id="energized" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('energized', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('energized', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('energized', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('energized', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Two" aria-expanded="false"
                                                aria-controls="flush-collapse9Two">
                                                <b>During last week, I have enough time for work and personal doings.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Two" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="time" id="time" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('time', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('time', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('time', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('time', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Three" aria-expanded="false"
                                                aria-controls="flush-collapse9Three">
                                                <b>During last week, I have enough time for hobbies and entertainment.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9three" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="hobbies" id="hobbies" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hobbies', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hobbies', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hobbies', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hobbies', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Four" aria-expanded="false"
                                                aria-controls="flush-collapse9Four">
                                                <b>During last week, I felt depair and hopelessness.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Four" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="depair" id="depair" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('depair', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('depair', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('depair', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('depair', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Five" aria-expanded="false"
                                                aria-controls="flush-collapse9Five">
                                                <b>During last week, I was coping with my responsibilities.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Five" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="responsibility" id="responsibility"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('responsibility', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('responsibility', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('responsibility', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('responsibility', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Six" aria-expanded="false"
                                                aria-controls="flush-collapse9Six">
                                                <b>During last week, I was thinking fast and I was creative.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Six" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="creative" id="creative" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('creative', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('creative', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('creative', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('creative', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Seven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Seven" aria-expanded="false"
                                                aria-controls="flush-collapse9Seven">
                                                <b>During last week, it was hard for me to control my irritation and
                                                    anger.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Seven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Seven" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="anger" id="anger" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anger', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anger', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anger', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('anger', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Eight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Eight" aria-expanded="false"
                                                aria-controls="flush-collapse9Eight">
                                                <b>During last week, I had obvious mood swings, appetite, and feelings
                                                    fluctuation.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Eight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Eight" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="mood" id="mood" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mood', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mood', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mood', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('mood', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Nine">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Nine" aria-expanded="false"
                                                aria-controls="flush-collapse9Nine">
                                                <b>During last week, I felt I cannot control important things in my
                                                    life.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Nine" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Nine" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="important_things" id="important_things"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('important_things', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('important_things', 2)">Most of the
                                                    time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('important_things', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('important_things', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Ten">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Ten" aria-expanded="false"
                                                aria-controls="flush-collapse9Ten">
                                                <b>During last week, I felt exhausted towards the end of the day.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Ten" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Ten" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="exhausted" id="exhausted" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exhausted', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exhausted', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exhausted', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('exhausted', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading9Eleven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse9Eleven" aria-expanded="false"
                                                aria-controls="flush-collapse9Eleven">
                                                <b>During last week, my activity level was :</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse9Eleven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading9Eleven" data-bs-parent="#accordionFlush9">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="activity" id="activity" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('activity', 1)">Sedentary</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('activity', 2)">Slightly active</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('activity', 3)">Moderately active</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('activity', 4)">Very active</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(8)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(10)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step10" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush10">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10One" aria-expanded="false"
                                                aria-controls="flush-collapse10One">
                                                <b>During last week, I was eating meals containing vegetables and whole
                                                    foods.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10One" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="vegetables" id="vegetables" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('vegetables', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('vegetables', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('vegetables', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('vegetables', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Two" aria-expanded="false"
                                                aria-controls="flush-collapse10Two">
                                                <b>During last week, I was often eating ready meals from fast food
                                                    restaurants or outdoors.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Two" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="fast_food" id="fast_food" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fast_food', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fast_food', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fast_food', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('fast_food', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Three" aria-expanded="false"
                                                aria-controls="flush-collapse10Three">
                                                <b>During last week, I was snacking between main meals.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10three" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="snacking" id="snacking" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('snacking', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('snacking', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('snacking', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('snacking', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Four" aria-expanded="false"
                                                aria-controls="flush-collapse10Four">
                                                <b>During last week, I was eating a hearty breakfast.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Four" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="breakfast" id="breakfast" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('breakfast', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('breakfast', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('breakfast', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('breakfast', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Five" aria-expanded="false"
                                                aria-controls="flush-collapse10Five">
                                                <b>During last week, I was eating large amounts late evening or at
                                                    night.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Five" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="evening" id="evening" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('evening', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('evening', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('evening', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('evening', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Six" aria-expanded="false"
                                                aria-controls="flush-collapse10Six">
                                                <b>During last week, I was drinking juices, sweet drinks, and I was eating
                                                    confectionary.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Six" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="juices" id="juices" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('juices', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('juices', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('juices', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('juices', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Seven">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Seven" aria-expanded="false"
                                                aria-controls="flush-collapse10Seven">
                                                <b>During last week, I was eating berries, nuts, greens, or sea food.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Seven" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Seven" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="nuts" id="nuts" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nuts', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nuts', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nuts', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nuts', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Eight">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Eight" aria-expanded="false"
                                                aria-controls="flush-collapse10Eight">
                                                <b>During last week, my nutrition was diverse.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Eight" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Eight" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="nutrition" id="nutrition" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nutrition', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nutrition', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nutrition', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nutrition', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Nine">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Nine" aria-expanded="false"
                                                aria-controls="flush-collapse10Nine">
                                                <b>During last week, I was making conscious, healthy choices.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Nine" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Nine" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="healthy" id="healthy" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('healthy', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('healhty', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('healthy', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('healthy', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading10Ten">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse10Ten" aria-expanded="false"
                                                aria-controls="flush-collapse10Ten">
                                                <b>During last week, I was eating slowly, chewing carefully, without getting
                                                    distracted.</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse10Ten" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading10Ten" data-bs-parent="#accordionFlush10">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="eat_slowly" id="eat_slowly" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('eat_slowly', 1)">All the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('eat_slowly', 2)">Most of the time</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('eat_slowly', 3)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('eat_slowly', 4)">Not at all</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(9)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(11)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step11" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush11">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading11One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse11One" aria-expanded="false"
                                                aria-controls="flush-collapse11One">
                                                <b>What do your nails look like?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading11One" data-bs-parent="#accordionFlush11">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="nails" id="nails" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 1)">Good</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 2)">Vertical ridges</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 3)">Yellowish color</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 4)">White lines and/or dots</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 5)">Nail pitting</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 6)">Barely visible lunulae (half
                                                    moon)</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 7)">Breaking of spliting nail</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nails', 8)">Horizontal ridges</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading11Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse11Two" aria-expanded="false"
                                                aria-controls="flush-collapse11Two">
                                                <b>Are you experiencing any hair problems?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading11Two" data-bs-parent="#accordionFlush11">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="hair_problem" id="hair_problem" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 1)">Broken split ends</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 2)">Widespread hairloss at the
                                                    back of the head</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 3)">Grey hair</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 4)">Widespread hairloss</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 5)">Patching balding with full
                                                    loss in some places</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('hair_problem', 6)">Dull lifeless hair and
                                                    hairloss</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading11three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse11Three" aria-expanded="false"
                                                aria-controls="flush-collapse11Three">
                                                <b>Do you have any plaque on your tongue?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading11three" data-bs-parent="#accordionFlush11">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="plaque_tongue" id="plaque_tongue"
                                                    required>
                                                <div class="d-flex justify-content-between">
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('plaque_tongue', 'N')">
                                                        <div class="d-flex justify-content-center">
                                                            <div>
                                                                <img src="{{ asset('img/tongue_normal.png') }}"
                                                                    alt="normal_tongue" width="100px">
                                                                <div class="text-purple"><b>No</b></div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('plaque_tongue', 'Y')">
                                                        <div class="d-flex justify-content-center">
                                                            <div>
                                                                <img src="{{ asset('img/tongue_coated.png') }}"
                                                                    alt="coated_tongue" width="100px">
                                                                <div class="text-purple"><b>Yes</b></div>
                                                            </div>
                                                        </div>
                                                    </button>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading11Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse11Four" aria-expanded="false"
                                                aria-controls="flush-collapse11Four">
                                                <b>What is the color of your stool?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading11Four" data-bs-parent="#accordionFlush11">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="stool_color" id="stool_color" required>
                                                <div class="d-flex justify-content-between">
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 1)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#F6D111" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 2)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#D3934C" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 3)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#6D7850" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 4)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#5B4F41" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 5)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#CA403D" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('stool_color', 6)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#969C98" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading11Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse11Five" aria-expanded="false"
                                                aria-controls="flush-collapse11Five">
                                                <b>What is the color of your urine?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse11Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading11Five" data-bs-parent="#accordionFlush11">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="urine" id="urine" required>
                                                <div class="d-flex justify-content-between">
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 1)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#FFF2B0" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 2)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#338EBB" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 3)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#F3B1B2" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 4)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#5B4F41" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 5)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#FF9D00" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                    <br>
                                                    <button type="button" class="bg-white border-0 mb-3 p-0"
                                                        onclick="selectButton('urine', 6)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="50"
                                                            height="50"fill="#CA403D" class="bi bi-square-fill"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(10)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(12)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step12" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush12">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12One" aria-expanded="false"
                                                aria-controls="flush-collapse12One">
                                                <b>Do you regularly experience pain in any part of your body?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12One" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="pain" id="pain" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('pain', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('pain', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12Two" aria-expanded="false"
                                                aria-controls="flush-collapse12Two">
                                                <b>What has your diet been like in the past 3 months?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12Two" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="diet_lately" id="diet_lately" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12Three" aria-expanded="false"
                                                aria-controls="flush-collapse12Three">
                                                <b>Do you have food intolerances?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12three" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="intolerance_food" id="intolerance_food"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('intolerance_food', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('intolerance_food', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12Four" aria-expanded="false"
                                                aria-controls="flush-collapse12Four">
                                                <b>How many caffeinated beverages do you have per day?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12Four" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="number" class="form-control form-control-sm"
                                                    name="caffeinated_beverages" id="caffeinated_beverages" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12Five">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12Five" aria-expanded="false"
                                                aria-controls="flush-collapse12Five">
                                                <b>Do you smoke?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12Five" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12Five" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="smoke" id="smoke" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('smoke', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('smoke', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading12Six">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse12Six" aria-expanded="false"
                                                aria-controls="flush-collapse12Six">
                                                <b>Do you take cannabis?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse12Six" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading12Six" data-bs-parent="#accordionFlush12">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="cannabis" id="cannabis" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('cannabis', 'Y')">Yes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('cannabis', 'N')">No</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(11)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(13)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step13" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush13">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading13One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse13One" aria-expanded="false"
                                                aria-controls="flush-collapse13One">
                                                <b>How much is your attention span?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse13One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading13One" data-bs-parent="#accordionFlush13">
                                            <div class="accordion-body med-text">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="attention_span" id="attention_span" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading13Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse13Two" aria-expanded="false"
                                                aria-controls="flush-collapse13Two">
                                                <b>How often you forget things?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse13Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading13Two" data-bs-parent="#accordionFlush13">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="forget" id="forget" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('forget', 1)">Seldom</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('forget', 2)">Sometimes</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('forget', 3)">Often</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('forget', 4)">Very often</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading13three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse13Three" aria-expanded="false"
                                                aria-controls="flush-collapse13Three">
                                                <b>Are you often nervous and/or panicking?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse13Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading13three" data-bs-parent="#accordionFlush13">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="nervous_panick" id="nervous_panick"
                                                    required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nervous_panick', 1)">Seldom</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('nervous_panick', 2)">Often</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(12)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(14)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step14" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush14">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading14One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse14One" aria-expanded="false"
                                                aria-controls="flush-collapse14One">
                                                <b>Which laboratory do you usually take tests at?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse14One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading14One" data-bs-parent="#accordionFlush14">
                                            <div class="accordion-body med-text">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="laboratory" id="laboratory" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading14Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse14Two" aria-expanded="false"
                                                aria-controls="flush-collapse14Two">
                                                <b>Do you have any food allergies?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse14Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading14Two" data-bs-parent="#accordionFlush14">
                                            <div class="accordion-body med-text">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="food_allergies" id="food_allergies" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading14three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse14Three" aria-expanded="false"
                                                aria-controls="flush-collapse14Three">
                                                <b>Which drugs or suplements do you take consistently?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse14Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading14three" data-bs-parent="#accordionFlush14">
                                            <div class="accordion-body med-text">
                                                <input type="text" class="form-control form-control-sm"
                                                    name="drugs_suplements" id="drugs_suplements" required>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading14Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse14Four" aria-expanded="false"
                                                aria-controls="flush-collapse14Four">
                                                <b>Which of these best describe you? Select all that apply</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse14Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading14Four" data-bs-parent="#accordionFlush14">
                                            <div class="accordion-body med-text">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                        id="best_describe1">
                                                    <label class="form-check-label" for="best_describe1">
                                                        I have frequent indigestion
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                        id="best_describe2">
                                                    <label class="form-check-label" for="best_describe2">
                                                        I take digestive enzymes and feel worse without them
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3"
                                                        id="best_describe3">
                                                    <label class="form-check-label" for="best_describe3">
                                                        I like to eat a lot and often
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4"
                                                        id="best_describe4">
                                                    <label class="form-check-label" for="best_describe4">
                                                        If I don't eat, I get a headache
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="5"
                                                        id="best_describe5">
                                                    <label class="form-check-label" for="best_describe5">
                                                        Nothing tastes good to me
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="6"
                                                        id="best_describe6">
                                                    <label class="form-check-label" for="best_describe6">
                                                        I often vomit bile
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="7"
                                                        id="best_describe7">
                                                    <label class="form-check-label" for="best_describe7">
                                                        I eat too much
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="8"
                                                        id="best_describe8">
                                                    <label class="form-check-label" for="best_describe8">
                                                        None of the above
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(13)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="nextProfiling(15)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    NEXT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="step15" style="display: none;">
                                <div class="accordion accordion-flush redhat" id="accordionFlush15">
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading15One">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse15One" aria-expanded="false"
                                                aria-controls="flush-collapse15One">
                                                <b>Do you have any outward signs of digestive distress?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse15One" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading15One" data-bs-parent="#accordionFlush15">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="distress" id="distress" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('distress', 1)">Bitter mouth after
                                                    meals</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('distress', 2)">Constipation</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('distress', 3)">Bloody stools</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('distress', 4)">I often have sores or issues in
                                                    my mouth</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('distress', 5)">Pain of the right side of the
                                                    stomach after eating greasy foods</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading15Two">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse15Two" aria-expanded="false"
                                                aria-controls="flush-collapse15Two">
                                                <b>Which of these best describes your bowel movements?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse15Two" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading15Two" data-bs-parent="#accordionFlush15">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="bowel" id="bowel" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 1)">Increased gas</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 2)">Frequently constipated</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 3)">Frequent liquid stool</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 4)">Stinky persistent smelling
                                                    stool</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 5)">Stools with undigested
                                                    foods</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 6)">Thin pencil like stools</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('bowel', 7)">Strange colored stool</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading15three">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse15Three" aria-expanded="false"
                                                aria-controls="flush-collapse15Three">
                                                <b>Do you have GI disease?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse15Three" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading15three" data-bs-parent="#accordionFlush15">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="gi_disease" id="gi_disease" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gi_disease', 1)">Cellac Dz</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gi_disease', 2)">Crohn's Dz</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gi_disease', 3)">Non-specific ulcerative
                                                    colitis</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gi_disease', 4)">Diverticulitis</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('gi_disease', 5)">Other</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                        <h2 class="accordion-header" id="flush-heading15Four">
                                            <button
                                                class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                style="color: #aa206b !important; box-shadow: none !important;"
                                                type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse15Four" aria-expanded="false"
                                                aria-controls="flush-collapse15Four">
                                                <b>Do you regularly take any medication?</b>
                                                <span class="ps-3" style="display: none;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" fill="#8dc63f" class="bi bi-check-circle-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse15Four" class="accordion-collapse collapse"
                                            aria-labelledby="flush-heading15Four" data-bs-parent="#accordionFlush15">
                                            <div class="accordion-body med-text">
                                                <input type="hidden" name="medication" id="medication" required>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('medication', 1)">Aspirin</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('medication', 2)">Nonsteroidal anti-inflam
                                                    drugs</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('medication', 3)">Corticosteroids
                                                    hormones</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('medication', 4)">Encapsulants</button>
                                                <br>
                                                <button type="button" class="bg-white border-0 mb-3 p-0"
                                                    onclick="selectButton('medication', 5)">Antacids</button>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                            onclick="prevProfiling(14)">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    PREV
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                    <div class="col-6 d-flex justify-content-end">
                                        <button class="btn btn-sm bg-green xsmall-text text-white py-2">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="px-4 sato spacing-1">
                                                    SUBMIT
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/' . $js . '.js') }}"></script>
@endsection
