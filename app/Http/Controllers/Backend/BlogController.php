<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    protected $limit = 10;
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

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
    public function store(PostRequest $request)
    {
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);
        return redirect('/backend/blog')->with('message', 'Your post was created successfully!');
    }

    private function handleRequest($request)
    {
        #--- send data from request data
        $data = $request->all();
        if ($request->hasFile('image'))
        {
            $image       = $request->file('image');
            $fileName    = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->Move($destination, $fileName);

            if($successUploaded)
            {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                Image::make($destination . '/' . $fileName)
                    ->resize($width,$height)
                    ->save($destination . '/' . $thumbnail);
            }
            $data['image'] = $fileName;
        }

        return $data;
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
