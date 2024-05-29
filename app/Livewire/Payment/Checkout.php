<?php

namespace App\Livewire\Payment;

use App\Models\Product;
use Livewire\Component;

class Checkout extends Component
{
    public $cart;
    public $items = [];
    public $grandTotal = 0;

    public function mount($cart)
    {
        $this->cart = $cart ?? session()->get('cart', []);
        $this->loadCartItems();
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
        return view('livewire.payment.checkout', [
            'items' => $this->items,
            'grandTotal' => $this->grandTotal,
        ]);
    }
}