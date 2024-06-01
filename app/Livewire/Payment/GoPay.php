<?php

namespace App\Livewire\Payment;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as StripeSession;

class GoPay extends Component
{
    public $grandTotal;
    public $items = [];
    public $cartItems;

    public function mount()
    {
        $this->grandTotal = session()->get('grand_total', 0);
        $this->cartItems = session()->get('cart', []);
    }

    public function loadCartItems()
    {
        $this->items = [];
        $this->grandTotal = 0;
        
        if (auth()->check()) {
            $cart = $this->cart;
            
            if(!empty($cart) && isset($cart->items)) {
                foreach ($this->cart->items as $item) {
                    $this->items[] = [
                        'product' => $item->product,
                        'quantity' => $item->quantity,
                    ];
                    $this->grandTotal += $item->product->price * $item->quantity;
                }
            }
        }
    }

    public function checkout()
    {
        $this->grandTotal = session()->get('grand_total', 0);

        Stripe::setApiKey(config('stripe.sk'));

        $session = StripeSession::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Complete your purchase',
                        ],
                        'unit_amount' => $this->grandTotal * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('payment.order'),
            'cancel_url' => route('payment.show'),
        ]);

        $this->createOrder($session->id);
        return redirect()->away($session->url);
    }

    public function createOrder($paymentId)
    {
        $user = Auth::user();
        $cart = Cart::where('user_id', auth()->user()->id);
        
        Payment::create([
            'payment_id' => $paymentId,
            'user_id' => $user->id,
            'user_email' => $user->email,
            'amount' => $this->grandTotal,
            'currency' => 'USD',
            'order_status' => 0,
        ]);        
    }

    public function render()
    {
        return view('livewire.payment.go-pay');
    }
}