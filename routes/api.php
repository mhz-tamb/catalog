<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SignUpController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('/category', CategoryController::class);

Route::post('/signup', [SignUpController::class, 'signUp']);
Route::post('/signin', [AuthController::class, 'signIn']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/signout', [AuthController::class, 'signOut']);
});
