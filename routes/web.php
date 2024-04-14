<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'show'])->name('getLogin');
Route::post('/', [LoginController::class, 'login'])->name('postLogin');

// autenticated users routes (presidents and admins)
Route::group(['middleware' => ['checkSession']], function () {
    Route::view('/home', 'home')->name('home');
});

// only admin routes
Route::group(['middleware' => ['checkAdminRole']], function () {
    Route::view('/admin_home', 'admin.home')->name('admin_home');
});

// if you enter a non-existing route you will return to login
Route::fallback(function () {
    return redirect()->route('getLogin');
});
