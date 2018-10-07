<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Menu extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['name', 'seq', 'url'];

    public function getImageAttribute()
    {
        $media = $this->getFirstMedia('menu');

        return $media ? url($media->getUrl()) : null;
    }
}
