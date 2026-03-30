<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('owner')) {
            return true;
        }
    }

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
        if ($user->hasRole('admin')) {
            return true;
        }

        return $thread->user_id === $user->id;
    }

    public function delete(User $user, Thread $thread): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $thread->user_id === $user->id;
    }

    public function restore(User $user, Thread $thread): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Thread $thread): bool
    {
        return $user->hasRole('admin');
    }
}
