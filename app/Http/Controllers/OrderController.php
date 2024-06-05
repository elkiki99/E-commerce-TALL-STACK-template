<?php

namespace App\Http\Controllers;

use App\Models\Payment;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function show(Payment $payment)
    {
        // $payment = Payment::where('user_id', auth()->user()->id)->get();

        return view('orders.show', [
            'payment' => $payment,
        ]);
    }
}   
