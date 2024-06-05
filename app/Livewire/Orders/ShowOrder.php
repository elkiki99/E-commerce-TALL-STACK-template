<?php

namespace App\Livewire\Payment;

use App\Models\Payment;
use Livewire\Component;

class ShowOrder extends Component
{
    public $payment;

    public function mount()
    {
        $this->payment = Payment::where('user_id', auth()->user()->id)->get();

    }

    public function render()
    {
        return view('livewire.orders.show-order', [
            'payment' => $this->payment,
        ]);
    }
}