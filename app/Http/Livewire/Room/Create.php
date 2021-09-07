<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use Livewire\Component;

class Create extends Component
{
    public Room $room;

    public function mount(Room $room)
    {
        $this->room = $room;
    }

    public function render()
    {
        return view('livewire.room.create');
    }

    public function submit()
    {
        $this->validate();

        $this->room->save();

        return redirect()->route('admin.rooms.index');
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
