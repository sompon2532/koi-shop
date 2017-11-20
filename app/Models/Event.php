<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Event extends Model implements HasMedia
{
    use Translatable, SoftDeletes, HasMediaTrait;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'config' => 'boolean',
        'status' => 'boolean'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_datetime', 'end_datetime', 'deleted_at'];

    /**
     * @var string
     */
    public $translationModel = EventTranslation::class;

    /**
     * @var array
     */
    public $translatedAttributes = ['name'];

    /**
     * @var array
     */
    protected $fillable = ['slug', 'status', 'config', 'start_datetime', 'end_datetime'];

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query) {
        return $query->where('status', 1);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kois() {
        return $this->hasMany(Koi::class);
    }

    /**
     * Get all of the post's videos.
     */
    public function videos()
    {
        return $this->morphMany(Video::class, 'videotable');
    }
}
