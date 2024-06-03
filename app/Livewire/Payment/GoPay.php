<?php

namespace App\Livewire\Payment;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Payment;
use Livewire\Component;
use Stripe\Checkout\Session as StripeSession;

class GoPay extends Component
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

    public function checkout()
    {
        Stripe::setApiKey(config('stripe.sk'));

        $lineItems = array_map(function($item) {
            return [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['product']->name,
                    ],
                    'unit_amount' => $item['product']->price * 100,
                ],
                'quantity' => $item['quantity'],
            ];
        }, $this->items);

        $session = StripeSession::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('payment.success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('payment.show', [], true),
        ]);

        Payment::create([
            'payment_id' => $session->id,
            'user_id' => auth()->id(),
            'user_email' =>auth()->user()->email,
            'amount' => $this->grandTotal,
            'currency' => 'USD',
            'order_status' => '0'
        ]);

        return redirect()->away($session->url);
    }

    public function render()
    {
        return view('livewire.payment.go-pay');
    }
}