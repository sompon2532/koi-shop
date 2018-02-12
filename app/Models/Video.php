<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    protected $fillable = ['video', 'date'];

    protected $dates = ['date'];

    /**
     * @param $value
     * @return mixed
     */
    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get all of the owning videotable models.
     */
    public function videotable()
    {
        return $this->morphTo();
    }
}
