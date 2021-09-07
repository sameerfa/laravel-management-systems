<?php

namespace App\Http\Livewire\Room;

use App\Models\Room;
use App\Models\RoomType;
use Livewire\Component;

class Create extends Component
{
    public Room $room;

    public array $listsForFields = [];

    public function mount(Room $room)
    {
        $this->room         = $room;
        $this->room->status = 'Vacant';
        $this->initListsForFields();
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

    protected function initListsForFields(): void
    {
        $this->listsForFields['room_type'] = RoomType::pluck('room_type', 'id')->toArray();
        $this->listsForFields['status']    = $this->room::STATUS_SELECT;
    }
}
