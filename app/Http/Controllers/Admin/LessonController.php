<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LessonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lesson_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.index');
    }

    public function create()
    {
        abort_if(Gate::denies('lesson_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.create');
    }

    public function edit(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lesson.edit', compact('lesson'));
    }

    public function show(Lesson $lesson)
    {
        abort_if(Gate::denies('lesson_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lesson->load('course');

        return view('admin.lesson.show', compact('lesson'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['lesson_create', 'lesson_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Lesson();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
