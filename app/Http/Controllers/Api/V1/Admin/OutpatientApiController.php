<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOutpatientRequest;
use App\Http\Requests\UpdateOutpatientRequest;
use App\Http\Resources\Admin\OutpatientResource;
use App\Models\Outpatient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OutpatientApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outpatient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutpatientResource(Outpatient::with(['patient', 'lab'])->get());
    }

    public function store(StoreOutpatientRequest $request)
    {
        $outpatient = Outpatient::create($request->validated());

        return (new OutpatientResource($outpatient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Outpatient $outpatient)
    {
        abort_if(Gate::denies('outpatient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OutpatientResource($outpatient->load(['patient', 'lab']));
    }

    public function update(UpdateOutpatientRequest $request, Outpatient $outpatient)
    {
        $outpatient->update($request->validated());

        return (new OutpatientResource($outpatient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Outpatient $outpatient)
    {
        abort_if(Gate::denies('outpatient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outpatient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
