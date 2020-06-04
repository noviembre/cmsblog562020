<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users      = User::orderBy('name')->get();
        return view("backend.users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view("backend.users.create", compact('user'));
    }

    public function store(UserStoreRequest $request)
    {
        #---we call User create method, and past the data from the request object
        User::create($request->all());
        #--- redirect to the User Index Page
        return redirect()->route('users.index')
            ->with("message", "New category was created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view("backend.users.edit", compact('user'));
    }
    public function update(UserUpdateRequest $request, $id)
    {
        User::findOrFail($id)->update($request->all());
        return redirect("/backend/users")
            ->with("message", "User was updated successfully!");
    }


    public function destroy(UserDestroy $request, $id)
    {
        $category = User::findOrFail($id);
        $category->delete();

        return redirect()->route('users.index')
            ->with("message", "User was deleted successfully!");
    }
}
