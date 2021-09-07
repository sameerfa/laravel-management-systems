<?php

namespace App\Http\Livewire\Booking;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Room;
use Livewire\Component;

class Edit extends Component
{
    public Booking $booking;

    public array $listsForFields = [];

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.booking.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->booking->save();

        return redirect()->route('admin.bookings.index');
    }

    protected function rules(): array
    {
        return [
            'booking.room_id' => [
                'integer',
                'exists:rooms,id',
                'required',
            ],
            'booking.customer_id' => [
                'integer',
                'exists:customers,id',
                'required',
            ],
            'booking.booking_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'booking.checkin' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
            'booking.checkout' => [
                'required',
                'date_format:' . config('project.datetime_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['room']     = Room::pluck('room_number', 'id')->toArray();
        $this->listsForFields['customer'] = Customer::pluck('customer_name', 'id')->toArray();
    }
}
