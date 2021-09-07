<?php

namespace App\Http\Requests;

use App\Models\ItemTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_table_create');
    }

    protected function rules(): array
    {
        return [
            'itemTable.name' => [
                'string',
                'required',
            ],
            'itemTable.cost' => [
                'numeric',
                'required',
            ],
            'itemTable.details' => [
                'string',
                'nullable',
            ],
        ];
    }
}
