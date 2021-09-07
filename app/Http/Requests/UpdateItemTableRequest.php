<?php

namespace App\Http\Requests;

use App\Models\ItemTable;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateItemTableRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_table_edit');
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
