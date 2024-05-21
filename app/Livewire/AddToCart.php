<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;

class AddToCart extends Component
{
    protected $listeners = ['addToCart', 'countUpdated'];

    public $productId;
    public $quantity;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function countUpdated($quantity)
    {
        $this->quantity = $quantity;
    }

    public function addToCart()
    {
        $cart = Cart::create([
            'user_id' => auth()->user()->id
        ]);

        CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $this->productId,
            'quantity' => $this->quantity
        ]);
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}