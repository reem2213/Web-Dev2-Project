<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'total_amount',
        'status',
        'user_id',
    ];
    public function getProducts()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
