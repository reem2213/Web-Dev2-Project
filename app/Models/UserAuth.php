<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAuth extends Model
{
    use HasFactory;

    public function getStore(){
        return $this->hasMany(Store::class);
    }

    public function getOrders(){
        return $this->hasMany(Order::class);
    }
    public function getEvent(){
        return $this->hasMany(Event::class);
    }
    public function getReview(){
        return $this->hasMany(Review::class);
    }
    


}
