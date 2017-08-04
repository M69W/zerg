<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 2017/6/27
 * Time: 11:37
 */

namespace app\lib\exception;




class ParameterException  extends BaseExcrption
{
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = 10000;
}