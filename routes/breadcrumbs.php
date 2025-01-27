<?php

use App\Models\Goal;
use App\Models\User;
use App\Models\Project;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Главная
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push(__('Главная'), route('dashboard'));
});

// --------------------------------------------------------------------------
// Users

Breadcrumbs::for('users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Пользователи'), route('users.index'));
});

Breadcrumbs::for('users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('users.index');
    $trail->push(__('Создание пользователя'));
});

Breadcrumbs::for('users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users.index');
    $trail->push(__('Редактирование пользователя') . '-' . "$user->firstname $user->lastname ($user->email)");
});

// --------------------------------------------------------------------------
// Projects

Breadcrumbs::for('projects.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push(__('Проекты'), route('projects.index'));
});

Breadcrumbs::for('projects.create', function (BreadcrumbTrail $trail) {
    $trail->parent('projects.index');
    $trail->push(__('Создание проекта'));
});

Breadcrumbs::for('projects.edit', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects.index');
    $trail->push(__('Редактирование проекта') . ' - ' .  $project->name);
});

Breadcrumbs::for('projects.show', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects.index');
    $trail->push(__('Просмотр проекта') . ' - ' .  $project->name);
});



// --------------------------------------------------------------------------
// Goals

Breadcrumbs::for('goals.create', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('projects.index');
    $trail->push('Проект' . ' - ' .  $project->name, route('projects.show', $project));
    $trail->push(__('Создание цели'));
});

Breadcrumbs::for('goals.show', function (BreadcrumbTrail $trail, Project $project, Goal $goal) {
    $trail->parent('projects.index');
    $trail->push('Проект' . ' - ' .  $project->name, route('projects.show', $project));
    $trail->push(__('Цель - ') . $goal->name);
});
//
//Breadcrumbs::for('projects.create', function (BreadcrumbTrail $trail) {
//    $trail->parent('projects.index');
//    $trail->push(__('Создание проекта'));
//});
//
//Breadcrumbs::for('projects.edit', function (BreadcrumbTrail $trail, Project $project) {
//    $trail->parent('projects.index');
//    $trail->push(__('Редактирование проекта') . ' - ' .  $project->name);
//});
