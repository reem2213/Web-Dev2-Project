<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'address', 'description', 'phoneNo', 'Accepted', 'user_id'];


    public function events()
    {
        return $this->hasMany(Event::class);
    }
   // Store.php
public function isFollowedBy(User $user)
{
    return $this->followers()->where('user_id', $user->id)->exists();
}


    public function getCategories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function getItem()
    {
        return $this->hasOne(ShoppingCart::class);
    }

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // Store.php
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'store_id', 'user_id')->withTimestamps();
    }
}
