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
    public $header;
    public function _initialize()
    {
        $this->checkAuth();
    }
    public function checkAuth()
    {
        $data = request()->header();
        if(empty($data['sign'])){
           die(json_encode([0, 'sign不存在', []]));

        }
        if(empty($data['app']) || !in_array($data['app'], config('app.allow'))){
            die(json_encode([0, 'app不合法', []]));
        }
        if(empty($data['model'])){
            die(json_encode([0, 'model不存在', []]));
        }
        if(!Iauth::checkSign($data)){
            die(json_encode([0, 'sign不正确', []]));
        }
        $this->header = $data;

    }




}