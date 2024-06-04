<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;

class CartController extends Controller
{
    public function show(Cart $cart)
    {
        $payment = Payment::where('user_id', auth()->id())->first();
        
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        } else {
            $cart = session()->get('cart', []);
        }

        return view('cart.show', [
            'cart' => $cart,
            'payment' => $payment,
        ]);
    }
}