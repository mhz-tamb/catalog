<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\AbstractSignController;
use App\Http\Requests\SignInRequest;
use App\Models\User;

/**
 * Class: AuthController
 * @see App\Http\Controllers\AbstractSignController
 * @package App\Http\Controllers\Api
 */
class AuthController extends AbstractSignController
{
    /**
     * Sign in user
     * @param App\Http\Requests\SignInRequest $request
     * @throws Illuminate\Validation\ValidationException
     * @return Illuminate\Http\JsonResponse
     */
    public function signIn(SignInRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.']]);
        }

        return response()->json(['token' => $this->createToken($user)], 200);
    }

    /**
     * Sign out user
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function signOut(Request $request): void
    {
        $request->user()->currentAccessToken()->delete();
    }
}
