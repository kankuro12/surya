<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplierbillitem extends Model
{
    protected $fillable=[
        'particular',
        'rate',
        'qty',
        'total',
        'supplierbill_id',
      ];

      public function supplierbill(){
        return $this->belongsTo(Supplierbill::class);
      }
}
