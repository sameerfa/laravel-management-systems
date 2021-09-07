<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestAnswer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('test_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-answer.index');
    }

    public function create()
    {
        abort_if(Gate::denies('test_answer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-answer.create');
    }

    public function edit(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.test-answer.edit', compact('testAnswer'));
    }

    public function show(TestAnswer $testAnswer)
    {
        abort_if(Gate::denies('test_answer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $testAnswer->load('testResult', 'question', 'option');

        return view('admin.test-answer.show', compact('testAnswer'));
    }
}
