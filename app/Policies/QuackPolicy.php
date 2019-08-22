<?php

namespace App\Policies;

use App\Quack;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuackPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Quack $quack)
    {
        return $user->id === $quack->user_id;
    }

    public function delete(User $user, Quack $quack)
    {
        return $user->id === $quack->duck_id || $user->is_admin === 1;
    }

    public function user_delete(User $user, Quack $quack)
    {
        return $user->id === $quack->duck_id || $user->is_admin === 1;
    }
}
