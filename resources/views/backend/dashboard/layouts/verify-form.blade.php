@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">OTP Verification</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verify.number') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="otp_code" class="form-label">OTP Code</label>
                            <input type="text" class="form-control @error('otp_code') is-invalid @enderror" id="otp_code" name="otp_code" aria-describedby="otpHelp" required>
                            @error('otp_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div id="otpHelp" class="form-text">Please enter your OTP verification code!</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Verify</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
