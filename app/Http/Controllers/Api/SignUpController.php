<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AbstractSignController;
use App\Http\Requests\SignUpRequest;
use App\Models\User;

/**
 * Class: SignUpController
 * @see App\Http\Controllers\AbstractSignController
 * @package App\Http\Controllers\Api
 */
class SignUpController extends AbstractSignController
{
    /**
     * Sign up user
     * @param App\Http\Requests\SignUpRequest $request
     * @return Illuminate\Http\JsonResponse
     */
    public function signUp(SignUpRequest $request): JsonResponse
    {
        $credentials = $request->only('name', 'email', 'password');
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        return response()->json(['token' => $this->createToken($user)], 200);
    }
}
