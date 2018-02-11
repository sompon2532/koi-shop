<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contest extends Model
{
    protected $fillable = ['contest', 'date'];

    protected $dates = ['date'];

    /**
     * @param $value
     * @return mixed
     */
    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get all of the owning contesttable models.
     */
    public function contesttable()
    {
        return $this->morphTo();
    }
}
