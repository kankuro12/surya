<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        'name',
        'address',
        'phone',
        'email',
        'advance',
        'due',
        'pan',
        'vat',           
      ];
      public function bill(){
        return $this->hasMany(Supplierbill::class);
      }

      public function supplier_adv()
      {
          return $this->hasMany(Supplier_advance::class);
      }
}
