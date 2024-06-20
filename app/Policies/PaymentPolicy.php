<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Auth\Access\Response;

class PaymentPolicy
{
    public function viewAny(User $user, Payment $payment): Response
    {
        return $user->id === $payment->user_id || $user->admin === 1 
            ? Response::allow()
            : Response::deny('You do not own this order.')
        ;
    }
}
