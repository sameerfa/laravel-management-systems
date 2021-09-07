<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outpatient;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OutpatientController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('outpatient_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outpatient.index');
    }

    public function create()
    {
        abort_if(Gate::denies('outpatient_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outpatient.create');
    }

    public function edit(Outpatient $outpatient)
    {
        abort_if(Gate::denies('outpatient_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.outpatient.edit', compact('outpatient'));
    }

    public function show(Outpatient $outpatient)
    {
        abort_if(Gate::denies('outpatient_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $outpatient->load('patient', 'lab');

        return view('admin.outpatient.show', compact('outpatient'));
    }
}
