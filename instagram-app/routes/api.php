<?php

use Illuminate\Http\Request;
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

Route::get('/post', [PostsController::class, 'index']);
Route::post('/post', [PostsController::class, 'store']);
Route::get('/post/{id}', [PostsController::class, 'show']);
Route::put('/post/{id}', [PostsController::class, 'update']);
Route::delete('/post/{id}', [PostsController::class, 'destroy']);
