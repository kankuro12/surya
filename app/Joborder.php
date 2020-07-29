<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joborder extends Model
{
    protected $fillable=[
        's_n',
        'date',
        'order_received_date',
        'order_delever_date',
        'due',
        'customer_id',
        'status',
        'grand_total',
        'advance',
      ];


      public function customer()
      {
          return $this->belongsTo('App\Customer');
      }


      public function joborderitems()
      {
          return $this->hasMany('App\Joborderitem');
      }

      public function netTotal()
      {
          return $this->advance+$this->due;
      }
}
