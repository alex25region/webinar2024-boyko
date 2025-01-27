@extends('_layouts.main')

@section('title', __('Пользователи'))

@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('users.index') }}
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')&nbsp;&nbsp;<a href="{{ route('users.create') }}" class="btn btn-round btn-secondary shadow">
                        {{ __('Создать пользователя') }}
                    </a></h1>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-hover table-sm table-striped table-bordered text-center shadow-sm">
                <thead>
                <tr>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Имя') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">Email</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Телефон') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Администратор') }}</th>
                    <th scope="col" class="bg-secondary text-white text-white-50 border-0">{{ __('Действия') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <span
                                class="badge px-3 {{ $user->is_admin ? 'badge-success' : 'badge-danger' }}">{{ $user->is_admin ? 'YES' : 'NO' }}</span>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}" class="text-secondary">
                                <i class="fas fa-pencil-alt fs-4"></i>
                            </a>
                            <a href="#" class="text-danger"
                               onclick="event.preventDefault();
                                       if(confirm('Вы действительно хотите удалить пользователя?')) {document.getElementById('user-delete-{{ $user->id }}').submit();}
                                       ">
                                <i class="fa fa-trash-alt fs-3 ms-2"></i>
                            </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                      id="user-delete-{{ $user->id }}">
                                    @csrf @method('delete')
                                </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="w-100 d-flex align-items-center justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
