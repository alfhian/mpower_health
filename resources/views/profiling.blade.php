@extends('layouts.main')

@section('content')
    <div class="modal fade" id="warningModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="WarningModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="px-3 py-3">
                        <p class="redhat med-text text-center">
                            Please fill in the questions first.
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
                            @csrf
                            @foreach ($step as $data)
                                <div id="step{{ $data->step }}"
                                    @if ($data->step > 1) style="display: none;" @endif>
                                    <div class="accordion accordion-flush redhat" id="accordionFlush{{ $data->step }}">
                                        @php
                                            $questions = App\Models\ProfilingQuestion::questionStep($data->step, $position);
                                        @endphp
                                        @foreach ($questions as $item)
                                            <div class="accordion-item rounded mb-3 border-0 shadow-sm">
                                                <h2 class="accordion-header" id="flush-heading{{ $item->id }}">
                                                    <button
                                                        class="accordion-button bg-white rounded collapsed text-purple med-text"
                                                        style="color: #aa206b !important; box-shadow: none !important;"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse{{ $item->id }}"
                                                        aria-expanded="false"
                                                        aria-controls="flush-collapse{{ $item->id }}">
                                                        <b>{{ $item->question }}</b>
                                                        <span class="ps-3" style="display: none;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="#8dc63f"
                                                                class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="flush-collapse{{ $item->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-heading{{ $item->id }}"
                                                    data-bs-parent="#accordionFlush{{ $data->step }}">
                                                    <div class="accordion-body med-text">
                                                        @php
                                                            $answer = App\Models\ProfilingAnswer::answerQuestion($item->id);
                                                        @endphp
                                                        @if ($item->type == 'text')
                                                            <input type="text"
                                                                class="form-control form-control-sm border"
                                                                name="q{{ $item->id }}" id="q{{ $item->id }}"
                                                                required onblur="checkedInput('q{{ $item->id }}')">
                                                        @elseif ($item->type == 'date')
                                                            <input type="date"
                                                                class="form-control form-control-sm border"
                                                                name="q{{ $item->id }}" id="q{{ $item->id }}"
                                                                required onblur="checkedInput('q{{ $item->id }}')">
                                                        @elseif ($item->type == 'number')
                                                            <input type="number"
                                                                class="form-control form-control-sm border"
                                                                name="q{{ $item->id }}" id="q{{ $item->id }}"
                                                                required onblur="checkedInput('q{{ $item->id }}')">
                                                        @elseif($item->type == 'dropdown')
                                                            <input type="hidden" name="q{{ $item->id }}"
                                                                id="q{{ $item->id }}" required>
                                                            @if ($answer[0]->image != '' || $answer[0]->image != null)
                                                                <div class="d-flex justify-content-between">
                                                                    @foreach ($answer as $option)
                                                                        <button type="button"
                                                                            class="bg-white border-0 mb-3 p-0"
                                                                            onclick="selectButton('q{{ $item->id }}', '{{ $option->id }}')">
                                                                            <div class="d-flex justify-content-center">
                                                                                <div>
                                                                                    <img src="{{ asset($option->image) }}"
                                                                                        alt="{{ $option->answer }}"
                                                                                        width="100px">
                                                                                    <div class="text-purple">
                                                                                        <b>{{ $option->answer }}</b>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </button>
                                                                    @endforeach
                                                                </div>
                                                            @elseif($answer[0]->svg != '' || $answer[0]->svg != null)
                                                                <div class="d-flex justify-content-between">
                                                                    @foreach ($answer as $option)
                                                                        {!! $option->svg !!}
                                                                    @endforeach
                                                                </div>
                                                            @else
                                                                @foreach ($answer as $option)
                                                                    <button type="button"
                                                                        class="bg-white border-0 mb-3 p-0"
                                                                        onclick="selectButton('q{{ $item->id }}', {{ $option->id }})">{{ $option->answer }}</button>
                                                                    <br>
                                                                @endforeach
                                                            @endif
                                                        @elseif($item->type == 'checkbox')
                                                            @foreach ($answer as $option)
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="{{ $option->id }}"
                                                                        name="q{{ $item->id }}[]"
                                                                        id="a{{ $option->id }}" @if($option->text == 'Y') onclick="showTextInput('{{ $option->id }}')" @endif>
                                                                    <label class="form-check-label"
                                                                        for="a{{ $option->id }}">
                                                                        {{ $option->answer }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6">
                                            @if ($data->step > 1)
                                                <button type="button"
                                                    class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                                    onclick="prevProfiling({{ $data->step }}, {{ $data->prev_step }})">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="px-4 sato spacing-1">
                                                            PREV
                                                        </div>
                                                    </div>
                                                </button>
                                            @endif
                                        </div>
                                        @if ($data->next_step == 99)
                                            <div class="col-6 d-flex justify-content-end">
                                                <button class="btn btn-sm bg-green xsmall-text text-white py-2">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="px-4 sato spacing-1">
                                                            SUBMIT
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        @else
                                            <div class="col-6 d-flex justify-content-end">
                                                <button type="button"
                                                    class="btn btn-sm bg-purple xsmall-text text-white py-2"
                                                    onclick="nextProfiling({{ $data->step }}, {{ $data->next_step }})">
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div class="px-4 sato spacing-1">
                                                            NEXT
                                                        </div>
                                                    </div>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //  Hide Accordion after select the option
        function hideAccordion(name) {
            accordionBody = $('#' + name).parent().parent().attr('id');
            $('#' + accordionBody).removeClass('show')
            accordionHeading = $('#' + name).parent().parent().attr('aria-labelledby')
            $('#' + accordionHeading + ' button').addClass('collapsed').attr('aria-expanded', 'false')
            $('#' + accordionHeading + ' button span').show()
        }

        function showAccordion(name) {
            accordionBody = $('#' + name).parent().parent().attr('id');
            $('#' + accordionBody).addClass('show')
            accordionHeading = $('#' + name).parent().parent().attr('aria-labelledby')
            $('#' + accordionHeading + ' button').removeClass('collapsed').attr('aria-expanded', 'true')
            $('html, body').animate({
                scrollTop: $('#' + accordionHeading + ' button').offset().top - 100
            }, 'fast')
        }

        // Trigger for select button/option
        function selectButton(name, id) {
            $('#' + name).val(id)
            hideAccordion(name)
            if (name == 'q10') {
                if ($('#q10').val() == 38) {
                    @foreach($female as $data)
                    $('#q{{ $data->id }}').val('')
                    accordionHeading = $('#q{{ $data->id }}').parent().parent().attr('aria-labelledby')
                    $('#' + accordionHeading + ' button span').hide()
                    @endforeach
                } else {
                    @foreach($male as $data)
                    $('#q{{ $data->id }}').val('')
                    accordionHeading = $('#q{{ $data->id }}').parent().parent().attr('aria-labelledby')
                    $('#' + accordionHeading + ' button span').hide()
                    @endforeach
                }
            }
        }

        // Trigger for checkbox checked
        function checkedInput(name) {
            value = $('#' + name).val()
            if (value == '') {
                return false
            }
            hideAccordion(name)
        }

        function showTextInput(id) {
            if ($('#a' + id).is(':checked')) {
                $('#a' + id).next().append("<input type='text' class='form-control form-control-sm border' id='other" + id + "'>")
            } else {
                $('#other' + id).remove()
            }
        }

        // Trigger for previous button
        function prevProfiling(step, prevStep) {
            if (prevStep == 0) {
                if ($('#q10').val() == 38) {
                    prevStep = 6
                } else if ($('#q10').val() == 39) {
                    prevStep = 5
                }
            }
            $('#step' + step).fadeOut('fast')
            $('#step' + prevStep).fadeIn('slow')
            progress = prevStep * 6.667
            $('.progress-bar').attr('aria-valuenow', progress).css('width', progress + '%');
        }

        function nextProfiling(curStep, nextStep) {
            warning = 'Please answer all questions first'
            if (nextStep != 0) {
                @foreach ($step as $data)
                    if (curStep == {{ $data->step }} && nextStep == {{ $data->next_step }}) {
                        @php
                            $questions = App\Models\ProfilingQuestion::questionStep($data->step, $position);
                        @endphp
                        if (
                            @foreach ($questions as $index => $item)
                                @if ($index != 0)
                                    ||
                                @endif
                                $('#q{{ $item->id }}').val() == ''
                            @endforeach
                        ) {
                            @foreach ($questions as $index => $item)
                                @if ($index == 0)
                                    if
                                @else
                                    else if
                                @endif
                                ($('#q{{ $item->id }}').val() == '') {
                                    accordion = 'q{{ $item->id }}'
                                    console.log(accordion)
                                }
                            @endforeach
                            showAccordion(accordion)
                            $('#warningModal').modal('show')
                            $('#warning-description').html(warning)
                            return false
                        }
                    }
                @endforeach
            } else {
                if ($('#q10').val() == 38) {
                    nextStep = 6
                } else if ($('#q10').val() == 39) {
                    nextStep = 4
                } else {
                    showAccordion('q10')
                    $('#warningModal').modal('show')
                    $('#warning-description').html(warning)
                    return false
                }
            }
            $('#step' + curStep).fadeOut('fast')
            $('#step' + nextStep).fadeIn('slow')
            progress = nextStep * 6.667
            $('.progress-bar').attr('aria-valuenow', progress).css('width', progress + '%');
        }

        $('#profiling').submit(function() {
            @foreach ($step as $data)
                @if ($data->next_step == 99)
                    @php
                        $questions = App\Models\ProfilingQuestion::questionStep($data->step, $position);
                    @endphp
                    if (
                        @foreach ($questions as $index => $item)
                            @if ($index != 0)
                                ||
                            @endif
                            $('#q{{ $item->id }}').val() == ''
                        @endforeach
                    ) {
                        @foreach ($questions as $index => $item)
                            @if ($index == 0)
                                if
                            @else
                                else if
                            @endif
                            ($('#q{{ $item->id }}').val() == '') {
                                accordion = 'q{{ $item->id }}'
                                console.log(accordion)
                            }
                        @endforeach
                        showAccordion(accordion)
                        $('#warningModal').modal('show')
                        $('#warning-description').html(warning)
                        return false
                    }
                @endif
            @endforeach
        })
    </script>

@endsection
