<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;

class UpdateCart extends Component
{
    protected $listeners = ['countUpdated'];

    public $cartItems;
    public $quantity;
    public $productId;

    public function mount($productId)
    {
        $this->$productId = $productId;
        $this->loadCartItems();
    }

    public function countUpdated($quantity)
    {
        $this->quantity = $quantity;
    }

    public function loadCartItems()
    {
        $cart = Cart::where('user_id', auth()->user()->id)->first();    
        if ($cart) {
            $this->cartItems = CartItem::where('cart_id', $cart->id)->get();
        } else {
            $cart === null;
        }
    }

    public function updateCart()
    {
        foreach($this->cartItems as $item) {
            // dump($item['id']);
            // dump($item['quantity']);

            dd($this->quantity);
        }
    }

    public function render()
    {
        return view('livewire.cart.update-cart');
    }
}