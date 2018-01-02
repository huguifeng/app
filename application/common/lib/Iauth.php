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
    public static function checkSign($data)
    {
        $string = (new Aes())->decrypt($data['sign']);
        parse_str($string, $arr);
        if(!is_array($arr)){
            return false;
        }

        if($arr['device'] != $data['device'] || $arr['did'] != $data['did'] || empty($arr['device']) || empty($arr['did'])){
            return false;
        }
            return true;
    }
}