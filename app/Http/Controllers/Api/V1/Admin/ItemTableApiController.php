<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemTableRequest;
use App\Http\Requests\UpdateItemTableRequest;
use App\Http\Resources\Admin\ItemTableResource;
use App\Models\ItemTable;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemTableApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('item_table_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemTableResource(ItemTable::all());
    }

    public function store(StoreItemTableRequest $request)
    {
        $itemTable = ItemTable::create($request->validated());

        return (new ItemTableResource($itemTable))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ItemTable $itemTable)
    {
        abort_if(Gate::denies('item_table_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ItemTableResource($itemTable);
    }

    public function update(UpdateItemTableRequest $request, ItemTable $itemTable)
    {
        $itemTable->update($request->validated());

        return (new ItemTableResource($itemTable))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ItemTable $itemTable)
    {
        abort_if(Gate::denies('item_table_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemTable->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
