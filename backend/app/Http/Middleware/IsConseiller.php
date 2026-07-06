<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsConseiller
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    if ($request->user() && $request->user()->type_utilisateur === 'conseiller_agricole') {
        return $next($request);
    }
    return response()->json(['message' => 'Accès réservé aux conseillers.'], 403);
}
}
