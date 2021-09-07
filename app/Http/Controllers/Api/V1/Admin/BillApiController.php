<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Http\Resources\Admin\BillResource;
use App\Models\Bill;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BillApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bill_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BillResource(Bill::with(['patient'])->get());
    }

    public function store(StoreBillRequest $request)
    {
        $bill = Bill::create($request->validated());

        return (new BillResource($bill))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Bill $bill)
    {
        abort_if(Gate::denies('bill_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BillResource($bill->load(['patient']));
    }

    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $bill->update($request->validated());

        return (new BillResource($bill))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Bill $bill)
    {
        abort_if(Gate::denies('bill_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bill->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
