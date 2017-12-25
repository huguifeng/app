<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/19
 * Time: 14:23
 */
namespace app\common\lib;

class Iauth
{
    public static function setWord($string)
    {
        return md5($string.config('app.salt'));
    }
    public static function setSign($data = [])
    {
        ksort($data);
        $string = http_build_query($data);
       $sign =  (new Aes())->encrypt($string);
       return $sign;
    }
}