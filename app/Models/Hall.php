<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    protected $fillable = ['title', 'detail', 'contest_date'];

    protected $dates = ['contest_date'];
}
