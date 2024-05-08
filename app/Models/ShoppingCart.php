<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $fillable=['image','price','quantity','totalPrice','product_id','store_id','user_id'];

    public function getProducts(){
        return $this->hasMany(Product::class);
    }
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function getStores(){
        return $this->belongsTo(Product::class,'store_id','id');
    }
    public function getUsers(){
        return $this->hasOne(User::class,'user_id','id');
    }
    
}
