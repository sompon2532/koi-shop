<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Payment extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'image'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Get all of the post's remarks.
     */
    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarktable');
    }

    /**
     * @var array
     */
    public $fillable = ['order_id', 'bank', 'total', 'datetime'];

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|null|string
     */
    public function getImageAttribute()
    {
        $media = $this->getFirstMedia('payment');

        return $media ? url($media->getUrl()) : null;
    }
}
