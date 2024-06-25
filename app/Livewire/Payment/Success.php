<?php

namespace App\Livewire\Payment;

use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Payment;
use App\Models\Product;
use Livewire\Component;
use App\Mail\OrderPurchased;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session as StripeSession;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Success extends Component
{
    public $items = [];
    public $grandTotal;
    public $cart;
    public $customer;
    public $sessionId;

    public function mount($sessionId)
    {
        $this->sessionId = $sessionId;
        $this->cart = Cart::where('user_id', auth()->id())->with('items.product')->first();
        $this->loadCartItems();
        $this->loadStripeSession();
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

    public function loadStripeSession()
    {
        Stripe::setApiKey(config('stripe.sk'));
        
        try {
            $session = StripeSession::retrieve($this->sessionId);
            if (!$session) {
                throw new NotFoundHttpException;
            }

            $payment = Payment::where('payment_id', $session->id)->where('order_status', 0)->first();
            
            if(!$payment) {
                throw new NotFoundHttpException;
            } 
            $payment->order_status = 1;
            $payment->save();
            
            Mail::to(auth()->user())->queue(new OrderPurchased($payment));

            $cart = Cart::where('user_id', auth()->user()->id)->first();
            if ($cart) {
                $cart->delete();
            }

            foreach ($this->items as $item) {
                $product = Product::find($item['product']['id']);
                $product->stock -= $item['quantity'];
                $product->save();
            }
            session()->flash('message', 'Order purchased succesfully! Check your email to see the order details.');

        } 
        catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }
    
    public function render()
    {
        return view('livewire.payment.success');
    }
}