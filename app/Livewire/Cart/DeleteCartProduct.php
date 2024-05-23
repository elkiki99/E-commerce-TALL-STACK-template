<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\CartItem;
use App\Models\Cart;

class DeleteCartProduct extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function deleteProduct()
    {
        $cartItem = CartItem::where('product_id', $this->productId)->first();

        if ($cartItem) {
            $cartItem->delete();
            if (CartItem::where('cart_id', $cartItem->cart_id)->count() === 0) {
                Cart::where('id', $cartItem->cart_id)->delete();
            }

            $this->dispatch('itemCartDeleted');
        }
    }

    public function render()
    {
        return view('livewire.cart.delete-cart-product');
    }
}