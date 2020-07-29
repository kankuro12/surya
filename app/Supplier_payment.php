<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_payment extends Model
{
    protected $fillable=[
        'date',
        'amount',
        'payment_type',
        'payment_info',
        'supplierbill_id',
      ];
}
