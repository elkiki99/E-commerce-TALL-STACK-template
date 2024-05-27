<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartItem;

class UpdateCart extends Component
{
    public $cartItems;
    public $productId;
    public $dynamicQuantities = [];

    protected $listeners = ['countUpdated'];

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadCartItems();
    }
    
    public function loadCartItems()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();

            if ($cart) {
                $this->cartItems = CartItem::where('cart_id', $cart->id)->get();
            } else {
                $this->cartItems = collect();
            }
        } else {
            $cart = session()->get('cart', []);
            $this->cartItems = collect($cart);
        }
    }

    public function countUpdated($productId, $quantity)
    {
        $this->dynamicQuantities[$productId] = $quantity;
    }

    public function updateCart()
    {
        $changesDetected = false;
    
        if (auth()->check()) {
            foreach ($this->cartItems as $item) {
                $productId = $item->product_id;
                $actualQuantity = $item->quantity;
                $dynamicQuantity = $this->dynamicQuantities[$productId] ?? $actualQuantity;
    
                if ($dynamicQuantity < 1) {
                    $this->dispatch('addToCartError');
                    return;
                }
    
                if ($dynamicQuantity !== $actualQuantity) {
                    $item->quantity = $dynamicQuantity;
                    $item->save();
                    $changesDetected = true;
                }
            }
        } else {
            foreach ($this->cartItems as $productId => $quantity) {
                $actualQuantity = $quantity;
                $dynamicQuantity = $this->dynamicQuantities[$productId] ?? $actualQuantity;
    
                if ($dynamicQuantity < 1) {
                    $this->dispatch('addToCartError');
                    return;
                }
    
                if ($dynamicQuantity !== $actualQuantity) {
                    $cart = session()->get('cart', []);
                    $cart[$productId]['quantity'] = $dynamicQuantity;
                    session()->put('cart', $cart);
                    $changesDetected = true;
                }
            }
        }
    
        if ($changesDetected) {
            $this->dispatch('cartUpdatedSuccess');
        } else {
            $this->dispatch('cartUpdatedError');
        }
    }
    
    public function render()
    {
        return view('livewire.cart.update-cart');
    }
}