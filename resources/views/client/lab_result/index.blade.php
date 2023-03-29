@extends('layouts.main')

@section('content')
    <div class="modal fade" id="uploadLabResultModal" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h5 class="redhat text-purple text-center mb-3"><b>Upload Lab Result</b></h5>
                    <form method="POST" action="{{ url('lab_result/upload_lab_result') }}" id="upload-lab-result-form"
                        enctype="multipart/form-data">
                        @csrf
                        <span class="redhat small-text text-muted">Please upload only <b>1 (one)</b> of the following format
                            for each
                            <b>Lab Result (jpg, png, pdf)</b>.</span>
                        <div class="d-flex justify-content-center mt-2 mb-3">
                            <input type="file" class="form-control form-control-sm w-75" name="lab_result"
                                id="lab-result" required>
                        </div>
                        <!--
                        <div class="d-flex justify-content-center align-items-center mt-3 mb-2">
                            <input type="checkbox" class="form-check-input me-2" name="read" id="policy-check">
                            <span class="redhat small-text text-primary">I've read the <span class="text-blue"
                                    style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#termsModal"><b>Terms and
                                        Conditions</b></span>
                                and <span class="text-blue" style="cursor: pointer" data-bs-toggle="modal"
                                    data-bs-target="#ppModal"><b>Privacy Policy</b></span> and am willing to proceed.</span>
                        </div>
                        -->
                        <button class="btn btn-sm bg-purple redhat med-text text-white shadow spacing-1 px-5 me-4"><b>UPLOAD
                                FILE</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-container d-flex">
        @include('layouts.sidebar')
        <div class="dashboard container-fluid m-0 px-3 pt-5">
            <div class="row">
                <div class="col dashboard-right">
                    <div class="mt-5">
                        @if ($message = Session::get('success'))
                            <script>
                                $(document).ready(function() {
                                    warning = 'Lab result has been uploaded. Your recommendation report will be ready within 24 Hours'
                                    $("#warningModal").modal("show")
                                    $('#warning-description').html(warning)
                                })
                            </script>
                        @endif
                        @if ($errors->any())
                            <div class="alert p-2 alert-danger alert-dismissible fade show" id="message-alert"
                                role="alert">
                                @foreach ($errors->all() as $error)
                                    <strong class="redhat med-text">{{ $error }}</strong><br>
                                @endforeach
                                <button type="button" class="btn-close small-text" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <span class="pt-3 redhat text-muted"><b>Lab Results</b></span>
                    </div>
                    <div class="bg-white shadow-sm mt-3 p-3">
                        <table class="table med-text" id="lab_results_table">
                            <thead class="text-purple">
                                <th>#</th>
                                <th>Lab Result</th>
                                <th>Upload Date</th>
                                <th>Recommendation</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="text-muted">
                                @foreach ($lab_result as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><a href="{{ url('lab_result/show_file/' . $hashids->encode($row->id)) }}"
                                                target="_blank">#{{ $row->lab_result_no }}</a></td>
                                        <td>{{ $row->upload_date }}</td>
                                        <td>
                                            @if ($row->recommendation_id == null)
                                                -
                                            @else
                                                <a href="{{ url('recommendation/show_file/' . $row->recommendation) }}"
                                                    target="_blank">Recommendation
                                                    link</a>
                                            @endif
                                        </td>
                                        <td align="center">
                                            @if ($row->recommendation_id == null)
                                                -
                                            @else
                                                @php
                                                    $data = App\Models\Recommendation::convert($row->recommendation);
                                                @endphp
                                                <a href="data:application/pdf;base64,{{ base64_encode($data) }}"
                                                    download="{{ $row->recommendation }}">
                                                    <button class="btn btn-default bg-transparent p-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="12" fill="currentColor" class="bi bi-download"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                                            <path
                                                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center mt-5">
                            <button type="button" class="btn btn-sm bg-green small-text py-2"
                                data-bs-toggle="modal" data-bs-target="#uploadLabResultModal">
                                <div class="d-flex justify-content-center align-item-center">
                                    <div class="pe-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <div class="pe-4 sato spacing-1">
                                        <b>UPLOAD LAB RESULT</b>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
