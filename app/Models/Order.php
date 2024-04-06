<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart(){
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shops_id', 'id');
    }
}
