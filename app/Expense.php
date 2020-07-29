<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable=[
        'name',
        'date',
        'amount',
        'expcategory_id',
      ];
      public function expcategory()
      {
          return $this->belongsTo('App\Expcategory');
      }
}
