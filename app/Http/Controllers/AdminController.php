<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private $usersPerPage;
    public function __construct()
    {
        $this->usersPerPage = 10;
    }
    public function getUsers()
    {
        $users = User::paginate($this->usersPerPage);

        return view('admin.users', compact('users'));
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

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        // Update user fields
        $user->email = $request->new_email;
        $user->nombre = $request->nombre;
        $user->date_birth = $request->new_date_birth;
        $user->role = $request->role;
        $user->status = $request->status;

        // Save the updated user
        $user->save();

        // Flash a success message (optional)
        Session::flash('successMessage', 'Usuario actualizado con exito');
        return back();
    }

    public function searchUsers(Request $request)
    {
        if (!$request->filled('search')) {
            return back();
        }
        $users = User::where('nombre', 'LIKE', "%$request->search%")
            ->orWhere('email', 'LIKE', "%$request->search%")
            ->orWhere('role', 'LIKE', "%$request->search%")
            ->orWhere('date_birth', 'LIKE', "%$request->search%")
            ->orWhere('status', 'LIKE', "%$request->search%")
            ->paginate($this->usersPerPage);

        return view('admin.users', compact('users'));
    }
}
