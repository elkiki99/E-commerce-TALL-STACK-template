<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;

class AddToCartSecondary extends Component
{
    public $productId;
    public $quantity = 1;

    public function addToCart($quantity)
    {
        $this->quantity = $quantity;

        if (auth()->check()) {
            $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);

            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('product_id', $this->productId)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += $this->quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $this->productId,
                    'quantity' => $this->quantity
                ]);
            }
            $this->dispatch('cartUpdated');

        } else {
            $product = Product::find($this->productId);
            $cart = session()->get('cart', []);

            if (isset($cart[$this->productId])) {
                $cart[$this->productId]['quantity'] += $this->quantity;
            } else {
                $cart[$this->productId] = [
                    "name" => $product->name,
                    "quantity" => $this->quantity,
                    "price" => $product->price,
                    "image" => $product->image
                ];
            }
            session()->put('cart', $cart);
        }
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.add-to-cart-secondary');
    }
}