<?php

namespace App\Http\Controllers;

use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth()->user();
        $sales = Product::join('users', 'users.id', 'products.user_id')
        ->join('orders_products as op', 'op.product_id', 'products.id')
        ->join('orders', 'orders.id', 'op.order_id')
        ->select(DB::raw('SUM(op.quantity * op.price) as sales') )
        ->where('users.id', $user->id)
        ->first();
        return view("dashboard.index", compact('sales'));
    }
}
