<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    )
    {
    }

    public function index() : JsonResponse
    {
        $users = User::all(['login']);
        return new JsonResponse($users);
    }

    public function store(StoreUserRequest $request) : JsonResponse
    {
        $user = $this->userService->createUser($request);
        return new JsonResponse($user);
    }
}
