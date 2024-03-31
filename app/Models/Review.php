<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function getUser(){
        return $this->belongsTo(UserAuth::class,'user_id','id');
    }
}
