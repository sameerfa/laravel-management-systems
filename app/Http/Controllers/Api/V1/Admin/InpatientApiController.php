<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInpatientRequest;
use App\Http\Requests\UpdateInpatientRequest;
use App\Http\Resources\Admin\InpatientResource;
use App\Models\Inpatient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InpatientApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inpatient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InpatientResource(Inpatient::with(['room', 'lab'])->get());
    }

    public function store(StoreInpatientRequest $request)
    {
        $inpatient = Inpatient::create($request->validated());

        return (new InpatientResource($inpatient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Inpatient $inpatient)
    {
        abort_if(Gate::denies('inpatient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InpatientResource($inpatient->load(['room', 'lab']));
    }

    public function update(UpdateInpatientRequest $request, Inpatient $inpatient)
    {
        $inpatient->update($request->validated());

        return (new InpatientResource($inpatient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Inpatient $inpatient)
    {
        abort_if(Gate::denies('inpatient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inpatient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
