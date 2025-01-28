@extends('_layouts.main')

@section('title', __('Создание шага для цели проекта'))

@section('content')

    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('steps.create', $project, $goal) }}
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="col-sm-12">
                <h1 class="m-0">@yield('title')</h1>
            </div>
        </div>

        <div class="card-body">
            <div class="col-4">
                @include('steps.form', [
                    'action' => route('steps.store', [$project, $goal]),
                    'method' => 'post',
                ])
            </div>
        </div>
    </div>
@endsection
