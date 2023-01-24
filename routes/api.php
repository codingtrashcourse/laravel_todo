<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authenticate', [\App\Http\Controllers\Api\AuthController::class, 'authenticate']);

Route::apiResource('todos', \App\Http\Controllers\Api\TodoController::class)->middleware('auth:sanctum');
Route::get('todos/{todo}/complete', [\App\Http\Controllers\Api\TodoController::class, 'complete'])->middleware('auth:sanctum');
