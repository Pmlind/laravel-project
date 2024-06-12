<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Htpp\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::post('/register', [AuthController::class, 'registerUserPost'])->name('register');
    Route::get('/login', [AuthController::class, 'loginUser'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUserPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});