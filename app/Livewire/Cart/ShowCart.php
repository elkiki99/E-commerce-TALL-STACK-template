<?php

namespace App\Livewire\Cart;

use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart;
    public $products = [];
    public $grandTotal = 0;
    public $payment;

    public function mount($cart)
    {
        $this->cart = $cart ?? session()->get('cart', []);
        $this->loadCartProducts();
        if(auth()->check()) {
            $this->payment = Payment::where('user_id', auth()->user()->id)->first();
        }
    }

    public function loadCartProducts()
    {
        $this->products = [];
        $this->grandTotal = 0;
        
        if (auth()->check()) {
            $cart = $this->cart;
            
            if(!empty($cart) && isset($cart->items)) {
                foreach ($this->cart->items as $product) {
                    $this->products[] = [
                        'product' => $product->product,
                        'quantity' => $product->quantity,
                    ];
                    $this->grandTotal += $product->product->price * $product->quantity;
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

                    $this->grandTotal += $product->price * $details['quantity'];
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.cart.show-cart', [
            'products' => $this->products,
            'grandTotal' => $this->grandTotal,
            'payment' => $this->payment
        ]);
    }
}