<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class StripeController extends Controller
{
    public function show(Cart $cart)
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $grandTotal = session()->get('grand_total', 0);

        return view('payment.show', [
            'cart' => $cart,
            'grandTotal' => session('grand_total', 0)
        ]);
    }

    public function checkout(Cart $cart)
    {
        return view('payment.show', [
            'cart' => $cart,
            'grandTotal' => session('grand_total', 0)
        ]);
    }   

    public function order(Cart $cart)
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();

        return view('payment.order', [
            'cart' => $cart,
            'grandTotal' => session('grand_total', 0)
        ]);
    }
}
