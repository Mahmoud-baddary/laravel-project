<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Keyword;

class KeywordProduct extends Model
{
    protected $fillable = [
        "product_id","keyword_id"
    ];

    protected $table = "keywords_products";

    public function keyword()
    {
        return $this->belongsTo(Keyword::class, 'keyword_id');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
