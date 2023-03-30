@extends('layouts.main')

@section('content')
    <div class="dashboard-container d-flex">
        @include('layouts.sidebar')
        <div class="dashboard container-fluid m-0 px-3 pt-5">
            <div class="row">
                <div class="col dashboard-right">
                    <div class="mt-5">
                        @if ($message = Session::get('success'))
                            <div class="alert p-2 alert-success alert-dismissible fade show" id="message-alert"
                                role="alert">
                                <strong class="redhat med-text">{{ $message }}</strong>
                                <button type="button" class="btn-close small-text" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <span class="pt-3 redhat text-muted"><b>Recommendations</b></span>
                    </div>
                    <div class="mt-3">
                        <div class="row">
                            @foreach ($recommendation as $row)
                                <div class="col-lg-3 mb-3">
                                    <div class="card shadow-sm">
                                        <div class="card-body p-4">
                                            <img src="{{ asset('img/profileicons/pdf_icon.png') }}" alt="pdf icon"
                                                width="50px">
                                            <div class="card-title mt-3">
                                                <a href="{{ url('lab_result/show_file/' . $hashids->encode($row->lab_result_id)) }}"
                                                    class="text-decoration-none">
                                                    <h6 class="redhat text-purple"><b>#{{ $row->lab_result_no }}</b></h6>
                                                </a>
                                            </div>
                                            <div class="card-text">
                                                <span class="redhat med-text text-muted">{{ $row->upload_date }}</span>
                                                <br>
                                                @php
                                                    $data = App\Models\Recommendation::convert($row->recommendation);
                                                @endphp
                                                <a href="data:application/pdf;base64,{{ base64_encode($data) }}"
                                                    download="{{ $row->recommendation }}">
                                                    <button type="button" class="btn btn-default bg-transparent p-0">
                                                        <span class="redhat med-text text-purple me-4">
                                                            Download
                                                        </span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="#aa206b" class="bi bi-arrow-right-circle"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
