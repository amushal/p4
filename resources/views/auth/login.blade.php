@extends('layouts.app')

@section('title')
    Login
@endsection

@section('page-header')
    Login
@endsection

@section('page-content')

    <div class='form-container'>
        <form class="form-signin" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email"
                       type="text"
                       class="form-control"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus>

                @include('modules.error-field', ['field' => 'email'])

            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">
                    {{ __('Password') }}
                </label>


                <input id="password" type="password" class="form-control" name="password" required>

                @include('modules.error-field', ['field' => 'password'])

            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox"
                           name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                </label>
            </div>


            <button class="btn btn-lg btn-primary btn-block" type="submit">
                {{ __('Login') }}
            </button>

            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>

            <div>Don't have an account? <a href='/register'>Register here...</a></div>

        </form>
    </div>
@endsection
