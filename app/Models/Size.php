<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = ['size', 'quantity'];

    /**
     * Get all of the owning sizetable models.
     */
    public function sizetable()
    {
        return $this->morphTo();
    }
}
