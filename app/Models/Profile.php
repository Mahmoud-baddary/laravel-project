<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'age', 'gender', 'bio', 'avatar'
    ] ;
    protected $table = 'profiles';
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
