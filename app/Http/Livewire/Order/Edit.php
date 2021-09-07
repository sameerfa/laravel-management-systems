<?php

namespace App\Http\Livewire\Order;

use App\Models\Booking;
use App\Models\ItemTable;
use App\Models\Order;
use Livewire\Component;

class Edit extends Component
{
    public Order $order;

    public array $listsForFields = [];

    public function mount(Order $order)
    {
        $this->order = $order;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.order.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->order->save();

        return redirect()->route('admin.orders.index');
    }

    protected function rules(): array
    {
        return [
            'order.item_table_id' => [
                'integer',
                'exists:item_tables,id',
                'required',
            ],
            'order.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'order.order_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'order.quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'order.cost' => [
                'numeric',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['item_table'] = ItemTable::pluck('name', 'id')->toArray();
        $this->listsForFields['booking']    = Booking::pluck('booking_date', 'id')->toArray();
    }
}
