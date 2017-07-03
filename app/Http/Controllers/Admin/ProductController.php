<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Characteristic;
use App\Http\Requests\ProductFormRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductFormRequest $request)
    {
        $product = Product::create($request->all());
        if($request->hasFile('file')){
            $request['photo'] = $this->uploadFile($request, 'file');
        }

        return redirect()->route('admin.products.edit', ['id' => $product->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        $characteristics = Characteristic::pluck('name', 'id')->all();

        return view('admin.products.edit', compact('product', 'categories', 'characteristics'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductFormRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductFormRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->hasFile('file')){
            $request['photo'] = $this->uploadFile($request, 'file');
        }
        $product->update($request->all());

        foreach ($product->characteristics as $characteristic) {
            if (
                $request->has($characteristic->name) &&
                $characteristic->pivot->value != $request->input($characteristic->name)
            ) {
                $characteristic->pivot->value = $request->input($characteristic->name);
                $characteristic->pivot->save();
            }
        }

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addCharacteristics(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->addCharacteristics($request->characteristics);

        return back();
    }

    /**
     * Upload image.
     *
     * @param $request
     * @param $file
     * @return bool|string
     */
    public function uploadFile($request, $file){
        $loadFile = $request->file($file);
        if($request->hasFile($file) && $loadFile->isValid()){
            $newName = time() . '-' . $loadFile->getClientOriginalName();
            $loadFile->move('uploaded/products/', $newName);
            return $newName;
        }
        return false;
    }
}
