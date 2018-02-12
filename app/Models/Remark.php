<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Remark extends Model
{
    protected $fillable = ['remark', 'date'];

    protected $dates = ['date'];

    /**
     * @param $value
     * @return mixed
     */
    public function getDateAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get all of the owning remarktable models.
     */
    public function remarktable()
    {
        return $this->morphTo();
    }
}
