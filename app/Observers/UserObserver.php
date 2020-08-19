<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the model's "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        $user->following()->attach($user);
    }
}
