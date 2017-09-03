<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = ['remark'];

    /**
     * Get all of the owning remarktable models.
     */
    public function remarktable()
    {
        return $this->morphTo();
    }
}
