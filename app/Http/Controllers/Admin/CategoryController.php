<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::first()->getDescendants();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryFormRequest $request)
    {
        $parentCategory = Category::findOrFail($request->input('parent_id'));
        $parentCategory->children()->create($request->all());

        return redirect()->route('admin.categories.index');
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
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        if ($category->parent_id != $request->parent_id) {
            $parentCategory = Category::findOrFail($request->parent_id);
            $category->makeChildOf($parentCategory);
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        if ($category->countProductsByCategory() != 0) {

        }
//        return back();
    }
}
