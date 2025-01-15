
@extends('_layouts.main')
@section('title', trans('Создание пользователя'))

@section('content')

    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('users.create') }}
        </div>
    </div>

{{--    @include('_layouts.errors')--}}

    <div class="card p-2">
        <div class="card-header">
            <div class="col-sm-12">
                <h1 class="m-0">@yield('title')</h1>
            </div>
        </div>

        <div class="card-body">
            <div class="col-4">
                @include('users.form', [
                    'action' => route('users.store'),
                    'method' => 'post',
                ])
            </div>
        </div>
    </div>
@endsection
