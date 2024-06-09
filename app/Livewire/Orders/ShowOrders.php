<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrders extends Component
{
    use WithPagination;
    private $payments;

    public function render()
    {
        if(auth()->user()->admin === 1) 
        {
            $this->payments = Payment::orderByDesc('created_at')->paginate(12);
            // return;
        } else {    
            $this->payments = Payment::where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate(12);
        }

        return view('livewire.orders.show-orders', [
            'payments' => $this->payments
        ]);
    }
}
