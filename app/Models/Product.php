<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function getCategory(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function getStore(){
        return $this->belongsTo(Store::class,'category_id','id');
    }
    public function getEvent(){
        return $this->hasOne(Event::class);
    }

    public function getOrders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

}
