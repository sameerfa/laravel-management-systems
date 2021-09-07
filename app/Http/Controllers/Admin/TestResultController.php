<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestResult;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestResultController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_result_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-result.index');
    }

    public function create()
    {
        abort_if(Gate::denies('test_result_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-result.create');
    }

    public function edit(TestResult $testResult)
    {
        abort_if(Gate::denies('test_result_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-result.edit', compact('testResult'));
    }

    public function show(TestResult $testResult)
    {
        abort_if(Gate::denies('test_result_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testResult->load('test', 'student');

        return view('admin.test-result.show', compact('testResult'));
    }
}
