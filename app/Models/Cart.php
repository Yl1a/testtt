<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id','id' );
    }


    public function orders(){
        return $this->hasMany(Order::class, 'cart_id', 'id');
    }

    public function shop(){
        return $this->belongsToMany(Shop::class, 'orders', 'cart_id', 'shops_id', 'id', 'id');
    }
}
