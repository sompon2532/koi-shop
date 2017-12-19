<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $fillable = ['order_id', 'status'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
