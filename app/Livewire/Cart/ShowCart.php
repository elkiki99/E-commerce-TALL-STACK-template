<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart;
    public $items;
    public $grandTotal;

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->id())->first();
        $this->items = $this->cart ? $this->cart->items : collect();
        $this->calculateGrandTotal();
    }

    public function calculateGrandTotal()
    {
        $this->grandTotal = $this->items->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);
    }

    public function render()
    {   
        return view('livewire.cart.show-cart', [
            'cart' => $this->cart,
            'items' => $this->items
        ]);
    }
}
