<form action="{{ $action }}" method="POST">
    @csrf @method($method)

    <input type="hidden" name="project_id" value="{{ $project->id }}">

    <div class="col-12">
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Наименование') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $goal->name)}}"
                           class="form-control">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>

        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="term_in_month">{{ __('Срок в месяцах') }}</label>
                    <input type="number" id="term_in_months" name="term_in_months" value="{{ old('term_in_months', $goal->term_in_months)}}"
                           class="form-control">
                    @error('term_in_months')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>
        </div>
        <div class="form-group p-0 mt-1">
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-secondary shadow">
                    {{ __('Сохранить') }}
                </button>
                &nbsp;
{{--                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-danger shadow">{{ __('Отмена') }}</a>--}}
            </div>
        </div>

    </div>
</form>
