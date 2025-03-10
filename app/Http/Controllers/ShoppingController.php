<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class ShoppingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $allProducts = $products;
        $searchWord = "";
        $categories = Category::all();
        if($allProducts->isEmpty()){
            Session::flash('error', 'No products have been added yet');
        }
        return view("shopping.index", compact("products", 'searchWord', 'allProducts', 'categories'));
    }
    public function search(Request $request)
    {
        $request->validate([
            "name" => "string|max:255"
        ]);
        $searchWord = $request->searchWord;
        $products = Product::where('name', 'LIKE', "%$searchWord%")->get();
        $allProducts = Product::all();
        $categories = Category::all();
        if($products->isEmpty()){
            return redirect()->route('shopping.index')->with('error', 'No products found with name: ' . $searchWord);
        }else{
            return view("shopping.index", compact("products", "searchWord", 'allProducts', 'categories'));
        }
    }

    public function show(int $id)
    {
        $product = Product::with('keywords', 'category')->findOrFail($id);
        return view('shopping.show', compact('product'));
    }

    public function category($id)
    {
        $products = Product::where('category_id', $id)->get();
        $allProducts = $products;
        $searchWord = "";
        $categories = Category::all();
        if ($products->isEmpty()) {
            return redirect()->back()->with('error', 'No products found in this category');
        }else{
            return view("shopping.index", compact("products", 'searchWord', 'allProducts', 'categories'));
        }

    }
}
