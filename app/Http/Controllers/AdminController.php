<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(2);

        return view('admin.users',compact('users'));
    }
    public function newUser(CreateUserRequest $request)
    {
        User::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('new_email'),
            'password' => Hash::make($request->input('confirm_new_pass')),
            'role' => $request->input('role'),
            'date_birth' => $request->input('new_date_birth'),
            'status' => true
        ]);
        Session::flash('successMessage', 'Usuario creado con exito');
        return back();
    }
}
