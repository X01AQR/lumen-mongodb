<?php

namespace App\Http\Middleware;

use Closure;

class LanguageCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $supported = ['ar', 'en'];

        if ($request->lang && in_array($request->lang, $supported)) {
            app('translator')->setLocale($request->lang);
        } else {
            app('translator')->setLocale($supported[0]);
        }
        $response = $next($request);
        return $response;
    }
}
