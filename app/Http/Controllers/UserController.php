<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\UserService;
use App\Http\Requests\UserRequest;
class UserController extends Controller
{
    public function __construct(protected UserService $service) {}
    public function index()
    {
        $users = $this->service->getUsers();
        return response()->json($users);
    }

    public function store(UserRequest $request)
    {
        $user = $this->service->createUser($request->validated());
         return response()->json($user, 201);

    }

    public function update(Request $request, User $user)
    {
        $user = $this->service->updateUser($user, $request->validated());
        return response()->json($user, 200);
    }

    public function destroy(User $user)
    {
        $this->service->deleteUser($user);
        return response()->json(null, 204);
    }
}
