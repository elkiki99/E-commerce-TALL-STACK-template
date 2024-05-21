<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function show(Cart $cart)
    {
        return view('cart.show', [
            'cart' => $cart
        ]);
    }
}