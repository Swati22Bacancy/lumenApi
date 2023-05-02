<?php

namespace App\Helpers;

class CommonHelper
{
    public static function myFunction($date)
    {
        return date('Y-m-d', strtotime($date));
    }
}