<form action="{{ $action }}" method="POST">
    @csrf @method($method)
    <div class="col-12">
        <div class="form-group p-0">
            <div class="col-sm-12 ">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="firstname">{{ trans('Имя') }}</label>
                    <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $user->firstname)}}" class="form-control" required autofocus>
                    @error('firstname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-sm-12 ">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="lastname">{{ trans('Фамилия') }}</label>
                    <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $user->lastname)}}" class="form-control" required>
                    @error('lastname')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email)}}"
                           class="form-control" required>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="phone">{{ trans('Телефон') }}</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone)}}"
                           class="form-control" required>
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
{{--        @if(request()->routeIs('users.create'))--}}
            <div class="row">
                <div class="col-12 ">
                    <div class="mb-3">
                        <label class="mb-1 fw-bolder text-black-50" for="password">{{ trans('Пароль') }}</label>
                        <input type="password" id="password" name="password" value=""
                               class="form-control" {{ request()->routeIs('users.create') ? 'required' : '' }}>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="mb-3">
                        <label class="mb-1 fw-bolder text-black-50" for="password_confirmation">{{ trans('Подтверждение пароля') }}</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" value=""
                               class="form-control " {{ request()->routeIs('users.create') ? 'required' : '' }}>
                        @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
{{--        @endif--}}
        <div class="row">
            <div class="form-check ms-2 fw-bolder text-black-50">
                <input type="checkbox" class="form-check-input border-black" id="is_admin" name="is_admin" @checked(old('is_admin', $user->is_admin)) value="1">
                <label class="form-check-label fw-bold" for="is_admin">{{ trans('Администратор') }}</label>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary shadow">
                    {{ trans('Сохранить') }}
                </button>
                &nbsp;
                <a href="{{ route('users.index') }}" class="btn btn-danger shadow">{{ trans('Отмена') }}</a>
            </div>
        </div>

    </div>
</form>
