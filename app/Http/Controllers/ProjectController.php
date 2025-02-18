<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Project\SaveProjectRequest;
use App\Mail\ProjectCreatedMail;
use App\Models\Project;
use App\Models\User;
use App\Notifications\TestNotification;
use App\Repository\Project\ProjectRepositoryInterface;
use App\Services\FileUpload\FileUplodService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

final class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectRepositoryInterface $repository,
        private readonly FileUplodService           $fileUplodService
    )
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

            if($request->hasFile('image')) {
                $file = $request->file('image');
                if($file->isValid()) {
                    $this->repository->saveImage($project, $this->fileUplodService->upload($file, $project));
                }
            }

            Mail::to($project->user)->send(new ProjectCreatedMail($project));
            session()->put('success', 'Проект успешно создан!');


        } else {
            session()->put('error', 'Ошибка! Не удалось создать проект.');
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
        $data = $request->validated();
        unset($data['image']);

        if ($this->repository->update($project, $data)) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if ($file->isValid()) {
                    $link = $this->fileUplodService->upload(
                        $file,
                        $project
                    );
                    $this->repository->saveImage(
                        $project,
                        $link
                    );
                }
            }
            $delay = now()->addMinute();
            $project->user->notify((new TestNotification($project))->delay($delay));
            session()->put('success', 'Проект успешно отредактёирован!');
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
