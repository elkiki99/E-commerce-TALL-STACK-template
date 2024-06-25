<?php

namespace App\Livewire\Payment;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Models\PaymentItem;
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
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'images' => $item->product->image,
                ];
                $this->grandTotal += $item->product->price * $item->quantity;
            }
        }
    }

    public function checkout()
    {
        $stockError = false;

        foreach ($this->items as $item) {
            $product = Product::find($item['product_id']);
            if ($product->stock < $item['quantity']) {
                session()->flash('error', "The product {$product->name} does not have enough stock.");
                $stockError = true;
            }
        }

        if ($stockError) {
            return;
        }

        Stripe::setApiKey(config('stripe.sk'));

        $lineItems = array_map(function($item) {
            return [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $item['product']->name,
                        // 'images' => [asset( $item['product']->image)],
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

        $payment = Payment::create([
            'payment_id' => $session->id,
            'user_id' => auth()->id(),
            'user_email' =>auth()->user()->email,
            'amount' => $this->grandTotal,
            'currency' => 'USD',
            'order_status' => '0'
        ]);

        foreach ($this->items as $item) {
            PaymentItem::create([
                'payment_id' => $payment->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
            ]); 
        }
        // We delete the cart in the Success method
        return redirect()->away($session->url);
    }

    public function render()
    {
        return view('livewire.payment.go-pay');
    }
}