<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $tbale="stores";

    protected $fillable=[
        'name',
        'address',
        'phoneNo',
        'description',
        'image',
        'Accepted',
        'user_id'
    ];
    public function getProduct(){
        return $this->hasMany(Product::class);
    }

    public function getUser(){
        return $this->belongsTo(UserAuth::class,'user_id','id');
    }

}
