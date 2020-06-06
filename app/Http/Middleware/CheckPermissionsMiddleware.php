<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionsMiddleware
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
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);

        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

        dd("C: $controller M: $method");
        return $next($request);
    }
}
