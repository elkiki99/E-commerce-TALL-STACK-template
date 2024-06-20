<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;

class PaymentPolicy
{
    public function viewAny(User $user, Payment $payment)
    {
        return $user->id === $payment->user_id || $user->admin === 1;
    }

}
