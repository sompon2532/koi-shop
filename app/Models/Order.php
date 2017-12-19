<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * The product that belong to the order.
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    /**
     * Get the payment record associated with the order.
     */
    public function payment()
    {
        return $this->hasOne('App\Models\Payment');
    }

    /**
     * Get the transaction record associated with the order.
     */
    public function transaction()
    {
        return $this->hasOne('App\Models\Transaction');
    }
}
