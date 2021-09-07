<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test.index');
    }

    public function create()
    {
        abort_if(Gate::denies('test_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test.create');
    }

    public function edit(Test $test)
    {
        abort_if(Gate::denies('test_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test.edit', compact('test'));
    }

    public function show(Test $test)
    {
        abort_if(Gate::denies('test_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $test->load('course', 'lesson');

        return view('admin.test.show', compact('test'));
    }
}
