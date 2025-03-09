<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'address', 'shipping_costs', 'discount', 'phone', 'payment_method'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany( Product::class, 'orders_products');
    }
}
