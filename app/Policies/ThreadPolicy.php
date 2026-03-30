<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;

class ThreadPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Thread $thread): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Thread $thread): bool
    {
        if ($user->role === 'owner') {
            return true;
        }

        if ($user->role === 'admin') {
            return true;
        }

        return $thread->user_id === $user->id;
    }

    public function delete(User $user, Thread $thread): bool
    {
        if ($user->role === 'owner') {
            return true;
        }

        if ($user->role === 'admin') {
            return true;
        }

        return $thread->user_id === $user->id;
    }

    public function restore(User $user, Thread $thread): bool
    {
        return $user->role === 'owner';
    }

    public function forceDelete(User $user, Thread $thread): bool
    {
        return $user->role === 'owner';
    }
}
