<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewPassRequest;
use App\Http\Requests\NombreRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function show()
    {
        // check if user account exists in cockies
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(UserRequest $request)
    {
        // check if account credentials are bad
        if (!Auth::attempt($request->getCredentials())) {
            Session::flash('errorMessage', 'Correo electronico o contraseña incorrectas');
            return back();
        }
        return redirect()->route('home');
    }

    public function logOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('getLogin');
    }

    public function updateNombre(NombreRequest $request)
    {
        $nuevoNombre = $request->input('nombre');
        $request->user()->update([
            'nombre' => $nuevoNombre,
        ]);
        Session::flash('successMessage', 'Nombre actualizado');
        return back();
    }
    public function updatePassword(NewPassRequest $request)
    {
        $currentPassword = $request->input('current_password');
        $newPassword = $request->input('new_password');

        if (!Hash::check($currentPassword, Auth::user()->password)) {
            Session::flash('errorMessage', 'Contraseña actual incorrecta');
            return back();
        }
        if ($request->input('new_password') != $request->input('pass_confirm')) {
            Session::flash('errorMessage', 'Confirme bien la contraseña por favor');
            return back();
        }

        $request->user()->update([
            'password' => Hash::make($newPassword),
        ]);

        return redirect()->route('logOut');
    }
}
