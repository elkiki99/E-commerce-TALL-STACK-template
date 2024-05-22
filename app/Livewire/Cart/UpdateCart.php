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

    public function countUpdated($productId, $quantity)
    {
        $this->dynamicQuantities[$productId] = $quantity;
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

    public function updateCart()
    {
        foreach ($this->cartItems as $item) {
            $productId = $item->product_id;
            $databaseQuantity = $item->quantity;
            $dynamicQuantity = $this->dynamicQuantities[$productId] ?? $databaseQuantity;

            dump("Product ID: $productId");
            dump("Database Quantity: $databaseQuantity");
            dump("Dynamic Quantity: $dynamicQuantity");

            // Aquí puedes realizar la lógica de actualización en la base de datos si es necesario
        }

        $this->emit('cartUpdatedSuccess');
    }

    public function render()
    {
        return view('livewire.cart.update-cart');
    }
}