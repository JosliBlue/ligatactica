<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\Session;

class LoginController extends Controller
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
            return back()->withErrors([
                'errorCredentials' => 'Correo electronico o contraseña incorrecta',
            ]);
        }
        return redirect()->route('home');
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect()->route('getLogin');
    }

}
