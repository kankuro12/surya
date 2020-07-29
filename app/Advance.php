<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable=[
      'amount',
      'date',
      'issued_by',
      'issued_date',
      'staff_id',
    ];

   public function staffs()
   {
       return $this->belongsTo(Staff::class);
   }

}

