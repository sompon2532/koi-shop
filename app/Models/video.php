<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = ['video'];

    /**
     * Get all of the owning videotable models.
     */
    public function videotable()
    {
        return $this->morphTo();
    }
}
