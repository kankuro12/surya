<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expcategory extends Model
{
    protected $fillable=[
        'name',
        'address',
      ];

      public function expense()
      {
          return $this->hasMany('App\Expense');
      }

}
