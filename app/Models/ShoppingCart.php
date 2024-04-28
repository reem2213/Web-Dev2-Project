<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    // public function items()
    // {
    //     return $this->hasMany(ShoppingCartItem::class);
    // }
    public function getProduct(){
        return $this->belongsToMany(Product::class,'product_id','id');
    }
    public function getStore(){
        return $this->belongsToMany(Store::class,'store_id','id');
    }
    
}
