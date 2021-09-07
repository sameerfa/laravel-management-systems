<?php

namespace App\Http\Requests;

use App\Models\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_edit');
    }

    protected function rules(): array
    {
        return [
            'room.room_number' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'room.room_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
