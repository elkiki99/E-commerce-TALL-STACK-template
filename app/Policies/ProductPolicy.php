<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    public function create(User $user): bool
    {
        return $user->admin === 1;
    }

    public function update(User $user): bool
    {
        return $user->admin === 1;
    }
}
