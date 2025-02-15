<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Project\SaveProjectRequest;
use App\Mail\ProjectCreatedMail;
use App\Models\Project;
use App\Models\User;
use App\Repository\Project\ProjectRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

final class ProjectController extends Controller
{
    public function __construct(private readonly ProjectRepositoryInterface $repository)
    {

    }

    public function index(): View
    {
        return view('projects.index', [
            'projects' => $this->repository->list(),
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
        if ($project = $this->repository->create($request->validated())) {
            Mail::to($project->user)->send(new ProjectCreatedMail($project));
            session()->put('success', 'Проект успешно создан!');
        } else {
            session()->put('error', 'Ошибка! Не удалось создать пользователя.');
        }
        return to_route('projects.index');
    }

    public function show(Project $project): View
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {
        $users = User::query()->get();
        return view('projects.edit', compact('project', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveProjectRequest $request, Project $project): RedirectResponse
    {
        if ($this->repository->update($project, $request->validated())) {
            session()->put('success', 'Проект успешно отредактирован!');
        } else {
            session()->put('error', 'Ошибка! Не удалось отредактировать проект.');
        }
        return to_route('projects.index');
    }

    public function destroy(Project $project): RedirectResponse
    {
        if ($this->repository->delete($project)) {
            session()->put('success', 'Проект успешно удален!');
        } else {
            session()->put('error', 'Ошибка! Не удалось удалить проект.');
        }
        return back();
    }
}
