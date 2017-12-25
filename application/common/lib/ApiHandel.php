<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/19
 * Time: 14:23
 */
namespace app\common\lib;
use think\exception\Handle;

class ApiHandel extends Handle
{
    public $httpcode = 500;
    public function render(\Exception $e)
    {
        if ($e instanceof ApiException) {
            $this->httpcode = $e->httpCode;
        }

        return show(0, $e->getMessage(), [], $this->httpcode);
    }

}