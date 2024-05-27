<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class ClearCart extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function clearingCart()
    {
        $this->dispatch('clearingCart');
    }

    public function confirmClearCart()
    {
        if(auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id);

            if($cart) {
                $cart->delete();
                $this->dispatch('cartCleared');
            }
        } else {            
            $cart = session()->get('cart', []);

            if($cart) {
                session()->forget('cart');
                $this->dispatch('cartCleared');
            }
        }
    }

    public function render()
    {
        return view('livewire.cart.clear-cart');
    }
}