<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;

class checkRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route("getLogin");
        }

        $user = Auth::user();

        if ($user && $user->role === $role) {
            return $next($request);
        }

        abort(403, 'Acceso denegado');
    }
}
