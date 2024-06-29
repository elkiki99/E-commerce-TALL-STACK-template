<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use Livewire\Component;
use App\Mail\OrderDelivered;
use Illuminate\Support\Facades\Mail;

class ShowOrder extends Component
{
    public $payment;
    public $paymentItems;
    public $grandTotal = 0;
    
    protected $listeners = ['completeOrder'];

    public function completeOrder(Payment $payment)
    {
        Mail::to(auth()->user())->queue(new OrderDelivered($payment));
        $payment->delete();
        session()->flash('message', 'Order delivered successfully');
        return redirect()->route('orders.index');
    }

    public function mount(Payment $payment)
    {
        $this->payment = $payment;
        $this->paymentItems = $payment->paymentItems()->with('product')->get();
        
        foreach ($this->paymentItems as $paymentItem) {
            $this->grandTotal += $paymentItem->quantity * $paymentItem->product->price;
        }
    }

    public function render()
    {
        return view('livewire.orders.show-order');
    }
}
