<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'show'])->name('getLogin');
Route::post('/', [LoginController::class, 'login'])->name('postLogin');

Route::group(['middleware' => ['role:' . env('ROLE_ADMIN')]], function () {
    Route::view('/home', 'home')->name('home');
});

Route::group(['middleware' => ['role:' . env('ROLE_PRESIDENT')]], function () {
    Route::view('/homesito', 'homesito')->name('homesito');
});


Route::fallback(function () { // If input bad route, redirect to getLogin
    return redirect()->route('getLogin');
});
