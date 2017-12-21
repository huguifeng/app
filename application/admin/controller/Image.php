<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
use think\Request;

class Image extends Base
{
    public function upload()
    {
        $info = Request::instance()->file("img");
        $info = $info->move('upload');

        if($info && $info->getPathname()){
            $data = [
                "status" => 1,
                'message' => '上传成功',
                'url' =>'/'.$info->getPathname()

            ];
            die(json_encode($data));
        }
        die(json_encode(['status' => 0, 'message' => '上传失败', 'url' => '']));
    }

}