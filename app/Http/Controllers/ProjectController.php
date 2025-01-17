<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\SaveProjectRequest;
use App\Models\Project;
use App\Models\User;
use App\Repository\Project\ProjectRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ProjectController extends Controller
{
    public function __construct(private ProjectRepositoryInterface $projectRepository)
    {

    }
    public function index(): View
    {
        return view('projects.index', [
            'projects' => $this->projectRepository->list(),
        ]);
    }

    public function create(): View
    {
        $users = User::query()->get();
        $project = new Project();
        return view('projects.create', compact('project', 'users'));
    }

    public function store(SaveProjectRequest $request): RedirectResponse
    {
        if ($this->projectRepository->create($request->validated())) {
            session()->put('success', 'Проект успешно создан!');
        } else {
            session()->put('error', 'Ошибка! Не удалось создать пользователя.');
        }
        return to_route('projects.index');
    }

    public function edit(Project $project)
    {
        $users = User::query()->get();
        return view('projects.edit', compact('project','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProjectRequest $request, Project $project)
    {
        if ($this->projectRepository->update($project, $request->validated())) {
            session()->put('success', 'Проект успешно отредактирован!');
        } else {
            session()->put('error', 'Ошибка! Не удалось отредактировать проект.');
        }
        return to_route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($this->projectRepository->delete($project)) {
            session()->put('success', 'Проект успешно удален!');
        } else {
            session()->put('error', 'Ошибка! Не удалось удалить проект.');
        }
        return back();
    }
}
