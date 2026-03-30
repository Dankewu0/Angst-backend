<?php

namespace App\Policies;

use App\Models\Build;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BuildPolicy
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

    public function view(User $user, Build $build): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Build $build): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $build->user_id === $user->id;
    }

    public function delete(User $user, Build $build): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $build->user_id === $user->id;
    }

    public function restore(User $user, Build $build): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Build $build): bool
    {
        return $user->hasRole('admin');
    }
}
