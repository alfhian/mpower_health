@extends('layouts.main')

@section('content')

@php
$client = App\Models\ClientInformation::where('id', Auth::id())->get();
$firstname = $client[0]['firstname'];
@endphp

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-lg-6 d-flex justify-content-center">
            <img src="{{ asset('img/verification_thankyou.jpg') }}" class="rounded" alt="email_verification" width="80%">
        </div>
        <div class="col-lg-6 d-flex align-items-center">
            <div class="w-75 text-center">
                <h4 class="sato text-purple"><b>VERIFY YOUR EMAIL</b></h4>
                <p class="redhat text-secondary">
                    Hi {{ $firstname }}, please verify your email address by clicking the link sent to {{ Auth::user()->email }}
                    
                </p>
                @if (session('status') == 'verification-link-sent')
                <p class="redhat text-muted">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </p>
                @endif

                <div class="mb-2">
                    <span class="redhat small-text text-secondary mb-3">
                        Not getting any e-mail from us?
                    </span>
                </div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button type="submit" class="btn w-100 bg-purple sato text-white mb-2">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </div>
                </form>
            </div>
            <!--
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf

                <button type="submit" class="btn w-25 bg-green sato small-text text-white spacing-1">
                    {{ __('Log Out') }}
                </button>
            </form>
            -->
            <form action="{{ route('force_logout') }}" id="force-logout-form" method="post">
                @csrf
                <input type="hidden" name="route" id="route" value="">
            </form>
        </div>
    </div>
</div>

@endsection