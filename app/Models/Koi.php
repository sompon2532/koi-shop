<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dimsav\Translatable\Translatable;

class Koi extends Model
{
    use Translatable, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    public $translationModel = KoiTranslation::class;

    /**
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * @var array
     */
    public $fillable = ['koi_id', 'farm_id', 'strain_id', 'certificate', 'born', 'oyagoi', 'sex', 'owner', 'storage', 'price'];
}
