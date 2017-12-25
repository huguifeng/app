<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/25
 * Time: 16:25
 */
namespace app\common\lib;

use think\Exception;


class ApiException extends Exception
{
    public $httpCode = 500;
    public $message = '';
    public $code = 0;
    public function __construct($message , $code , $httpCode)
    {
        $this->message = $message;
        $this->code = $code;
        $this->httpCode = $httpCode;
    }
}