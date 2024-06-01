<?php

namespace App\Livewire\Payment;

use Livewire\Component;

class Order extends Component
{
    public $cart;
    public $items = [];
    public $grandTotal = 0;

    public function mount($cart)
    {
        $this->cart = $cart ?? session()->get('cart', []);
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;

        $cart = $this->cart;
        
        if(!empty($cart) && isset($cart->items)) {
            foreach ($this->cart->items as $item) {
                $this->items[] = [
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
                $this->grandTotal += $item->product->price * $item->quantity;
            }
        }
    }

    // Create the database for managing the orders, clear the users cart and reference the user_id in order table in the DB

    public function render()
    {
        return view('livewire.payment.order', [
            'items' => $this->items,
            'grandTotal' => $this->grandTotal,
        ]);
    }
}