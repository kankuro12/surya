<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
        'name',
        'address',
        'phone',
        'email',
        'due'
      ];

      protected $hidden=[

        'password',
      ];


      public function joborder()
      {
          return $this->hasMany('App\Joborder');
      }
}
