<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;

class ShowOrders extends Component
{
    use WithPagination;
    private $payments;

    protected $listeners = ['completeOrder'];

    public function completeOrder(Payment $payment)
    {
        $payment->delete();
    }

    public function render()
    {
        if(auth()->user()->admin === 1) 
        {
            $this->payments = Payment::orderByDesc('created_at')->paginate(12);
        } else {    
            $this->payments = Payment::where('user_id', auth()->user()->id)->orderByDesc('created_at')->paginate(12);
        }

        return view('livewire.orders.show-orders', [
            'payments' => $this->payments
        ]);
    }
}
