<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserConfirmRequest;
use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->route('users.index')
            ->with("message", "New user was created successfully!");
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

    #------ confirm view
    public function confirm(UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        #---- show all users in the list except the user that will be remove
        $list_users_except_current = User::where('id', '!=', $user->id)->pluck('name', 'id');
        return view("backend.users.confirm", compact('user', 'list_users_except_current'));

    }

    public function destroy(UserDestroyRequest $request, $id)
    {

        $user = User::findOrFail($id);
        #---- asigning the selected option
        $deleteOption = $request->delete_option;
        #---- asigning the selected user
        $selectedUser = $request->selected_user;

        #---- if  $deleteOption is = 'delete'
        if ($deleteOption == "delete") {
            // delete all user's post including trashed post
            $user->posts()->withTrashed()->forceDelete();
        }

        #--- otherwise if $deleteOption = 'attribute' then
        elseif ($deleteOption == "attribute") {
            #---- attribute all posts to the selected user
            $user->posts()->update(['author_id' => $selectedUser]);
        }
        $user->delete();
        #-----for backend
        return redirect()->route('users.index')
            ->with("message", "User was deleted successfully!");

    }


}
