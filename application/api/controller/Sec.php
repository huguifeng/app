<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 14:59
 */
namespace app\api\controller;
use think\Controller;
class Sec extends Common
{
    public function save()
    {
        return input('post.');
    }
    public function delete($id)
    {
        return show(1, '删除成功');
    }
    public function update($id)
    {
        $data = input('put.');
        return show(1, '更新成功', $data, 208);
    }
}