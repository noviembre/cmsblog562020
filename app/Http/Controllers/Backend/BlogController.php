<?php

namespace App\Http\Controllers\Backend;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    protected $limit = 10;

    public function index()
    {
        $posts     = Post::with('category', 'author')
            ->latest()->get();

        $postCount = Post::count();

        return view("backend.blog.index", compact(
            'posts',
            'postCount'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Post $post)
    {
        return view('backend.blog.create', compact(
            'post'
        ));
    }
    public function store(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'slug' => 'required|unique:posts',
            'body' => 'required',
            'published_at' => 'date_format:Y-m-d H:i:s',
            'category_id' => 'required',

        ]);
        $request->user()->posts()->create($request->all());

        return redirect('/backend/blog')->with('message', 'Your post was created successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
