<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. On vérifie si l'utilisateur est connecté et si son type est 'administrateur'
        // Assurez-vous que la colonne 'type_utilisateur' correspond bien à ce qui est en base
        if ($request->user() && $request->user()->type_utilisateur === 'administrateur') {
            return $next($request);
        }

        // 2. Si ce n'est pas le cas, on bloque l'accès avec un code 403 (Forbidden)
        return response()->json([
            'message' => 'Accès interdit : Administrateur uniquement.'
        ], 403);
    }
}