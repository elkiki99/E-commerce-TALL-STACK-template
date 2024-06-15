<?php

namespace App\Livewire\Cart;

use App\Models\Product;
use Livewire\Component;
use App\Models\CartItem;

class ShowCart extends Component
{
    public $cart;
    public $products = [];
    public $grandTotal = 0;

    public function mount()
    {
        $this->loadCartProducts();
        // $this->calculateGrandTotal();
    }

    public function loadCartProducts()
    {
        $this->products = [];
        
        if (auth()->check()) {
            $this->cart = auth()->user()->cart;

            if ($this->cart && isset($this->cart->items)) {
                foreach ($this->cart->items as $item) {
                    $this->products[] = [
                        'product' => $item->product,
                        'quantity' => $item->quantity,
                    ];
                }
            }
        } else {
            $cart = session()->get('cart', []);

            foreach ($cart as $productId => $details) {
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

    public function update($productId, $quantity)
    {
        if (auth()->check()) {
            $productId = CartItem::where('cart_id', $this->cart->id)
                            ->where('product_id', $productId)
                            ->first();
            $productId->update([
                'quantity' => $quantity,
            ]);
        } else {
            $cart = session()->get('cart', []);
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }
        // $this->calculateGrandTotal();
    }

    public function remove($productId)
    {
        if (auth()->check()) {
            $productId = CartItem::where('cart_id', $this->cart->id)
                            ->where('product_id', $productId)
                            ->first();
            if ($productId) {
                $productId->delete();
            }
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        $this->loadCartProducts();
        // $this->calculateGrandTotal();

    }

    // public function calculateGrandTotal()
    // {
    //     $total = 0;

    //     foreach ($this->products as $product) {
    //         $total += $product['product']->price * $product['quantity'];
    //     }

    //     $this->grandTotal = $total;
    // }

    public function render()
    {
        // $grandTotal = $this->calculateGrandTotal();

        return view('livewire.cart.show-cart', [
            // 'grandTotal' => $grandTotal,
        ]);    
    }
}