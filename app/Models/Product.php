<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name', 'user_id', 'category_id', 'description', 'price', 'stock_quantity', 'thumbnail', 'images'
    ];

    public function keywords(){
        return $this->belongsToMany(Keyword::class,'keywords_products');
    }
    public function carts(){
        return $this->belongsToMany(Cart::class,'cart_product');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'orders_products');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
