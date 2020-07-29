<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_advance extends Model
{
    protected $fillable=[
        'amount',
        'date',
        'issued_date',
        'supplier_id',
      ];
  
     public function supplier()
     {
         return $this->belongsTo(Supplier::class);
     }
}
