<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
class UserService
{
    function createUser(Request $request) : array
    {
        $user = $request->all();
        $user['password'] = Hash::make($user['password']);
        User::query()->create($user);

        return $user;
    }
}
