<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth()->user();
        $products = Product::join('cart_product as cp', 'cp.product_id', 'products.id')
            ->join('carts', 'carts.id', 'cp.cart_id')
            ->join('users', 'users.id', 'carts.user_id')
            ->select('products.*', 'cp.quantity')->where('users.id', '=', $user->id)->get();
        return view('order.create', compact('user', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'string|max:255|required',
            'phone' => 'string|max:255|required',
            'payment_method' => 'string|max:255|required'
        ]);
        $user = Auth()->user();
        $cart = $user->cart()->first();
        $products = Product::join('cart_product as cp', 'cp.product_id', 'products.id')
            ->join('carts', 'carts.id', 'cp.cart_id')
            ->join('users', 'users.id', 'carts.user_id')
            ->select('products.*', 'cp.quantity')->where('users.id', '=', $user->id)->get();
        if ($products->isNotEmpty()) {
            $order = Order::create([
                'user_id' => $user->id,
                'address' => $request->address,
                'phone' => $request->phone,
                'shipping_costs' => 5,
                'discount' => 0,
                'payment_method' => $request->payment_method,
            ]);
            foreach ($products as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $product->quantity,
                    'price' => $product->price,
                    'discount' => 0,
                ]);
                $product->stock_quantity -= $product->quantity;
                $product->save();
            }
            $cart->products()->detach(); // empty the cart
            return redirect()->back()->with("success", "order has been saved successfully");
        }else{
            return redirect()->back()->with('error', 'No products in your cart');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
