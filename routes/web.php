<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[LoginController::class,'show']);
Route::post('/login',[LoginController::class,'login']);

Route::group(['middleware' => ['role:'. env('ROLE_ADMIN')]], function () {
    Route::get('/home', function () {
        return view('home');
    });
});

Route::group(['middleware' => ['role:'. env('ROLE_PRESIDENT')]], function () {
    Route::get('/homesito', function () {
        return view('homesito');
    });
});
