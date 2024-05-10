<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable=['name','start_at','end_at','at','status','code','admin_id','product_id','store_id'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function stores()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function participants()
    {
        return $this->belongsToMany(User::class, 'group_participants', 'group_id', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'group_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
