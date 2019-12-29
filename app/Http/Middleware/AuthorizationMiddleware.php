<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!in_array($request->header('X-Token-Scopes', 'guest'), $roles)) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
