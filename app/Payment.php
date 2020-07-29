<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable=[
        'date',
        'amount',
        'payment_type',
        'payment_info',
        'password', 
        'customer_id',
      ];
}
