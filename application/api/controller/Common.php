<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 17:31
 */
namespace app\api\controller;
use app\common\lib\Aes;
use app\common\lib\Iauth;
use think\Controller;
class Common extends Controller
{
    public function _initialize()
    {
//        $this->checkAuth();
        $this -> test();

    }
    public function checkAuth()
    {
        $data = request()->header();
        halt($data);
    }
    public function test()
    {
        $data = [
            'username' => '12345dg',
            'password' => 1
        ];
//        $string = Iauth::setSign($data);
        $string =(new Aes())->decrypt("CgcmWOAW6f0bqO3HP8DZNpl/WA2EGR7P4RkLJRT6kFk=");
        halt($string);
    }


}