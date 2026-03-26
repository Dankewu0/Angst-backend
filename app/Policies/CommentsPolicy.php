<?php

namespace App\Policies;

use App\Models\Comments;
use App\Models\User;

class CommentsPolicy
{
    public function update(User $user, Comments $comment): bool
    {
        return $this->isOwner($user)
            || $this->isAdmin($user)
            || $user->id === $comment->user_id;
    }

    public function delete(User $user, Comments $comment): bool
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
