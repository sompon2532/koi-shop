<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Koi extends Model implements HasMedia
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
    public $translationModel = KoiTranslation::class;

    /**
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * @var array
     */
    public $fillable = ['koi_id', 'farm_id', 'strain_id', 'certificate', 'born', 'oyagoi', 'sex', 'owner', 'storage', 'price', 'category_id', 'slug'];

    /**
     * Get all of the post's remarks.
     */
    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarktable');
    }

    /**
     * Get all of the post's sizes.
     */
    public function sizes()
    {
        return $this->morphMany(Size::class, 'sizetable');
    }

    /**
     * Get all of the post's videos.
     */
    public function videos()
    {
        return $this->morphMany(Video::class, 'videotable');
    }

    /**
     * Get all of the post's contests.
     */
    public function contests()
    {
        return $this->morphMany(Contest::class, 'contesttable');
    }
}
