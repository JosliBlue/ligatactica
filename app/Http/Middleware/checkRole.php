<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;

class checkRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) { // check if user account dont exists in cockies
            return redirect()->route('getLogin');
        }

        $user = Auth::user();

        if (!$user || $user->role !== $role) { // check if user account isnt "role"
            return redirect()->route('getLogin');
            //abort(403, 'Acceso denegado');
        }

        return $next($request);
    }
}
