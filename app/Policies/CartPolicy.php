<?php

namespace App\Policies;

use App\Models\User;

class CartPolicy
{
    public function viewCart(User $user)
    {
        return $user->admin !== 1;
    }
}
