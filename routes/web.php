<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'show'])->name('getLogin');
Route::post('/', [LoginController::class, 'login'])->name('postLogin');
Route::get('/logOut', [LoginController::class, 'logOut'])->name('logOut');

// autenticated users routes (presidents and admins)
Route::group(['middleware' => ['checkSession']], function () {
    Route::view('/home', 'home')->name('home');
    Route::view('/my_team', 'my_team')->name('my_team');
    Route::view('/calendar', 'calendar')->name('calendar');
    Route::view('/profile','profile')->name('profile');
});

// only admin routes
Route::group(['middleware' => ['checkAdminRole']], function () {
    Route::view('/admin_home', 'admin.home')->name('admin_home');
    Route::view('/admin_teams', 'admin.teams')->name('admin_teams');
    Route::view('/admin_players', 'admin.players')->name('admin_players');
    Route::view('/admin_games', 'admin.games')->name('admin_games');
});

// if you enter a non-existing route you will return to login
Route::fallback(function () {
    return redirect()->route('getLogin');
});
