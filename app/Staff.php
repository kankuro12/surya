<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable=[
        'name',
        'address',
        'phone',
        'email',
        'salary',
        'start_date',
        'nationality',
        'nationality_no',
        'parent-name',
        'advance',
        'image',
        'type',
      ];

     public function advances()
     {
        return $this->hasMany(Advance::class);
     }
}
