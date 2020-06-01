<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $limit = 3;
    //
    public function index()
    {

        $posts = Post::with('author')
            ->latestFirst()->published()
            ->simplePaginate($this->limit);
        return view("blog.index", compact(
            'posts'
        ));

    }

    public function show(Post $post)
    {
        // update posts set view count = view_count + 1
        $post->increment('view_count');
        return view("blog.show", compact('post'));
    }


    public function category(Category $category)
    {
        // No duplicate code here (from category list view, cause is in provider)
        #-------- it shows the Category Name that you choose to view.
        $categoryName = $category->title;



        //\DB::enableQueryLog();
        $posts = $category->posts()
            ->with('author')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);

        return view("blog.index",
            compact('posts', 'categoryName')
        );
        //dd(\DB::getQueryLog());



    }

    public function author(User $author)
    {
        $authorName = $author->name;

        // \DB::enableQueryLog();
        $posts = $author->posts()
            ->with('category')
            ->latestFirst()
            ->published()
            ->simplePaginate($this->limit);

        return view("blog.index", compact('posts', 'authorName'));
    }






}
