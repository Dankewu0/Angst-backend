<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function view(User $user, Comment $comment): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Comment $comment): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $comment->user_id === $user->id;
    }

    public function delete(User $user, Comment $comment): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $comment->user_id === $user->id;
    }

    public function restore(User $user, Comment $comment): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Comment $comment): bool
    {
        return $user->hasRole('admin');
    }
}
