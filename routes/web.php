<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/', [
        'uses' => 'BlogController@index',
        'as'    => 'blog'
    ]);

    Route::get('/blog/{post}', [
        'uses' => 'BlogController@show',
        'as'   => 'blog.show'
    ]);

    #=================   Category show   ====================
    Route::get('/category/{category}', [
        'uses' => 'BlogController@category',
        'as'   => 'category'
    ]);

    Route::get('/author/{author}',[
        'uses' => 'BlogController@author',
        'as' => 'author'
        ]);
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

#=================   Post   ====================
    Route::resource('/backend/blog', 'Backend\BlogController');

    #-------------  Restore from trashed post   -------------
    Route::put('/backend/blog/restore/{blog}', [
        'uses' => 'Backend\BlogController@restore',
        'as'   => 'backend.blog.restore'
    ]);

    #-------------  Delete permanent a post   -------------
    Route::delete('/backend/blog/force-destroy/{blog}', [
        'uses' => 'Backend\BlogController@forceDestroy',
        'as'   => 'blog.force-destroy'
    ]);


    #=====================================================
    #=================   Categories   ====================
    Route::resource('/backend/categories', 'Backend\CategoriesController');


    #=================   Confirm Delete User   =======
    Route::get('/backend/users/confirm/{users}', [
        'uses' => 'Backend\UsersController@confirm',
        'as' => 'users.confirm'
    ]);
    #=================   Users   ====================
    Route::resource('/backend/users', 'Backend\UsersController');



