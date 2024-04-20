<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\facades\Auth;

class checkAdminRole
{
    public function handle($request, Closure $next)
    {
        // check if user not exists OR account isnt "role"
        if (!Auth::user() || Auth::user()->role !== env('ROLE_ADMIN')) {
            return redirect()->route('home');
            //abort(403, 'Acceso denegado');
        }

        return $next($request);
    }
}
