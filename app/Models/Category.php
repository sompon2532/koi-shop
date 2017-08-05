<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Category extends Model
{
	use Translatable;

    /**
     * @var string
     */
	public $translationModel = CategoryTranslation::class;
	
    /**
     * @var array
     */
	public $translatedAttributes = ['name'];

    /**
     * @var array
     */
    protected $fillable = ['status'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query) {
        return $query->where('status', 1);
    }
}
