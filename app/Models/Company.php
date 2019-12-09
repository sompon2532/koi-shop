<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    use Translatable;

    protected $table = 'company';

}
