<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kois()
    {
        return $this->belongsToMany('App\Models\Koi');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }
}
