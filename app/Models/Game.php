<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Game extends Model implements HasMedia
{
    use Translatable, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * @var string
     */
    public $translationModel = GameTranslation::class;

    /**
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * @var array
     */
    protected $fillable = ['slug', 'status'];
}
