<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkWithTeam
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::user()->team) {
            // Si no tiene un equipo, puedes redirigirlo a otra página
            return redirect()->route('home');
        }

        // Si el usuario tiene un equipo, continuar con la solicitud
        return $next($request);
    }
}
