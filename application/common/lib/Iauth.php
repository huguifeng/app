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

}