<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
class News extends Base
{
    public function index()
    {
        echo 123123;
    }
    public function add()
    {

        if(request()->isPost()){
            $data = input('post.');
            try{
               $id = model('News')->add($data);
            }catch (\Exception $e){
                return $this -> result('', 0, '新增失败');
            }
            if(!$id){
                return $this -> result('', 0, '新增失败');
            }

            return $this -> result(['url' => url('news/index')], 1, '新增成功');
        }
        return $this->fetch('', ['list' => config('cat.list')]);


    }

}