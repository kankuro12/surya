<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_payment extends Model
{
    protected $fillable=[
        'date',
        'amount',
        'payment_type',
        'payment_info',
        'joborder_id'
      ];
}
