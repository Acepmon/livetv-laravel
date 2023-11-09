<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('users', App\Http\Controllers\API\UserController::class);
Route::apiResource('channels', App\Http\Controllers\API\ChannelController::class);
Route::apiResource('lives', App\Http\Controllers\API\LiveController::class);
Route::apiResource('vods', App\Http\Controllers\API\VodController::class);
Route::apiResource('shorts', App\Http\Controllers\API\ShortController::class);