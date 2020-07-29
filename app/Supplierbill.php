<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplierbill extends Model
{
    protected $fillable=[
        'supplier_id',
        'date',
        'total_amount',
        'vat',
        'due',
        'discount',
      ];
       
      public function supplier(){
        return $this->belongsTo(Supplier::class);
      }

      public function billitem(){
        return $this->hasMany(Supplierbillitem::class);
      }
}
