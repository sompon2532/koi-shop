<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Payment extends Model
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
     * @var array
     */
    protected $appends = [
        'image'
    ];

    /**
     * Get all of the post's remarks.
     */
    public function remarks()
    {
        return $this->morphMany(Remark::class, 'remarktable');
    }
}
