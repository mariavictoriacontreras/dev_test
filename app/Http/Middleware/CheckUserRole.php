<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, string $roleId): Response
    {
        // Verifico si el usuario está autenticado
        if (!auth()->check()) {
            return redirect('/login'); // Redirige si no está logueado
        }

        // Verifico el ID del rol del usuario contra el ID requerido
        if (auth()->user()->role_id != $roleId) {
            // Si el rol no coincide, devolvemos un error 403 (Acceso Denegado)
            abort(403, 'Acceso Denegado. No tienes el rol necesario.'); 
        }

        return $next($request);
    }
}