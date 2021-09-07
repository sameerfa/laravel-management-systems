<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CrmStatus;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CrmStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crm_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crm-status.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crm_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crm-status.create');
    }

    public function edit(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crm-status.edit', compact('crmStatus'));
    }

    public function show(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crm-status.show', compact('crmStatus'));
    }
}
