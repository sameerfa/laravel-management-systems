<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ItemTable;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTableController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.item-table.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_table_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.item-table.create');
    }

    public function edit(ItemTable $itemTable)
    {
        abort_if(Gate::denies('item_table_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.item-table.edit', compact('itemTable'));
    }

    public function show(ItemTable $itemTable)
    {
        abort_if(Gate::denies('item_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.item-table.show', compact('itemTable'));
    }
}
