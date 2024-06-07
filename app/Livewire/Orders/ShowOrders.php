<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;

class ShowOrders extends Component
{
    public $payments;
    
    public function mount()
    {
        if(auth()->user()->admin === 1) 
        {
            $this->payments = Payment::orderByDesc('created_at')->get();
            return;
        } else {    
            $this->payments = Payment::where('user_id', auth()->user()->id)->orderByDesc('created_at')->get();
        }
    }
    
    public function render()
    {
        return view('livewire.orders.show-orders');
    }
}
