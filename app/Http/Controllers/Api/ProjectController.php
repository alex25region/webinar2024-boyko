<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\SaveProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Repository\Project\ProjectRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\LengthAwarePaginator;


final class ProjectController extends Controller
{
    public function __construct(private readonly ProjectRepositoryInterface $repository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): LengthAwarePaginator
    {
        // Method: GET
        // URL: http://127.0.0.1:8000/api/projects
        return $this->repository->list(true);
    }

    public function store(SaveProjectRequest $request): JsonResponse
    {
        // Method: POST
        // URL: http://127.0.0.1:8000/api/projects
        // BODY:
        // {
        //    "user_id": 1,
        //    "name": "проект созданый через апи",
        //    "description": "привет222222222222222"
        // }
        $this->repository->create($request->validated());
        return response()->json(['message' => 'Project created succesfully']);
    }

    public function show(Project $project): ProjectResource|JsonResponse
    {
        // Method: GET
        // URL: http://127.0.0.1:8000/api/projects/2
        return new ProjectResource($project);
    }

    public function update(SaveProjectRequest $request, Project $project): JsonResponse
    {
        // Method: PUT
        // URL: http://127.0.0.1:8000/api/projects/2
        // BODY:
        // {
        //    "user_id": 1,
        //    "name": "проект созданый через апи",
        //    "description": "привет222222222222222"
        // }
        $this->repository->update($project, $request->validated());
        return response()->json(['message' => 'Project update succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project): JsonResponse
    {
        // Method: DELETE
        // URL: http://127.0.0.1:8000/api/projects/2
        try {
            $this->repository->delete($project);
            return response()->json(['message' => 'Project delete succesfully']);
        } catch (\Throwable $e) {
            return response()->json(['message' => 'Project can not delete.'], 400);
        }
    }
}
