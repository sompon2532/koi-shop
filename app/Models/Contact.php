<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * @var array
     */
    public $fillable = ['name', 'email', 'phone', 'description'];
}
