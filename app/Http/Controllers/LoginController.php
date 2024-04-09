<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return $this->redirectUser();
        }
        return view('auth.login');
    }

    public function login(UserRequest $request)
    {
        $credentials = $request->getCredentials();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'errorCredentials' => 'Correo electronico o contraseña incorrecta',
            ]);
        }
        return $this->redirectUser();
    }

    public function redirectUser()
    {
        switch (Auth::user()->role) {
            case env('ROLE_ADMIN'):
                return redirect()->route('home');
            case env('ROLE_PRESIDENT'):
                return redirect()->route('homesito');
            default:
                return back()->withErrors([
                    'errorCredentials' => 'Usuario registrado pero sin rol',
                ]);
        }
    }
}
