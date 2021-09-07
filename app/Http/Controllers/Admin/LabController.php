<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LabController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lab_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lab.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lab_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lab.create');
    }

    public function edit(Lab $lab)
    {
        abort_if(Gate::denies('lab_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lab.edit', compact('lab'));
    }

    public function show(Lab $lab)
    {
        abort_if(Gate::denies('lab_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lab->load('patient', 'doctor');

        return view('admin.lab.show', compact('lab'));
    }
}
