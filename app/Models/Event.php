<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'date',
        'time',
        'capacity',
        'store_id',
        'product_id',
    ];
    public function getUser(){
        return $this->belongsTo(UserAuth::class,'user_id','id');
    }
    public function getStore(){
        return $this->belongsTo(Store::class,'store_id','id');
    }
    public function getProduct(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}

