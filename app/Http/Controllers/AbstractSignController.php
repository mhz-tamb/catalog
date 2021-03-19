<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

/**
 * Class: AbstractSignController
 * @see App\Http\Controllers\Controller
 * @package App\Http\Controllers
 */
abstract class AbstractSignController extends Controller
{
    /**
     * Create auth token
     * @param App\Model\User $user
     * @return string
     */
    protected function createToken(User $user): string
    {
        return $user->createToken($user->email)->plainTextToken;
    }
}
