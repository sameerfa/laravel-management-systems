<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShelfRequest;
use App\Http\Requests\UpdateShelfRequest;
use App\Http\Resources\Admin\ShelfResource;
use App\Models\Shelf;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShelfApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shelf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShelfResource(Shelf::all());
    }

    public function store(StoreShelfRequest $request)
    {
        $shelf = Shelf::create($request->validated());

        return (new ShelfResource($shelf))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Shelf $shelf)
    {
        abort_if(Gate::denies('shelf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ShelfResource($shelf);
    }

    public function update(UpdateShelfRequest $request, Shelf $shelf)
    {
        $shelf->update($request->validated());

        return (new ShelfResource($shelf))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Shelf $shelf)
    {
        abort_if(Gate::denies('shelf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shelf->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
