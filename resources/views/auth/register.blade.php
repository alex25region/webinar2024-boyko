@extends('auth.layouts.app')

@section('title', __('Регистрация'))

@section('content')

    <div class="container container-login pt-4" style="display: block; min-width: 300px; width: 500px">
        <h2 class="text-center">@yield('title')</h2>
        <div class="login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="firstname"><b>{{ __('Имя') }}</b></label>
                    <input id="firstname" name="firstname" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="password"><b>{{ __('Пароль') }}</b></label>
                    <div class="position-relative">
                        <input id="passwordsignin" name="password" type="password" class="form-control" required="">
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="confirmation_password"><b>{{ __('Подтверждение пароля') }}</b></label>
                    <div class="position-relative">
                        <input id="confirmation_password" name="confirmation_password" type="password"
                               class="form-control" required="">
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                </div>
{{--                <div class="row form-sub m-0">--}}
{{--                    <div class="form-check">--}}
{{--                        <input type="checkbox" class="form-check-input" name="agree" id="agree">--}}
{{--                        <label class="form-check-label" for="agree">I Agree the terms and conditions.</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="row form-action">
                    <div class="col-md-6">
                        <a href="{{ route('login') }}"
                           class="btn btn-link w-100 text-nowrap link">{{ __('У меня уже есть аккаунт!') }}</a>
                    </div>
                    <div class="col-md-6">
                        {{--                    <a href="#" class="btn btn-primary w-100 fw-bold">Sign Up</a>--}}
                        <button type="submit"
                                class="btn btn-primary w-100 fw-bold">{{ __('Зарегитрироваться') }}</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
