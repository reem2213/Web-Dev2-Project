<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id', 'user_id', 'from', 'name','is_read', 'message'
    ];
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateTimeAttribute()
    {
        //we get the date and the time, this will return an array
        $dateAndTime = explode(' ', $this->created_at);

        $date = date('d-M-Y', strtotime($dateAndTime[0]));

        $time = date('H:i', strtotime($dateAndTime[1]));

        return "{$date} {$time}";
    }
}
