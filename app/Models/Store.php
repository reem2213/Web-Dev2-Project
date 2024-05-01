<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

  

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'store_id', 'buyer_id');

    }

    public function getCategories(){
        return $this->hasMany(Category::class);
    }
    
    public function products(){
        return $this->hasMany(Product::class);
    }
     public function getItem(){
        return $this->hasOne(ShoppingCart::class);

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');

    }

}
