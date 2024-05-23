<?php 

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\CartItem;

class Counter extends Component
{
    public $count = 0;
    public $productId;
    public $cartId;

    protected $listeners = ['updateCount'];

    public function mount($productId)
    {
        $this->productId = $productId;
        $user = auth()->user();
    
        if (isset($user) && $user->cart) {
            $this->cartId = $user->cart->id;
        } else {
            $this->cartId = null;
        }
    
        $this->updateCount();
    }

    public function increment()
    {
        $this->count++;
        $this->dispatch('countUpdated', $this->productId, $this->count);
    }

    public function decrement()
    {
        if ($this->count > 0) {
            $this->count--;
            $this->dispatch('countUpdated', $this->productId, $this->count);
        }
    }

    public function updateCount()
    {
        $cartItem = CartItem::where('cart_id', $this->cartId)
            ->where('product_id', $this->productId)
            ->first();
    
        if ($cartItem) {
            $this->count = $cartItem->quantity;
        }
    }

    public function render()
    {
        return view('livewire.cart.counter');
    }
}
