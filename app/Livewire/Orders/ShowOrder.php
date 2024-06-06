<?php

namespace App\Livewire\Orders;

use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Models\PaymentItem;

class ShowOrder extends Component
{
    public $payment;
    public $paymentItems;
    public $grandTotal = 0;

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