<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Htpp\Controllers\RegController;

Route::get('/', function () {
    return view('login');
});

Route::group(['middleware' => 'guest'], function () {


});

Route::group(['middleware' => 'auth'], function () {

});