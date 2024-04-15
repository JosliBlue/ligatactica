<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'show'])->name('getLogin');
Route::post('/', [LoginController::class, 'login'])->name('postLogin');
Route::get('/logOut', [LoginController::class, 'logOut'])->name('logOut');

// autenticated users routes (presidents and admins)
Route::group(['middleware' => ['checkSession']], function () {
    Route::view('/home', 'home')->name('home');
    Route::view('/home2', 'home2')->name('homesito2');
    Route::view('/home3', 'home3')->name('homesato3');
    Route::view('/home4', 'home4')->name('homexd4');
});

// only admin routes
Route::group(['middleware' => ['checkAdminRole']], function () {
    Route::view('/admin_home', 'admin.home')->name('admin_home');
});

// if you enter a non-existing route you will return to login
Route::fallback(function () {
    return redirect()->route('getLogin');
});
