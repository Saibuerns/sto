<?php
/**
 * Created by PhpStorm.
 * User: ema_s
 * Date: 25/3/2018
 * Time: 15:05
 */

namespace App\Helpers;


class InternetConnection
{
    static function is_connected()
    {
        $connected = @fsockopen("www.google.com", 80);
        //website, port  (try 80 or 443)
        if ($connected) {
            $is_conn = true; //action when connected
            fclose($connected);
        } else {
            $is_conn = false; //action in connection failure
        }
        return $is_conn;
    }
}