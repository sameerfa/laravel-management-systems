<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBindingRequest;
use App\Http\Requests\UpdateBindingRequest;
use App\Http\Resources\Admin\BindingResource;
use App\Models\Binding;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BindingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('binding_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BindingResource(Binding::all());
    }

    public function store(StoreBindingRequest $request)
    {
        $binding = Binding::create($request->validated());

        return (new BindingResource($binding))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Binding $binding)
    {
        abort_if(Gate::denies('binding_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BindingResource($binding);
    }

    public function update(UpdateBindingRequest $request, Binding $binding)
    {
        $binding->update($request->validated());

        return (new BindingResource($binding))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Binding $binding)
    {
        abort_if(Gate::denies('binding_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $binding->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
