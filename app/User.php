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
        return $this->belongsToMany('App\Models\Koi')->withPivot('event_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loadKois()
    {
        return $this->hasMany(Models\Koi::class);
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function favorites()
    {
        return $this->hasMany('App\Models\Favorite');
    }

    /**
     * Get all of the product that are assigned this Favorite.
     */
    public function product()
    {
        return $this->morphedByMany('App\Models\Product', 'favorite');
    }

    /**
     * Get all of the koi that are assigned this Favorite.
     */
    public function koi()
    {
        return $this->morphedByMany('App\Models\Koi', 'favorite');
    }

    public function adresses()
    {
        return $this->hasMany('App\Models\Address');
    }
}
