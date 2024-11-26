<?php

namespace App\Helpers;
use Morilog\Jalali\Jalalian;
class DateConvertor{

    public static function miladi2shamsi($date){
        //فرمتی که میخواهیم تحویل بگیریم (اختیاری)
        return Jalalian::fromDateTime($date)->format("Y/m/d");
    }

    public static function shamsi2miladi($date){
        $value = Jalalian::fromFormat("Y/m/d",$date);
        return $value->toCarbon()->format("Y-m-d H:i:s");
    }

}