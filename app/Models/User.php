<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;


    public function getStore()
    {
        return $this->hasMany(Store::class);
    }

    public function getOrders()
    {
        return $this->hasMany(Order::class);
    }
    public function getEvent()
    {
        return $this->hasMany(Event::class);
    }
    public function getReview()
    {
        return $this->hasMany(Review::class);
    }

    // User.php
    public function follows()
    {
        return $this->belongsToMany(Store::class, 'follows', 'user_id', 'store_id')->withTimestamps();
    }

    public function shopCart(){
        return $this->hasMany(ShoppingCart::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'phoneNo',
        'role',
        'provider_id',
        'provider',
        'provider_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function generateUsername($username)
    {

        if ($username === null) {
            $username = Str::lower(Str::random(8));
        }
        if (User::where('username', $username)->exists()) {
            $newUsername = $username . Str::lower(Str::random(3));
            $username = self::generateUsername($newUsername);
        }
        return $username;
    }
}
