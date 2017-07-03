<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ProductViewed;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $categories = Category::first()->getDescendants()->toHierarchy();
        $popularProducts = Product::popularProducts()->get();

        return view('front.home', compact('categories', 'popularProducts'));
    }

    /**
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Request $request, $slug)
    {
        $category = Category::findBySlugOrFail($slug);
        $query = $category->products();
        if ($request->has('name')) {
            $query->orderBy('name', $request->get('name'));
        }
        if ($request->has('price')) {
            $query->orderBy('price', $request->get('price'));
        }
        $products = $query->paginate(12);

        return view('front.category', compact('category', 'products'));
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function product($slug)
    {
        $product = Product::findBySlugOrFail($slug);
        Event::fire(new ProductViewed($product));
        $products = Product::moreProducts($product)->get();
        return view('front.product', compact('product', 'products'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'query' => 'required|min:3',
        ]);

        if ($request->has('query')){
            $query = $request->input('query');
            $products = Product::search($query)->get();
        }

        return view('front.search', compact('products', 'query'));
    }
}
