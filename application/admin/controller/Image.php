<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
class Image extends Base
{
    public function upload()
    {
        $data = [
        	"status" => 1,
        	'message' => '上传成功',
        	'url' => "https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1514369806&di=c316ca8918448c3e90be2da845f676c5&imgtype=jpg&er=1&src=http%3A%2F%2Fwww.reader8.cn%2Fuploadfile%2Fjiaocheng%2F2014%2F0221%2F201402212318056.jpg"

        ];
        echo json_encode($data);
    }

}