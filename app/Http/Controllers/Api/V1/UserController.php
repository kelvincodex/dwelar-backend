<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\CreateUserRequest;
use App\Http\Services\Api\V1\UserService;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }

    public function create(CreateUserRequest $request, User $user){
        return $this->userService->create($request, $user);
    }

    public function readAll(User $user){
        event(new TestEvent());
        return $this->userService->readAll($user);
    }
}
