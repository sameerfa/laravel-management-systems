<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\Admin\CustomerResource;
use App\Models\Customer;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource(Customer::all());
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = Customer::create($request->validated());

        if ($request->input('id_proof', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('id_proof'))))->toMediaCollection('id_proof');
        }

        if ($request->input('address_proof', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('address_proof'))))->toMediaCollection('address_proof');
        }

        if ($request->input('profile_image', false)) {
            $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_image'))))->toMediaCollection('profile_image');
        }

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Customer $customer)
    {
        abort_if(Gate::denies('customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        if ($request->input('id_proof', false)) {
            if (!$customer->id_proof || $request->input('id_proof') !== $customer->id_proof->file_name) {
                if ($customer->id_proof) {
                    $customer->id_proof->delete();
                }
                $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('id_proof'))))->toMediaCollection('id_proof');
            }
        } elseif ($customer->id_proof) {
            $customer->id_proof->delete();
        }

        if ($request->input('address_proof', false)) {
            if (!$customer->address_proof || $request->input('address_proof') !== $customer->address_proof->file_name) {
                if ($customer->address_proof) {
                    $customer->address_proof->delete();
                }
                $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('address_proof'))))->toMediaCollection('address_proof');
            }
        } elseif ($customer->address_proof) {
            $customer->address_proof->delete();
        }

        if ($request->input('profile_image', false)) {
            if (!$customer->profile_image || $request->input('profile_image') !== $customer->profile_image->file_name) {
                if ($customer->profile_image) {
                    $customer->profile_image->delete();
                }
                $customer->addMedia(storage_path('tmp/uploads/' . basename($request->input('profile_image'))))->toMediaCollection('profile_image');
            }
        } elseif ($customer->profile_image) {
            $customer->profile_image->delete();
        }

        return (new CustomerResource($customer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Customer $customer)
    {
        abort_if(Gate::denies('customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
