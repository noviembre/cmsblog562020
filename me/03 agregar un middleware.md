#Protectiong with middleware
this middleware will permission of current user when access blog category and users
##1 Create middleware 
php artisan make:middleware NameMiddleware
##2 Register on $routeMiddleware
    a. A:\win\laragon\www\cmsblog57\app\Http\Kernel.php
##3 apply this middlewareon all backend controller
    a. A:\win\laragon\www\cmsblog57\app\Http\Controllers\Backend\BackendController.php
       
        public function __construct()
        {
            $this->middleware('check-permissions');
        }
##4 Edit middleware
a. A:\win\laragon\www\cmsblog57\app\Http\Middleware\CheckPermissionsMiddleware.php


