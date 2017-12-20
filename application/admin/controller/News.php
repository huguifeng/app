<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\controller\Base;
class News extends Base
{
    public function add()
    {   
        return $this->fetch();
    }

}