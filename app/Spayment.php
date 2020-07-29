<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spayment extends Model
{
    protected $fillable=[
        'date',
        'amount',
        'payment_type',
        'payment_info',
        'password',
        'supplier_id',
      ];

      public function supplier(){
          return $this->belongsTo(Supplier::class);
      }
}
