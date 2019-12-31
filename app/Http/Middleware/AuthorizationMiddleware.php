<?php

namespace App\Http\Middleware;

use Closure;
use Lcobucci\JWT\Parser;

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
        if ($request->hasHeader('Authorization')) {
            $token = explode(' ', $request->header('Authorization'))[1];
            $parser = new Parser();
            $jwt = $parser->parse($token);

            if (in_array($jwt->getClaim('user_role'), $roles)) {
                return $next($request);
            }
        }

        return response('Unauthorized', 401);
    }
}
