<?php

namespace App\Policies;

use App\Models\User;

class LikePolicy
{
    public function viewLikes(User $user)
    {
        return $user->admin !== 1;
    }
}
