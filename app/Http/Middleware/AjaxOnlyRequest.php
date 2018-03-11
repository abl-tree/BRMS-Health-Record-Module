<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class AjaxOnlyRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            $route = $request->route('/');

            return new Response(view($route));
        }

        if(!$request->ajax()) {
            return response('Forbidden', 404);
        }

        return $next($request);
    }
}
