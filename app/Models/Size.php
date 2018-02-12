<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Size extends Model
{
    protected $fillable = ['size', 'quantity', 'date'];

    protected $dates = ['date'];

    /**
     * @param $value
     * @return mixed
     */
    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get all of the owning sizetable models.
     */
    public function sizetable()
    {
        return $this->morphTo();
    }
}
