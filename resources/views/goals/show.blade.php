@extends('_layouts.main')

@section('title', __('Просмотр цели'))

@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('goals.show', $project, $goal) }}
        </div>
    </div>
    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')&nbsp;&nbsp;<a href="{{ route('goals.edit', [$project, $goal]) }}" class="btn btn-round btn-secondary shadow">
                        {{ __('Редактировать цель') }}
                    </a></h1>
            </div>
        </div>

        <div class="card-body">
            <div class="col-4">
                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <div class="col-12">
                    <div class="form-group p-0">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Наименование') }}</label>
                                <input type="text" id="name" name="name" value="{{$goal->name}}"
                                       class="form-control" disabled>
                            </div>

                        </div>
                    </div>

                    <div class="form-group p-0">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50"
                                       for="term_in_month">{{ __('Срок в месяцах') }}</label>
                                <input type="number" id="term_in_months" name="term_in_months"
                                       value="{{ $goal->term_in_months}}"
                                       class="form-control" disabled>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('steps.index')

@endsection
