<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shelf;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShelfController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shelf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelf.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shelf_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelf.create');
    }

    public function edit(Shelf $shelf)
    {
        abort_if(Gate::denies('shelf_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelf.edit', compact('shelf'));
    }

    public function show(Shelf $shelf)
    {
        abort_if(Gate::denies('shelf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.shelf.show', compact('shelf'));
    }
}
