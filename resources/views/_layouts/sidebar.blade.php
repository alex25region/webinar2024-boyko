<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header border-bottom border-primary border-opacity-10" data-background-color="dark" style="border-color: #0a58ca; border-bottom: #474747 !important;">
            <a href="{{ route('dashboard') }}" class="logo w-100 text-white-50">
                <div class="d-flex align-content-center justify-content-center w-100">
                    <h1 class="fw-bolder">WEBINAR</h1>
                </div>
            </a>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav nav-secondary">
                <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
{{--                    <h4 class="text-section">Сущности</h4>--}}
                </li>
                <li class="nav-item {{ active_link('dashboard') }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>{{ __('Главная') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ active_link('users.*') }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <p>{{ __('Пользователи') }}</p>
                    </a>
                </li>
                <li class="nav-item {{ active_link('projects.*') }}">
                    <a href="{{ route('projects.index') }}">
                        <i class="fas fa-project-diagram"></i>
                        <p>{{ __('Проекты') }}</p>
                    </a>
                </li>
            </ul>


        </div>
    </div>
</div>
