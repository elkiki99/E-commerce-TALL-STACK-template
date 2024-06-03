<?php

namespace App\Livewire\Payment;

use App\Models\Cart;
use Livewire\Component;

class Order extends Component
{
    public $items = [];
    public $grandTotal;
    public $cart;

    public function mount()
    {
        $this->cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $this->loadCartItems();
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;

        if ($this->cart && $this->cart->items) {
            foreach ($this->cart->items as $item) {
                $this->items[] = [
                    'product' => $item->product,
                    'quantity' => $item->quantity,
                ];
                $this->grandTotal += $item->product->price * $item->quantity;
            }
        }
    }

    // public function createOrder($paymentId)
    // {
    //     // Crear la orden si el pago fue exitoso
        
    //     $user = Auth::user();
    //     $cart = Cart::where('user_id', auth()->user()->id)->first();
        
    //     Payment::create([
    //         'payment_id' => $paymentId,
    //         'user_id' => $user->id,
    //         'user_email' => $user->email,
    //         'amount' => $this->grandTotal,
    //         'currency' => 'USD',
    //         'order_status' => 0,
    //     ]);        

    //     if ($cart) {
    //         $cart->checked_out = 1;
    //         $cart->save();
    //     }
    // }


    public function render()
    {
        return view('livewire.payment.order');
    }
}