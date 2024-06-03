<?php

namespace App\Livewire\Payment;

use Stripe\Stripe;
use App\Models\Cart;
use Stripe\Customer;
use Livewire\Component;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Success extends Component
{
    public $items = [];
    public $grandTotal;
    public $cart;
    public $customer;

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

    public function success(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->get('session_id');

        $session = Session::retrieve($sessionId);  
        if(!$session) {
            throw new NotFoundHttpException;
        }
        
        $this->customer = Customer::retrieve($session->customer);
    }

    public function render()
    {
        return view('livewire.payment.success', [
            'customer' => $this->customer
        ]);
    }
}