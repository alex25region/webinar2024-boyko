@extends('_layouts.main')
@section('title', __('Главная'))
@section('content')
    <div class="card">
        <div class="row m-3 mb-0 pb-0">
            {{ Breadcrumbs::render('dashboard') }}
        </div>
    </div>

    <div class="card p-2">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="m-0">@yield('title')</h1>

            </div>
        </div>

        <div class="card-body">

        </div>
    </div>
@endsection
