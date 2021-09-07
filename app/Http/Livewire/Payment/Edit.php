<?php

namespace App\Http\Livewire\Payment;

use App\Models\Booking;
use App\Models\Payment;
use Livewire\Component;

class Edit extends Component
{
    public Payment $payment;

    public array $listsForFields = [];

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.payment.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->payment->save();

        return redirect()->route('admin.payments.index');
    }

    protected function rules(): array
    {
        return [
            'payment.booking_id' => [
                'integer',
                'exists:bookings,id',
                'required',
            ],
            'payment.type' => [
                'string',
                'required',
            ],
            'payment.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'payment.payment_type' => [
                'string',
                'required',
            ],
            'payment.payment_details' => [
                'string',
                'nullable',
            ],
            'payment.payment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['booking'] = Booking::pluck('booking_date', 'id')->toArray();
    }
}
