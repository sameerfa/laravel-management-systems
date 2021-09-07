<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Http\Resources\Admin\BorrowerResource;
use App\Models\Borrower;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BorrowerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borrower_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BorrowerResource(Borrower::with(['student', 'book', 'user'])->get());
    }

    public function store(StoreBorrowerRequest $request)
    {
        $borrower = Borrower::create($request->validated());

        return (new BorrowerResource($borrower))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Borrower $borrower)
    {
        abort_if(Gate::denies('borrower_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BorrowerResource($borrower->load(['student', 'book', 'user']));
    }

    public function update(UpdateBorrowerRequest $request, Borrower $borrower)
    {
        $borrower->update($request->validated());

        return (new BorrowerResource($borrower))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Borrower $borrower)
    {
        abort_if(Gate::denies('borrower_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borrower->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
