<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\Admin\PatientResource;
use App\Models\Patient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('patient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PatientResource(Patient::all());
    }

    public function store(StorePatientRequest $request)
    {
        $patient = Patient::create($request->validated());

        return (new PatientResource($patient))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Patient $patient)
    {
        abort_if(Gate::denies('patient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PatientResource($patient);
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        $patient->update($request->validated());

        return (new PatientResource($patient))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Patient $patient)
    {
        abort_if(Gate::denies('patient_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $patient->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
