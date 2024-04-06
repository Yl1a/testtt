<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    use HasFactory;

    protected $table='shops';
    protected $guarded=[];

    public function getImage(){
        return asset('public'.Storage::url($this->img));
    }

    public function categoryGet(){
        return $this->belongsTo(Category::class, 'category', 'id');
    }
}
