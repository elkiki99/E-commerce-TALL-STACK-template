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
        $cart = Cart::where('user_id', auth()->user()->id)->first();
           
        if ($cart) {
            $this->cartItems = CartItem::where('cart_id', $cart->id)->get();
        } else {
            $this->cartItems = collect();
        }
    }

    public function countUpdated($productId, $quantity)
    {
        $this->dynamicQuantities[$productId] = $quantity;
    }

    public function updateCart()
    {
        $changesDetected = false;
    
        foreach ($this->cartItems as $item) {
            $productId = $item->product_id;
            $databaseQuantity = $item->quantity;
            $dynamicQuantity = $this->dynamicQuantities[$productId] ?? $databaseQuantity;
    
            if ($dynamicQuantity < 1) {
                $this->dispatch('addToCartError');
                return;
            }
    
            if ($dynamicQuantity !== $databaseQuantity) {
                $item->quantity = $dynamicQuantity;
                $item->save();  // Guardar el cambio en la base de datos
                $changesDetected = true;
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