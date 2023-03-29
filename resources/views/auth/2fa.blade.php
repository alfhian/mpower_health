@extends('layouts.main')

@section('content')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h5 class="redhat text-purple spacing-1 text-center mb-3"><b>Authentication Code</b></h5>

                <form method="POST" action="{{ route('2fa_post') }}">
                    @csrf

                    <p class="redhat med-text text-center">We sent code to email :
                        {{ substr(Session::get('email'), 0, 5) . '******' . substr(Session::get('email'), -2) }}</p>

                    @if ($message = Session::get('success'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($message = Session::get('error'))
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <label for="code" class="col-md-4 col-form-label text-md-right redhat med-text">4 Digits Code</label>

                        <div class="col-md-6">
                            <input type="hidden" name="email" value="{{ Session::get('email') }}">
                            <input type="hidden" name="password" value="{{ Session::get('password') }}">
                            <input id="code" type="number" class="form-control form-control-sm input-gray @error('code') is-invalid @enderror"
                                name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-md-8 offset-md-4">
                            <a class="btn btn-link redhat med-text p-0" href="{{ route('2fa_resend') }}">Resend Code?</a>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" class="btn redhat w-100 bg-purple text-white mb-2">
                                Submit
                            </button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
