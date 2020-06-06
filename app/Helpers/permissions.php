<?php

    function check_user_permissions($request, $actionName = NULL, $id = NULL)
    {
        // get current user
        $currentUser = $request->user();

        // get current action

        if ($actionName) {
            $currentActionName = $actionName;
        }
        else {
            $currentActionName = $request->route()->getActionName();
        }
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
                $id = !is_null($id) ? $id : $request->route('blog');
                // if the current user has not update-others-post/delete-others-post permission
                // make sure he only modify his/her own post

                if ( $id &&
                    (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post')) )

                {
                    $post = \App\Post::withTrashed()->find($id);
                    if ($post->author_id !== $currentUser->id) {
                        return false;
                    }
                }
                elseif ( !$currentUser->can("{$permission}-{$className}"))
                {
                    return false;
                }
                break;

            }

        }
        #--- return true means: there is no error or the current user has proper permision
        return true;

    }