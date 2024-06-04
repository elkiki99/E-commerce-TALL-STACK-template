<?php

namespace App\Livewire\Cart;

use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;

class ShowCart extends Component
{
    public $cart;
    public $items = [];
    public $grandTotal = 0;
    public $payment;

    public function mount($cart)
    {
        $this->cart = $cart ?? session()->get('cart', []);
        $this->loadCartItems();
        if(auth()->check()) {
            $this->payment = Payment::where('user_id', auth()->user()->id)->first();
        }
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;
        
        if (auth()->check()) {
            $cart = $this->cart;
            
            if(!empty($cart) && isset($cart->items)) {
                foreach ($this->cart->items as $item) {
                    $this->items[] = [
                        'product' => $item->product,
                        'quantity' => $item->quantity,
                    ];
                    $this->grandTotal += $item->product->price * $item->quantity;
                }
            }
        } else {
            foreach ($this->cart as $productId => $details) {
                $product = Product::find($productId);
    
                if ($product) {
                    $this->items[] = [
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
            'items' => $this->items,
            'grandTotal' => $this->grandTotal,
            'payment' => $this->payment
        ]);
    }
}