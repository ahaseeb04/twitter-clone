<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Undocumented function
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        $user->following()->attach($user);
    }
}
