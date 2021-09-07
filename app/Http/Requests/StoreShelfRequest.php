<?php

namespace App\Http\Requests;

use App\Models\Shelf;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShelfRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shelf_create');
    }

    protected function rules(): array
    {
        return [
            'shelf.shelf_number' => [
                'string',
                'required',
            ],
            'shelf.floor_number' => [
                'string',
                'required',
            ],
        ];
    }
}
