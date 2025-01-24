<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Goal\SaveGoalRequest;
use App\Models\Goal;
use App\Models\Project;
use App\Repository\Goal\GoalRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function store(SaveGoalRequest $request)
    {
        $goal = $this->repository->create($request->validated());
        return to_route('projects.show', $goal->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Goal $goal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goal $goal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goal $goal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, Goal $goal, GoalRepositoryInterface $repository): RedirectResponse
    {
        $repository->delete($goal);
        return to_route('projects.show', $project);
    }
}
