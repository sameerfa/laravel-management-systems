<?php

namespace App\Http\Requests;

use App\Models\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_create');
    }

    protected function rules(): array
    {
        return [
            'room.room_type_id' => [
                'integer',
                'exists:room_types,id',
                'required',
            ],
            'room.room_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'room.description' => [
                'string',
                'nullable',
            ],
            'room.status' => [
                'required',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }
}
