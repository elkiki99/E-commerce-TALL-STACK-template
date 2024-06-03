<?php

namespace App\Livewire\Payment;

use App\Models\Cart;
use Livewire\Component;

class Checkout extends Component
{
    public $items = [];
    public $grandTotal;
    public $cart;

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $this->loadCartItems();
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
        return view('livewire.payment.checkout');
    }
}