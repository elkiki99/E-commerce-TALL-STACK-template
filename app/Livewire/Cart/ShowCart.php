<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;

class ShowCart extends Component
{
    public $cart;
    public $products = [];

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->id())->first();
        $this->loadCartProducts();
    }

    public function loadCartProducts()
    {
        $this->products = [];
        
        if (auth()->check()) {
            $cart = $this->cart;
            
            if(!empty($cart) && isset($cart->items)) {
                foreach ($this->cart->items as $product) {
                    $this->products[] = [
                        'product' => $product->product,
                        'quantity' => $product->quantity,
                    ];
                }
            }
        } else {
            foreach ($this->cart as $productId => $details) {
                $product = Product::find($productId);
    
                if ($product) {
                    $this->products[] = [
                        'product' => $product,
                        'quantity' => $details['quantity'],
                    ];
                }
            }
        }
    }

    public function remove($productId)
    {
        if (auth()->check()) {
            $item = CartItem::where('cart_id', $this->cart->id)
                            ->where('product_id', $productId)
                            ->first();

            if ($item) {
                $item->delete();
            }
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }

        // Reload cart products after removal
        $this->loadCartProducts();
    }

    public function render()
    {
        return view('livewire.cart.show-cart', ['products' => $this->products]);
    }
}