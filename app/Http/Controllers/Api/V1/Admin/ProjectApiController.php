<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Resources\Admin\ProjectResource;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource(Project::with(['customer'])->get());
    }

    public function store(StoreProjectRequest $request)
    {
        $project = Project::create($request->validated());

        if ($request->input('related_files', false)) {
            $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('related_files'))))->toMediaCollection('related_files');
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Project $project)
    {
        abort_if(Gate::denies('project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ProjectResource($project->load(['customer']));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());

        if ($request->input('related_files', false)) {
            if (!$project->related_files || $request->input('related_files') !== $project->related_files->file_name) {
                if ($project->related_files) {
                    $project->related_files->delete();
                }
                $project->addMedia(storage_path('tmp/uploads/' . basename($request->input('related_files'))))->toMediaCollection('related_files');
            }
        } elseif ($project->related_files) {
            $project->related_files->delete();
        }

        return (new ProjectResource($project))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Project $project)
    {
        abort_if(Gate::denies('project_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $project->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
