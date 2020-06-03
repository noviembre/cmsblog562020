<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use Illuminate\Http\Request;

class CategoriesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories      = Category::with('posts')->orderBy('title')->get();
        $categoriesCount = Category::count();
        return view("backend.categories.index", compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view("backend.categories.create", compact('category'));
    }

    public function store(CategoryStoreRequest $request)
    {
        #---we call Category create method, and past the data from the request object
        Category::create($request->all());
        #--- redirect to the Category Index Page
        return redirect()->route('categories.index')
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
        $category = Category::findOrFail($id);
        return view("backend.categories.edit", compact('category'));
    }
    public function update(CategoryUpdateRequest $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect("/backend/categories")
            ->with("message", "Category was updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categories.index')
            ->with("message", "Category was deleted successfully!");
    }
}
