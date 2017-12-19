<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 15:53
 */
namespace app\admin\controller;
use app\common\lib\Iauth;
use think\Controller;

class Login extends Base
{
    public function _initialize()
    {
    }
    
    public function index()
    {
        return $this->fetch();
    }
    public function check()
   	{
   	    if(request()->isPost()){
            $data = input("post.");
            if(!captcha_check($data['code'])){
                $this->error("验证码不正确");
            }
            try {
                $user = model('AdminUser')->get(['username' => $data['username']]);
            } catch (\Exception $e){
                    $this->error($e->getMessage());
            }
            if(!$user || $user->status != config('code.user_normol')){
                    $this->error('用户名不存在');
            }
            if($user->password != Iauth::setWord($data['password'])){
                $this->error("密码不正确");
            }
            $udata = ['last_login_ip' => request()->ip(), 'last_login_time' => time()];
            try{
                model("AdminUser")->save($udata, ['id' => $user->id]);
            } catch (\Exception $e){
                $this->error($e->getMessage());
            }
            session("adminuser", $user, 'app');
            $this->success('登录成功', 'index/index');
        }else{
   	        $this->error("数句不合法");
        }
    }
    public function logout()
    {   
        session(null, 'app');
        $this->redirect('login/index');
    }
}