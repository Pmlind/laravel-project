<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashController;

Route::get('/', function () {
    return view('welcome');
});

//Login & Registration pages
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::post('/register', [AuthController::class, 'registerUserPost'])->name('register');
    Route::get('/login', [AuthController::class, 'loginUser'])->name('login');
    Route::post('/login', [AuthController::class, 'loginUserPost'])->name('login');
});
 
//Dashboard Page
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logoutUser'])->name('logout');
    Route::post('/dashboard', [DashController::class, 'createClient'])->name('create');

});