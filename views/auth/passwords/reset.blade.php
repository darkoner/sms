@extends('layouts.login')

@section('content')

<div class="title h5">Reset Password</div>

<div class="description mt-2"></div>

    <form method="POST" action="{{ route('password.update') }}" class="mt-8">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group mb-4">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <input id="email" type="email"
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                value="{{ $email ?? old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group mb-4">
            <label for="password">{{ __('Password') }}</label>

            <input id="password" type="password"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group mb-4">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                required>

        </div>

        <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto">
            {{ __('Reset Password') }}
        </button>

    </form>
@endsection
