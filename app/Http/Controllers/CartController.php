<?php

namespace App\Http\Controllers;

use App\Models\Cart;

class CartController extends Controller
{
    public function show()
    {
        $carts = Cart::where('user_id', auth()->id())->with('items')->get();

        return view('cart.show', [
            'carts' => $carts
        ]);
    }
}