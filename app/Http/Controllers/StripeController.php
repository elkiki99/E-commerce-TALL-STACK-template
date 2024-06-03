<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function show(Cart $cart)
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $grandTotal = session()->get('grand_total', 0);

        return view('payment.show', [
            'cart' => $cart,
            'grandTotal' => $grandTotal
        ]);
    }

    public function checkout(Cart $cart)
    {
        return view('payment.show', [
            'cart' => $cart,
            'grandTotal' => session('grand_total', 0)
        ]);
    }   

    public function success(Request $request)
    {
        $sessionId = $request->get('session_id');
        
        return view('payment.success', [
            'sessionId' => $sessionId
        ]);
    }
}
