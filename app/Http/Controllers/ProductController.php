<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Keyword;
use App\Models\KeywordProduct;
use Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();
        $products = Product::with('category', 'user')
        ->where('user_id', $user->id)
        ->get();
        return view("dashboard.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $keywords = Keyword::all();
        return view("dashboard.product.create", compact("categories", "keywords"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'integer|exists:categories,id',
            'description' => 'string|max:2500',
            'keywords' => 'string|nullable',
            'price' => 'required|numeric|min:1',
            'stock_quantity' => 'required|integer|min:1',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        //handle files upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $tmpFile = $_FILES['thumbnail']['tmp_name'];
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = "uploads/products/thumbnails/$thumbnailName";
            move_uploaded_file($tmpFile, $thumbnailPath);
        }
        $imagesPaths = [];
        if ($request->hasFile("images")) {
            foreach ($request->file('images') as $key => $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $fullPath = "uploads/products/images/$imageName";
                $imagesPaths[] = $fullPath;
                $tmpFile = $_FILES['images']['tmp_name'][$key];
                move_uploaded_file($tmpFile, $fullPath);
            }
        }
        $user = Auth::user();
        $product = Product::create([
            'category_id' => $request->category_id,
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'stock_quantity' => $request->stock_quantity,
            'price' => $request->price,
            'thumbnail' => $thumbnailPath,
            'images' => json_encode($imagesPaths),
        ]);
        // handle keywords
        if (!empty($request->keywords)) {
            $keywords = explode(',', $request->keywords);
            foreach ($keywords as $keywordContent) {
                $keyword = Keyword::where('content', '=', $keywordContent)->first();
                if ($keyword != null) {
                    $product->keywords()->attach($keyword->id);
                }
            }
        }
        return redirect()->route('product.index')->with('success', 'product has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::with('keywords', 'category')->findOrFail($id);
        return view('dashboard.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $categories = Category::all();
        $product = Product::where('id', $id)->with('keywords')->first();
        $keywords = Keyword::all();
        return view('dashboard.product.edit', compact('product', 'categories', 'keywords'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'category_id' => 'integer|exists:categories,id',
            'description' => 'string|max:2500',
            'keywords' => 'string|nullable',
            'price' => 'required|numeric|min:1',
            'stock_quantity' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        //handle files upload
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $tmpFile = $_FILES['thumbnail']['tmp_name'];
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '_thumbnail.' . $thumbnail->getClientOriginalExtension();
            $thumbnailPath = "uploads/products/thumbnails/$thumbnailName";
            move_uploaded_file($tmpFile, $thumbnailPath);
            $product->thumbnail = $thumbnailPath;
        }
        $imagesPaths = [];
        if ($request->hasFile("images")) {
            foreach ($request->file('images') as $key => $image) {
                $imageName = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $fullPath = "uploads/products/images/$imageName";
                $imagesPaths[] = $fullPath;
                $tmpFile = $_FILES['images']['tmp_name'][$key];
                move_uploaded_file($tmpFile, $fullPath);
            }
            $product->images = json_encode($imagesPaths);
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->stock_quantity = $request->stock_quantity;
        $product->price = $request->price;
        $product->save();

        // handle keywords
        if (!empty($request->keywords)) {
            $keywords = explode(',', $request->keywords);
            $keywordsIds = [];
            foreach ($keywords as $keywordContent) {
                $keyword = Keyword::where('content', '=', $keywordContent)->first();
                if ($keyword != null) {
                    $keywordsIds[] = $keyword->id;
                }
            }
            $product->keywords()->sync($keywordsIds);
        }else{
            $product->keywords()->detach();
        }
        return redirect()->route('product.index')->with("success", "Product has been updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Product::destroy($id);
        return redirect()->back()->with("success", "Product has been removed successfully");
    }
}
