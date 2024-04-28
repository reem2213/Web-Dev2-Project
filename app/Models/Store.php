<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function getProduct(){
        return $this->hasMany(Product::class);
    }

    public function getUser(){
        return $this->belongsTo(User::class,'user_id','id');
    }

}
