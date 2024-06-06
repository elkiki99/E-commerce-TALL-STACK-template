<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;

class ShowOrders extends Component
{
    public $payments;
    
    public function mount()
    {
        $this->payments = Payment::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
    }
    public function render()
    {
        return view('livewire.orders.show-orders', [
            'payments' => $this->payments
        ]);
    }
}
