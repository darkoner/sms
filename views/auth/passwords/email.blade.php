@extends('layouts.login')

@section('content')

<div class="title h5">Reset Password</div>

<div class="description mt-2"></div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="mt-8">
    @csrf

    <div class="form-group mb-4">
        <label for="email">Email address</label>

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

    </div>

    <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto"
            aria-label="LOG IN">
        {{ __('Send Password Reset Link') }}
    </button>
</form>

<div
    class="register d-flex flex-column flex-sm-row align-items-center justify-content-center mt-8 mb-6 mx-auto">
    <span class="text mr-sm-2">Already know the password?</span>
    <a class="link text-secondary" href="{{ route('login') }}">Login</a>
</div>
@endsection
