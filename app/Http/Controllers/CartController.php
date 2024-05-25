<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function show(Cart $cart)
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        } else {
            $cart = session()->get('cart', []);
        }

        return view('cart.show', [
            'cart' => $cart
        ]);
    }
}