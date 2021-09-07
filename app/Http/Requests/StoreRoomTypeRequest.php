<?php

namespace App\Http\Requests;

use App\Models\RoomType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_type_create');
    }

    protected function rules(): array
    {
        return [
            'roomType.room_type' => [
                'string',
                'required',
            ],
            'mediaCollections.room_type_room_img' => [
                'array',
                'required',
            ],
            'mediaCollections.room_type_room_img.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'roomType.description' => [
                'string',
                'nullable',
            ],
            'roomType.cost' => [
                'numeric',
                'required',
            ],
        ];
    }
}
