<?php

use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Главная
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('dashboard'));
});

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('dashboard'));
    $trail->push('Пользователи', route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('dashboard'));
    $trail->push('Пользователи', route('users.index'));
    $trail->push('Создание пользователя', route('users.create'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->push('Главная', route('dashboard'));
    $trail->push('Пользователи', route('users.index'));
    $trail->push("Редактирование пользователя - $user->firstname $user->lastname ($user->email)", route('users.edit', $user));
});
