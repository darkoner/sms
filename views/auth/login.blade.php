@extends('layouts.login')

@section('content')

    <div class="title h5">Log in to your account</div>

    <div class="description mt-2"></div>
    <form method="POST" action="{{ route('login') }}" name="loginForm" class="mt-8">
        @csrf

        <div class="form-group mb-4">
            <label for="email">Email address</label>
            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                   name="email" aria-describedby="emailHelp" placeholder="" required autofocus/>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                   id="password" name="password" required/>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="remember-forgot-password row no-gutters align-items-center justify-content-between pt-4">

            <div class="form-check remember-me mb-4">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" aria-label="Remember Me" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}/>
                    <span class="checkbox-icon"></span>
                    <span class="form-check-description">Remember Me</span>
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="forgot-password text-secondary mb-4" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </div>

        <button type="submit" class="submit-button btn btn-block btn-secondary my-4 mx-auto"
                aria-label="LOG IN">
            LOG IN
        </button>

    </form>
@endsection