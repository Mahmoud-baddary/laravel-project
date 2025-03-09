<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Rules\MaxValueFromDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $user = Auth()->user();
        $products = Product::join('cart_product as cp', 'cp.product_id', 'products.id')
        ->join('carts', 'carts.id', 'cp.cart_id')
        ->join('users', 'users.id', 'carts.user_id')
        ->select('products.*', 'cp.quantity')->where('users.id', '=', $user->id)->get();
        return view('cart.index', compact('products'));
    }
    public function destroy($id){
        $user = Auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cart->products()->detach($id);
        return redirect()->back()->with("success", "Product has been removed successfully");
    }

    public function store(Request $request){
        $request->validate([
            'product_id' => 'numeric|required|exists:products,id',
            'quantity' => ['numeric', new MaxValueFromDatabase('products', $request->product_id, 'stock_quantity')],
        ]);

        $user = Auth()->user();
        $cart = $user->cart()->first();
        if(empty($cart)){
            $cart = Cart::create([
                'user_id' => $user->id
            ]);
        }
        $cart->products()->detach($request->product_id);
        $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        return redirect()->back()->with("success", "Product has been add to your cart successfully");

    }


}
