<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;

class ShowOrders extends Component
{
    public $payments;
    public $payment;
    
    public function mount()
    {
        $this->payments = Payment::where('user_id', auth()->user()->id)->get();
    }
    public function render()
    {
        return view('livewire.orders.show-orders', [
            'payments' => $this->payments
        ]);
    }
}
