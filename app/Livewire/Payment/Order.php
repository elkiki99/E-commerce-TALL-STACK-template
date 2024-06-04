<?php

namespace App\Livewire\Payment;

use App\Models\Cart;
use App\Models\Payment;
use Livewire\Component;

class Order extends Component
{
    public $items = [];
    public $grandTotal;
    public $cart;
    public $customer;
    public $sessionId;
    public $payment;

    public function mount($sessionId)
    {
        $this->sessionId = $sessionId;
        $this->cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $this->loadCartItems();
        if(auth()->check()) {
            $this->payment = Payment::where('user_id', auth()->user()->id)->first();
        }
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;

        if ($this->cart && $this->cart->items) {
            foreach ($this->cart->items as $item) {
                $this->items[] = [
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
                $this->grandTotal += $item->product->price * $item->quantity;
            }
        }
    }
    
    public function render()
    {
        return view('livewire.payment.order');
    }
}
