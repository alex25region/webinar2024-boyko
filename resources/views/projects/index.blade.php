@extends('_layouts.main')

@section('title', __('Проекты'))

@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('projects.index') }}
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')&nbsp;&nbsp;<a href="{{ route('projects.create') }}"
                                                               class="btn btn-round btn-secondary shadow">
                        {{ __('Создать проект') }}
                    </a></h1>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover table-sm table-striped table-bordered text-center shadow-sm">
                <thead>
                <tr>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Пользователь') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Наименование') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Изображение') }}e</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Описание') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Действия') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->user->firstname }}, {{ $project->user->lastname }} ({{ $project->user->email }}
                            )
                        </td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->image }}</td>
                        <td>{{ $project->description }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('projects.show', $project) }}"
                               class="btn btn-success btn-sm me-2 shadow fw-normal py-1 px-2">
                                {{__('Подробнее')}}
                            </a>
                            <a href="{{ route('projects.edit', $project) }}"
                               class="btn btn-secondary btn-sm me-2 shadow fw-normal py-1 px-2">
                                {{__('Редактировать')}}
                            </a>
                            <a href="#" class="btn btn-danger btn-sm me-2 shadow fw-normal py-1 px-2"
                               onclick="event.preventDefault();
                               // TODO перевод фразы
                                       if(confirm('Вы действительно хотите удалить проект?')) {document.getElementById('user-delete-{{ $project->id }}').submit();}
                                       ">
                                {{__('Удалить')}}
                            </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                  id="user-delete-{{ $project->id }}">
                                @csrf @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="w-100 d-flex align-items-center justify-content-center">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
