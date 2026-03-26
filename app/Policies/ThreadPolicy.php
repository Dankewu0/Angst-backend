<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;

class ThreadPolicy
{
    public function update(User $user, Thread $thread): bool
    {
        return $this->isOwner($user)
            || $this->isAdmin($user)
            || $user->id === $thread->user_id;
    }

    public function delete(User $user, Thread $thread): bool
    {
        return $this->isOwner($user) || $this->isAdmin($user);
    }

    private function isOwner(User $user): bool
    {
        return $user->hasRole('owner');
    }

    private function isAdmin(User $user): bool
    {
        return $user->hasRole('admin');
    }
}
