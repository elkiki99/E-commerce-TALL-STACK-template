<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show()
    {
        $carts = Cart::where('user_id', auth()->id())->with('items')->get();

        return view('cart.show', [
            'carts' => $carts
        ]);
    }
    
    // public function addItem(Request $request, $cartId)
    // {
    //     $cart = Cart::findOrFail($cartId);
    //     $cart->addItem($request->product_id, $request->quantity);
    //     return redirect()->route('cart.show', $cart->id);
    // }

    // public function removeItem($cartId, $itemId)
    // {
    //     $cart = Cart::findOrFail($cartId);
    //     $cart->removeItem($itemId);
    //     return redirect()->route('cart.show', $cart->id);
    // }
}