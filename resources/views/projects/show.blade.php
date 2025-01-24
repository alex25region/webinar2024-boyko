@extends('_layouts.main')
@section('title', __('Просмотр проекта'))

@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('projects.show', $project) }}
        </div>
    </div>

    @include('_layouts.errors')

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')</h1>
                <div class="">
                    <a href="{{ route('projects.edit', $project) }}" class="btn btn-round btn-secondary">
                        {{ __('Редактировать проект') }}
                    </a>
                </div>
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
                                <div class="form-group fw-bolder text-black-50 px-0">
                                    <p>тут картинка</p>
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
{{--                <div class="col-12 mt-4">--}}
{{--                    <a href="{{ route('goals.create', $project) }}" class="btn btn-secondary">Добавить цель</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">{{__('Цели')}}</h1>
            </div>
        </div>

        <div class="card-body">
                <div class="col-12">
                    <a href="{{ route('goals.create', $project) }}" class="btn btn-secondary">Добавить цель</a>
                </div>
                <div class="col-12 mt-3">
                    <table class="table table-hover table-sm table-striped table-bordered text-center shadow-sm">
                        <thead>
                        <tr>
                            <th scope="col" class="bg-secondary text-white border-0">{{ __('Наименование') }}</th>
                            <th scope="col" class="bg-secondary text-white border-0">{{ __('Срок в месяцах') }}</th>
                            <th scope="col" class="bg-secondary text-white border-0">{{ __('Действия') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($project->goals as $goal)
                            <tr>
                                <td>{{ $goal->name }}</td>
                                <td>{{ $goal->term_in_months }}</td>
                                <td class="text-nowrap">
{{--                                    <a href="{{ route('goals.show', $goal) }}" class="btn btn-success btn-sm me-2 shadow fw-normal py-1 px-2">--}}
{{--                                        {{__('Посмотреть')}}--}}
{{--                                    </a>--}}
{{--                                    <a href="{{ route('goals.edit', $goal) }}" class="btn btn-secondary btn-sm me-2 shadow fw-normal py-1 px-2">--}}
{{--                                        {{__('Редактировать')}}--}}
{{--                                    </a>--}}
                                    <a href="#" class="btn btn-danger btn-sm me-2 shadow fw-normal py-1 px-2"
                                       onclick="event.preventDefault();
                                        // TODO перевод фразы
                                       if(confirm('Вы действительно хотите удалить цель?')) {document.getElementById('goal-delete-{{ $goal->id }}').submit();}
                                       ">
                                        {{__('Удалить')}}
                                    </a>
{{--                                    @dd($goal)--}}
{{--                                    <form action="{{ route('goals.destroy', [$project, $goal]) }}" method="POST" id="goal-delete-{{ $goal->id }}">--}}
                                    <form action="{{ route('goals.destroy', [$project, $goal]) }}" method="POST" id="goal-delete-{{ $goal->id }}">
                                        @csrf @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

        </div>
    </div>
@endsection
