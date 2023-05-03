<?php

namespace App\Helpers;

class CommonHelper
{
    public static function myFunction($date)
    {
        return $date;
    }
    public static function generateRandomString($length = 10)
    {
        $characters = '951245421545124542154512121';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}