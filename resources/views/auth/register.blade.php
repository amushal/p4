@extends('layouts.app')

@section('title')
    Register
@endsection

@section('page-header')
    Register
@endsection

@section('page-content')


    <div class='form-container'>
        <form class="form-signin" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <h1 class="h3 mb-3 font-weight-normal">Sign up</h1>

            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>

                <input id="name"
                       type="text"
                       class="form-control{{ $errors->has('name') ? 'has-error' : '' }}"
                       placeholder="Name"
                       name="name"
                       value="{{ old('name') }}"
                       required
                       autofocus>
                @include('modules.error-field', ['field' => 'name'])
            </div>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email"
                       type="email"
                       class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"
                       placeholder="Email"
                       name="email"
                       value="{{ old('email') }}"
                       required>

                @include('modules.error-field', ['field' => 'email'])

            </div>

            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <input id="password"
                       type="password"
                       class="form-control{{ $errors->has('password') ? ' has-error' : '' }}"
                       placeholder="Password (min: 6)"
                       name="password"
                       required>

                @include('modules.error-field', ['field' => 'password'])

            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm"
                       type="password"
                       class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"
                       placeholder="Confirm password"
                       name="password_confirmation"
                       required>

                @include('modules.error-field', ['field' => 'password_confirmation'])

            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Register') }}</button>

        </form>
    </div>

@endsection
