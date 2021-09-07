<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionOption;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionOptionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_option_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-option.index');
    }

    public function create()
    {
        abort_if(Gate::denies('question_option_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-option.create');
    }

    public function edit(QuestionOption $questionOption)
    {
        abort_if(Gate::denies('question_option_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.question-option.edit', compact('questionOption'));
    }

    public function show(QuestionOption $questionOption)
    {
        abort_if(Gate::denies('question_option_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionOption->load('question');

        return view('admin.question-option.show', compact('questionOption'));
    }
}
