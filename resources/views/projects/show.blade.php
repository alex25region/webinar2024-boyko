@extends('_layouts.main')

@section('title', __('Просмотр проекта'))

@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('projects.show', $project) }}
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')&nbsp;&nbsp;<a href="{{ route('projects.edit', $project) }}"
                                                              class="btn btn-round btn-secondary shadow">
                        {{ __('Редактировать проект') }}
                    </a></h1>
            </div>
        </div>

        <div class="card-body">
            <div class="col-4">

                <div class="col-12">
                    <div class="form-group p-0">
                        <div class="col-sm-12 ">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50"
                                       for="user_id">{{ __('Пользователь') }}</label>
                                <input type="text" id="user_id" name="user_id" value="{{$project->user->email}}"
                                       class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group p-0">
                        <div class="col-sm-12 ">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Наименование') }}</label>
                                <input type="text" id="name" name="name" value="{{ $project->name}}"
                                       class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group p-0">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50" for="name">{{ __('Изображение') }}</label>
                                <div class="form-group px-0 mt-0 pt-0">
                                    <img class="w-75 shadow" src="{{ Storage::disk('public')->url($project->image) }}" alt=""/>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group p-0">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="mb-1 fw-bolder text-black-50"
                                       for="description">{{ __('Описание') }}</label>
                                <input type="text" id="description" name="description"
                                       value="{{ $project->description}}"
                                       class="form-control" disabled>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('goals.index')

@endsection
