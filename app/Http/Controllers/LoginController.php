<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) { // check if user account exists in cockies
            return $this->redirectUser();
        }
        return view('auth.login');
    }

    public function login(UserRequest $request)
    {
        if (!Auth::attempt($request->getCredentials())) { // check account credentials
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
                // no default because column "role" in db only supports president and admin :3
        }
    }
}
