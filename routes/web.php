<?php

use App\Http\Controllers\AdminTeamsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'show'])->name('getLogin');
Route::post('/', [SessionController::class, 'login'])->name('postLogin');
Route::get('/logOut', [SessionController::class, 'logOut'])->name('logOut');

// autenticated users routes (presidents and admins)
Route::group(['middleware' => ['checkSession']], function () {
    Route::view('/home', 'home')->name('home');
    Route::view('/my_team', 'my_team')->name('my_team');
    Route::view('/calendar', 'calendar')->name('calendar');
    Route::view('/profile', 'profile')->name('profile');

    Route::put('/updatePassword', [SessionController::class, 'updatePassword'])->name('updatePassword');
    Route::put('/updateNombre', [SessionController::class, 'updateNombre'])->name('updateNombre');
});

// only admin routes
Route::group(['middleware' => ['checkAdminRole']], function () {
    Route::get('/admin_users', [AdminUsersController::class, 'getUsers'])->name('admin_users');
    Route::post('/new_user', [AdminUsersController::class, 'newUser'])->name('admin_new_user');
    Route::put('/update-user/{id}', [AdminUsersController::class, 'updateUser'])->name('admin_update_user');
    Route::post('/admin_users', [AdminUsersController::class, 'searchUsers'])->name('search_users');

    Route::get('/admin_teams', [AdminTeamsController::class, 'getTeams'])->name('admin_teams');
    Route::post('/new_team', [AdminTeamsController::class, 'newTeam'])->name('admin_new_team');

    Route::post('/new_season', [AdminTeamsController::class, 'newSeason'])->name('admin_new_season');

    Route::post('/new_division', [AdminTeamsController::class, 'newDivision'])->name('admin_new_division');

    Route::view('/admin_players', 'admin.players')->name('admin_players');
    Route::view('/admin_games', 'admin.games')->name('admin_games');
});

// if you enter a non-existing route you will return to login
Route::fallback(function () {
    return redirect()->route('getLogin');
});
