<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf @method($method)
    <div class="col-12">
        <div class="form-group p-0">
            <div class="col-sm-12 ">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="user_id">{{ __('Пользователь') }}</label>
                    <select class="form-control form-select" id="user_id" name="user_id" >
                        <option value="" disabled selected>Выберите значение</option>
                        @foreach($users as $user)
                                <option value="{{ $user->id }}" {{$user->id == $project->user_id ? 'selected ' : ''}}>
                                    {{ $user->firstname }}, {{ $user->lastname }} ({{ $user->email }})
                                </option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-sm-12 ">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Наименование') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $project->name)}}" class="form-control" >
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Изображение') }}</label>
                    @if($project->image)
                        <div class="form-group px-0 mt-0 pt-0">
                            <img class="w-75" src="{{ Storage::disk('public')->url($project->image) }}" alt="Изображение не найдено">
                        </div>
                    @endif
                    <div class="form-group fw-bolder text-black-50 px-0">
                        <label class="pe-2">{{__('Необходимо выбрать изображение')}}:</label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="description">{{ __('Описание') }}</label>
                    <input type="text" id="description" name="description" value="{{ old('phone', $project->description)}}"
                           class="form-control">
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group p-0 mt-1">
            <div class="col-12">
                <button type="submit" class="btn btn-secondary shadow">
                    {{ __('Сохранить') }}
                </button>
                &nbsp;
                <a href="{{ route('projects.index') }}" class="btn btn-danger shadow">{{ __('Отмена') }}</a>
            </div>
        </div>

    </div>
</form>
