<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartCounter extends Component
{
    public $itemCount = 0;

    protected $listeners = ['cartUpdated' => 'updateItemCount'];

    public function mount()
    {
        $this->updateItemCount();
    }

    public function updateItemCount()
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            $this->itemCount = $cart ? CartItem::where('cart_id', $cart->id)->count() : 0;
        } else {
            $this->itemCount = count(session('cart', []));
        }
    }
    
    public function render()
    {
        return view('livewire.cart-counter');
    }
}
