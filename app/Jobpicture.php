<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobpicture extends Model
{
    protected $fillable=[
        'path',
        'description',
        'joborderitem_id',   
      ];
}
