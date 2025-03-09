<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = [
        "content"
    ] ;

    protected $table = "keywords";
    public function products(){
        return $this->belongsToMany(Product::class,'keywords_products');
    }
}
