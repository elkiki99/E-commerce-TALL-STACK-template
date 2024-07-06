<?php

namespace App\Policies;

use App\Models\User;

class CartPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewCart(User $user)
    {
        return $user->admin !== 1;
    }
}
