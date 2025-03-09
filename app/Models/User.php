<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'membership',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    protected $table = 'users';

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function cart(){
        return $this->hasOne(Cart::class, 'user_id');
    }

    public function isUser(){
        return $this->membership == 0;
    }
    public function isSeller(){
        return $this->membership == 1;
    }
    public function isAdmin(){
        return $this->membership == 2;
    }
}
