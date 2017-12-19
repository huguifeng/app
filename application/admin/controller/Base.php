<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public function _initialize()
    {	
    	$action = $this->isLogin();
    	if(!$action){
    		return $this->redirect('login/index');
    	}
 		     
    }
    public function isLogin()
    {
    	$user = session('adminuser', '', 'app');
    	if($user){
    		return true;
    	}
    	return false;
    }
}
