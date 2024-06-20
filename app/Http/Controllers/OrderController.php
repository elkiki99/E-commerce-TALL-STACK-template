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
        $this->authorize('viewAny', Payment::class);

        return view('orders.show', [
            'payment' => $payment
        ]);
    }
}   
