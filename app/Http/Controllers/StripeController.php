<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function show(Cart $cart)
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();

        return view('stripe.show', [
            'cart' => $cart,
            'grandTotal' => session('grand_total', 0)
        ]);
    }

    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));
        $session = Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Send me money',
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('stripe.show'),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Cart $cart)
    {
        $cart = Cart::where('user_id', auth()->id())->with('items.product')->first();

        return view('stripe.show', [
            'cart' => $cart
        ]);
    }
}
