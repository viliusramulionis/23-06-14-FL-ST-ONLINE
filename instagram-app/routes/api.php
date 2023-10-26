<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route'ų grupė
// Route::middleware('auth:sanctum')->prefix('post')->group(function() {
Route::prefix('post')->group(function() {
    Route::get('/', [PostsController::class, 'index']);
    Route::get('/{id}', [PostsController::class, 'show']);
    Route::post('/', [PostsController::class, 'store']);
    Route::post('/comment/{id}', [PostsController::class, 'comment']);
    Route::post('/like/{id}', [PostsController::class, 'like']);
    Route::put('/{id}', [PostsController::class, 'update']);
    Route::delete('/{id}', [PostsController::class, 'destroy']);
});

Route::prefix('auth')->group(function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::middleware('auth:sanctum')->get('check', [AuthController::class, 'check']);
    Route::middleware('auth:sanctum')->get('logout', [AuthController::class, 'logout']);
});
