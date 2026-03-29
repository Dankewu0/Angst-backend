<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    public function getUsers(int $perPage = 10): LengthAwarePaginator
    {
         $perPage = max(1, min($perPage, 10));
        return User::query()
            ->latest()
            ->paginate($perPage);
    }
    public function createUser(array $data)
    {
        return User::create($data);
    }
    public function updateUser(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }
    public function deleteUser(User $user)
    {
        $user->delete();
    }
}
