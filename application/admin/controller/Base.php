<?php
namespace app\admin\controller;
use think\Controller;
class Base extends Controller
{
    public $page = '';
    public $size = 5;
    public $from = '';
    public $model = '';
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
    public function del()
    {
        $id = input('param.')['id'];
        $model = request() -> controller();
        $model = $this->model?$this->model:$model;
        if(!$id){
            return $this->result('', 0, '数据不合法');
        }
        try{
            $res = model($model)->save(['status' => -1],['id'=>$id]);
        }catch (\Exception $e){

            return $this->result('', 0, '删除失败');
        }
        if(!$res){
            return $this->result('', 0, '删除失败');
        }
        return $this->result(['jump_url' => $_SERVER['HTTP_REFERER']], 1, '删除成功');

    }
    public function stutus()
    {
        $id = input('param.')['id'];
        $status = input('param.')['status'];
        $model = request() -> controller();
        $model = $this->model?$this->model:$model;

        if(!$id){
            return $this->result('', 0, '数据不合法');
        }
        try{
            $res = model($model)->save(['status' => $status],['id'=>$id]);
        }catch (\Exception $e){

            return $this->result('', 0, '修改失败');
        }
        if(!$res){
            return $this->result('', 0, '修改失败');
        }
        return $this->result(['jump_url' => $_SERVER['HTTP_REFERER']], 1, '修改成功');

    }
}
