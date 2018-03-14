<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoiContest extends Model
{
    protected $fillable = ['award', 'owner', 'breeder', 'dealer', 'handled', 'image', 'contest_id'];
}
