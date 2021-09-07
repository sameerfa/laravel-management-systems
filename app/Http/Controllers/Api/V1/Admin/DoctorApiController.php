<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\Admin\DoctorResource;
use App\Models\Doctor;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource(Doctor::all());
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->validated());

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource($doctor);
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->validated());

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
