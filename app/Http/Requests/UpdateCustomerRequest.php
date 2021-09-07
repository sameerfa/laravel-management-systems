<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_edit');
    }

    protected function rules(): array
    {
        return [
            'customer.customer_name' => [
                'string',
                'required',
            ],
            'customer.address' => [
                'string',
                'nullable',
            ],
            'customer.contact_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'customer.gender' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['gender'])),
            ],
            'mediaCollections.customer_id_proof' => [
                'array',
                'required',
            ],
            'mediaCollections.customer_id_proof.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.customer_address_proof' => [
                'array',
                'required',
            ],
            'mediaCollections.customer_address_proof.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.customer_profile_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.customer_profile_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
