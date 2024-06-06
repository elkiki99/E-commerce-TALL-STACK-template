<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class ShowOrder extends Component
{
    public $payment_id;
    public $payment;

    public function mount($payment_id)
    {
        $this->payment_id = $payment_id;
        $this->payment = Payment::where('payment_id', $this->payment_id)->first();
    }

    public function render()
    {
        return view('livewire.orders.show-order');
    }
}