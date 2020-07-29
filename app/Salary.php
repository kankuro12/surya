<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
class Salary extends Model
{
    protected $fillable=[
        'amount',
        'date',
        'issued_date',
        'issued_by',
        'issued_till',
        'staff_id',
      ];
      public function staff(){
        return $this->belongsTo(Staff::class);
      }

      public function tDays(){
        $start=new \Carbon\Carbon($this->issued_till);
        $end=new \Carbon\Carbon($this->issued_date);
        $total = $end->diffInDays($start) +1;
        return $total;
      }

      // public function getdate(){
      //   $from=$this->issued_date;
      //   $date=new \Carbon\Carbon($from);
      //   return $date;
        
      // }
     

}
