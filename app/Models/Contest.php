<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['contest'];

    /**
     * Get all of the owning contesttable models.
     */
    public function contesttable()
    {
        return $this->morphTo();
    }
}
