<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTranslation extends Model
{
    //

    public $translateAttributes = ['name','detail','address','soi','subdistrict','district','city','country'];
    protected $fileable = ['name','detail','address','soi','subdistrict','district','city','country'];
}
