@extends('auth.layouts.app')

@section('title', __('Авторизация'))

@section('content')

    <div class="container container-login pt-4" style="display: block; min-width: 300px; width: 500px">
        <h2 class="text-center">@yield('title')</h2>
        <hr>
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}"
                           required="">
                    @error('email')
                    <span class="small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"><b>{{ __('Пароль') }}</b></label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="link float-end">{{ __('Забыли пароль?') }}</a>
                    @endif
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control">
                        @error('password')
                        <span class="small text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>

                    </div>
                </div>
                <div class="form-group form-action-d-flex mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember"
                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label m-0" for="remember">{{ __('Запомнить меня') }}</label>
                    </div>
                    <button type="submit" class="btn btn-primary col-md-5 float-end mt-3 mt-sm-0 fw-bold">{{ __('Войти') }}</button>
                </div>
                <div class="login-account">
                    <span class="msg">{{ __('У Вас нету аккаунта?') }}</span>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="link">{{ __('Регистрация') }}</a>
                    @endif
                </div>
            </form>
        </div>
    </div>

@endsection
