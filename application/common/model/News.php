<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 14:59
 */
namespace app\common\model;
use think\Model;
use app\common\model\Base;
class News extends Base
{
        public function getNews($data=[])
        {
            $data['status'] = ['neq', 1];
            $order = ['id desc'];
            $result = $this -> where($data)
                  -> order($order)
                  -> paginate();
//            echo $this->getLastSql();
            return $result;
        }
}