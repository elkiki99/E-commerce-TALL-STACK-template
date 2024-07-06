<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class LikePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewLikes(User $user)
    {
        return $user->admin !== 1;
    }
}
