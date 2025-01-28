<form action="{{ $action }}" method="POST">
    @csrf @method($method)

    <input type="hidden" name="goal_id" value="{{ $goal->id }}">

    <div class="col-12">
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Наименование') }}</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $step->name)}}"
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
                    <label class="mb-1 fw-bolder text-black-50" for="started_at">{{ __('Дата начала') }}</label>
                    <input type="date" id="started_at" name="started_at"
                           value="{{ old('started_at', $step->started_at->format('Y-m-d'))}}"
                           class="form-control">
                    @error('started_at')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group p-0">
            <div class="col-12">
                <div class="mb-3">
                    <label class="mb-1 fw-bolder text-black-50" for="finished_at">{{ __('Дата окончания') }}</label>
                    <input type="date" id="finished_at" name="finished_at"
                           value="{{ old('finished_at', $step->finished_at->format('Y-m-d'))}}"
                           class="form-control">
                    @error('finished_at')
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
            </div>
        </div>

    </div>
</form>
