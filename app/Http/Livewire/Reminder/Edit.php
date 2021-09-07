<?php

namespace App\Http\Livewire\Reminder;

use App\Models\Booking;
use App\Models\Reminder;
use Livewire\Component;

class Edit extends Component
{
    public Reminder $reminder;

    public array $listsForFields = [];

    public function mount(Reminder $reminder)
    {
        $this->reminder = $reminder;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.reminder.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->reminder->save();

        return redirect()->route('admin.reminders.index');
    }

    protected function rules(): array
    {
        return [
            'reminder.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'reminder.reminder_type' => [
                'string',
                'required',
            ],
            'reminder.reminder_detail' => [
                'string',
                'nullable',
            ],
            'reminder.datetime' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['booking'] = Booking::pluck('booking_date', 'id')->toArray();
    }
}
