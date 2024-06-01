<?php

namespace App\Livewire\Payment;

use Livewire\Component;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class GoPay extends Component
{
    public $grandTotal;

    public function mount()
    {
        $this->grandTotal = session()->get('grand_total', 0);
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

        return redirect()->away($session->url);
    }

    public function render()
    {
        return view('livewire.payment.go-pay');
    }
}