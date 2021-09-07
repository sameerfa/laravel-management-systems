<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inpatient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InpatientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inpatient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inpatient.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inpatient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inpatient.create');
    }

    public function edit(Inpatient $inpatient)
    {
        abort_if(Gate::denies('inpatient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.inpatient.edit', compact('inpatient'));
    }

    public function show(Inpatient $inpatient)
    {
        abort_if(Gate::denies('inpatient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $inpatient->load('room', 'lab');

        return view('admin.inpatient.show', compact('inpatient'));
    }
}
