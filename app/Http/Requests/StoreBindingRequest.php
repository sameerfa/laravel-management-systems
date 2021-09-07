<?php

namespace App\Http\Requests;

use App\Models\Binding;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBindingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('binding_create');
    }

    protected function rules(): array
    {
        return [
            'binding.binding_name' => [
                'string',
                'required',
            ],
        ];
    }
}
