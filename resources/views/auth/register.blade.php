@extends('auth.layouts.app')

@section('title', __('Регистрация'))

@section('content')
    {{--    @include('_layouts.errors')--}}

    <div class="container container-login py-5 my-3" style="display: block; min-width: 300px; width: 500px">
        <h2 class="text-center">@yield('title')</h2>
        <hr>
        <div class="login-form">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="firstname"><b>{{ __('Имя') }}</b></label>
                            <input id="firstname" name="firstname" type="text" class="form-control"
                                   value="{{ old('firstname') }}">
                            @error('firstname')
                            <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="lastname"><b>{{ __('Фамилия') }}</b></label>
                            <input id="lastname" name="lastname" type="text" class="form-control"
                                   value="{{ old('lastname') }}">
                            @error('lastname')
                            <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email') }}">
                    @error('email')
                    <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"><b>{{ __('Пароль') }}</b></label>

                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control">

                        <div>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    @error('password')
                    <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password_confirmation"><b>{{ __('Подтверждение пароля') }}</b></label>
                        <div class="position-relative">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                   class="form-control">
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    @error('password')
                    <span class="small text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
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
                        <button type="submit"
                                class="btn btn-primary w-100 fw-bold">{{ __('Зарегистрироваться') }}</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection
