<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
	public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'locale'];
}
