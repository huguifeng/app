<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 15:53
 */
namespace app\admin\controller;
use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function check()
   	{
   		$data = input("post.");
   		if(!captcha_check($data['code'])){
   			$this->error("验证码不正确");
   		}
   		
    }
}