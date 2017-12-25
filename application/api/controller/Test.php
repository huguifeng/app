<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 14:34
 */
namespace app\api\controller;
use think\Controller;
class Test extends Controller
{
    public function index()
    {
        return ['sing', 'akja'];
    }
    public function save($id)
    {
        $data = input('put.');
        if($data['m'] == 1){
            exception('你提交的数据不合法343', 400000);
        }

    }
}