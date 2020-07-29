<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable=[
        'path',
        'description',
        'joborderitem_id',   
      ];
}
