<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/18
 * Time: 14:59
 */
namespace app\common\model;
use think\Model;

class AdminUser extends Model
{
    protected $autoWriteTimestamp = true;
    public function add($data)
    {

        if(!is_array($data)){
            exception("数据不合法");
        }
        $this->allowField(true)->save($data);
        return $this->id;
    }
}