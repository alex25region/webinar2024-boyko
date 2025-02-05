<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\CreatedGoalEvent;
use App\Http\Requests\Goal\SaveGoalRequest;
use App\Models\Goal;
use App\Models\Project;
use App\Repository\Goal\GoalRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class GoalController extends Controller
{
    public function __construct(private readonly GoalRepositoryInterface $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project): View
    {
        $goal = new Goal();
        return view('goals.create', compact('goal', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveGoalRequest $request): RedirectResponse
    {

        if ($goal = $this->repository->create($request->validated())) {
            event(new CreatedGoalEvent($goal));
            session()->put('success', 'Цель успешно создана!');

        } else {
            session()->put('error', 'Ошибка! Не удалось создать цель.');
        }
        return to_route('projects.show', $goal->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, Goal $goal): View
    {
        return view('goals.show', compact('project', 'goal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Goal $goal): View
    {
        return view('goals.edit', compact('project', 'goal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Project $project, SaveGoalRequest $request, Goal $goal): RedirectResponse
    {
        if ($this->repository->update($goal, $request->validated())) {
            session()->put('success', 'Цель успешно отредактирована!');

        } else {
            session()->put('error', 'Ошибка! Не удалось отредактировать цель.');
        }
        return to_route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Goal $goal): RedirectResponse
    {
        if ($this->repository->delete($goal)) {
            session()->put('success', 'Цель успешно удалена!');

        } else {
            session()->put('error', 'Ошибка! Не удалось удалить цель.');
        }
        return to_route('projects.show', $project);
    }
}
