<?php

namespace App\Policies;

use App\Models\Tag;
use App\Models\User;

class TagPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->admin === 1;
    }

    public function create(User $user): bool
    {
        return $user->admin === 1;
    }

    public function update(User $user): bool
    {
        return $user->admin === 1;
    }
}
