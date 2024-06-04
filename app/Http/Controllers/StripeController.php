<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Payment;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public $sessionId;

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
        $payment = Payment::where('payment_id', $sessionId)->first();

        return view('payment.success', [
            'sessionId' => $sessionId,
            'payment' => $payment
        ]);
    }

    public function webhook()
    {
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');;

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $sessionId = $session->id;

                $payment = Payment::where('payment_id', $sessionId)->first();

                if($payment && $payment->order_status === 0) {
                    $payment->order_status = 1;
                    $payment->save();
                }
                
            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }

    public function order(Cart $cart, Request $request, Payment $payment)
    {
        $sessionId = $request->get('session_id');
        $payment = Payment::where('user_id', auth()->id())->first();

        return view('payment.order', [
            'cart' => $cart,
            'sessionId' => $sessionId,
            'paymentId' => $payment->id

        ]);
    }
}
