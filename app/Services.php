<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    //

    public static function string()
    {
        $services = Services::all();
        $count = count($services);
        // $str = "";
        if ($count > 0) {
            $str = $services[0]->title;
            for ($i = 1; $i < $count - 1; $i++) {
                $str .= ", " . $services[$i]->title;
            }
            if ($count > 1) {

                $str .= " and " . $services[$count - 1]->title;
            }
            return $str;
        } else {
            return "";
        }
    }
}
