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

    public function index(Request $request)
    {
        if (($status = $request->get('status')) && $status == 'trash')
        {
            $posts = Post::onlyTrashed('category', 'author')->latest()->get();
            $postCount = Post::count();
            $onlyTrashed = TRUE;
        }
        #--- view all published posts ---------------------------------
        elseif($status == 'published')
        {
            $posts      = Post::published()->with('category', 'author')->latest()->get();
            $postCount  = Post::published()->count();
            $onlyTrashed = FALSE;
        }

        #--- view all scheduled posts ---------------------------------

        elseif($status == 'scheduled')
        {
            $posts      = Post::scheduled()->with('category', 'author')->latest()->get();
            $postCount  = Post::scheduled()->count();
            $onlyTrashed = FALSE;
        }

        #--- view all dratf posts ---------------------------------
        elseif($status == 'draft')
        {
            $posts      = Post::draft()->with('category', 'author')->latest()->get();
            $postCount  = Post::draft()->count();
            $onlyTrashed = FALSE;
        }

        else
        {
            $posts = Post::with('category', 'author')->latest()->get();
            $postCount = Post::count();
            $onlyTrashed = FALSE;
        }


        return view("backend.blog.index", compact(
            'posts',
            'postCount',
            'onlyTrashed'
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
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $successUploaded = $image->Move($destination, $fileName);

            if ($successUploaded)
            {
                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $fileName);
                Image::make($destination . '/' . $fileName)
                    ->resize($width, $height)
                    ->save($destination . '/' . $thumbnail);
            }
            $data['image'] = $fileName;
        }

        return $data;
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view("backend.blog.edit", compact(
            'post'
        ));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);

        #---- if old image (db) is different to the new one
        if ($oldImage !== $post->image) {
            #--- then remove it
            $this->removeImage($oldImage);
        }

        return redirect('/backend/blog')
            ->with('message', 'Your post was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();

        return redirect()->back()
            ->with('trash-message', ['Your post moved to Trash', $id]);
    }


    public function restore($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->back()
            ->with('message', 'You post has been moved from the Trash');
    }

    public function forceDestroy($id)
    {
        $post = Post::withTrashed()->findOrFail($id);
        $post->forceDelete();
        $this->removeImage($post->image);

        return redirect('/backend/blog?status=trash')
            ->with('message', 'Your post has been deleted successfully');
    }

    private function removeImage($image)
    {
        #---- if image is not empty
        if (!empty($image))
        {
            $imagePath = $this->uploadPath . '/' . $image;
            #--- get the file extension of the original image
            $ext = substr(strrchr($image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;
            if (file_exists($imagePath)) unlink($imagePath);
            #---- remove thumbnail file if exists
            if (file_exists($thumbnailPath)) unlink($thumbnailPath);

        }
    }
}
