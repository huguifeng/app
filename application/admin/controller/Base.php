<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public $page = '';
    public $size = 5;
    public $from = '';
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
    public function getPageSize($data)
    {
        $this->page = !empty($data['page'])?$data['page']:1;
        $this->size = !empty($data['size'])?$data['size']:config('paginate.list_rows');
        $this->from = (($this->page)-1)*$this->size;
    }
}
