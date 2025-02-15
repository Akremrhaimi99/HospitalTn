<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
     public function handle(Request $request, Closure $next, string $role)
     {
         // Vérifiez si l'utilisateur est connecté et possède le rôle approprié
         if (!$request->user() || $request->user()->role !== $role) {
             abort(403, 'Unauthorized action.');
         }
 
         return $next($request);
     }
}