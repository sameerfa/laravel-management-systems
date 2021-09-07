<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BorrowerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('borrower_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borrower.index');
    }

    public function create()
    {
        abort_if(Gate::denies('borrower_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borrower.create');
    }

    public function edit(Borrower $borrower)
    {
        abort_if(Gate::denies('borrower_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.borrower.edit', compact('borrower'));
    }

    public function show(Borrower $borrower)
    {
        abort_if(Gate::denies('borrower_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $borrower->load('student', 'book', 'user');

        return view('admin.borrower.show', compact('borrower'));
    }
}
