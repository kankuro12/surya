<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Joborderitem extends Model
{
    protected $fillable=[
        'particular',
        'length',
        'height',
        'rate',
        'qty',
        'total',
        'status',
        'remark',
        'type',
        'image',
        'joborder_id',    
      ];
}
