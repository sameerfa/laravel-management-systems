<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Binding;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BindingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('binding_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.binding.index');
    }

    public function create()
    {
        abort_if(Gate::denies('binding_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.binding.create');
    }

    public function edit(Binding $binding)
    {
        abort_if(Gate::denies('binding_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.binding.edit', compact('binding'));
    }

    public function show(Binding $binding)
    {
        abort_if(Gate::denies('binding_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.binding.show', compact('binding'));
    }
}
