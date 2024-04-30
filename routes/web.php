<?php

use App\Http\Controllers\AdminPlayerController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminUserController;
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
    // pestaña Usuarios
    Route::get('/admin_users', [AdminUserController::class, 'getUsers'])->name('admin_users');
    Route::post('/new_user', [AdminUserController::class, 'newUser'])->name('admin_new_user');
    Route::put('/update_user/{id}', [AdminUserController::class, 'updateUser'])->name('admin_update_user');
    Route::post('/admin_users', [AdminUserController::class, 'searchUsers'])->name('search_users');

    // pestaña Equipos
    Route::get('/admin_teams', [AdminTeamController::class, 'getTeams'])->name('admin_teams');

    Route::post('/new_season', [AdminTeamController::class, 'newSeason'])->name('admin_new_season');
    Route::put('/update_season/{id}', [AdminTeamController::class, 'updateSeason'])->name('admin_update_season');

    Route::post('/new_team', [AdminTeamController::class, 'newTeam'])->name('admin_new_team');
    Route::put('/update_team/{id}', [AdminTeamController::class, 'updateTeam'])->name('admin_update_team');

    Route::post('/new_division', [AdminTeamController::class, 'newDivision'])->name('admin_new_division');
    Route::put('/update_division/{id}', [AdminTeamController::class, 'updateDivision'])->name('admin_update_division');

    // pestaña Jugadores
    Route::get('/admin_players', [AdminPlayerController::class, 'getPlayers'])->name('admin_players');
    Route::post('/new_player', [AdminPlayerController::class, 'newPlayer'])->name('admin_new_player');
    Route::put('/update_player/{id}', [AdminPlayerController::class, 'updatePlayer'])->name('admin_update_player');

    // pestaña Partidos
    Route::view('/admin_games', 'admin.games')->name('admin_games');
});

// if you enter a non-existing route you will return to login
Route::fallback(function () {
    return redirect()->route('getLogin');
});
