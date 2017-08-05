<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'status'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
