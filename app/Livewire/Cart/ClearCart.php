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

    public function clearCart()
    {
        if(auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id);

            if($cart) {
                $cart->delete();
            }
        } else {            
            $cart = session()->get('cart', []);

            if($cart) {
                session()->forget('cart');
            }
        }
        $this->redirect('/cart', navigate: true);
    }

    public function render()
    {
        return view('livewire.cart.clear-cart');
    }
}