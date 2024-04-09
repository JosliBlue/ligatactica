<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return redirect('/home');
        }
        return view("auth.login");
    }

    public function login(UserRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'errorCredentials' => 'Correo electronico o contraseña incorrecta',
            ]);
        }

        $user = Auth::user();

        switch ($user->role) {
            case env('ROLE_ADMIN'):
                return redirect()->intended('home');
            case env('ROLE_PRESIDENT'):
                return redirect()->intended('homesito');
            default:
                return redirect('/login');
        }
    }
}
