<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLabRequest;
use App\Http\Requests\UpdateLabRequest;
use App\Http\Resources\Admin\LabResource;
use App\Models\Lab;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LabResource(Lab::with(['patient', 'doctor'])->get());
    }

    public function store(StoreLabRequest $request)
    {
        $lab = Lab::create($request->validated());

        return (new LabResource($lab))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Lab $lab)
    {
        abort_if(Gate::denies('lab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LabResource($lab->load(['patient', 'doctor']));
    }

    public function update(UpdateLabRequest $request, Lab $lab)
    {
        $lab->update($request->validated());

        return (new LabResource($lab))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lab $lab)
    {
        abort_if(Gate::denies('lab_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lab->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
