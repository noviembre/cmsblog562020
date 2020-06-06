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
        // get current user
        $currentUser = $request->user();

        // get current action
        $currentActionName = $request->route()->getActionName();
        list($controller, $method) = explode('@', $currentActionName);

        $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

        // check if current user has permission
        // or if he can do something in the controller
        $crudPermissionsMap = [
            'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
        ];

        // mapping controllers name
        $classesMap = [
            'Blog'       => 'post',
            'Users'      => 'user',
            'Categories' => 'category'
        ];

        // perform an array to loop cru permissions map
        foreach ($crudPermissionsMap as $permission => $methods)
        {
            // if the current method exists in methods list,
            // we'll check the permission
            # if ... and if $classesMapp exits

            if (in_array($method, $methods) && isset($classesMap[$controller]))
            {
                $className = $classesMap[$controller];
                // if the current user has not update-others-post/delete-others-post permission
                // make sure he only modify his/her own post

                if ( !$currentUser->can("{$permission}-{$className}"))
                {
                    abort(403, " Prohibido el paso jeje ");
                }
                break;

            }

        }

        return $next($request);
    }
}
