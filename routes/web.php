<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('todos', \App\Http\Controllers\TodoController::class)->middleware('auth');
Route::get('todos/{todo}/complete', [\App\Http\Controllers\TodoController::class, 'complete'])->name('todos.complete')->middleware('auth');
Route::get('todos/{todo}/delete', [\App\Http\Controllers\TodoController::class, 'destroy'])->name('todos.destroy')->middleware('auth');

Route::get('signup', [\App\Http\Controllers\AuthController::class, 'signup'])->name('signup');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

Route::get('signin', [\App\Http\Controllers\AuthController::class, 'signin'])->name('signin');
Route::post('authenticate', [\App\Http\Controllers\AuthController::class, 'authenticate'])->name('authenticate');

Route::get('signout', [\App\Http\Controllers\AuthController::class, 'signout'])->name('signout');