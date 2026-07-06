<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAgriculteur
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if ($request->user() && $request->user()->type_utilisateur === 'agriculteur') {
        return $next($request);
    }
    return response()->json(['message' => 'Accès réservé aux agriculteurs.'], 403);
}
}
