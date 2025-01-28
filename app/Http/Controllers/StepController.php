<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Step\SaveStepRequest;
use App\Models\Goal;
use App\Models\Project;
use App\Models\Step;
use App\Repository\Step\StepRepositoryInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class StepController extends Controller
{
    public function __construct(private readonly StepRepositoryInterface $repository)
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
    public function create(Project $project, Goal $goal): View
    {
        $step = new Step();
        return view('steps.create', compact('project', 'goal', 'step'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveStepRequest $request, Project $project, Goal $goal): RedirectResponse
    {
        $step = $this->repository->create($request->validated());
        if ($step) {
            session()->put('success', 'Шаг успешно создан!');
        } else {
            session()->put('error', 'Ошибка! Не удалось создать шаг.');
        }
        return to_route('goals.show', compact('project', 'goal', 'step'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Step $step)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, Goal $goal, Step $step): View
    {
        return view('steps.edit', compact('project', 'goal', 'step'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveStepRequest $request, Project $project, Goal $goal, Step $step): RedirectResponse
    {
        if ($this->repository->update($step, $request->validated())) {
            session()->put('success', 'Шаг успешно отредактирован!');
        } else {
            session()->put('error', 'Ошибка! Не удалось отредактировать шаг.');
        }
        return to_route('goals.show', compact('project', 'goal'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Goal $goal, Step $step)
    {
        if($this->repository->delete($step)) {
            session()->put('success', 'Шаг успешно удален!');
        }
        else {
            session()->put('error', 'Ошибка! Не удалось удалить шаг.');
        }
        return to_route('goals.show', compact('project', 'goal'));
    }
}
