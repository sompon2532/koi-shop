<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameTranslation extends Model
{
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'locale'];
}
