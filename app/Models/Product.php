<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements HasMedia
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
    public $translationModel = ProductTranslation::class;

    /**
     * @var array
     */
    public $translatedAttributes = ['name', 'description'];

    /**
     * @var array
     */
    protected $fillable = ['product_id', 'category_id', 'slug', 'price', 'delivery', 'status'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    /**
     * Get all of the post's remarks.
     */
    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarktable');
    }

    /**
     * Get all of the post's videos.
     */
    public function videos()
    {
        return $this->morphMany(Video::class, 'videotable');
    }

    public function favorites() {
        return $this->hasMany('App\Models\Favorite');
    }

    public function users()
    {
        return $this->morphToMany('App\User', 'favorite');
    }

    public function favorite() {
        return $this->hasMany(Favorite::class, 'favorite_id');
    }
}
