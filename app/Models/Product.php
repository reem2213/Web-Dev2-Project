<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=['name','image','quantity','price','description','category_id','store_id'];

    public function getEvent(){
        return $this->hasOne(Event::class);
    }

    public function getOrders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }


    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');

    }
    public function getStores(){
        return $this->belongsTo(Store::class,'store_id','id');

    }
    public function getCart(){
        return $this->belongsTo(ShoppingCart::class,'shop_cart_id','id');

    }

}
